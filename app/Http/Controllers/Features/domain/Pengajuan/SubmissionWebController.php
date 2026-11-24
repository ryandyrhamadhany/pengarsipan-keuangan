<?php

namespace App\Http\Controllers\Features\domain\Pengajuan;

use App\Http\Controllers\Controller;
use App\Models\FundingSource;
use App\Models\PaymentMethod;
use App\service\features\domain\pengajuan\SubmissionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubmissionWebController extends Controller
{
    public function __construct(
        protected SubmissionService $service
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $items = $this->service->getAllSubmissions($user->id)->paginate(10, ['*'], 'semua');
        $type = 'semua';

        $bulanini = $this->service->getSubmitCountByMounth($user->id);
        $menunggu = $this->service->getSubmitWaitingVerifyCount($user->id);
        $perbaiki = $this->service->getSubmitNeedFixCount($user->id);
        $selesai = $this->service->getSubmitIsDone($user->id);

        return view('features.pengajuan.home', compact('items', 'type', 'bulanini', 'menunggu', 'perbaiki', 'selesai'));
    }

    public function getItemByType(string $type)
    {
        $user = Auth::user();
        $items = $this->service->getSubmissionByType($user->id, $type)->paginate(10, ['*'], $type);

        $bulanini = $this->service->getSubmitCountByMounth($user->id);
        $menunggu = $this->service->getSubmitWaitingVerifyCount($user->id);
        $perbaiki = $this->service->getSubmitNeedFixCount($user->id);
        $selesai = $this->service->getSubmitIsDone($user->id);

        return view('features.pengajuan.home', compact('items', 'type', 'bulanini', 'menunggu', 'perbaiki', 'selesai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $payment_method = PaymentMethod::all();
        $funding_source = FundingSource::all();
        return view('features.pengajuan.create', compact('payment_method', 'funding_source'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $payment_method = PaymentMethod::all();
        $funding_source = FundingSource::all();
        $pengajuan = $this->service->getSubmissionById($id);

        if ($pengajuan === null) {
            return redirect()->route('user.monitoring')->with('error', 'Pengajuan tidak ditemukan.');
        }

        $filesize = $this->service->getFileSize($pengajuan->path_file_submission);

        $result = $this->service->getChecklistValueBySubmission($pengajuan);

        $namaKegiatan   = $result['nama_kegiatan'] ?? '-';
        $no             = $result['no'] ?? '-';
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
            "features.pengajuan.show",
            compact(
                'pengajuan',
                'filesize',
                'namaKegiatan',
                'no',
                'syaratDoc',
                'ada',
                'tidakada',
                'tidakperlu',
                'lengkap',
                'belum',
                'keterangan',
                'catatan',
                'payment_method',
                'funding_source'
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $pengajuan = BudgetSubmission::findOrFail($id);
        $submission = $this->service->getSubmissionById($id);
        $payment_method = PaymentMethod::all();
        $funding_source = FundingSource::all();
        return view('features.pengajuan.edit', compact('submission', 'payment_method', 'funding_source'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {}
}
