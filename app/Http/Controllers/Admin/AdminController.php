<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cabinet;
use App\Models\Category;
use App\Models\DocumentRack;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin-dashboard');
    }

    public function input_archive(Request $request)
    {
        $categories = Category::all();

        // Ambil input category_id
        $categoryId = $request->category_id;

        // Jika ada filter kategori
        if ($categoryId) {
            $raks = DocumentRack::with('category')
                ->where('category_id', $categoryId)
                ->get();
        } else {
            $raks = DocumentRack::with('category')->get();
        }

        $cabinets = Cabinet::all();

        // return view('admin.archive.archive-rack', compact('raks', 'categories'));
        return view('admin.input_archive.cabinet.cabinet', compact('cabinets'));
    }
}
