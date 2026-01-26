<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArchiveFile;
use App\Models\Cabinet;
use App\Models\Category;
use App\Models\DigitalArchive;
use App\Models\DocumentFolder;
use App\Models\FundingSource;
use App\Models\PaymentMethod;
use Dom\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    // show category sudah
    // create category sudah
    // store category sudah
    // update category sudah
    // edit category sudah
    // delete category sudah
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function all_list($id) // list category bagian edit kategori
    {
        $cabinet = Cabinet::findOrFail($id);
        $result = Category::where('cabinet_id', $cabinet->id)->get(); // ambil category berdasarkan cabinet

        $categories = collect();
        $temp  = [];

        // ambil kategori yang sama dilewati
        foreach ($result as $category) {
            if (in_array($category->category_name, $temp)) {
                continue;
            }

            $temp[] = $category->category_name;
            $categories->push($category);
        }

        return view('admin.input_archive.category.category_list', compact('categories', 'cabinet'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_category_form_cabinet($id) // id cabinet
    {
        $cabinet = Cabinet::findOrFail($id);
        $payment = PaymentMethod::all();
        $funding = FundingSource::all();

        return view('admin.input_archive.category.category-create', compact('cabinet', 'payment', 'funding'));
    }

    public function create_sub_category($id) // id category
    {
        $category = Category::findOrFail($id);
        $payment = PaymentMethod::all();
        $funding = FundingSource::all();
        return view('admin.input_archive.sub_category.sub_category_create', compact('category', 'payment', 'funding'));
    }

    public function create_year($id) // id category bisa dari sub kategori atau dari kategori langsung
    {
        $category = Category::findOrFail($id);
        return view('admin.input_archive.year.year_create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // create category // belum tambahkan path icon
    {
        $request->validate([
            'cabinet_id' => 'required|exists:cabinets,id',
            'name'       => 'required|string|max:255',
            'deskripsi'  => 'nullable|string',
            'url'        => 'nullable|string',
        ]);

        // $code = strtoupper(Str::slug($request->name, '-'));
        // Category::create([
        //     'cabinet_id' => $request->cabinet_id,
        //     'category_name' => $request->name,
        //     'category_code' => $code,
        //     'name' => 'required|string',
        //     'payment_method' => 'nullable',
        //     'funding_source' => 'nullable',
        //     'deskripsi' => 'nullable|string',
        //     'url' => 'nullable|string',
        // ]);

        Category::create([
            'cabinet_id' => $request->cabinet_id,
            'category_name' => $request->name,
            'description' => $request->deskripsi,
            'payment_method_id' => $request->payment_method,
            'funding_source_id' => $request->funding_source,
            'url_icon' => $request->url,
        ]);

        return redirect()->route('cabinet.show', ['cabinet' => $request->cabinet_id])->with('success', 'Berhasil Membuat Category');
    }

    public function add_subcategory(Request $request, $id)
    {
        $category = Category::findOrFail($id); // category saat ini
        $request->validate([
            'name' => 'required|string',
            'payment_method' => 'nullable',
            'funding_source' => 'nullable',
        ]);

        if (isset($category->sub_category)) { // jika categori saat ini sudah memiliki sub kategori maka buat yang baru
            Category::create([
                'cabinet_id' => $category->cabinet_id,
                'category_name' => $category->category_name,
                'payment_method_id' => $request->payment_method,
                'funding_source_id' => $request->funding_source,
                'sub_category' => $request->name,
            ]);
        } else {
            $category->update([ // jika belum punya update category saat ini
                'sub_category' => $request->name,
                'payment_method_id' => $request->payment_method,
                'funding_source_id' => $request->funding_source,
            ]);
        }

        return redirect()->route('category.show', ['category' => $category->id])->with('success', 'Berhasil Menambahkan Sub Category');
    }

    public function add_year(Request $request, $id)
    {
        $category = Category::findOrFail($id); // ambil categori saat ini bisa dari kategori langsung atau dari sub kateogori
        $request->validate([
            'year' => 'required|string',
        ]);

        if (isset($category->year)) { // jika kategori saat ini sudah punya year maka buat yang baru
            Category::create([
                'cabinet_id' => $category->cabinet_id,
                'category_name' => $category->category_name,
                'sub_category' => $category->sub_category,
                'category_code' => $category->category_code,
                'year' => $request->year,
            ]);
        } else {
            $category->update([ // jika belum update categori saat ini
                'year' => $request->year,
            ]);
        }
        return redirect()->route('category.show', ['category' => $category->id])->with('success', 'Berhasil Menambahkan Year');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) // id kategori saat ini
    {
        $category = Category::findOrFail($id); // category yang dipilih
        if (isset($category->sub_category)) {
            $result = Category::where('category_name', $category->category_name)->get(); // ambil sub category dari category

            $subcategories = collect();
            $temp  = [];

            // ambil sub kategori dari category dan yang sama dilewati
            foreach ($result as $category) {
                if (in_array($category->sub_category, $temp)) { // cek jika sub Kategori sudah ada maka lewati
                    continue;
                }

                $temp[] = $category->sub_category; // simpan sub kategori dalam memori
                $subcategories->push($category);
            }
            return view('admin.input_archive.sub_category.sub_category', compact('subcategories', 'category'));
        } else {
            $years = Category::where('category_name', $category->category_name)->get(); // cari tahun berdasarkan categori
            return view('admin.input_archive.year.year', compact('years', 'category'));
        }
    }

    public function sub_category_show($id) // id categori dari sub kategori saat ini
    {
        $category = Category::findOrFail($id); // ambil category dari sub category saat ini
        $years = Category::where('sub_category', $category->sub_category)->get();
        return view('admin.input_archive.year.year', compact('years', 'category'));
    }

    public function year_show($id) // id categori dari year saat ini
    {
        $category = Category::findOrFail($id); // ambil categori saat ini dari year
        $result = DocumentFolder::with('category')
            ->where('category_id', $category->id)
            ->get(); // ambil rak berdasarkan category id

        $racks = collect();
        $temp  = [];

        foreach ($result as $rak) {
            if (in_array($rak->rack_name, $temp)) { // cek jika rak sudah ada maka lewati
                continue;
            }

            $temp[] = $rak->rack_name; // tambahkan rak dalam temp
            $racks->push($rak);
        }
        $digitalarchive = DigitalArchive::where('category_id', $category->id)->get();
        // if ($category->payment_method_id !== null) {
        // } else if ($category->funding_source_id !== null) {
        //     $digitalarchive = DigitalArchive::where('category_funding_id', $category->id)->get();
        // }
        return view('admin.input_archive.rack.archive-rack', compact('racks', 'category', 'digitalarchive'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update_year(Request $request, string $id)
    {
        $request->validate([
            'year' => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 10)
        ]);

        $year = Category::findOrFail($id);
        $cabinetId = $year->cabinet_id;

        // Cek apakah kombinasi baru sudah ada
        $exists = Category::where('cabinet_id', $year->cabinet_id)
            ->where('category_name', $year->category_name)
            ->where('sub_category', $year->sub_category)
            ->where('year', $request->year)
            ->where('id', '!=', $id)
            ->exists();

        if ($exists) {
            return redirect()->route('cabinet.show', ['cabinet' => $cabinetId])
                ->with('error', 'Year dengan kombinasi ini sudah ada');
        }

        // Update hanya year ini saja (tidak mass update)
        $year->update(['year' => $request->year]);

        return redirect()->route('cabinet.show', ['cabinet' => $cabinetId])
            ->with('success', 'Berhasil edit tahun');
    }

    public function update_subcategory(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'payment_method' => 'nullable',
            'funding_source' => 'nullable',
        ]);

        $subcategory = Category::findOrFail($id);
        $cabinetId = $subcategory->cabinet_id;

        $oldSubCategory = $subcategory->sub_category;
        $newSubCategory = $request->name;

        // Cek duplikat
        // $exists = Category::where('cabinet_id', $subcategory->cabinet_id)
        //     ->where('category_name', $subcategory->category_name)
        //     ->where('sub_category', $newSubCategory)
        //     ->exists();

        // if ($exists) {
        //     return redirect()
        //         ->route('cabinet.show', ['cabinet' => $cabinetId])
        //         ->with('error', 'Sub Category dengan nama ini sudah ada di Category yang sama');
        // }

        // UPDATE
        Category::where('cabinet_id', $subcategory->cabinet_id)
            ->where('category_name', $subcategory->category_name)
            ->where('sub_category', $oldSubCategory)
            ->update([
                'sub_category'  => $newSubCategory,
                'payment_method_id' => $request->payment_method,
                'funding_source_id' => $request->funding_source,
            ]);

        return redirect()
            ->route('cabinet.show', ['cabinet' => $cabinetId])
            ->with('success', 'Berhasil edit Sub Category');
    }

    public function update_category(Request $request, string $id)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'payment_method' => 'nullable',
            'funding_source' => 'nullable',
        ]);

        $category = Category::findOrFail($id);
        $cabinetId = $category->cabinet_id;
        $oldCategoryName = $category->category_name;
        $newCategoryName = $request->category_name;

        // Update semua records dengan category_name yang sama di cabinet yang sama
        // Termasuk yang punya sub_category dan year berbeda
        Category::where('cabinet_id', $category->cabinet_id)
            ->where('category_name', $oldCategoryName)
            ->update(['category_name' => $newCategoryName, 'payment_method_id' => $request->payment_method, 'funding_source_id' => $request->funding_source]);

        // Update juga di field sub_category yang mereferensi category_name ini
        Category::where('cabinet_id', $category->cabinet_id)
            ->where('sub_category', $oldCategoryName)
            ->update(['sub_category' => $newCategoryName]);

        return redirect()->route('cabinet.show', ['cabinet' => $cabinetId])
            ->with('success', 'Berhasil edit Category');
    }

    public function edit_year($id)
    {
        $year = Category::findOrFail($id);
        return view('admin.input_archive.year.year_edit', compact('year'));
    }

    public function edit_subcategory($id)
    {
        $subcategory = Category::findOrFail($id);
        $payment = PaymentMethod::all();
        $funding = FundingSource::all();
        return view('admin.input_archive.sub_category.sub_category_edit', compact('subcategory', 'payment', 'funding'));
    }

    public function edit_category($id)
    {
        $category = Category::findOrFail($id);
        $cabinet = Cabinet::findOrFail($category->cabinet_id);
        $payment = PaymentMethod::all();
        $funding = FundingSource::all();

        return view('admin.input_archive.category.category-edit', compact(
            'category',
            'cabinet',
            'payment',
            'funding',
        ));
    }

    /**
     * Remove the specified resource from storage.
     */
    // Helper method untuk delete files
    private function deleteRelatedFiles($categoryIds)
    {
        $folders = DocumentFolder::whereIn('category_id', $categoryIds)->pluck('id');

        if ($folders->isEmpty()) return;

        $files = ArchiveFile::whereIn('folder_id', $folders)->get();

        foreach ($files as $file) {
            if (Storage::disk('private')->exists($file->file_path)) {
                Storage::disk('private')->delete($file->file_path);
            }
        }
    }

    public function destroy_year(string $id)
    {
        $year = Category::findOrFail($id);
        $cabinetId = $year->cabinet_id;

        // Cek berapa banyak year dengan sub_category yang sama
        $countSameSubCategory = Category::where('cabinet_id', $year->cabinet_id)
            ->where('sub_category', $year->sub_category)
            ->where('category_name', $year->category_name)
            ->count();

        // Jika cuma 1, set year jadi null aja, jangan dihapus
        if ($countSameSubCategory == 1) {
            $this->deleteRelatedFiles([$year->id]);
            $year->update(['year' => null]);
            $message = 'Berhasil menghapus Year (diset null)';
        } else {
            // Kalau lebih dari 1, baru hapus
            $this->deleteRelatedFiles([$year->id]);
            $year->delete();
            $message = 'Berhasil menghapus Year';
        }

        return redirect()->route('cabinet.show', ['cabinet' => $cabinetId])
            ->with('success', $message);
    }

    public function destroy_subcategory(string $id)
    {
        $subcategory = Category::findOrFail($id);
        $cabinetId = $subcategory->cabinet_id;

        // Cek berapa banyak sub_category dengan category_name yang sama
        $countSameCategory = Category::where('cabinet_id', $subcategory->cabinet_id)
            ->where('category_name', $subcategory->category_name)
            ->whereNotNull('sub_category')
            ->distinct('sub_category')
            ->count('sub_category');

        // Ambil semua years dengan sub_category yang sama
        $years = Category::where('cabinet_id', $subcategory->cabinet_id)
            ->where('sub_category', $subcategory->sub_category)
            ->where('category_name', $subcategory->category_name)
            ->get();

        $this->deleteRelatedFiles($years->pluck('id')->toArray());

        // Jika cuma 1 sub_category tersisa, set null aja
        if ($countSameCategory == 1) {
            Category::where('cabinet_id', $subcategory->cabinet_id)
                ->where('sub_category', $subcategory->sub_category)
                ->update(['sub_category' => null]);
            $message = 'Berhasil menghapus Sub Category (diset null)';
        } else {
            // Kalau lebih dari 1, hapus semua years dengan sub_category ini
            Category::where('cabinet_id', $subcategory->cabinet_id)
                ->where('sub_category', $subcategory->sub_category)
                ->delete();
            $message = 'Berhasil menghapus Sub Category';
        }

        return redirect()->route('cabinet.show', ['cabinet' => $cabinetId])
            ->with('success', $message);
    }

    public function destroy_category(string $id)
    {
        $category = Category::findOrFail($id);
        $cabinetId = $category->cabinet_id;

        // Ambil semua records dengan category_name yang sama
        $categories = Category::where('cabinet_id', $category->cabinet_id)
            ->where('category_name', $category->category_name)
            ->get();

        $this->deleteRelatedFiles($categories->pluck('id')->toArray());

        // Hapus semua category beserta sub_category dan year-nya
        Category::where('cabinet_id', $category->cabinet_id)
            ->where('category_name', $category->category_name)
            ->delete();

        return redirect()->route('cabinet.show', ['cabinet' => $cabinetId])
            ->with('success', 'Berhasil menghapus Category');
    }
}
