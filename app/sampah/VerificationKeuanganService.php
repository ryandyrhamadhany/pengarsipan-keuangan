<?php

namespace App\service\features\domain\verifikasi;

use App\Models\BudgetSubmission;
use App\service\features\domain\verifikasi\VerificationService;
use App\service\features\handler\checklist_factory\ChecklistFactory;
use App\service\features\handler\checklist_factory\ChecklistFactoryImpl;
use App\service\features\handler\pdf_handler\PDFHandlerImpl;
use Illuminate\Support\Facades\Auth;

class VerificationKeuanganService
{

    private $iduser;
    private $pdfHandler;
    private $checklistFactory;

    public function __construct()
    {
        $this->iduser = Auth::check() ? Auth::user()->id : null;
        $this->pdfHandler = new PDFHandlerImpl();
        $this->checklistFactory = new ChecklistFactory();
    }

    public function getSubmissionById(string $id): ?BudgetSubmission
    {
        $pengajuan = BudgetSubmission::findOrFail($id);

        // Cek apakah checklist sudah ada, jika belum buat checklist baru
        $this->checklistFactory->checklistExists($pengajuan);

        return $pengajuan;
    }
}
