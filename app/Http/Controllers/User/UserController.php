<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BudgetSubmission;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        return view('user.user-dashboard', compact(
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

    public function worklist()
    {
        $proses_submissions = BudgetSubmission::with('user')->where('user_id', Auth::id())->get();
        $all_submissions = BudgetSubmission::with('user')->where('user_id', Auth::id())->latest()->paginate(10, ['*'], 'all_submit');
        $archive_submit = BudgetSubmission::with('user')->where('user_id', Auth::id())->where('is_archive', 1)->paginate(10, ['*'], 'archive_submit');
        return view('user.worklist.worklist', compact('proses_submissions', 'all_submissions', 'archive_submit'));
    }
}
