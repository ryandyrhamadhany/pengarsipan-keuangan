<?php

namespace App\service\features\handler\pdf_handler;

use App\Models\BudgetSubmission;
use Illuminate\Http\UploadedFile;

interface PDFHandler
{
    public function savePDF(?UploadedFile $file): ?string;

    public function updatePDF(BudgetSubmission $budgetSubmission, ?UploadedFile $file): ?string;
}
