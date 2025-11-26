<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Year;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
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
    public function create_with_category($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.input_archive.sub_category.sub_category_create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        SubCategory::create([
            'category_id' => $request->category_id,
            'sub_category_name' => $request->name,
            'sub_category_code' => $request->kode,
            'keterangan' => $request->Keterangan,
        ]);

        return redirect()->route('category.show', ['category' => $request->category_id])->with('success', 'Berhasil menambahkan sub kategori');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Ambil subkategori
        $subcategory = SubCategory::findOrFail($id);

        // Ambil kategori induknya
        $category = Category::findOrFail($subcategory->category_id);

        // Ambil semua year terkait subkategori via morph
        $years = Year::where('yearable_type', SubCategory::class)
            ->where('yearable_id', $id)
            ->get();

        return view('admin.input_archive.sub_category.year_sub', compact('years', 'subcategory', 'category'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subcategory = SubCategory::findOrFail($id);
        return view('admin.input_archive.sub_category.sub_category_edit', compact('subcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->update([
            'sub_category_name' => $request->name,
            'sub_category_code' => $request->kode,
            'keterangan' => $request->Keterangan,
        ]);

        return redirect()->route('category.show', ['category' => $request->category_id])->with('success', 'Berhasil menambahkan sub kategori');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $category_id = $subcategory->category_id;
        $subcategory->delete();
        return redirect()->route('category.show', ['category' => $category_id])->with('success', 'Berhasil menambahkan sub kategori');
    }
}
