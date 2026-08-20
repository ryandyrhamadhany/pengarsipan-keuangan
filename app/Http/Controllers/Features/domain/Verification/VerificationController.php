<?php

namespace App\Http\Controllers\Features\domain\Verification;

use App\Http\Controllers\Controller;
use App\Models\BudgetSubmission;
use App\Models\Cabinet;
use App\Models\FundingSource;
use App\Models\PaymentMethod;
use App\service\features\domain\verifikasi\VerificationService;
use App\service\features\handler\checklist_factory\ChecklistFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    public function list_verify_keuangan()
    {
        $all_submit = BudgetSubmission::latest()->paginate(10, ['*'], 'all_submit');
        $not_check_submit = BudgetSubmission::where('requirements_status', 'Belum Diperiksa')->latest()->paginate('10', ['*'], 'not_check');
        $my_proses = BudgetSubmission::where('requirements_status', 'Belum Lengkap')
            ->where('verification_status', 0)
            ->where('finance_officers_id', Auth::id())->latest()
            ->paginate(5, ['*'], 'my_proses');

        return view('features.keuangan.list', compact('all_submit', 'not_check_submit', 'my_proses'));
    }

    public function list_verify_bendahara()
    {
        $submit_sign = BudgetSubmission::where('is_archive', 0)->paginate(10, ['*'], 'submit_no_sign');
        $pengajuans = BudgetSubmission::where('requirements_status', 'Lengkap')
            ->where('verification_status', 1)
            ->paginate(10, ['*'], 'all_submit');

        return view('features.bendahara.list', compact('pengajuans', 'submit_sign'));
    }

    public function list_verify_ppspm()
    {
        $my_proses = BudgetSubmission::where('requirements_status', 'Belum Lengkap')
            ->where('verification_status', 0)
            ->where('finance_officers_id', Auth::id())->latest()
            ->paginate(5, ['*'], 'my_proses');
        $pengajuans = BudgetSubmission::latest()->paginate(10, ['*'], 'all_submit');
        return view('features.ppspm.list', compact('pengajuans', 'my_proses'));
    }

    public function get_item_keuangan(string $id)
    {
        $service = new VerificationService();
        $checklistFactory = new ChecklistFactory();

        $pengajuan = $service->getItemKeuangan($id);

        // set default value untuk file requirement 
        $result = $checklistFactory->setDefaultValueChecklist($pengajuan);

        $namaKegiatan   = $result['nama_kegiatan'] ?? '-';
        $noKuitansi     = $result['noKuitansi'] ?? '-';
        $catatan        = $result['catatan'] ?? '-';

        // 4. Bongkar array di dalam array (Nested Array) menjadi variabel mandiri satu per satu
        $syaratDoc      = $result['checklist_data']['syarat_doc'] ?? [];
        $ada            = $result['checklist_data']['ada'] ?? [];
        $tidakada       = $result['checklist_data']['tidak_ada'] ?? [];
        $tidakperlu     = $result['checklist_data']['tidak_perlu'] ?? [];
        $lengkap        = $result['checklist_data']['lengkap'] ?? [];
        $belum          = $result['checklist_data']['belum'] ?? [];
        $keterangan     = $result['checklist_data']['keterangan'] ?? [];

        return view(
            'features.keuangan.check',
            compact(
                'pengajuan',
                'namaKegiatan',
                'noKuitansi',
                'syaratDoc',
                'ada',
                'tidakada',
                'tidakperlu',
                'lengkap',
                'belum',
                'keterangan',
                'catatan'
            )
        );
    }

    public function get_item_bendahara(string $id)
    {
        $service = new VerificationService();
        $pengajuan = $service->getItemBendahara($id);
        $cabinets = Cabinet::all();
        $payment_method = PaymentMethod::all();
        $funding_source = FundingSource::all();
        return view('features.bendahara.check', compact('pengajuan', 'cabinets', 'payment_method', 'funding_source'));
    }

    public function get_item_ppspm(string $id)
    {
        $service = new VerificationService();
        $doc = $service->getItemPPSPM($id);
        $payment_method = PaymentMethod::all();
        $funding_source = FundingSource::all();
        $cabinets = Cabinet::all();
        return view('features.verifikasi_ppspm.ppspm_verifikasi_check', compact('doc', 'payment_method', 'funding_source', 'cabinets'));
    }

    public function verify_keuangan(Request $request, string $id)
    {
        $service = new VerificationService();
        $result = $service->keuanganVerify($request, $id);
        if ($result) {
            return redirect()->route('verify.list.keuangan')->with('success', 'Berhasil kirim tanggapan');
        } else {
            return redirect()
                ->route('verify.list.keuangan')
                ->with('error', 'Pengajuan ini sedang diperiksa oleh petugas keuangan lain');
        }
    }
    public function verify_bendahara(Request $request, string $id)
    {
        $service = new VerificationService();
        $result = $service->BendaharaVerify($request, $id);
        if ($result) {
            return redirect()->route('verify.list.bendahara')->with('success', 'Berhasil kirim tanggapan');
        } else {
            return redirect()
                ->route('verify.list.bendahara')
                ->with('error', 'Pengajuan ini sedang diperiksa oleh petugas keuangan lain');
        }
    }
    public function verify_ppspm(Request $request, string $id)
    {
        $service = new VerificationService();
        $service->PPSPMVerify($request, $id);
    }
}
