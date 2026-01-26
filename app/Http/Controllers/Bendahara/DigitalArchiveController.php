<?php

namespace App\Http\Controllers\Bendahara;

use App\Http\Controllers\Controller;
use App\Models\BudgetSubmission;
use App\Models\DigitalArchive;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class DigitalArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = DigitalArchive::all();
        return view('bendahara.digital_arsip.digital_archive', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $archive = DigitalArchive::findOrFail($id);
        // $tahun_archive = DigitalArchive::where('divisi_name', $archive->divisi_name)->get();
        return view('bendahara.digital_arsip.show-digital-archive', compact('archive'));
    }

    // public function show_in_year($id)
    // {
    //     $allArchive = BudgetSubmission::where('digital_archive_id', $id)->get();
    //     return view('bendahara.digital_arsip.all-digital-archive', compact('allArchive', 'id'));
    // }

    // public function show_digital_archive($id)
    // {
    //     $pengajuan = BudgetSubmission::with('user')
    //         ->with('finance_officer')
    //         ->with('category_archive')
    //         ->findOrFail($id);
    //     return view('bendahara.digital_arsip.show-digital-archive', compact('pengajuan', 'id'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $digital = DigitalArchive::findOrFail($id);
        return view('bendahara.digital_arsip.digital_archives_form_edit', compact('digital'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
