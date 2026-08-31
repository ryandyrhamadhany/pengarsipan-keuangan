<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\BudgetSubmission;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Mpdf\Mpdf;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class KeuanganController extends Controller
{
    public function index(Request $request)
    {
        // ================= QUERY DASAR =================
        $query = BudgetSubmission::with('user');

        // ================= FILTER =================
        if ($request->search) {
            $query->where('pengajuan_name', 'like', '%' . $request->search . '%');
        }

        if ($request->status) {
            switch ($request->status) {
                case 'belum_diperiksa':
                    $query->where('requirements_status', 'Belum Diperiksa');
                    break;

                case 'belum_lengkap':
                    $query->where('requirements_status', 'Belum Lengkap');
                    break;

                case 'lengkap':
                    $query->where('requirements_status', 'Lengkap');
                    break;

                case 'belum_diverifikasi':
                    $query->where('verification_status', 0);
                    break;

                case 'diverifikasi':
                    $query->where('verification_status', 1);
                    break;

                case 'diarsipkan':
                    $query->where('is_archive', 1);
                    break;
            }
        }

        $pengajuans = $query->latest()->get();



        // ================= STATISTIK =================
        $total_pengajuan = BudgetSubmission::count();

        $perlu_diperiksa = BudgetSubmission::whereIn('requirements_status', [
            'Belum Lengkap',
            'Belum Diperiksa'
        ])->count();

        $belum_diverifikasi = BudgetSubmission::where('verification_status', 0)->count();

        $sudah_diverifikasi = BudgetSubmission::where('verification_status', 1)->count();

        return view('keuangan.home', compact(
            'pengajuans',
            'total_pengajuan',
            'perlu_diperiksa',
            'belum_diverifikasi',
            'sudah_diverifikasi'
        ));
    }

    // public function search_pengajuan(Request $request) // tidak dipakai lagi
    // {
    //     if ($request->filled('start_date') && $request->filled('end_date')) {
    //         $submit = BudgetSubmission::with('user')
    //             ->where('budget_submission_name', 'LIKE', '%' . $request->search . '%')
    //             ->whereBetween('updated_at', [$request->start_date, $request->end_date])
    //             ->latest()->get();
    //     } else {
    //         $submit = BudgetSubmission::with('user')
    //             ->where('budget_submission_name', 'LIKE', '%' . $request->search . '%')
    //             // ->whereBetween('updated_at', [$request->start_date, $request->end_date])
    //             ->latest()->get();
    //     }
    //     return view('keuangan.search.search_result', compact('submit'));
    // }

    // public function report(Request $request) // tidak dipakai lagi
    // {
    //     if (isset($request->from_date) && isset($request->target_date)) {
    //         $submission = BudgetSubmission::with('user')->whereBetween('updated_at', [$request->from_date, $request->target_date])->paginate(10, ['*'], 'submit_result_filter');
    //         return view('keuangan.report.report', compact('submission'));
    //     }
    //     $submission = BudgetSubmission::with('user')->paginate(10, ['*'], 'result_no_filter');
    //     return view('keuangan.report.report', compact('submission'));
    // }
}
