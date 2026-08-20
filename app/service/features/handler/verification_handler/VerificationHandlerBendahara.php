<?php

namespace App\service\features\handler\verification_handler;

use App\Models\BudgetSubmission;
use App\Models\Category;
use App\Models\DigitalArchive;
use App\Models\FundingSource;
use App\Models\PaymentMethod;
use App\service\features\handler\verification_handler\VerificationHandler;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Mpdf\Mpdf;
use Override;

class VerificationHandlerBendahara extends VerificationHandler
{
    public $kuitansi = null;
    public $path = null;
    public $digital = null;
    public Request $request;

    public function __construct(Request $req)
    {
        parent::__construct();
        $this->request = $req;
    }

    public function setVerificator(string $id, $authid): bool
    {
        // 1. Eksekusi Atomic Update (MySQL otomatis mengunci row ini secara mutlak)
        $affected = BudgetSubmission::with('user')->where('id', $id)
            ->where(function ($query) use ($authid) {
                $query->whereNull('revenue_officer_id')
                    ->orWhere('revenue_officer_id', $authid);
            })
            ->update([
                'revenue_officer_id' => $authid,
            ]);

        // Jika 0, berarti data sudah dikunci/diisi oleh petugas keuangan lain
        if ($affected === 0) {
            return false;
        }

        // 2. Set $this->submission beserta relasinya setelah berhasil update
        $this->setSubmission($id);
        $this->verificator = $authid;

        return true;
    }

    public function verifySubmission(): void
    {
        // $pengajuan = BudgetSubmission::with('user')->with('finance_officer')->with('revenue_officer')->findOrFail($id);
        $this->checklistFactory->setNoKuitansi($this->request, $this->submission);
        $file = $this->request->File('file_pengajuan');
        $this->path = $this->pdfHandler->updatePDF($this->submission, $file);

        $this->kuitansi = $this->request->kuitansi;
        $this->isComplete = true;
        $this->isVerify = true;
    }

    public function addWatermark(): void
    {
        if (Storage::disk('private')->exists($this->submission->path_file_submission)) {
            $noKuitansi = $this->submission->user->role . ' ' . $this->kuitansi;
            $this->addWatermarkWithKuitansiToPdf($this->submission->path_file_submission, $noKuitansi);
        }
    }

