<?php

namespace App\Http\Controllers\Bendahara;

use App\Http\Controllers\Controller;
use App\Models\Cabinet;
use App\Models\FundingSource;
use App\Models\PaymentMethod;
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
        $pengajuan = Pengajuan::with('user')
            ->with('finance_officer')
            ->where('id', $id)->first();
        $cabinets = Cabinet::all();
        $payment_method = PaymentMethod::all();
        $funding_source = FundingSource::all();
        return view('bendahara.final-verifikasi', compact('pengajuan', 'cabinets', 'payment_method', 'funding_source'));
    }

    public function pengajuan()
    {
        $pengajuans = Pengajuan::where('status_kelengkapan', 'Lengkap')
            ->where('status_verifikasi', 1)
            ->get();

        return view('bendahara.pengajuan', compact('pengajuans'));
    }
}
