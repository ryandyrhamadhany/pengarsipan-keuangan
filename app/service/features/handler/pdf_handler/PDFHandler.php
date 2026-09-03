<?php

namespace App\service\features\handler\pdf_handler;

use App\Models\BudgetSubmission;
use Illuminate\Http\UploadedFile;

// use App\service\features\handler\pdf_handler\PDFHandler;
use Illuminate\Support\Facades\Storage;

class PDFHandler
{

    public function savePDF(?UploadedFile $file): ?string
    {
        // if ($file) {
        //     $filename = time() . '_' . $file->getClientOriginalName();
        //     $path = $file->storeAs('pengajuan', $filename, 'private');
        // } else {
        //     $path = null;
        // }
        // return $path;
        if (! $file) {
            return null;
        }
        // 2. Jika ada file, simpan dan langsung return path-nya
        $filename = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('pengajuan', $filename, 'private');
    }

    public function updatePDF(BudgetSubmission $budgetSubmission, ?UploadedFile $file): ?string
    {
        // if (!$file) {
        //     if (
        //         $budgetSubmission->path_file_submission &&
        //         Storage::disk('private')->exists($budgetSubmission->path_file_submission)
        //     ) {

        //         Storage::disk('private')->delete($budgetSubmission->path_file_submission);

        //         $filenew = $file;
        //         $fileName = time() . '_' . $filenew->getClientOriginalName();
        //         $path = $file->storeAs('pengajuan', $fileName, 'private');
        //     }
        // } else {
        //     $path = null;
        // }

        // return $path;
        if (! $file) {
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

        return $file->storeAs('pengajuan', $fileName, 'private');
    }
}
