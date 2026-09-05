<?php

namespace App\service\features\handler\verification_handler;

use App\Models\BudgetSubmission;
use App\service\features\handler\checklist_factory\ChecklistFactory;
use App\service\features\handler\pdf_handler\PDFHandler;
use Illuminate\Http\Request;

abstract class VerificationHandler
{
    public $verificator;
    public $submission = null;

    public string $isComplete;
    public bool $isVerify;
    public bool $isReturn;
    public bool $isMarked;

    public $checklistFactory;
    public $pdfHandler;

    public function __construct()
    {
        $this->checklistFactory = new ChecklistFactory();
        $this->pdfHandler = new PDFHandler();
    }

    public function setSubmission(string $id): void
    {
        $this->submission = BudgetSubmission::with('user')->with('finance_officer')->findOrFail($id);
    }

    public abstract function setVerificator(string $id, $authid): bool;
    public abstract function verifySubmission(): void;
    public abstract function addWatermark(): void;
    public abstract function updateSubmission(Request $request): void;

    public function clear(): void
    {
        $this->verificator = null;
        $this->submission = null;

        $this->isComplete = '';
        $this->isVerify = false;
        $this->isMarked = false;
        $this->isReturn = false;

        $this->checklistFactory = null;
        $this->pdfHandler = null;
    }

    // public abstract function createDigitalArchive(): bool;
}
