<?php

namespace App\Http\Controllers\Kepala;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KepalaController extends Controller
{
    public function index()
    {
        return view('kepala_kantor.dashboard');
    }

    public function report()
    {
        return view('kepala_kantor.report.report');
    }
}
