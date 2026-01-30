<?php

namespace App\Http\Controllers\Bendahara;

use App\Http\Controllers\Controller;
use App\Models\BudgetSubmission;
use App\Models\Cabinet;
use App\Models\FundingSource;
use App\Models\PaymentMethod;
use App\Models\Pengajuan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;

class BendaharaController extends Controller
{
    public function index(Request $request)
    {
        // ================= QUERY DASAR LIST =================
        $query = BudgetSubmission::with('user')
            ->where('requirements_status', 'Lengkap')
            ->where('verification_status', 1);

        // ================= FILTER SEARCH =================
        if ($request->filled('search')) {
            $query->where('budget_submission_name', 'like', '%' . $request->search . '%');
        }

        // ================= FILTER STATUS ARSIP =================
        if ($request->status === 'sudah_diarsipkan') {
            $query->where('is_archive', 1);
        }

        if ($request->status === 'belum_diarsipkan') {
            $query->where('is_archive', 0);
        }

        // ================= DATA LIST =================
        $pengajuans = $query->orderBy('created_at', 'desc')->get();

        // ================= STATISTIK =================
        $total_terverifikasi = BudgetSubmission::where('requirements_status', 'Lengkap')
            ->where('verification_status', 1)
            ->count();

        $menunggu_verifikasi = BudgetSubmission::where('requirements_status', 'Lengkap')
            ->where('verification_status', 1)
            ->where('is_archive', 0)
            ->count();

        $sudah_diarsipkan = BudgetSubmission::where('is_archive', 1)->count();

        $selesai_hari_ini = BudgetSubmission::whereDate('updated_at', Carbon::today())
            ->where('is_archive', 1)
            ->count();

        // ================= PROGRESS (%) =================
        $progress = 0;
        if ($total_terverifikasi > 0) {
            $progress = round(
                ($sudah_diarsipkan / $total_terverifikasi) * 100
            );
        }

        // ================= RETURN VIEW =================
        return view('bendahara.dashboard', compact(
            'pengajuans',
            'total_terverifikasi',
            'menunggu_verifikasi',
            'sudah_diarsipkan',
            'selesai_hari_ini',
            'progress'
        ));
    }

    public function document_sign($id)
    {
        $pengajuan = BudgetSubmission::with('user')
            ->with('finance_officer')
            ->with('revenue_officer')
            ->where('id', $id)->first();
        $cabinets = Cabinet::all();
        $payment_method = PaymentMethod::all();
        $funding_source = FundingSource::all();
        return view('bendahara.final-verifikasi', compact('pengajuan', 'cabinets', 'payment_method', 'funding_source'));
    }

    public function pengajuan()
    {
        $submit_sign = BudgetSubmission::where('is_archive', 0)->paginate(10, ['*'], 'submit_no_sign');
        $pengajuans = BudgetSubmission::where('requirements_status', 'Lengkap')
            ->where('verification_status', 1)
            ->paginate(10, ['*'], 'all_submit');

        return view('bendahara.pengajuan', compact('pengajuans', 'submit_sign'));
    }

    public function report()
    {
        return view('bendahara.report.report');
    }

    public function search_pengajuan(Request $request)
    {
        if ($request->search != null) {
            $submit = BudgetSubmission::with('user')
                ->where('budget_submission_name', 'LIKE', '%' . $request->search . '%')
                ->where('verification_status', 1)
                ->whereBetween('updated_at', [$request->start_date, $request->end_date])
                ->latest()->get();
        } else {
            $submit = BudgetSubmission::with('user')
                ->whereBetween('updated_at', [$request->start_date, $request->end_date])
                ->where('verification_status', 1)
                ->latest()->get();
        }
        return view('bendahara.search.search_result', compact('submit'));
    }
}
