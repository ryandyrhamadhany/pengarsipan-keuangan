<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // TOTAL
        $total_pengajuan = Pengajuan::where('user_id', $userId)->count();

        // BELUM LENGKAP
        $belum_lengkap = Pengajuan::where('user_id', $userId)
            ->where('status_kelengkapan', '!=', 'Lengkap')
            ->count();

        // BELUM DIVERIFIKASI
        $belum_diverifikasi = Pengajuan::where('user_id', $userId)
            ->where('status_verifikasi', 'Belum Diverifikasi')
            ->count();

        // SELESAI
        $selesai = Pengajuan::where('user_id', $userId)
            ->where('status_verifikasi', 'Selesai')
            ->count();

        // PENGAJUAN TERBARU
        $pengajuan_terbaru = Pengajuan::where('user_id', $userId)
            ->latest()
            ->take(5)
            ->get();

        return view('user.user-dashboard', compact(
            'total_pengajuan',
            'belum_lengkap',
            'belum_diverifikasi',
            'selesai',
            'pengajuan_terbaru'
        ));
    }
}
