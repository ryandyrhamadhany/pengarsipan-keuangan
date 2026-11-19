<?php

namespace App\Http\Controllers\Features\domain\Pengajuan;

use App\Http\Controllers\Controller;
use App\Models\BudgetSubmission;
use App\Models\FundingSource;
use App\Models\PaymentMethod;
use App\service\features\domain\pengajuan\SubmissionService;
use App\service\features\handler\checklist_factory\ChecklistFactory;
use App\service\features\handler\pdf_handler\PDFHandler;
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

        $bulanini = BudgetSubmission::with('user')
            ->where('user_id', $user->id)
            ->whereMonth('updated_at', now()->month)
            ->whereYear('updated_at', now()->year)
            ->count();

        $menunggu = BudgetSubmission::with('user')
            ->where('user_id', $user->id)
            ->where('verification_status', 0)
            ->where('is_return', 0)
            ->count();

        $perbaiki = BudgetSubmission::with('user')
            ->where('user_id', $user->id)
            ->where('is_return', 1)
            ->count();

        $selesai = BudgetSubmission::with('user')
            ->where('user_id', $user->id)
            ->where('is_archive', 1)
            ->count();

        return view('features.pengajuan.home', compact('items', 'type', 'bulanini', 'menunggu', 'perbaiki', 'selesai'));
    }

    public function getItemByType(string $type)
    {
        $user = Auth::user();
        $items = $this->service->getSubmissionByType($user->id, $type)->paginate(10, ['*'], $type);

        $bulanini = BudgetSubmission::with('user')
            ->where('user_id', $user->id)
            ->whereMonth('updated_at', now()->month)
            ->whereYear('updated_at', now()->year)
            ->count();

        $menunggu = BudgetSubmission::with('user')
            ->where('user_id', $user->id)
            ->where('verification_status', 0)
            ->where('is_return', 0)
            ->count();

        $perbaiki = BudgetSubmission::with('user')
            ->where('user_id', $user->id)
            ->where('is_return', 1)
            ->count();

        $selesai = BudgetSubmission::with('user')
            ->where('user_id', $user->id)
            ->where('is_archive', 1)
            ->count();

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
        // $submit_service = new SubmissionService();
        $checklistFactory = new ChecklistFactory();

        $payment_method = PaymentMethod::all();
        $funding_source = FundingSource::all();
        $pengajuan = $this->service->getSubmissionById($id);

        if ($pengajuan === null) {
            return redirect()->route('user.monitoring')->with('error', 'Pengajuan tidak ditemukan.');
        }

        $result = $checklistFactory->getChecklistValue($pengajuan);

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
