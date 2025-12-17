<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Mpdf\Mpdf;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.pengajuan.pengajuan');
    }

    public function update_check(Request $request, $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        if (Storage::disk('public')->exists($pengajuan->path_file_status_kelengkapan)) {
            $filePathMetadata = Storage::disk('public')->path($pengajuan->path_file_status_kelengkapan);
            $spreadsheet = IOFactory::load($filePathMetadata);
            $worksheet = $spreadsheet->getActiveSheet();
        }

        $index = 0;      // mengikuti array dari Blade
        $row   = 7;      // mengikuti baris awal Excel
        $endRow = 38;    // baris akhir Excel

        while ($row <= $endRow) {

            $ada = $request->ada[$index] ?? null;
            $ttd = $request->ttd[$index] ?? null;
            $ket = $request->keterangan[$index] ?? '';

            // D = Ada
            // E = Tidak Ada
            // F = TTD Lengkap
            // G = TTD Belum
            // H = Keterangan

            $worksheet->setCellValue("D{$row}", ($ada == 1) ? 'Y' : '');
            $worksheet->setCellValue("E{$row}", ($ada == 0) ? 'Y' : '');

            $worksheet->setCellValue("F{$row}", ($ttd == 1) ? 'Y' : '');
            $worksheet->setCellValue("G{$row}", ($ttd == 0) ? 'Y' : '');

            $worksheet->setCellValue("H{$row}", $ket);

            // NEXT
            $row++;
            $index++;
        }
        $worksheet->setCellValue("B41", $request->catatan);
        $writer = new Xlsx($spreadsheet);
        $writer->save($filePathMetadata);

        // check kondisi kelengkapan
        $row   = 7;
        $endRow = 38;
        $status_lengkap = false;
        while ($row <= $endRow) {
            $valueADA = $worksheet->getCell("D{$row}")->getValue();
            $valueLengkap = $worksheet->getCell("F{$row}")->getValue();
            if ($valueADA === '' || $valueADA === null) {
                $status_lengkap = 'Belum Lengkap';
                $status_verifikasi = false;
                break;
            }
            if ($valueLengkap === '' || $valueLengkap === null) {
                $status_lengkap = 'Belum Lengkap';
                $status_verifikasi = false;
                break;
            }
            $status_lengkap = 'Lengkap';
            $status_verifikasi = true;

            $row++;
        }

        $pengajuan->update([
            'finance_officers_id' => Auth::user()->id,
            'message' => $request->catatan,
            'status_kelengkapan' => $status_lengkap,
            'status_verifikasi' => $status_verifikasi,
            'status_dikembalikan' => 1,
        ]);

        return redirect()->route('keuangan.dashboard')->with('success', 'Berhasil kirim tanggapan');
    }

    public function perbaikan(Request $request, $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $request->validate([
            'file_pengajuan' => 'mimes:pdf|max:20480|nullable',
        ]);

        if ($request->file_pengajuan) {
            if ($pengajuan->path_file_pengajuan && Storage::disk('public')->exists($pengajuan->path_file_pengajuan)) {
                Storage::disk('public')->delete($pengajuan->path_file_pengajuan);

                $file = $request->file('file_pengajuan');
                $path = $file->storeAs('pengajuan', $file->getClientOriginalName(), 'public');
            }
        } else {
            $path = $pengajuan->path_file_pengajuan;
        }

        // $fileName = 'CHECKLIST.xlsx';
        // $sourcePath = 'template/' . $fileName;
        // // ubah spasi menjadi underscore
        // $namaPengajuan = str_replace(' ', '_', $request->nama_pengajuan);
        // $newFileName = $namaPengajuan . '_' . $fileName;
        // $destinationPath = 'metadata_pengajuan/' . $newFileName;

        // if ($pengajuan->path_file_status_kelengkapan && Storage::disk('public')->exists($pengajuan->path_file_status_kelengkapan)) {
        //     Storage::disk('public')->move($pengajuan->path_file_status_kelengkapan, $destinationPath);
        // }

        $pengajuan->update([
            'path_file_pengajuan' => $path,
            'status_dikembalikan' => 0,
            // 'path_file_status_kelengkapan' => $destinationPath,
        ]);

        return redirect()->route('user.worklist')->with('success', 'Berhasil Mengirim Pengajuan');
    }

    public function download_pengajuan($id)
    {
        $file_metadata = Pengajuan::findOrFail($id);

        $path = Storage::disk('public')->path($file_metadata->path_file_pengajuan);

        $fileName = basename($file_metadata->path_file_pengajuan);

        return response()->download($path, $fileName);
    }

    public function final_verification(Request $request, $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        // === TENTUKAN FILE SOURCE ===
        if ($request->hasFile('file_pengajuan')) {

            if (
                $pengajuan->path_file_pengajuan &&
                Storage::disk('public')->exists($pengajuan->path_file_pengajuan)
            ) {
                Storage::disk('public')->delete($pengajuan->path_file_pengajuan);
            }

            $file = $request->file('file_pengajuan');
            $filename = $file->getClientOriginalName();
            $sourcePath = $file->storeAs('pengajuan', $filename, 'public');
        } else {
            $sourcePath = $pengajuan->path_file_pengajuan;
        }

        // === TAMBAH WATERMARK ===
        $this->addWatermarkToPdf($sourcePath);

        // === UPDATE DB ===
        $pengajuan->update([
            'path_file_pengajuan' => $sourcePath,
            'status_diarsipkan'   => 1,
        ]);

        return redirect()
            ->route('bendahara.dashboard')
            ->with('success', 'Berhasil verifikasi final pengajuan');
    }

    private function addWatermarkToPdf(string $filePath)
    {
        if (!Storage::disk('public')->exists($filePath)) {
            Log::error('File PDF tidak ditemukan: ' . $filePath);
            throw new \Exception('File PDF tidak ditemukan');
        }

        $fullPath = Storage::disk('public')->path($filePath);

        $mpdf = new Mpdf([
            'tempDir' => storage_path('app/mpdf'),
        ]);

        // === LOAD FILE PDF ASLI ===
        $pageCount = $mpdf->SetSourceFile($fullPath);

        for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {

            $tplId = $mpdf->ImportPage($pageNo);
            $size  = $mpdf->getTemplateSize($tplId);

            $mpdf->AddPageByArray([
                'orientation' => $size['orientation'],
                'width'       => $size['width'],
                'height'      => $size['height'],
            ]);

            $mpdf->UseTemplate($tplId);

            // === GARIS MERAH SOLID DI KIRI ===
            $mpdf->SetDrawColor(255, 0, 0);
            $mpdf->SetLineWidth(2);
            $mpdf->Line(15, 0, 15, $size['height']);

            // === WATERMARK GAMBAR (80% HALAMAN, CENTER) ===
            $watermarkPath = storage_path('app/public/images/watermark.png');

            if (file_exists($watermarkPath)) {

                [$imgW, $imgH] = getimagesize($watermarkPath);
                $imgRatio = $imgW / $imgH;

                // Target maksimum 80% halaman
                $maxW = $size['width'] * 0.8;
                $maxH = $size['height'] * 0.8;

                // Hitung ukuran dengan menjaga rasio
                if ($maxW / $maxH > $imgRatio) {
                    // tinggi pembatas
                    $wmHeight = $maxH;
                    $wmWidth  = $wmHeight * $imgRatio;
                } else {
                    // lebar pembatas
                    $wmWidth  = $maxW;
                    $wmHeight = $wmWidth / $imgRatio;
                }

                // Center posisi
                $x = ($size['width']  - $wmWidth)  / 2;
                $y = ($size['height'] - $wmHeight) / 2;

                $mpdf->SetAlpha(0.2);
                $mpdf->Image($watermarkPath, $x, $y, $wmWidth, $wmHeight);
                $mpdf->SetAlpha(1);
            }
        }

        $mpdf->Output($fullPath, 'F');

        Log::info('Watermark PDF berhasil: ' . $filePath);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pengajuan' => 'required|string',
            'file' => 'mimes:pdf|max:51200|nullable',
        ]);

        $iduser = Auth::id();
        $status_kelengkapan = 'Belum Diperiksa';
        $status_verifikasi = 0;

        // simpan file pdf pengajuan
        if (isset($request->file)) {
            $file = $request->file('file');
            $path = $file->storeAs('pengajuan', $file->getClientOriginalName(), 'public');
        } else {
            $path = null;
        }

        // copy file checklist untuk kelengkapan pengajuan
        $fileName = 'CHECKLIST.xlsx';
        $sourcePath = 'template/' . $fileName;
        // ubah spasi menjadi underscore
        $namaPengajuan = str_replace(' ', '_', $request->nama_pengajuan);
        $newFileName = $namaPengajuan . '_' . $fileName;
        $destinationPath = 'metadata_pengajuan/' . $newFileName;

        // Cek apakah file source ada
        if (Storage::disk('public')->exists($sourcePath)) {

            // Pastikan folder tujuan ada
            $destinationDir = 'metadata_pengajuan';
            if (!Storage::disk('public')->exists($destinationDir)) {
                Storage::disk('public')->makeDirectory($destinationDir);
            }

            // Copy file
            Storage::disk('public')->copy($sourcePath, $destinationPath);
        }

        $pengajuan = Pengajuan::create([
            'user_id' => $iduser,
            'pengajuan_name' => $request->nama_pengajuan,
            'path_file_pengajuan' => $path,
            'status_kelengkapan' => $status_kelengkapan,
            'status_verifikasi' => $status_verifikasi,
            'path_file_status_kelengkapan' => $destinationPath,
            'status_diarsipkan' => 0,
            'status_dikembalikan' => 0,
            'message' => null,
        ]);

        if (Storage::disk('public')->exists($pengajuan->path_file_status_kelengkapan)) {
            $filePathMetadata = Storage::disk('public')->path($pengajuan->path_file_status_kelengkapan);
            $spreadsheet = IOFactory::load($filePathMetadata);
            $worksheet = $spreadsheet->getActiveSheet();
            $worksheet->setCellValue("B3", 'Nama Kegiatan : ' . $request->nama_pengajuan);
            $writer = new Xlsx($spreadsheet);
            $writer->save($filePathMetadata);
        }

        return redirect()->route('user.worklist')->with('success', 'Berhasil Mengirim Pengajuan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pengajuan = Pengajuan::with('finance_officer')->findOrFail($id);
        if (Storage::disk('public')->exists($pengajuan->path_file_status_kelengkapan)) {
            $filePathMetadata = Storage::disk('public')->path($pengajuan->path_file_status_kelengkapan);
            $spreadsheet = IOFactory::load($filePathMetadata);
            $worksheet = $spreadsheet->getActiveSheet();
        }

        $namaKegiatan = $worksheet->getCell('B3')->getValue();
        $no = $worksheet->getCell('B4')->getValue();

        $startCell = 7;
        $endCell = 38;

        $syaratDoc = [];
        while ($startCell <= $endCell) {
            $datasyarat = $worksheet->getCell("C{$startCell}")->getValue();
            $syaratDoc[] = $datasyarat;
            $startCell++;
        }

        // ======== dokumen
        $startCell = 7;
        $ada = [];
        while ($startCell <= $endCell) {
            $dataada = $worksheet->getCell("D{$startCell}")->getValue();
            $ada[] = $dataada;
            $startCell++;
        }
        $startCell = 7;
        $tidakada = [];
        while ($startCell <= $endCell) {
            $datatidakada = $worksheet->getCell("E{$startCell}")->getValue();
            $tidakada[] = $datatidakada;
            $startCell++;
        }

        // ========== tanda tangan
        $startCell = 7;
        $lengkap = [];
        while ($startCell <= $endCell) {
            $datalengkap = $worksheet->getCell("F{$startCell}")->getValue();
            $lengkap[] = $datalengkap;
            $startCell++;
        }
        $startCell = 7;
        $belum = [];
        while ($startCell <= $endCell) {
            $databelum = $worksheet->getCell("G{$startCell}")->getValue();
            $belum[] = $databelum;
            $startCell++;
        }

        $startCell = 7;
        $keterangan = [];
        while ($startCell <= $endCell) {
            $dataketerangan = $worksheet->getCell("H{$startCell}")->getValue();
            $keterangan[] = $dataketerangan;
            $startCell++;
        }

        $catatan = $worksheet->getCell('B40')->getValue();

        return view('user.pengajuan.pengajuan-show', compact('pengajuan', 'namaKegiatan', 'no', 'syaratDoc', 'ada', 'tidakada', 'lengkap', 'belum', 'keterangan', 'catatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $roles = Role::all();
        return view('user.pengajuan.pengajuan-edit', compact('pengajuan', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) // belum sempurna
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $request->validate([
            'nama_pengajuan' => 'required|string',
            'divisi' => 'required|string',
            'file' => 'mimes:pdf|max:20480|nullable',
        ]);

        if ($request->file) {
            if ($pengajuan->path_file_pengajuan && Storage::disk('public')->exists($pengajuan->path_file_pengajuan)) {
                Storage::disk('public')->delete($pengajuan->path_file_pengajuan);

                $file = $request->file('file');
                $path = $file->storeAs('pengajuan', $file->getClientOriginalName(), 'public');
            }
        } else {
            $path = $pengajuan->path_file_pengajuan;
        }

        $fileName = 'CHECKLIST.xlsx';
        $sourcePath = 'template/' . $fileName;
        // ubah spasi menjadi underscore
        $namaPengajuan = str_replace(' ', '_', $request->nama_pengajuan);
        $newFileName = $namaPengajuan . '_' . $fileName;
        $destinationPath = 'metadata_pengajuan/' . $newFileName;

        if ($pengajuan->path_file_status_kelengkapan && Storage::disk('public')->exists($pengajuan->path_file_status_kelengkapan)) {
            Storage::disk('public')->move($pengajuan->path_file_status_kelengkapan, $destinationPath);
        }

        $pengajuan->update([
            'pengajuan_name' => $request->nama_pengajuan,
            'bagian' => $request->divisi,
            'path_file_pengajuan' => $path,
            'path_file_status_kelengkapan' => $destinationPath,
        ]);

        return redirect()->route('user.worklist')->with('success', 'Berhasil Mengirim Pengajuan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        if ($pengajuan->path_file_pengajuan && Storage::disk('public')->exists($pengajuan->path_file_pengajuan)) {
            Storage::disk('public')->delete($pengajuan->path_file_pengajuan);
        }

        if ($pengajuan->path_file_status_kelengkapan && Storage::disk('public')->exists($pengajuan->path_file_status_kelengkapan)) {
            Storage::disk('public')->delete($pengajuan->path_file_status_kelengkapan);
        }

        $pengajuan->delete();

        return redirect()->route('user.worklist')->with('success', 'Berhasil Mengirim Pengajuan');
    }
}
