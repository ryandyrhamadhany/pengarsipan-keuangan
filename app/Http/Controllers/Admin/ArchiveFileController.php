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
        $path = $file->storeAs('uploads', $file->getClientOriginalName(), 'private');

        $archives = ArchiveFile::findOrFail($id);

        $archives->update([
            'file_path' => $path,
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
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('archive', $filename, 'private');
        } else {
            $path = null;
        }

        // $request->validate([
        //     // 'jenis_rak' => 'required|string|max:255',
        //     'file_name' => 'required|string|max:255',
        //     // 'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx',
        //     'kode_klasifikasi' => 'nullable|string|max:255',
        //     'indeks1' => 'nullable|string|max:255',
        //     'indeks2' => 'nullable|string|max:255',
        //     'no_item' => 'nullable|string|max:255',
        //     'uraian' => 'nullable|string',
        //     'no_spby' => 'nullable|string|max:255',
        //     'no_spm' => 'nullable|string|max:255',
        //     'jenis_spm' => 'nullable|string|max:255',
        //     'no_sp2d' => 'nullable|string|max:255',
        //     'nilai_sp2d' => 'nullable|numeric',
        //     'jenis_sp2d' => 'nullable|string|max:255',
        //     'tgl_sp2d' => 'nullable|date',
        //     'tgl_selesai_sp2d' => 'nullable|date',
        //     'no_invoice' => 'nullable|string|max:255',
        //     'tgl_invoice' => 'nullable|string|max:255',
        //     'tgl_terima' => 'nullable|date',
        //     'tingkat_pertimbangan' => 'nullable|string|max:255',
        //     'jumlah_halaman' => 'nullable|integer',
        //     'retensi_arsip_aktif' => 'nullable|integer',
        //     'retensi_arsip_inaktif' => 'nullable|integer',
        //     'nasib_akhir_arsip' => 'nullable|string|max:255',
        //     'klasifikasi_keamanan' => 'nullable|string|max:255',
        //     'status' => 'required|string|max:50',
        //     'keterangan' => 'nullable|string',
        //     'link_arsip' => 'nullable|string|max:255',
        //     'file_archive' => 'mimes:pdf|max:20480',
        // ]);

        ArchiveFile::create([
            'folder_id' => $request->folder_id,
            'file_name' => $request->file_name,
            'file_path' => $path,
            'kode_klasifikasi' => $request->kode_klasifikasi,
            'indeks1' => $request->indeks1,
            'indeks2' => $request->indeks2,
            'no_item' => $request->no_item,
            'uraian' => $request->uraian,
            'no_spby' => $request->no_spby,
            'no_spm' => $request->no_spm,
            'jenis_spm' => $request->jenis_spm,
            'no_sp2d' => $request->no_sp2d,
            'nilai_sp2d' => $request->nilai_sp2d,
            'jenis_sp2d' => $request->jenis_sp2d,
            'tgl_sp2d' => $request->tgl_sp2d,
            'tgl_selesai_sp2d' => $request->tgl_selesai_sp2d,
            'no_invoice' => $request->no_invoice,
            'tgl_invoice' => $request->tgl_invoice,
            'tgl_terima' => $request->tgl_terima,
            'tingkat_pertimbangan' => $request->tingkat_pertimbangan,
            'jumlah_halaman' => $request->jumlah_halaman,
            'retensi_arsip_aktif' => $request->retensi_arsip_aktif,
            'retensi_arsip_inaktif' => $request->retensi_arsip_inaktif,
            'nasib_akhir_arsip' => $request->nasib_akhir_arsip,
            'klasifikasi_keamanan' => $request->klasifikasi_keamanan,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
            'link_arsip' => $request->link_arsip,
        ]);

        return redirect()->route('archive.list', ['id' => $request->folder_id])->with('success', 'Berhasil Upload file');
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

        // $validated = $request->validate([
        //     'file_name' => 'required|string|max:255',
        //     'kode_klasifikasi' => 'required|string|max:255',
        //     'indeks1' => 'required|string|max:255',
        //     'indeks2' => 'required|string|max:255',
        //     'no_item' => 'required|string|max:255',
        //     'uraian' => 'required|string',

        //     'no_spby' => 'required|string|max:255',
        //     'no_spm' => 'required|string|max:255',
        //     'jenis_spm' => 'required|string|max:255',
        //     'nilai_sp2d' => 'required|numeric',

        //     'tgl_sp2d' => 'required|date',
        //     'tgl_selesai_sp2d' => 'required|date',
        //     'tgl_invoice' => 'required|string|max:255',
        //     'tgl_terima' => 'required|date',

        //     'no_invoice' => 'required|string|max:255',
        //     'tingkat_pertimbangan' => 'required|string|max:255',
        //     'jumlah_halaman' => 'required|integer',

        //     'retensi_arsip_aktif' => 'required|integer',
        //     'retensi_arsip_inaktif' => 'required|integer',
        //     'nasib_akhir_arsip' => 'required|string|max:255',
        //     'klasifikasi_keamanan' => 'required|string|max:255',

        //     'status' => 'required|string|max:50',
        //     'keterangan' => 'required|string',

        //     'file_archive' => 'nullable|mimes:pdf|max:20480',
        // ]);

        if ($request->hasFile('file_archive')) {

        if ($file->file_path && Storage::disk('private')->exists($file->file_path)) {
            Storage::disk('private')->delete($file->file_path);
        }

        $uploaded = $request->file('file_archive');
        $filename = time() . '_' .$uploaded->getClientOriginalName();
        $uploaded->storeAs('archive', $filename, 'private');

        $validated['file_path'] = 'archive/' . $filename;
    }

    $file->update($validated);

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
