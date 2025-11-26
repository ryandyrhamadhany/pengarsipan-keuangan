<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cabinet;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Year;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_list($id)
    {
        $cabinet = Cabinet::findOrFail($id);
        $categories = Category::where('cabinet_id', $id)->get();
        return view('admin.input_archive.category.category_list', compact('categories', 'cabinet'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $categories = Category::all();
        // return view('admin.archive.category-create', compact('categories'));
    }

    public function create_with_cabinet($id)
    {
        $cabinet = Cabinet::findOrFail($id);
        return view('admin.input_archive.category.category-create', compact('cabinet'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::create([
            'cabinet_id' => $request->cabinet_id,
            'category_name' => $request->name,
            'deskripsi' => $request->deskripsi,
            'url_icon' => $request->url,
        ]);

        return redirect()->route('cabinet.show', ['cabinet' => $request->cabinet_id])->with('success', 'Berhasil Menambahkan Kategory');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id);

        // Ambil subcategories
        $subcategories = $category->subcategories;

        // Jika ada SubCategory → tampilkan sub_category.blade
        if ($subcategories->count() > 0) {

            // yearsDirect dikosongkan supaya Blade tidak error
            $yearsDirect = collect();

            return view('admin.input_archive.sub_category.sub_category', compact(
                'category',
                'subcategories',
                'yearsDirect'  // <- Dikirim tapi kosong
            ));
        }

        // Jika tidak ada SubCategory → langsung halaman tahun
        $yearsDirect = $category->years; // relasi morphMany

        return view('admin.input_archive.year.year', compact(
            'category',
            'yearsDirect',
            'subcategories' // ini kosong, tidak dipakai tapi aman
        ));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.input_archive.category.category-edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'category_name' => $request->name,
            'deskripsi' => $request->deskripsi,
            'url_icon' => $request->url,
        ]);

        return redirect()->route('cabinet.show', ['cabinet' => $category->cabinet_id])->with('success', 'Berhasil Mengupdate Kategory');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $cabinet_id = $category->cabinet_id;
        $category->delete();
        return redirect()->route('cabinet.show', ['cabinet' => $cabinet_id])->with('success', 'Berhasil Menghapus Kategory');
    }
}
