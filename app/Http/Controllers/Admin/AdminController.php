<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArchiveFile;
use App\Models\BudgetSubmission;
use App\Models\Cabinet;
use App\Models\DigitalArchive;
use App\Models\FundingSource;
use App\Models\PaymentMethod;
use App\Models\User;
use Illuminate\Http\Request;
use Mpdf\Mpdf;

class AdminController extends Controller
{
    public function index()
    {
        $arsip = DigitalArchive::all()->count();
        $pengajuan = BudgetSubmission::all()->count();
        $akun = User::all()->count();
        $arsiplist = DigitalArchive::paginate(10, ['*'], 'arsip_list');
        return view('admin.admin-dashboard', compact('arsip', 'pengajuan', 'akun', 'arsiplist'));
    }

    public function input_archive(Request $request)
    {
        $cabinets = Cabinet::all();

        // return view('admin.archive.archive-rack', compact('raks', 'categories'));
        return view('admin.input_archive.cabinet.cabinet', compact('cabinets'));
    }

    public function environment()
    {
        $payment_method = PaymentMethod::all();
        $funding_source = FundingSource::all();
        return view('admin.setting_environment.setting_environment', compact('payment_method', 'funding_source'));
    }

    public function report()
    {
        if (isset($request->from_date) && isset($request->target_date)) {
            $submission = BudgetSubmission::with('user')->where('verification_status', 1)->whereBetween('updated_at', [$request->from_date, $request->target_date])->paginate(10, ['*'], 'submit_result_filter');
            return view('keuangan.report.report', compact('submission'));
        }
        $submission = BudgetSubmission::with('user')->where('verification_status', 1)->paginate(10, ['*'], 'result_no_filter');
        return view('admin.report.report', compact('submission'));
    }

    public function report_account_submission(Request $request)
    {
        $akun = User::all();

        $hasil = [];
        foreach ($akun as $us) {
            $jumlahPengajuan = BudgetSubmission::where('user_id', $us->id)->count();

            $hasil[] = [
                'user_id' => $us->id,
                'nama' => $us->name,
                'divisi' => $us->role,
                'jumlah_pengajuan' => $jumlahPengajuan,
            ];
        }

        $data = [
            'title' => 'Laporan jumlah pengajuan masing masing akun',
            'akun' => $hasil,
            'tanggal_awal' => $request->from_date,
            'tanggal_akhir' => $request->target_date,
            'watermark' => storage_path('app/public/images/watermark.png'),
        ];

        $html = view('admin.report.count_account_submission', $data)->render();

        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);

        return response($mpdf->Output('Laporan Semua Pengajuan ditanda tangani.pdf', 'S'))->header('Content-Type', 'application/pdf');
    }

    public function report_count_status(Request $request)
    {
        $pengajuan = BudgetSubmission::all()->count();
        $verifikasi = BudgetSubmission::where('verification_status', 1)->count();
        $ttd = BudgetSubmission::where('is_archive', 1)->count();
        $arsip = DigitalArchive::all()->count();

        $data = [
            'title' => 'Laporan jumlah status pengajuan',
            'pengajuan' => $pengajuan,
            'verifikasi' => $verifikasi,
            'ttd' => $ttd,
            'arsip' => $arsip,
            'tanggal_awal' => $request->from_date,
            'tanggal_akhir' => $request->target_date,
            'watermark' => storage_path('app/public/images/watermark.png'),
        ];

        $html = view('admin.report.count_status', $data)->render();

        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);

        return response($mpdf->Output('Laporan Semua Pengajuan ditanda tangani.pdf', 'S'))->header('Content-Type', 'application/pdf');
    }

    public function search_archive(Request $request)
    {
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $archive_digital = DigitalArchive::where('archive_name', 'LIKE', '%' . $request->search . '%')
                ->whereBetween('updated_at', [$request->start_date, $request->end_date])
                ->latest()->get();
            $scan_archive = ArchiveFile::where('file_name', 'LIKE', '%' . $request->search . '%')
                ->whereBetween('updated_at', [$request->start_date, $request->end_date])
                ->latest()->get();
        } else {
            $archive_digital = DigitalArchive::whereBetween('updated_at', [$request->start_date, $request->end_date])->latest()->get();
            $scan_archive = ArchiveFile::whereBetween('updated_at', [$request->start_date, $request->end_date])->latest()->get();
        }
        return view('admin.search.search_result', compact('archive_digital', 'scan_archive'));
    }
}
