<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class KeuanganDashboardController extends Controller
{
    public function index(Request $request)
    {
        // ================= QUERY DASAR =================
        $query = Pengajuan::with('user');

        // ================= FILTER =================
        if ($request->search) {
            $query->where('pengajuan_name', 'like', '%' . $request->search . '%');
        }

        if ($request->status) {
            switch ($request->status) {
                case 'belum_diperiksa':
                    $query->where('status_kelengkapan', 'Belum Diperiksa');
                    break;

                case 'belum_lengkap':
                    $query->where('status_kelengkapan', 'Belum Lengkap');
                    break;

                case 'lengkap':
                    $query->where('status_kelengkapan', 'Lengkap');
                    break;

                case 'belum_diverifikasi':
                    $query->where('status_verifikasi', 0);
                    break;

                case 'diverifikasi':
                    $query->where('status_verifikasi', 1);
                    break;

                case 'diarsipkan':
                    $query->where('status_diarsipkan', 1);
                    break;
            }
        }

        $pengajuans = $query->latest()->get();

        

        // ================= STATISTIK =================
        $total_pengajuan = Pengajuan::count();

        $perlu_diperiksa = Pengajuan::whereIn('status_kelengkapan', [
            'Belum Lengkap',
            'Belum Diperiksa'
        ])->count();

        $belum_diverifikasi = Pengajuan::where('status_verifikasi', 0)->count();

        $sudah_diverifikasi = Pengajuan::where('status_verifikasi', 1)->count();

        return view('keuangan.dashboard', compact(
            'pengajuans',
            'total_pengajuan',
            'perlu_diperiksa',
            'belum_diverifikasi',
            'sudah_diverifikasi'
        ));
    }
}
