<?php

namespace App\service\features\domain\pengajuan;

use App\Models\BudgetSubmission;
use App\Models\User;
use App\service\features\handler\checklist_factory\ChecklistFactory;
use Illuminate\Http\Request;

use App\service\features\handler\pdf_handler\PDFHandler;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

class SubmissionService
{
    private $pdfHandler;
    private $checklistFactory;

    public function __construct(PDFHandler $pdf, ChecklistFactory $checklist)
    {
        $this->pdfHandler = $pdf;
        $this->checklistFactory = $checklist;
    }

    public function createSubmission(User $user, Request $request): void
    {
        // buat path file pdf pengajuan
        $path = $this->pdfHandler->savePDF(
            $request->file('file')
        );

        // buat path file excel checklist 
        $destinationPath = $this->checklistFactory->createChecklist($request->name);
        $this->checklistFactory->setSubmitNameInChecklist($request->name);

        $pengajuan = BudgetSubmission::create([
            'user_id' => $user->id,
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

        $this->checklistFactory->setDefaultValueChecklist($pengajuan);
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

    // ---------------------------------------------------------------------------------------------------

    public function getSubmissionById(int $id): ?BudgetSubmission
    {
        $submission = BudgetSubmission::with('user')->with('finance_officer')->with('revenue_officer')
            ->with('payment_method')
            ->with('funding_source')
            ->findOrFail($id);

        $this->checklistFactory->checklistExists($submission);
        return $submission;
    }

    public function getAllSubmissions(int $id): Builder
    {
        $all_submissions = BudgetSubmission::where('user_id', $id)
            ->latest();
        return $all_submissions;
    }

    public function getSubmissionByType(int $id, string $type): Builder
    {
        $colomn = '';
        $value = '';
        $verifvalue = 0;
        
        switch ($type) {
            case 'kembali':
                $colomn = 'requirements_status';
                $value = 'Belum Lengkap';
                break;
            case 'belum':
                $colomn = 'requirements_status';
                $value = 'Belum Diperiksa';
                break;
            case 'arsip':
                $colomn = 'is_archive';
                $value = '1';
                $verifvalue = 1;
                break;
        }

        $items = BudgetSubmission::with('user')
            ->where('user_id', $id)
            ->where($colomn, $value)
            ->where('verification_status', $verifvalue);

        return $items;
    }

    public function getFileSize(string $path): string
    {
        return $this->pdfHandler->getFileSize($path);
    }

    public function getChecklistValueBySubmission(BudgetSubmission $submit): ?array
    {
        return $this->checklistFactory->getChecklistValue($submit);
    }

    // ---

    public function getSubmitCountByMounth(int $id): int
    {
        return BudgetSubmission::with('user')
            ->where('user_id', $id)
            ->whereMonth('updated_at', now()->month)
            ->whereYear('updated_at', now()->year)
            ->count();
    }

    public function getSubmitWaitingVerifyCount(int $id): int
    {
        return BudgetSubmission::with('user')
            ->where('user_id', $id)
            ->where('verification_status', 0)
            ->where('is_return', 0)
            ->count();
    }

    public function getSubmitNeedFixCount(int $id): int
    {
        return BudgetSubmission::with('user')
            ->where('user_id', $id)
            ->where('is_return', 1)
            ->count();
    }

    public function getSubmitIsDone(int $id): int
    {
        return BudgetSubmission::with('user')
            ->where('user_id', $id)
            ->where('is_archive', 1)
            ->count();
    }

    // ---------------------------------------------------------------------------------------------------

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
}
