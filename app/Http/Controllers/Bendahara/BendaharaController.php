<?php

namespace App\Http\Controllers\Bendahara;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;

class BendaharaController extends Controller
{
    public function index()
    {
        $pengajuans = Pengajuan::where('status_kelengkapan', 'Lengkap')
            ->where('status_verifikasi', 1)
            ->get();
        return view('bendahara.dashboard', compact('pengajuans'));
    }

    public function document_sign($id)
    {
        $pengajuan = Pengajuan::with('user')->with('finance_officer')->first();
        return view('bendahara.final-verifikasi', compact('pengajuan'));
    }
}
