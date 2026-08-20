<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BudgetSubmission;
use App\Models\Pengajuan;
use App\service\features\domain\pengajuan\SubmissionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mpdf\Mpdf;

class UserController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // TOTAL
        $all_submit = BudgetSubmission::where('user_id', $userId)->count();

        // BELUM LENGKAP
        $belum_lengkap = BudgetSubmission::where('user_id', $userId)
            ->where('requirements_status', '!=', 'Lengkap')
            ->count();

        // BELUM DIVERIFIKASI
        $belum_diverifikasi = BudgetSubmission::where('user_id', $userId)
            ->where('verification_status', 'Belum Diverifikasi')
            ->count();

        // SELESAI
        $selesai = BudgetSubmission::where('user_id', $userId)
            ->where('verification_status', 'Selesai')
            ->count();

        // BudgetSubmission TERBARU
        $submission_new = BudgetSubmission::where('user_id', $userId)
            ->latest()
            ->take(5)
            ->paginate(5, ['*'], 'new_submit');

        return view('user.home', compact(
            'all_submit',
            'belum_lengkap',
            'belum_diverifikasi',
            'selesai',
            'submission_new',
        ));
    }

    // public function pengajuan()
    // {
    //     return view('user.pengajuan.pengajuan');
    // }

    public function worklist() // tidak dipakai lagi
    {
        $proses_submissions = BudgetSubmission::with('user')->where('user_id', Auth::id())->get();

        $service = new SubmissionService();
        $all_submissions = $service->getAllSubmissions()->paginate(10, ['*'], 'all_submit');

        $archive_submit = BudgetSubmission::with('user')->where('user_id', Auth::id())->where('is_archive', 1)->paginate(10, ['*'], 'archive_submit');
        return view('user.monitoring', compact('proses_submissions', 'all_submissions', 'archive_submit'));
    }

    public function report(Request $request)
    {
        if (isset($request->from_date) && isset($request->target_date)) {
            $submission = BudgetSubmission::with('user')->where('user_id', Auth::id())->whereBetween('updated_at', [$request->from_date, $request->target_date])->paginate(10, ['*'], 'submit_result_filter');
            return view('user.report.report', compact('submission'));
        }
        $submission = BudgetSubmission::with('user')->where('user_id', Auth::id())->paginate(10, ['*'], 'result_no_filter');
        return view('user.report.report', compact('submission'));
    }

    
}