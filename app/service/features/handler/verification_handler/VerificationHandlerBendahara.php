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

class VerificationHandlerBendahara extends VerificationHandler
{
    private $path = null;
    private $nominal = 0;
    private $kuitansi = null;
    private $nospby = null;

    private $paymentMethod = null;
    private $fundingSource = null;
    private $cabinet = null;

    private $digital = null;
    private Request $request;

    public function __construct(Request $req)
    {
        parent::__construct();
        $this->request = $req;
    }

    public function setVerificator(string $id, $auth): bool
    {
        $affected = BudgetSubmission::where('id', $id)
            ->where(function ($query) use ($auth) {
                $query->whereNull('revenue_officer_id')
                ->orWhere('revenue_officer_id', $auth->id);
            })
            ->update([
            'revenue_officer_id' => $auth->id,
            ]);

        // Jika 0, berarti data sudah dikunci/diisi oleh petugas keuangan lain
        if ($affected === 0) {
            return false;
        }
        // 1. Eksekusi Atomic Update (MySQL otomatis mengunci row ini secara mutlak)
        // $affected = BudgetSubmission::with('user')->where('id', $id)
        //     ->where(function ($query) use ($auth) {
        //         $query->whereNull('revenue_officer_id')
        //         ->orWhere('revenue_officer_id', $auth->id);
        //     })
        //     ->update([
        //     'revenue_officer_id' => $auth->id,
        //     ]);

        // // Jika 0, berarti data sudah dikunci/diisi oleh petugas keuangan lain
        // if ($affected === 0) {
        //     return false;
        // }

        // 2. Set $this->submission beserta relasinya setelah berhasil update
        $this->setSubmission($id);
        $this->verificator = $auth;

        Log::info('Berhasil set Verificator Bendahara');

        return true;
    }

    public function verifySubmission(): void
    {
        // simpan file pengajuan baru yang sudah ttd
        $file = $this->request->File('file_pengajuan');
        $this->path = $this->pdfHandler->updatePDF($this->submission, $file);
        Log::info('File pengajuan berhasil diperbarui untuk pengajuan ID: ' . $this->submission->id . '. Path baru: ' . $this->path);

        // set nominal yang dibayarkan
        $this->nominal = $this->request->biaya;

        // set nomor kuitansi
        $this->kuitansi = $this->request->kuitansi;
        $this->checklistFactory->setNoKuitansi($this->kuitansi, $this->submission);

        // set nomor spby
        $this->nospby = $this->request->nospby;

        // set data arsip
        $this->paymentMethod = $this->request->payment_method;
        $this->fundingSource = $this->request->funding_source;
        $this->cabinet = $this->request->cabinet_id;

        $this->isComplete = true;
        $this->isVerify = true;
    }

    public function addWatermark(): void
    {
        if (Storage::disk('private')->exists($this->path)) {
            $noKuitansi = $this->submission->user->role . ' ' . $this->kuitansi;
            $this->addWatermarkWithKuitansiToPdf($this->path, $noKuitansi);
            $this->isMarked = true;
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
        Log::info('Membuat arsip digital untuk pengajuan ID: ' . $this->submission->id);
        $payment = PaymentMethod::findOrFail($this->paymentMethod);
        $funding = FundingSource::findOrFail($this->fundingSource);
        $year = now()->year;

        // ========== CARI CATEGORY ==========
        $category = Category::with('payment_method')->with('funding_source')
            ->where('cabinet_id', $this->cabinet)
            ->where('year', $year)
            ->whereRelation('payment_method', 'id', $payment->id)
            ->whereRelation('funding_source', 'id', $funding->id)
            ->first();

        $idcategory = $category?->id;
        Log::info('Kategori arsip ditemukan: ' . ($idcategory ?? 'Tidak ditemukan') . ' untuk kombinasi: Cabinet ID ' . $this->cabinet . ', Payment Method ID ' . $payment->id . ', Funding Source ID ' . $funding->id . ', Year ' . $year);

        // ========== VALIDASI ==========
        if (!$idcategory) {
            Log::error('Kategori arsip tidak ditemukan untuk kombinasi: Cabinet ID ' . $this->cabinet . ', Payment Method ID ' . $payment->id . ', Funding Source ID ' . $funding->id . ', Year ' . $year);
            return false;
        }

        // === COPY FILE KE FOLDER ARCHIVE === pindah ke handler archive pdf
        if (Storage::disk('private')->exists($this->path)) {
            $newPath = 'archive/' . basename($this->path);
            Storage::disk('private')->copy($this->path, $newPath);
            Log::info('File pengajuan berhasil disalin ke folder arsip: ' . $newPath);
        } else {
            Log::error('File pengajuan tidak ditemukan: ' . $this->path);
            return false;
        }

        $this->digital = DigitalArchive::create([
            'category_id' => $idcategory,
            'archive_name' => $this->submission->budget_submission_name,
            'from_division' => $this->submission->user->role,
            'submiter_name' => $this->submission->user->name,
            'finance_officer_name' => $this->submission->finance_officer->name,
            'revenue_officer_name' => $this->verificator->name,
            'file_path_archive' => $newPath,
            'archive_code' => $this->kuitansi,
            'nominal' => $this->nominal,
            'archive_by' => $this->verificator->name,
            'disposal_date' => Carbon::now()->addYear(5),
            'no_spby' => $this->nospby,
        ]);
        Log::info('Arsip digital berhasil dibuat dengan ID: ' . $this->digital->id . ' untuk pengajuan ID: ' . $this->submission->id);

        $this->isArchive = true;

        return true;
    }

    public function updateSubmission(): void
    {
        $this->submission->update([
            'revenue_officer_id' => $this->verificator->id,
            'path_file_submission' => $this->path,
            'assigned_payment_method' => $this->paymentMethod,
            'assigned_funding_source' => $this->fundingSource,
            'is_marked' => $this->isMarked,
            'is_archive'   => $this->isArchive,
            'nominal' => $this->nominal,
            'digital_archive_id' => $this->digital->id,
        ]);
    }
}
