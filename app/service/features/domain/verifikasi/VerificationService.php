<?php

namespace App\service\features\domain\verifikasi;

use App\Models\BudgetSubmission;
use App\service\features\handler\verification_handler\VerificationHandlerBendahara;
use App\service\features\handler\checklist_factory\ChecklistFactory;
use App\service\features\handler\verification_handler\VerificationHandler;
use App\service\features\handler\verification_handler\VerificationHandlerKeuangan;
use Auth;
use Illuminate\Http\Request;


class VerificationService
{
    private $authid;
    private $checklistFactory;

    public function __construct()
    {
        $this->authid = Auth::user()->id;
        $this->checklistFactory = new ChecklistFactory();
    }

    public function keuanganVerify(Request $request, string $id): bool
    {
        $verify = new VerificationHandlerKeuangan();

        // set verifikator 
        $result = $verify->setVerificator($id, $this->authid);
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
        $verify->updateSubmission($request);

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

        $authStatus = $verify->setVerificator($id, $this->authid);
        if(!$authStatus){
            return false;
        }

        $verify->verifySubmission();

        $verify->addWatermark();

        $result = $verify->createDigitalArchive();
        if (!$result) {
            return false;
        }

        $verify->updateSubmission($request);

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
        $this->verify = new VerificationHandlerBendahara();

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
