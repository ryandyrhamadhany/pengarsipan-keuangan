<?php

namespace App\service\features\handler\verification_handler;

use App\Models\BudgetSubmission;
use App\service\features\handler\checklist_factory\ChecklistFactory;
use App\service\features\handler\pdf_handler\PDFHandlerImpl;
use Illuminate\Http\Request;

abstract class VerificationHandler
{
    public $verificator;
    public $submission = null;
    public $isComplete;
    public $isVerify;
    public $checklistFactory;
    public $pdfHandler;

    public function __construct()
    {
        $this->checklistFactory = new ChecklistFactory();
        $this->pdfHandler = new PDFHandlerImpl();
    }

    public function setSubmission(string $id): void
    {
        $this->submission = BudgetSubmission::with('user')->with('finance_officer')->findOrFail($id);
    }

    public abstract function setVerificator(string $id, $authid): bool;
    // public function setVerificator(string $id, $authid): bool
    // {
    //     // 1. Eksekusi Atomic Update (MySQL otomatis mengunci row ini secara mutlak)
    //     $affected = BudgetSubmission::where('id', $id)
    //         ->where(function ($query) use ($authid) {
    //             $query->whereNull('finance_officers_id')
    //                 ->orWhere('finance_officers_id', $authid);
    //         })
    //         ->update([
    //             'finance_officers_id' => $authid,
    //         ]);

    //     // Jika 0, berarti data sudah dikunci/diisi oleh petugas keuangan lain
    //     if ($affected === 0) {
    //         return false;
    //     }

    //     // 2. Set $this->submission beserta relasinya setelah berhasil update
    //     $this->setSubmission($id);
    //     $this->verificator = $authid;

    //     return true;
    // }

    public function setValueChecklist(Request $request): void
    {
        $this->checklistFactory->setValueChecklist($this->submission, $request);
    }

    public abstract function verifySubmission(): void;
    public abstract function addWatermark(): void;
    abstract public function createDigitalArchive(): bool;

    public abstract function updateSubmission(Request $request): void;
    // {
    //     $this->submission->update([
    //         'finance_officers_id' => $this->verificator,
    //         'message' => $request->catatan,
    //         'requirements_status' => $this->isComplete,
    //         'verification_status' => $this->isVerify,
    //         'is_marked' => ($this->isComplete == 'Lengkap' && $this->isVerify == 1 ? 1 : 0),
    //         'is_return' => ($this->isComplete == 'Lengkap' && $this->isVerify == 1 ? 0 : 1),
    //     ]);
    // }
}
