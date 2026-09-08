<?php

namespace App\service\features\domain\verifikasi;

use App\Models\BudgetSubmission;
use App\Models\User;
use App\service\features\handler\verification_handler\VerificationHandlerBendahara;
use App\service\features\handler\checklist_factory\ChecklistFactory;
use App\service\features\handler\verification_handler\VerificationHandler;
use App\service\features\handler\verification_handler\VerificationHandlerKeuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationService
{
    private User $verificator;
    private $checklistFactory;

    public function __construct()
    {
        $this->verificator = Auth::user();
        $this->checklistFactory = new ChecklistFactory();
    }

    public function keuanganVerify(Request $request, string $id): bool
    {
        $verify = new VerificationHandlerKeuangan($request);

        // set verifikator 
        $result = $verify->setVerificator($id, $this->verificator);
        if (!$result) {
            return false;
        }

        // set value checklist
        $verify->setValueChecklist($request);

        // verfikasi submission
        $verify->verifySubmission();

        // add watermark keuangan
        $verify->addWatermark();

        // update db
        $verify->updateSubmission();

        $verify->clear();

        return true;
    }

    public function getItemKeuangan(string $id): ?BudgetSubmission
    {
        $pengajuan = BudgetSubmission::findOrFail($id);

        // Cek apakah checklist sudah ada, jika belum buat checklist baru
        $this->checklistFactory->checklistExists($pengajuan);

        return $pengajuan;
    }

    public function BendaharaVerify(Request $request, string $id): bool
    {
        $verify = new VerificationHandlerBendahara($request);

        $authStatus = $verify->setVerificator($id, $this->verificator);
        if (!$authStatus) {
            return false;
        }

        $verify->verifySubmission();

        $verify->addWatermark();

        $result = $verify->createDigitalArchive();
        if (!$result) {
            return false;
        }

        $verify->updateSubmission();

        return true;
    }

    public function getItemBendahara(string $id): ?BudgetSubmission
    {
        $pengajuan = BudgetSubmission::with('user')
            ->with('finance_officer')
            ->with('revenue_officer')
            ->where('id', $id)->first();
        return $pengajuan;
    }

    public function PPSPMVerify(Request $request, string $id): void
    {
        $this->verify = new VerificationHandlerBendahara($request);

        $this->verify->setVerificator();

        $this->verify->verifySubmission();

        $this->verify->addWatermark();

        $this->verify->updateSubmission();
    }

    public function getItemPPSPM(string $id): ?BudgetSubmission
    {
        $doc = BudgetSubmission::with('user')->findOrFail($id);
        return $doc;
    }

    
}
