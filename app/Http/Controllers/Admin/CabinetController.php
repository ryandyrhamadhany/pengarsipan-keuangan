<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cabinet;
use App\Models\Category;
use Illuminate\Http\Request;

class CabinetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.input_archive.cabinet.cabinet_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'code' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        Cabinet::create([
            'cabinet_name' => $request->name,
            'cabinet_code' => $request->code,
            'total_racks' => 0,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.archive')->with('success', 'Berhasil Menambahkan Cabinet');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories = Category::where('cabinet_id', $id)->get();
        $cabinet = Cabinet::findOrFail($id);
        return view('admin.input_archive.category.category', compact('categories', 'cabinet'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cabinet = Cabinet::findOrFail($id);

        return view('admin.input_archive.cabinet.cabinet_edit', compact('cabinet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'code' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        $cabinet = Cabinet::findOrFail($id);

        $cabinet->update([
            'cabinet_name' => $request->name,
            'cabinet_code' => $request->code,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.archive')->with('success', 'Berhasil Mengupdate Cabinet');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cabinet = Cabinet::findOrFail($id);

        $cabinet->delete();

        return redirect()->route('admin.archive')->with('success', 'Berhasil Menghapus Cabinet');
    }
}
