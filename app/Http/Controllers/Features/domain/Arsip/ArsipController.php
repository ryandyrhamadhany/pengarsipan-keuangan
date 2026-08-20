<?php

namespace App\Http\Controllers\Features\domain\Arsip;

use App\Http\Controllers\Controller;
use App\Models\ArchiveFile;
use App\Models\Cabinet;
use App\Models\Category;
use App\Models\DigitalArchive;
use App\Models\DocumentFolder;
use Illuminate\Http\Request;

class ArsipController extends Controller
{
    public function arsip()
    {
        return redirect()->route('arsip.cabinet');
    }

    public function cabinet()
    {
        $cabinets = Cabinet::all();
        // return view('admin.archive.archive-rack', compact('raks', 'categories'));
        return view('features.arsip.cabinet.cabinet', compact('cabinets'));
    }

    public function category(string $id)
    {
        $cabinet = Cabinet::findOrFail($id);
        $result = Category::where('cabinet_id', $cabinet->id)->get(); // ambil category berdasarkan cabinet

        $categories = collect();
        $temp  = [];

        // ambil kategori kabinet dan yang sama dilewati
        foreach ($result as $category) {
            if (in_array($category->category_name, $temp)) {
                continue;
            }

            $temp[] = $category->category_name;
            $categories->push($category);
        }
        return view('features.arsip.category.category', compact('cabinet', 'categories'));
    }

    public function sub_category(string $id)
    {
        $category = Category::with('cabinet')->findOrFail($id); // category yang dipilih
        // $cabinet = Cabinet::findOrFail($category->cabinet_id);
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
            return view('features.arsip.sub_category.sub_category', compact('subcategories', 'category'));
        } else {
            $years = Category::where('category_name', $category->category_name)->get(); // cari tahun berdasarkan categori
            return view('features.arsip.year.year', compact('years', 'category'));
        }
    }

    public function year(string $id)
    {
        $category = Category::findOrFail($id); // ambil category dari sub category saat ini
        $years = Category::where('sub_category', $category->sub_category)->get();
        return view('features.arsip.year.year', compact('years', 'category'));
    }

    public function rack(string $id)
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
        $digitalarchive = DigitalArchive::where('category_id', $category->id)->latest()->paginate(10, ['*'], 'digital_arsip');
        // if ($category->payment_method_id !== null) {
        // } else if ($category->funding_source_id !== null) {
        //     $digitalarchive = DigitalArchive::where('category_funding_id', $category->id)->get();
        // }
        return view('features.arsip.rack.rack', compact('racks', 'category', 'digitalarchive'));
    }

    public function folder(string $id)
    {
        $rack = DocumentFolder::findOrFail($id); // ambil rak saat ini
        $folders = DocumentFolder::where('rack_name', $rack->rack_name)->where('category_id', $rack->category_id)->get(); // ambil folder berdasarkan nama rak dan id categori dari year saat ini
        return view('features.arsip.folder.folder', compact('folders', 'rack'));
    }

    public function archive(string $id)
    {
        $folder = DocumentFolder::findOrFail($id);
        $archives = ArchiveFile::where('folder_id', $folder->id)->get();
        return view('features.arsip.archive.archive', compact('archives', 'folder'));
    }
}