    private function addWatermarkWithKuitansiToPdf(string $filePath, string $kuitansi)
    {
        if (!Storage::disk('private')->exists($filePath)) {
            Log::error('File PDF tidak ditemukan: ' . $filePath);
            throw new \Exception('File PDF tidak ditemukan');
        }

        $fullPath = Storage::disk('private')->path($filePath);

        // --- PROSES GHOSTSCRIPT (START) ---
        $tempFixedPath = $fullPath . '_fixed.pdf';
        $gsBinary = (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') ? 'gswin64c' : 'gs';

        // Gunakan command yang sama agar coretan tetap muncul
        $command = "{$gsBinary} -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dNOPAUSE -dQUIET -dBATCH " .
            "-dPreserveAnnots=false " .
            "-dShowAnnots=true " .
            "-dPDFSETTINGS=/prepress " .
            "-sOutputFile=" . escapeshellarg($tempFixedPath) . " " .
            escapeshellarg($fullPath) . " 2>&1";

        $output = shell_exec($command);

        if (file_exists($tempFixedPath)) {
            rename($tempFixedPath, $fullPath);
        } else {
            Log::error("Ghostscript Gagal. Output: " . $output);
        }
        // --- PROSES GHOSTSCRIPT (END) ---

        $mpdf = new Mpdf([
            'tempDir' => storage_path('app/mpdf'),
        ]);

        // === LOAD FILE PDF ASLI ===
        $pageCount = $mpdf->SetSourceFile($fullPath);

        for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {

            $tplId = $mpdf->ImportPage($pageNo);
            $size  = $mpdf->getTemplateSize($tplId);

            $mpdf->AddPageByArray([
                'orientation' => $size['orientation'],
                'width'       => $size['width'],
                'height'      => $size['height'],
            ]);

            $mpdf->UseTemplate($tplId);

            // === GARIS MERAH SOLID DI KIRI ===
            // $mpdf->SetAlpha(0.5);
            // $mpdf->SetDrawColor(255, 0, 0);
            // $mpdf->SetLineWidth(0.5);
            // $mpdf->Line(5, 0, 5, $size['height']);
            // $mpdf->SetAlpha(1);

            // === NOMOR KUITANSI VERTIKAL BERULANG (90° ROTASI) DI ATAS GARIS MERAH ===
            $xKuitansi = 5; // Tepat di posisi garis merah (ditimpa)
            $yStart = 10;   // Mulai dari atas
            $spacing = 30;  // Jarak antar teks kuitansi (dalam mm)

            $mpdf->SetFont('Arial', 'B', 4); // Lebih kecil (dari 10 jadi 8)
            $mpdf->SetTextColor(0, 0, 0); // Hitam (dari merah jadi hitam)
            $mpdf->SetAlpha(0.8); // Opacity 80% (dari 0.7 jadi 0.8)

            // Hitung berapa kali perlu diulang berdasarkan tinggi halaman
            $repeatCount = ceil(($size['height'] - $yStart) / $spacing);

            for ($i = 0; $i < $repeatCount; $i++) {
                $yPosition = $yStart + ($i * $spacing);

                // Pastikan tidak melebihi tinggi halaman
                if ($yPosition > $size['height']) {
                    break;
                }

                // Rotate text 90 derajat
                $mpdf->Rotate(90, $xKuitansi, $yPosition);
                $mpdf->SetXY($xKuitansi, $yPosition);
                $mpdf->Cell(0, 0, $kuitansi, 0, 0, 'L');
                $mpdf->Rotate(0); // Reset rotation
            }

            $mpdf->SetAlpha(1);
            $mpdf->SetTextColor(0, 0, 0); // Reset warna
        }

        $mpdf->Output($fullPath, 'F');

        Log::info('Watermark dengan kuitansi PDF berhasil: ' . $filePath . ' | Kuitansi: ' . $kuitansi);
    }

    public function createDigitalArchive(): bool
    {
        $payment = PaymentMethod::findOrFail($this->request->payment_method);
        $funding = FundingSource::findOrFail($this->request->funding_source);
        $year = now()->year;

        // ========== CARI CATEGORY ==========
        $category = Category::with('payment_method')->with('funding_source')
            ->where('cabinet_id', $this->request->cabinet_id)
            ->where('year', $year)
            ->whereRelation('payment_method', 'id', $payment->id)
            ->whereRelation('funding_source', 'id', $funding->id)
            ->first();

        $idcategory = $category?->id;

        // ========== VALIDASI ==========
        if (!$idcategory) {
            return false;
        }

        // === COPY FILE KE FOLDER ARCHIVE ===
        if (Storage::disk('private')->exists($this->path)) {
            $newPath = 'archive/' . basename($this->path);
            Storage::disk('private')->copy($this->path, $newPath);
        } else {
            // return redirect()->back()->with('error', 'File pengajuan tidak ditemukan');
            return false;
        }

        $this->digital = DigitalArchive::create([
            'category_id' => $idcategory,
            'archive_name' => $this->submission->budget_submission_name,
            'from_division' => $this->submission->user->role,
            'submiter_name' => $this->submission->user->name,
            'finance_officer_name' => $this->submission->finance_officer->name,
            'revenue_officer_name' => $this->verificator,
            'file_path_archive' => $newPath,
            'archive_code' => $this->request->kuitansi,
            'nominal' => $this->request->biaya,
            'archive_by' => $this->verificator,
            'disposal_date' => Carbon::now()->addYear(5),
            'no_spby' => $this->request->no_spby,
        ]);

        return true;
    }

    public function updateSubmission(Request $request): void
    {
        $this->submission->update([
            'revenue_officer_id' => $this->verificator,
            'path_file_submission' => $this->path,
            'assigned_payment_method' => $request->payment_method,
            'assigned_funding_source' => $request->funding_source,
            'is_archive'   => 1,
            'nominal' => $request->biaya,
            'digital_archive_id' => $this->digital->id,
        ]);
    }
}
