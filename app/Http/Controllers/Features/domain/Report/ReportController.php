<?php

namespace App\Http\Controllers\Features\domain\Report;

use App\Http\Controllers\Controller;
use App\Models\BudgetSubmission;
use App\Models\DigitalArchive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mpdf\Mpdf;

class ReportController extends Controller
{
    public function report_pengajuan(Request $request)
    {
        // if (isset($request->from_date) && isset($request->target_date)) {
        //     $submission = BudgetSubmission::with('user')->where('user_id', Auth::id())->whereBetween('updated_at', [$request->from_date, $request->target_date])->paginate(10, ['*'], 'submit_result_filter');
        //     return view('user.report.report', compact('submission'));
        // }
        // $submission = BudgetSubmission::with('user')->where('user_id', Auth::id())->paginate(10, ['*'], 'result_no_filter');
        return view('user.report.report');
    }

    public function my_all_report_pengajuan(Request $request)
    {
        if (isset($request->from_date) && isset($request->target_date)) {
            $submission = BudgetSubmission::with('user')->where('user_id', Auth::id())->whereBetween('updated_at', [$request->from_date, $request->target_date])->paginate(10, ['*'], 'submit_result_filter');
            return view('user.report.my_all_report', compact('submission'));
        }
        $submission = BudgetSubmission::with('user')->where('user_id', Auth::id())->paginate(10, ['*'], 'result_no_filter');
        return view('user.report.my_all_report_filter', compact('submission'));
    }

    public function my_total_report_pengajuan(Request $request)
    {
        if (isset($request->from_date) && isset($request->target_date)) {
            $submission = BudgetSubmission::with('user')->where('user_id', Auth::id())->whereBetween('updated_at', [$request->from_date, $request->target_date])->paginate(10, ['*'], 'submit_result_filter');
            return view('user.report.nominal_filter', compact('submission'));
        }
        $submission = BudgetSubmission::with('user')->where('user_id', Auth::id())->paginate(10, ['*'], 'result_no_filter');
        return view('user.report.nominal_filter', compact('submission'));
    }

    //untuk buat pdf
    public function report_submission(Request $request)
    {
        $pengajuan = BudgetSubmission::with('user')
            ->where('user_id', Auth::id())
            ->whereBetween('updated_at', [$request->from_date, $request->target_date])
            ->get();

        $data = [
            'title' => 'Laporan Semua Pengajuan Divisi ',
            'pengajuan' => $pengajuan,
            'tanggal_awal' => $request->from_date,
            'tanggal_akhir' => $request->target_date,
            'watermark' => storage_path('app/public/images/watermark.png'),
        ];

        $html = view('user.report.submission_report', $data)->render();

        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);

