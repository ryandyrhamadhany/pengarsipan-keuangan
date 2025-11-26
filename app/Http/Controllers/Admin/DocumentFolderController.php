<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArchiveFile;
use App\Models\DocumentFolder;
use App\Models\DocumentRack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentFolderController extends Controller
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
        return view('admin.archive.archive-create-folder'); // tidak dipakai
    }

    public function create_wit_rack(string $id)
    {
        $raks = DocumentRack::where('id', $id)->first();
        return view('admin.input_archive.folder.form-create-folder', compact('raks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DocumentFolder::create([
            'document_rack_id' => $request->document_rack_id,
            'folder_name' => $request->name,
            'kode_folder' => $request->kode_folder,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('rak.show', ['rak' => $request->document_rack_id])->with('success', 'berhasil menambahkan folder!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $folders = DocumentFolder::where('id', $id)->first();
        $files = ArchiveFile::where('document_folder_id', $id)->get();
        return view('admin.input_archive.document.archive-file', compact('folders', 'files'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $folder = DocumentFolder::findOrFail($id);
        return view('admin.input_archive.folder.archive-folder-edit-form', compact('folder'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $folder = DocumentFolder::findOrFail($id);

        $folder->update([
            'folder_name' => $request->name,
            'kode_folder' => $request->kode_folder,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('rak.show', ['rak' => $folder->document_rack_id])->with('success', 'Berhasil Mengupdate rak!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $folder = DocumentFolder::findOrFail($id);
        $id = $folder->document_rack_id;
        // $files = ArchiveFile::where('document_folder_id', $folder->id)->get();

        // // Hapus semua file PDF di storage
        // foreach ($files as $file) {
        //     if ($file->path_file && Storage::disk('public')->exists($file->path_file)) {
        //         Storage::disk('public')->delete($file->path_file);
        //     }
        // }

        $folder->delete();

        return redirect()->route('rak.show', ['rak' => $id])->with('success', 'Berhasil Menghapus rak!!');
    }
}
