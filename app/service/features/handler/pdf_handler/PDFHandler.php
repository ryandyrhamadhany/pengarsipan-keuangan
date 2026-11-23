<?php

namespace App\service\features\handler\pdf_handler;

use App\Models\BudgetSubmission;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
// use App\service\features\handler\pdf_handler\PDFHandler;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Number;
use PhpParser\Node\Expr\Cast\Double;

class PDFHandler
{
    private string $directory = 'private';

    public function savePDF(?UploadedFile $file): ?string
    {
        if (! $file) {
            return null;
        }

        $filename = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('pengajuan', $filename, $this->directory);
    }

    public function updatePDF(BudgetSubmission $budgetSubmission, ?UploadedFile $file): ?string
    {
        // return $path;
        if (! $file) {
            Log::info('Tidak ada file baru yang diunggah untuk pengajuan ID: ' . $budgetSubmission->id . '. Menggunakan file lama.');
            return $budgetSubmission->path_file_submission;
        }

        // 1. Hapus file lama HANYA jika ada di storage
        if (
            $budgetSubmission->path_file_submission &&
            Storage::disk('private')->exists($budgetSubmission->path_file_submission)
        ) {
            Storage::disk('private')->delete($budgetSubmission->path_file_submission);
        }

        // 2. Upload file baru (selalu dieksekusi selama $file ada)
        $fileName = time() . '_' . $file->getClientOriginalName();

        Log::info('Mengunggah file baru untuk pengajuan ID: ' . $budgetSubmission->id . '. Nama file: ' . $fileName);
        return $file->storeAs('pengajuan', $fileName, 'private');
    }

    public function createArchivePDF(string $path): ?string
    {
        if (!Storage::disk('private')->exists($path)) {
            Log::error('File pengajuan tidak ditemukan: ' . $path);
            return null;
        }
        $newPath = 'archive/' . basename($path); // buat sistem pembuatan nama baru 
        Storage::disk('private')->copy($path, $newPath);
        Log::info('File pengajuan berhasil disalin ke folder arsip: ' . $newPath);
        return $newPath;
    }

    public function getFileSize(string $path): string
    {
        $bytes = Storage::disk($this->directory)->size($path);

        if ($bytes >= 1048576) {
            $size = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $size = number_format($bytes / 1024, 2) . ' KB';
        } else {
            $size = $bytes . ' B';
        }

        return $size;
    }
}
