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

        $path = Storage::disk('private')->path($file->file_path);

        $originalName = basename($file->file_path);

        return response()->download($path, $originalName);
    }

    public function name_file($id) // id arsip
    {
        $file = ArchiveFile::findOrFail($id);

        $path = Storage::disk('private')->path($file->file_path);

        return response()->file($path);
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
        $folders = DocumentFolder::findOrFail($id);
        return view('admin.input_archive.document.form-create-file', compact('folders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (isset($request->file_archive)) {
            $file = $request->file('file_archive');
            $path = $file->storeAs('archive', $file->getClientOriginalName(), 'private');
        } else {
            $path = null;
        }

        $request->validate([
            'name' => 'required|string',
            'file_archive' => 'mimes:pdf|max:20480',
            'keterangan' => 'required|string',
        ]);

        ArchiveFile::create([
            'folder_id' => $request->folders_id,
            'file_name' => $request->name,
            'file_path' => $path,
            'description' => $request->keterangan,
        ]);

        return redirect()->route('archive.list', ['id' => $request->folders_id])->with('success', 'Berhasil Upload file');
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
            if ($file->file_path && Storage::disk('private')->exists($file->file_path)) {
                Storage::disk('private')->delete($file->file_path);
            }

            // 2. Upload file baru
            $uploaded = $request->file('file_archive');
            $filename = $uploaded->getClientOriginalName();

            // Simpan ke storage/public/pdf
            $uploaded->storeAs('archive', $filename, 'private');

            // 3. Update path di database
            $file->file_path = 'archive/' . $filename;
        }

        $file->file_name = $request->name;
        $file->description = $request->keterangan;

        $file->save();

        return redirect()->route('archive.list', ['id' => $file->folder_id])->with('success', 'File berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $archive = ArchiveFile::findOrFail($id);

        if ($archive->file_path && Storage::disk('private')->exists($archive->file_path)) {
            Storage::disk('private')->delete($archive->file_path);
        }

        $archive->delete();

        return redirect()->route('archive.list', ['id' => $archive->folder_id])->with('success', 'File berhasil Dihapus!');
    }
}
