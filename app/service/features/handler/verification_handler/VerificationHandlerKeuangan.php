<?php

namespace App\service\features\handler\verification_handler;

use App\Models\BudgetSubmission;
use App\service\features\handler\verification_handler\VerificationHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Mpdf\Mpdf;

class VerificationHandlerKeuangan extends VerificationHandler
{
    public function setVerificator(string $id, $authid): bool
    {
        // 1. Eksekusi Atomic Update (MySQL otomatis mengunci row ini secara mutlak)
        $affected = BudgetSubmission::where('id', $id)
            ->where(function ($query) use ($authid) {
                $query->whereNull('finance_officers_id')
                    ->orWhere('finance_officers_id', $authid);
            })
            ->update([
                'finance_officers_id' => $authid,
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
        $valueADA = $this->checklistFactory->getValue('D', $this->submission);
        $valueADAtidakperlu = $this->checklistFactory->getValue('F', $this->submission);
        $valueLengkap = $this->checklistFactory->getValue('G', $this->submission);
        // $startCekCell = 7;
        // $endCekCell = 36;
        // $status_lengkap = '';
        // $status_verifikasi = false;

        for ($i = 0; $i < count($valueADA); $i++) {

            // $valueADA = $worksheet->getCell("D{$i}")->getValue();
            // $valueADAtidakperlu = $worksheet->getCell("F{$i}")->getValue();
            // $valueLengkap = $worksheet->getCell("G{$i}")->getValue();

            $valueADAget = $valueADA[$i];
            $valueADAtidakperluget = $valueADAtidakperlu[$i];
            $valueLengkapget = $valueLengkap[$i];

            if ($valueADAtidakperluget === 'Y') {
                $this->isComplete = 'Lengkap';
                $this->isVerify = true;
                // $is_marked = 1;
            } else {
                if ($valueADAget === '' || $valueADAget === null) {
                    $this->isComplete = 'Belum Lengkap';
                    $this->isVerify = false;
                    // $is_marked = 0;
                    break;
                }
                if ($valueLengkapget === '' || $valueLengkapget === null) {
                    $this->isComplete = 'Belum Lengkap';
                    $this->isVerify = false;
                    // $is_marked = 0;
                    break;
                }
            }
            $this->isComplete = 'Lengkap';
            $this->isVerify = true;
            // $is_marked = 1;
        }
    }

    public function addWatermark(): void
    {
        if (
            $this->submission->path_file_submission &&
            Storage::disk('private')->exists($this->submission->path_file_submission) &&
            $this->isComplete == 'Lengkap' &&
            $this->isVerify
            // $is_marked
        ) {
            $sourcePath = $this->submission->path_file_submission;
            // === TAMBAH WATERMARK ===
            $this->addWatermarkToPdf($sourcePath);

            // $sendername = $pengajuan->user->role;
            // $senderemail = $pengajuan->user->role;
            // $senderdivisi = $pengajuan->user->role;
            // $senderverifikator = $pengajuan->finance_officer->name;
            // $senderverifikatoremail = $pengajuan->finance_officer->email;

            // $bendahara = User::where('role', 'Bendahara')->get();

            // FacadesNotification::send($bendahara, new BudgetSubmitToBendaharaNotification($sendername, $senderemail, $senderdivisi, $senderverifikator, $senderverifikatoremail));
        } else {
            // $senderverifikator = $pengajuan->finance_officer->name;
            // $senderverifikatoremail = $pengajuan->finance_officer->email;
            // $userPengajuan = User::where('id', $pengajuan->user_id)->where('name', $pengajuan->user->name)->where('email', $pengajuan->user->email);
            // FacadesNotification::send($userPengajuan, new BudgetSubmitToReturnNotification($senderverifikator, $senderverifikatoremail));
        }
    }

    private function addWatermarkToPdf(string $filePath)
    {
        if (!Storage::disk('private')->exists($filePath)) {
            Log::error('File PDF tidak ditemukan: ' . $filePath);
            throw new \Exception('File PDF tidak ditemukan');
        }

        $fullPath = Storage::disk('private')->path($filePath);

        // --- PROSES GHOSTSCRIPT (START) ---
        $tempFixedPath = $fullPath . '_fixed.pdf';
        $gsBinary = (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') ? 'gswin64c' : 'gs';

        // Command Flattening: Menyatukan coretan/TTD agar tidak hilang saat versi turun
        $command = "{$gsBinary} -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dNOPAUSE -dQUIET -dBATCH " .
            "-dPreserveAnnots=false " .    // Meratakan coretan ke background
            "-dShowAnnots=true " .         // Tampilkan coretan sebelum diratakan
            "-dPDFSETTINGS=/prepress " .   // Kualitas tinggi untuk TTD
            "-sOutputFile=" . escapeshellarg($tempFixedPath) . " " .
            escapeshellarg($fullPath) . " 2>&1";

        $output = shell_exec($command);

        if (file_exists($tempFixedPath)) {
            rename($tempFixedPath, $fullPath);
            Log::info("Ghostscript Berhasil meratakan layer & merubah versi ke 1.4");
        } else {
            Log::error("Ghostscript Gagal. Output: " . $output);
            throw new \Exception("Gagal memproses PDF: " . $output);
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

            // === GARIS MERAH SOLID DI KIRI (LEBIH TIPIS + OPACITY 50%) ===
            $mpdf->SetAlpha(0.5); // Opacity 50%
            $mpdf->SetDrawColor(255, 0, 0); // Merah
            $mpdf->SetLineWidth(0.5); // Lebih tipis (dari 2 jadi 0.5)
            $mpdf->Line(5, 0, 5, $size['height']);
            $mpdf->SetAlpha(1); // Reset opacity

            // === WATERMARK GAMBAR (60% HALAMAN, CENTER, OPACITY 50%) ===
            $watermarkPath = storage_path('app/public/images/watermark.png');

            if (file_exists($watermarkPath)) {

                [$imgW, $imgH] = getimagesize($watermarkPath);
                $imgRatio = $imgW / $imgH;

                // Target maksimum 60% halaman (dari 80% jadi 60%)
                $maxW = $size['width'] * 0.6;
                $maxH = $size['height'] * 0.6;

                // Hitung ukuran dengan menjaga rasio
                if ($maxW / $maxH > $imgRatio) {
                    // tinggi pembatas
                    $wmHeight = $maxH;
                    $wmWidth  = $wmHeight * $imgRatio;
                } else {
                    // lebar pembatas
                    $wmWidth  = $maxW;
                    $wmHeight = $wmWidth / $imgRatio;
                }

                // Center posisi
                $x = ($size['width']  - $wmWidth)  / 2;
                $y = ($size['height'] - $wmHeight) / 2;

                $mpdf->SetAlpha(0.2); // Opacity 50% (dari 0.2 jadi 0.5)
                $mpdf->Image($watermarkPath, $x, $y, $wmWidth, $wmHeight);
                $mpdf->SetAlpha(1); // Reset opacity
            }
        }

        $mpdf->Output($fullPath, 'F');

        Log::info('Watermark PDF berhasil: ' . $filePath);
    }

    public function updateSubmission(Request $request): void
    {
        $this->submission->update([
            'finance_officers_id' => $this->verificator,
            'message' => $request->catatan,
            'requirements_status' => $this->isComplete,
            'verification_status' => $this->isVerify,
            'is_marked' => ($this->isComplete == 'Lengkap' && $this->isVerify == 1 ? 1 : 0),
            'is_return' => ($this->isComplete == 'Lengkap' && $this->isVerify == 1 ? 0 : 1),
        ]);
    }
}
