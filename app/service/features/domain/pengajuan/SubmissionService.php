<?php

namespace App\service\features\domain\pengajuan;

use App\Models\BudgetSubmission;
use App\service\features\handler\checklist_factory\ChecklistFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\service\features\handler\pdf_handler\PDFHandlerImpl;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

class SubmissionService
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

    public function createSubmission(Request $request): void
    {
        // buat path file pdf pengajuan
        $upload_file = $request->file('file');
        $path = $this->pdfHandler->savePDF($upload_file);
        // buat path file excel checklist 
        $destinationPath = $this->checklistFactory->createChecklist($request->name);
        $this->checklistFactory->setSubmitNameInChecklist($request->name);

        $pengajuan = BudgetSubmission::create([
            'user_id' => $this->iduser,
            'budget_submission_name' => $request->name,
            'assigned_payment_method' => $request->payment_method,
            'assigned_funding_source' => $request->funding_source,
            'path_file_submission' => $path,
            'requirements_status' => "Belum Diperiksa",
            'verification_status' => 0,
            'path_file_requirements_status' => $destinationPath,
            'is_archive' => 0,
            'is_marked' => 0,
            'is_return' => 0,
            'message' => null,
        ]);
    }

    public function fixingSubmission(Request $request, string $id)
    {
        $pengajuan = BudgetSubmission::with('user')->with('finance_officer')->findOrFail($id);
        $file = $request->file('file_pengajuan');
        $path = $this->pdfHandler->updatePDF($pengajuan, $file);

        $pengajuan->update([
            'path_file_submission' => $path,
            'assigned_payment_method' => $request->payment_method,
            'assigned_funding_source' => $request->funding_source,
            'is_marked' => 0,
            'is_return' => 0,
            // 'path_file_status_kelengkapan' => $destinationPath,
        ]);
    }

    public function getSubmissionById(int $id): ?BudgetSubmission
    {
        $submission = BudgetSubmission::with('finance_officer')->with('revenue_officer')
            ->with('payment_method')
            ->with('funding_source')
            ->findOrFail($id);

        $this->checklistFactory->checklistExists($submission);
        return $submission;
    }

    public function updateSubmission(Request $request, string $id): void
    {
        $pengajuan = BudgetSubmission::findOrFail($id);

        //  update file pdf
        $file = $request->file('file');
        $path = $this->pdfHandler->updatePDF($pengajuan, $file);
        // update file requirement
        $destinationPath = $this->checklistFactory->updateChecklist($pengajuan, $request);

        $pengajuan->update([
            'budget_submission_name' => $request->name,
            'assigned_payment_method' => $request->payment_method,
            'assigned_funding_source' => $request->funding_source,
            'path_file_submission' => $path,
            'path_file_requirements_status' => $destinationPath,
        ]);
    }

    public function deleteSubmission(string $id): void
    {
        $pengajuan = BudgetSubmission::findOrFail($id);

        if (Storage::disk('private')->exists($pengajuan->path_file_submission) && $pengajuan->path_file_submission) {
            Storage::disk('private')->delete($pengajuan->path_file_submission);
        }

        if (Storage::disk('private')->exists($pengajuan->path_file_requirements_status) && $pengajuan->path_file_requirements_status) {
            Storage::disk('private')->delete($pengajuan->path_file_requirements_status);
        }

        $pengajuan->delete();
    }

    public function getAllSubmissions(): Builder
    {
        $all_submissions = BudgetSubmission::where('user_id', $this->iduser)->latest();
        return $all_submissions;
    }
}
