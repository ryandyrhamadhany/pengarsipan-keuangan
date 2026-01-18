<?php

namespace App\Http\Controllers\Bendahara;

use App\Http\Controllers\Controller;
use App\Models\BudgetSubmission;
use App\Models\Pengajuan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BendaharaDashboardController extends Controller
{
    public function index(Request $request)
    {
        // ================= QUERY DASAR LIST =================
        $query = BudgetSubmission::with('user')
            ->where('status_kelengkapan', 'Lengkap')
            ->where('status_verifikasi', 1);

        // ================= FILTER SEARCH =================
        if ($request->filled('search')) {
            $query->where('pengajuan_name', 'like', '%' . $request->search . '%');
        }

        // ================= FILTER STATUS ARSIP =================
        if ($request->status === 'sudah_diarsipkan') {
            $query->where('status_diarsipkan', 1);
        }

        if ($request->status === 'belum_diarsipkan') {
            $query->where('status_diarsipkan', 0);
        }

        // ================= DATA LIST =================
        $pengajuans = $query->orderBy('created_at', 'desc')->get();

        // ================= STATISTIK =================
        $total_terverifikasi = BudgetSubmission::where('status_kelengkapan', 'Lengkap')
            ->where('status_verifikasi', 1)
            ->count();

        $menunggu_verifikasi = BudgetSubmission::where('status_kelengkapan', 'Lengkap')
            ->where('status_verifikasi', 1)
            ->where('status_diarsipkan', 0)
            ->count();

        $sudah_diarsipkan = BudgetSubmission::where('status_diarsipkan', 1)->count();

        $selesai_hari_ini = BudgetSubmission::whereDate('updated_at', Carbon::today())
            ->where('status_diarsipkan', 1)
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
}
