<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArchiveFile;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $files = ArchiveFile::with('folder')->with('folder.rak')->with('folder.rak.category')   // ← tambah relasi
            ->when($search, function ($query) use ($search) {
                $query->where('name_file', 'like', '%' . $search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->get(); // tetap mengembalikan semua data meski ada duplikat nama

        return view('admin.archive.result-search', compact('files', 'search'));
    }
}
