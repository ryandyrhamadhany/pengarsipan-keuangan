<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArchiveFile;
use App\Models\DocumentFolder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArchiveFileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function download_file($id)
    {
        $file = ArchiveFile::findOrFail($id);

        $path = storage_path('app/public/' . $file->path_file);

        $originalName = basename($file->path_file);

        return response()->download($path, $originalName);
    }

    public function update_new_file(Request $request, $id)
    {
        $request->validate([
            'file_archive' => 'mimes:pdf|max:20480',
        ]);

        $file = $request->file('file_archive');
        $path = $file->storeAs('uploads', $file->getClientOriginalName(), 'public');

        $archives = ArchiveFile::findOrFail($id);

        $archives->update([
            'path_file' => $path,
        ]);

        return redirect()->route('file.show', ['file' => $id])->with('success', 'Berhasil Upload file');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_with_folder($id)
    {
        $folders = DocumentFolder::where('id', $id)->first();
        return view('admin.input_archive.document.form-create-file', compact('folders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (isset($request->file_archive)) {
            $file = $request->file('file_archive');
            $path = $file->storeAs('uploads', $file->getClientOriginalName(), 'public');
        } else {
            $path = null;
        }

        $request->validate([
            'name' => 'required|string',
            'file_archive' => 'mimes:pdf|max:20480',
            'keterangan' => 'required|string',
        ]);

        ArchiveFile::create([
            'document_folder_id' => $request->document_folder_id,
            'name_file' => $request->name,
            'path_file' => $path,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('folder.show', ['folder' => $request->document_folder_id])->with('success', 'Berhasil Upload file');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $archives = ArchiveFile::where('id', $id)->first();
        $path = $archives->path_file;


        return view('admin.input_archive.document.archive-show-file', compact('archives'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $file = ArchiveFile::findOrFail($id);
        return view('admin.input_archive.document.archive-file-edit-form', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $file = ArchiveFile::findOrFail($id);

        $request->validate([
            'file_archive' => 'nullable|mimes:pdf|max:20480', // 20MB
        ]);

        if ($request->hasFile('file_archive')) {

            // 1. Hapus file lama jika ada
            if ($file->path_file && Storage::disk('public')->exists($file->path_file)) {
                Storage::disk('public')->delete($file->path_file);
            }

            // 2. Upload file baru
            $uploaded = $request->file('file_archive');
            $filename = $uploaded->getClientOriginalName();

            // Simpan ke storage/public/pdf
            $uploaded->storeAs('uploads', $filename, 'public');

            // 3. Update path di database
            $file->path_file = 'uploads/' . $filename;
        }

        $file->name_file = $request->name;
        $file->keterangan = $request->keterangan;

        $file->save();

        return redirect()->route('folder.show', ['folder' => $file->document_folder_id])->with('success', 'File berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $archive = ArchiveFile::findOrFail($id);

        // if ($archive->path_file && Storage::disk('public')->exists($archive->path_file)) {
        //     Storage::disk('public')->delete($archive->path_file);
        // }

        $archive->delete();

        return redirect()->route('folder.show', ['folder' => $archive->document_folder_id])->with('success', 'File berhasil Dihapus!');
    }
}
