<?php

namespace App\Http\Controllers\Features\domain\Pengajuan;

use App\Http\Controllers\Controller;
use App\Models\BudgetSubmission;
use App\Models\FundingSource;
use App\Models\Notification;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use App\service\features\domain\pengajuan\SubmissionService;
use App\service\features\handler\checklist_factory\ChecklistFactory;
use App\service\features\handler\checklist_factory\ChecklistFactoryImpl;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    public function fixing(Request $request, string $id)
    {
        $service = new SubmissionService();
        $service->fixingSubmission($request, $id);
        return redirect()->route('submit.show', ['submit' => $id])->with('success', 'Berhasil Memperbaiki Pengajuan');
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
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'file' => 'mimes:pdf|max:51200|nullable',
            'payment_method' => 'required|integer',
            'funding_source' => 'required|integer',
        ]);

        $submit_service = new SubmissionService();
        $submit_service->createSubmission($request);

        // tambahan code
        // $keuanganUsers = User::where('role', 'Keuangan')->get();

        // $message = 'Ada pengajuan baru dari
        // <span class="text-blue-600 font-bold">' . e($pengajuan->user->name) . '</span>
        // (Divisi <span class="text-blue-600 font-bold">' . e($pengajuan->user->role) . '</span>) yang perlu diverifikasi.';
        // foreach ($keuanganUsers as $user) {
        //     Notification::create([
        //         'user_id' => $user->id,
        //         'title' => 'Pengajuan Baru',
        //         'message' => $message,
        //         'type' => 'info',
        //         'url' => route('verification.show', $pengajuan->id),
        //     ]);
        // }

        return redirect()->route('user.monitoring')->with('success', 'Berhasil Mengirim Pengajuan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $submit_service = new SubmissionService();
        $checklistFactory = new ChecklistFactory();

        $payment_method = PaymentMethod::all();
        $funding_source = FundingSource::all();
        $pengajuan = $submit_service->getSubmissionById($id);

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
        $pengajuan = BudgetSubmission::findOrFail($id);
        $payment_method = PaymentMethod::all();
        $funding_source = FundingSource::all();
        return view('features.pengajuan.edit', compact('pengajuan', 'payment_method', 'funding_source'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $service = new SubmissionService();

        $request->validate([
            'name' => 'required|string',
            'file' => 'mimes:pdf|max:51200|nullable',
        ]);

        $service->updateSubmission($request, $id);

        return redirect()->route('user.monitoring')->with('success', 'Berhasil Mengupdate Pengajuan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = new SubmissionService();
        $service->deleteSubmission($id);

        return redirect()->route('user.monitoring')->with('success', 'Berhasil Menghapus Pengajuan');
    }
}
