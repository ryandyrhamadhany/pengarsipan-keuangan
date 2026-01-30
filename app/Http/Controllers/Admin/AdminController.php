<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArchiveFile;
use App\Models\Cabinet;
use App\Models\DigitalArchive;
use App\Models\FundingSource;
use App\Models\PaymentMethod;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin-dashboard');
    }

    public function input_archive(Request $request)
    {
        $cabinets = Cabinet::all();

        // return view('admin.archive.archive-rack', compact('raks', 'categories'));
        return view('admin.input_archive.cabinet.cabinet', compact('cabinets'));
    }

    public function environment()
    {
        $payment_method = PaymentMethod::all();
        $funding_source = FundingSource::all();
        return view('admin.setting_environment.setting_environment', compact('payment_method', 'funding_source'));
    }

    public function report()
    {
        return view('admin.report.report');
    }

    public function search_archive(Request $request)
    {
        if ($request->search != null) {
            $archive_digital = DigitalArchive::where('archive_name', 'LIKE', '%' . $request->search . '%')
                ->whereBetween('updated_at', [$request->start_date, $request->end_date])
                ->latest()->get();
            $scan_archive = ArchiveFile::where('file_name', 'LIKE', '%' . $request->search . '%')
                ->whereBetween('updated_at', [$request->start_date, $request->end_date])
                ->latest()->get();
        } else {
            $archive_digital = DigitalArchive::whereBetween('updated_at', [$request->start_date, $request->end_date])->latest()->get();
            $scan_archive = ArchiveFile::whereBetween('updated_at', [$request->start_date, $request->end_date])->latest()->get();
        }
        return view('admin.search.search_result', compact('archive_digital', 'scan_archive'));
    }
}