        return response($mpdf->Output('Laporan Pengajuan.pdf', 'S'))->header('Content-Type', 'application/pdf');
    }

    public function report_submit_nominal(Request $request)
    {
        $pengajuan = BudgetSubmission::with('user')
            ->where('user_id', Auth::id())
            ->where('is_archive', 1)
            ->whereBetween('updated_at', [$request->from_date, $request->target_date])
            ->get();

        $totalNominal = $pengajuan->sum('nominal');

        $data = [
            'title' => 'Laporan Semua Pengajuan Divisi ',
            'pengajuan' => $pengajuan,
            'totalNominal' => $totalNominal,
            'tanggal_awal' => $request->from_date,
            'tanggal_akhir' => $request->target_date,
            'watermark' => storage_path('app/public/images/watermark.png'),
        ];

        $html = view('user.report.submission_nominal_report', $data)->render();

        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);

        return response($mpdf->Output('Laporan Biaya Pengajuan.pdf', 'S'))->header('Content-Type', 'application/pdf');
    }





    public function report_keuangan(Request $request)
    {
        // if (isset($request->from_date) && isset($request->target_date)) {
        //     $submission = BudgetSubmission::with('user')->whereBetween('updated_at', [$request->from_date, $request->target_date])->paginate(10, ['*'], 'submit_result_filter');
        //     return view('keuangan.report.report', compact('submission'));
        // }
        // $submission = BudgetSubmission::with('user')->paginate(10, ['*'], 'result_no_filter');
        return view('keuangan.report.report');
    }

    public function report_all_submit(Request $request)
    {
        if (isset($request->from_date) && isset($request->target_date)) {
            $submission = BudgetSubmission::with('user')->whereBetween('updated_at', [$request->from_date, $request->target_date])->paginate(10, ['*'], 'submit_result_filter');
            return view('keuangan.report.all_submit_filter', compact('submission'));
        }
        $submission = BudgetSubmission::with('user')->paginate(10, ['*'], 'result_no_filter');
        return view('keuangan.report.all_submit_filter', compact('submission'));
    }

    public function report_verify(Request $request)
    {
        if (isset($request->from_date) && isset($request->target_date)) {
            $submission = BudgetSubmission::with('user')->whereBetween('updated_at', [$request->from_date, $request->target_date])->paginate(10, ['*'], 'submit_result_filter');
            return view('keuangan.report.submit_verify_filter', compact('submission'));
        }
        $submission = BudgetSubmission::with('user')->paginate(10, ['*'], 'result_no_filter');
        return view('keuangan.report.submit_verify_filter', compact('submission'));
    }

    // untuk buat pdf
    public function report_all_submission(Request $request)
    {
        $pengajuan = BudgetSubmission::with('user')
            ->whereBetween('updated_at', [$request->from_date, $request->target_date])
            ->get();

        $data = [
            'title' => 'Laporan Semua Pengajuan',
            'pengajuan' => $pengajuan,
            'tanggal_awal' => $request->from_date,
            'tanggal_akhir' => $request->target_date,
            'watermark' => storage_path('app/public/images/watermark.png'),
        ];

        $html = view('keuangan.report.all_submission_report', $data)->render();

        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);

        return response($mpdf->Output('Laporan Semua Pengajuan.pdf', 'S'))->header('Content-Type', 'application/pdf');
    }

    public function report_verification_submission(Request $request)
    {
        $pengajuan = BudgetSubmission::with('user')->with('finance_officer')
            ->where('verification_status', 1)
            ->whereBetween('updated_at', [$request->from_date, $request->target_date])
            ->get();

        $data = [
            'title' => 'Laporan Pengajuan diverifikasi',
            'pengajuan' => $pengajuan,
            'tanggal_awal' => $request->from_date,
            'tanggal_akhir' => $request->target_date,
            'watermark' => storage_path('app/public/images/watermark.png'),
        ];

        $html = view('keuangan.report.verify_submission', $data)->render();

        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);

        return response($mpdf->Output('Laporan Pengajuan Diverifikasi.pdf', 'S'))->header('Content-Type', 'application/pdf');
    }




    public function report_bendahara(Request $request)
    {

        return view('bendahara.report.report');
    }

    public function report_all_bendahara(Request $request)
    {
        if (isset($request->from_date) && isset($request->target_date)) {
            $submission = BudgetSubmission::with('user')->where('verification_status', 1)->whereBetween('updated_at', [$request->from_date, $request->target_date])->paginate(10, ['*'], 'submit_result_filter');
            return view('bendahara.report.report_all_filter', compact('submission'));
        }
        $submission = BudgetSubmission::with('user')->where('verification_status', 1)->paginate(10, ['*'], 'result_no_filter');
        return view('bendahara.report.report_all_filter', compact('submission'));
    }
    public function report_nominal_bendahara(Request $request)
    {
        if (isset($request->from_date) && isset($request->target_date)) {
            $submission = BudgetSubmission::with('user')->where('verification_status', 1)->whereBetween('updated_at', [$request->from_date, $request->target_date])->paginate(10, ['*'], 'submit_result_filter');
            return view('bendahara.report.report_nominal_filter', compact('submission'));
        }
        $submission = BudgetSubmission::with('user')->where('verification_status', 1)->paginate(10, ['*'], 'result_no_filter');
        return view('bendahara.report.report_nominal_filter', compact('submission'));
    }
    public function report_sign_bendahara(Request $request)
    {
        if (isset($request->from_date) && isset($request->target_date)) {
            $submission = BudgetSubmission::with('user')->where('verification_status', 1)->whereBetween('updated_at', [$request->from_date, $request->target_date])->paginate(10, ['*'], 'submit_result_filter');
            return view('bendahara.report.report_sign_filter', compact('submission'));
        }
        $submission = BudgetSubmission::with('user')->where('verification_status', 1)->paginate(10, ['*'], 'result_no_filter');
        return view('bendahara.report.report_sign_filter', compact('submission'));
    }

    // untuk action
    public function report_sign_submission(Request $request)
    {
        $pengajuan = BudgetSubmission::with('user')->with('revenue_officer')
            ->where('revenue_officer_id', Auth::id())
            ->where('is_archive', 1)
            ->whereBetween('updated_at', [$request->from_date, $request->target_date])
            ->get();

        $data = [
            'title' => 'Laporan Semua Pengajuan yang ditanda tangani',
            'pengajuan' => $pengajuan,
            'name' => Auth::user()->name,
            'tanggal_awal' => $request->from_date,
            'tanggal_akhir' => $request->target_date,
            'watermark' => storage_path('app/public/images/watermark.png'),
        ];

        $html = view('bendahara.report.report_submission_sign', $data)->render();

        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);

        return response($mpdf->Output('Laporan Semua Pengajuan ditanda tangani.pdf', 'S'))->header('Content-Type', 'application/pdf');
    }

    public function report_sign_submission_nominal(Request $request)
    {
        $pengajuan = BudgetSubmission::with('user')->with('revenue_officer')
            ->where('revenue_officer_id', Auth::id())
            ->where('is_archive', 1)
            ->whereBetween('updated_at', [$request->from_date, $request->target_date])
            ->get();

        $totalNominal = $pengajuan->sum('nominal');

        $data = [
            'title' => 'Laporan Nominal Pengajuan yang ditanda tangani',
            'pengajuan' => $pengajuan,
            'name' => Auth::user()->name,
            'totalNominal' => $totalNominal,
            'tanggal_awal' => $request->from_date,
            'tanggal_akhir' => $request->target_date,
            'watermark' => storage_path('app/public/images/watermark.png'),
        ];

        $html = view('bendahara.report.report_submission_sign_nominal', $data)->render();

        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);

        return response($mpdf->Output('Laporan Nominal Pengajuan yang ditanda tangani.pdf', 'S'))->header('Content-Type', 'application/pdf');
    }

    public function report_all_sign_submission(Request $request)
    {
        $pengajuan = BudgetSubmission::with('user')->with('revenue_officer')
            ->where('is_archive', 1)
            ->whereBetween('updated_at', [$request->from_date, $request->target_date])
            ->get();

        $data = [
            'title' => 'Laporan Semua Pengajuan yang ditanda tangani',
            'pengajuan' => $pengajuan,
            'tanggal_awal' => $request->from_date,
            'tanggal_akhir' => $request->target_date,
            'watermark' => storage_path('app/public/images/watermark.png'),
        ];

        $html = view('bendahara.report.report_all_sign_submission', $data)->render();

        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);

        return response($mpdf->Output('Laporan Semua Pengajuan yang ditanda tangani.pdf', 'S'))->header('Content-Type', 'application/pdf');
    }





    public function report_administrator(Request $request)
    {
        return view('admin.report.report');
    }

    public function report_account(Request $request)
    {
        if (isset($request->from_date) && isset($request->target_date)) {
            $submission = BudgetSubmission::with('user')->where('verification_status', 1)->whereBetween('updated_at', [$request->from_date, $request->target_date])->paginate(10, ['*'], 'submit_result_filter');
            return view('admin.report.account_filter', compact('submission'));
        }
        $submission = BudgetSubmission::with('user')->where('verification_status', 1)->paginate(10, ['*'], 'result_no_filter');
        return view('admin.report.account_filter', compact('submission'));
    }

    public function report_count(Request $request)
    {
        if (isset($request->from_date) && isset($request->target_date)) {
            $submission = BudgetSubmission::with('user')->where('verification_status', 1)->whereBetween('updated_at', [$request->from_date, $request->target_date])->paginate(10, ['*'], 'submit_result_filter');
            return view('admin.report.count_status_filter', compact('submission'));
        }
        $submission = BudgetSubmission::with('user')->where('verification_status', 1)->paginate(10, ['*'], 'result_no_filter');
        return view('admin.report.count_status_filter', compact('submission'));
    }

    // admin user
    public function admin_all_divisi(Request $request)
    {
        if (isset($request->from_date) && isset($request->target_date)) {
            $submission = BudgetSubmission::with('user')->where('user_id', Auth::id())->whereBetween('updated_at', [$request->from_date, $request->target_date])->paginate(10, ['*'], 'submit_result_filter');
            return view('admin.report.pengaju.all_filter', compact('submission'));
        }
        $submission = BudgetSubmission::with('user')->where('user_id', Auth::id())->paginate(10, ['*'], 'result_no_filter');
        return view('admin.report.pengaju.all_filter', compact('submission'));
    }
    public function admin_nominal(Request $request)
    {
        if (isset($request->from_date) && isset($request->target_date)) {
            $submission = BudgetSubmission::with('user')->where('user_id', Auth::id())->whereBetween('updated_at', [$request->from_date, $request->target_date])->paginate(10, ['*'], 'submit_result_filter');
            return view('admin.report.pengaju.nominal_filter', compact('submission'));
        }
        $submission = BudgetSubmission::with('user')->where('user_id', Auth::id())->paginate(10, ['*'], 'result_no_filter');
        return view('admin.report.pengaju.nominal_filter', compact('submission'));
    }
    // keuangan
    public function admin_all_keuangan(Request $request)
    {
        if (isset($request->from_date) && isset($request->target_date)) {
            $submission = BudgetSubmission::with('user')->whereBetween('updated_at', [$request->from_date, $request->target_date])->paginate(10, ['*'], 'submit_result_filter');
            return view('admin.report.keuangan.all_filter', compact('submission'));
        }
        $submission = BudgetSubmission::with('user')->paginate(10, ['*'], 'result_no_filter');
        return view('admin.report.keuangan.all_filter', compact('submission'));
    }
    public function admin_verify(Request $request)
    {
        if (isset($request->from_date) && isset($request->target_date)) {
            $submission = BudgetSubmission::with('user')->whereBetween('updated_at', [$request->from_date, $request->target_date])->paginate(10, ['*'], 'submit_result_filter');
            return view('admin.report.keuangan.verify_filter', compact('submission'));
        }
        $submission = BudgetSubmission::with('user')->paginate(10, ['*'], 'result_no_filter');
        return view('admin.report.keuangan.verify_filter', compact('submission'));
    }
    //bendahara
    public function admin_all_bendahara(Request $request)
    {
        if (isset($request->from_date) && isset($request->target_date)) {
            $submission = BudgetSubmission::with('user')->where('verification_status', 1)->whereBetween('updated_at', [$request->from_date, $request->target_date])->paginate(10, ['*'], 'submit_result_filter');
            return view('admin.report.bendahara.all_filter', compact('submission'));
        }
        $submission = BudgetSubmission::with('user')->where('verification_status', 1)->paginate(10, ['*'], 'result_no_filter');
        return view('admin.report.bendahara.all_filter', compact('submission'));
    }
    public function admin_nominal_bendahara(Request $request)
    {
        if (isset($request->from_date) && isset($request->target_date)) {
            $submission = BudgetSubmission::with('user')->where('verification_status', 1)->whereBetween('updated_at', [$request->from_date, $request->target_date])->paginate(10, ['*'], 'submit_result_filter');
            return view('admin.report.bendahara.nominal_filter', compact('submission'));
        }
        $submission = BudgetSubmission::with('user')->where('verification_status', 1)->paginate(10, ['*'], 'result_no_filter');
        return view('admin.report.bendahara.nominal_filter', compact('submission'));
    }
    public function admin_sign_bendahara(Request $request)
    {
        if (isset($request->from_date) && isset($request->target_date)) {
            $submission = BudgetSubmission::with('user')->where('verification_status', 1)->whereBetween('updated_at', [$request->from_date, $request->target_date])->paginate(10, ['*'], 'submit_result_filter');
            return view('admin.report.bendahara.sign_filter', compact('submission'));
        }
        $submission = BudgetSubmission::with('user')->where('verification_status', 1)->paginate(10, ['*'], 'result_no_filter');
        return view('admin.report.bendahara.sign_filter', compact('submission'));
    }

    public function admin_kepala_aktif(Request $request)
    {
        if (isset($request->from_date) && isset($request->target_date)) {
            $arsip = DigitalArchive::whereBetween('updated_at', [$request->from_date, $request->target_date])->paginate(10, ['*'], 'submit_result_filter');
            return view('admin.report.kepala.aktif_filter', compact('arsip'));
        }
        $arsip = DigitalArchive::paginate(10, ['*'], 'result_no_filter');
        return view('admin.report.kepala.aktif_filter', compact('arsip'));
    }

    public function admin_kepala_approved(Request $request)
    {
        if (isset($request->from_date) && isset($request->target_date)) {
            $arsip = DigitalArchive::whereBetween('updated_at', [$request->from_date, $request->target_date])->paginate(10, ['*'], 'submit_result_filter');
            return view('admin.report.kepala.approved_filter', compact('arsip'));
        }
        $arsip = DigitalArchive::paginate(10, ['*'], 'result_no_filter');
        return view('admin.report.kepala.approved_filter', compact('arsip'));
    }





    public function report_kepala(Request $request)
    {
        // if (isset($request->from_date) && isset($request->target_date)) {
        //     $arsip = DigitalArchive::whereBetween('updated_at', [$request->from_date, $request->target_date])->paginate(10, ['*'], 'submit_result_filter');
        //     return view('kepala_kantor.report.report', compact('arsip'));
        // }
        // $arsip = DigitalArchive::paginate(10, ['*'], 'result_no_filter');
        return view('kepala_kantor.report.report');
    }
    public function report_approved(Request $request)
    {
        if (isset($request->from_date) && isset($request->target_date)) {
            $arsip = DigitalArchive::whereBetween('updated_at', [$request->from_date, $request->target_date])->paginate(10, ['*'], 'submit_result_filter');
            return view('kepala_kantor.report.approved_filter', compact('arsip'));
        }
        $arsip = DigitalArchive::paginate(10, ['*'], 'result_no_filter');
        return view('kepala_kantor.report.approved_filter', compact('arsip'));
    }
    public function report_aktif(Request $request)
    {
        if (isset($request->from_date) && isset($request->target_date)) {
            $arsip = DigitalArchive::whereBetween('updated_at', [$request->from_date, $request->target_date])->paginate(10, ['*'], 'submit_result_filter');
            return view('kepala_kantor.report.aktif_filter', compact('arsip'));
        }
        $arsip = DigitalArchive::paginate(10, ['*'], 'result_no_filter');
        return view('kepala_kantor.report.aktif_filter', compact('arsip'));
    }

    // admin user
    public function kepala_all_divisi(Request $request)
    {
        if (isset($request->from_date) && isset($request->target_date)) {
            $submission = BudgetSubmission::with('user')->where('user_id', Auth::id())->whereBetween('updated_at', [$request->from_date, $request->target_date])->paginate(10, ['*'], 'submit_result_filter');
            return view('kepala_kantor.report.pengaju.all_filter', compact('submission'));
        }
        $submission = BudgetSubmission::with('user')->where('user_id', Auth::id())->paginate(10, ['*'], 'result_no_filter');
        return view('kepala_kantor.report.pengaju.all_filter', compact('submission'));
    }
    public function kepala_nominal(Request $request)
    {
        if (isset($request->from_date) && isset($request->target_date)) {
            $submission = BudgetSubmission::with('user')->where('user_id', Auth::id())->whereBetween('updated_at', [$request->from_date, $request->target_date])->paginate(10, ['*'], 'submit_result_filter');
            return view('kepala_kantor.report.pengaju.nominal_filter', compact('submission'));
        }
        $submission = BudgetSubmission::with('user')->where('user_id', Auth::id())->paginate(10, ['*'], 'result_no_filter');
        return view('kepala_kantor.report.pengaju.nominal_filter', compact('submission'));
    }
    // keuangan
    public function kepala_all_keuangan(Request $request)
    {
        if (isset($request->from_date) && isset($request->target_date)) {
            $submission = BudgetSubmission::with('user')->whereBetween('updated_at', [$request->from_date, $request->target_date])->paginate(10, ['*'], 'submit_result_filter');
            return view('kepala_kantor.report.keuangan.all_filter', compact('submission'));
        }
        $submission = BudgetSubmission::with('user')->paginate(10, ['*'], 'result_no_filter');
        return view('kepala_kantor.report.keuangan.all_filter', compact('submission'));
    }
    public function kepala_verify(Request $request)
    {
        if (isset($request->from_date) && isset($request->target_date)) {
            $submission = BudgetSubmission::with('user')->whereBetween('updated_at', [$request->from_date, $request->target_date])->paginate(10, ['*'], 'submit_result_filter');
            return view('kepala_kantor.report.keuangan.verify_filter', compact('submission'));
        }
        $submission = BudgetSubmission::with('user')->paginate(10, ['*'], 'result_no_filter');
        return view('kepala_kantor.report.keuangan.verify_filter', compact('submission'));
    }
    //bendahara
    public function kepala_all_bendahara(Request $request)
    {
        if (isset($request->from_date) && isset($request->target_date)) {
            $submission = BudgetSubmission::with('user')->where('verification_status', 1)->whereBetween('updated_at', [$request->from_date, $request->target_date])->paginate(10, ['*'], 'submit_result_filter');
            return view('kepala_kantor.report.bendahara.all_filter', compact('submission'));
        }
        $submission = BudgetSubmission::with('user')->where('verification_status', 1)->paginate(10, ['*'], 'result_no_filter');
        return view('kepala_kantor.report.bendahara.all_filter', compact('submission'));
    }
    public function kepala_nominal_bendahara(Request $request)
    {
        if (isset($request->from_date) && isset($request->target_date)) {
            $submission = BudgetSubmission::with('user')->where('verification_status', 1)->whereBetween('updated_at', [$request->from_date, $request->target_date])->paginate(10, ['*'], 'submit_result_filter');
            return view('kepala_kantor.report.bendahara.nominal_filter', compact('submission'));
        }
        $submission = BudgetSubmission::with('user')->where('verification_status', 1)->paginate(10, ['*'], 'result_no_filter');
        return view('kepala_kantor.report.bendahara.nominal_filter', compact('submission'));
    }
    public function kepala_sign_bendahara(Request $request)
    {
        if (isset($request->from_date) && isset($request->target_date)) {
            $submission = BudgetSubmission::with('user')->where('verification_status', 1)->whereBetween('updated_at', [$request->from_date, $request->target_date])->paginate(10, ['*'], 'submit_result_filter');
            return view('kepala_kantor.report.bendahara.sign_filter', compact('submission'));
        }
        $submission = BudgetSubmission::with('user')->where('verification_status', 1)->paginate(10, ['*'], 'result_no_filter');
        return view('kepala_kantor.report.bendahara.sign_filter', compact('submission'));
    }
}
