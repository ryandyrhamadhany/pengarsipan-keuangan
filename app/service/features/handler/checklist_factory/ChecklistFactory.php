<?php

namespace App\service\features\handler\checklist_factory;

use App\Models\BudgetSubmission;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use Illuminate\Http\Request;
use Str;

class ChecklistFactory
{

    private $fileChecklist; // file tamplate
    private $sourcePath; // path file tamplate


    public function __construct()
    {
        // ambil file tamplete checklist dari folder template
        $this->fileChecklist = 'Checklist_main.xlsx';
        $this->sourcePath = 'template/' . $this->fileChecklist;
    }

    // membuat file checklist baru
    public function createChecklist(string $submit_name): string
    {
        // perbaiki nama pengajuan untuk path file
        $namaPengajuan = str_replace(' ', '_', $submit_name);

        // nama file checklist
        $checklistName = str_replace('_main', '', $this->fileChecklist);
        $newFileName = time() . '_' . $namaPengajuan . '_' . $checklistName;
        $destinationPath = 'metadata_pengajuan/' . $newFileName;

        // Cek apakah file source template checklist ada
        if (Storage::disk('private')->exists($this->sourcePath)) {

            // Pastikan folder tujuan ada
            $destinationDir = 'metadata_pengajuan';
            if (!Storage::disk('private')->exists($destinationDir)) {
                Storage::disk('private')->makeDirectory($destinationDir);
            }

            // Copy file
            Storage::disk('private')->copy($this->sourcePath, $destinationPath);
        }

        return $destinationPath;
    }

    // set nama pengajuan di checklist
    public function setSubmitNameInChecklist(string $submit_name): void
    {
        $namaPengajuan = str_replace(' ', '_', $submit_name);
        $checklistName = str_replace('_main', '', $this->fileChecklist);
        $newFileName = time() . '_' . $namaPengajuan . '_' . $checklistName;
        $destinationPath = 'metadata_pengajuan/' . $newFileName;

        if (Storage::disk('private')->exists($destinationPath)) {
            $filePathMetadata = Storage::disk('private')->path($destinationPath);
            $spreadsheet = IOFactory::load($filePathMetadata);
            $worksheet = $spreadsheet->getActiveSheet();
            $worksheet->setCellValue("B3", 'Nama Kegiatan : ' . $submit_name);
            $writer = new Xlsx($spreadsheet);
            $writer->save($filePathMetadata);
        }
    }

    public function setNoKuitansi(Request $request, ?BudgetSubmission $budgetSubmission): void
    {
        if (Storage::disk('private')->exists($budgetSubmission->path_file_requirements_status)) {
            $filePathMetadata = Storage::disk('private')->path($budgetSubmission->path_file_requirements_status);
            $spreadsheet = IOFactory::load($filePathMetadata);
            $worksheet = $spreadsheet->getActiveSheet();
        }
        $worksheet->getCell('B4')->setValue("Nomor : {$request->kuitansi}");
        $writer = new Xlsx($spreadsheet);
        $writer->save($filePathMetadata);
    }

    // cek apakah checklist ada
    public function checklistExists(BudgetSubmission $submission): void
    {
        if (Str::contains($submission->path_file_requirements_status, 'CHECKLIST')) {
            // hapus file requirement sebelumnya
            if (Storage::disk('private')->exists($submission->path_file_requirements_status)) {
                Storage::disk('private')->delete($submission->path_file_requirements_status);
            }

            // buat file baru
            $destinationPath = $this->createChecklist($submission->name);

            $submission->update([
                'path_file_requirements_status' => $destinationPath,
            ]);
        }
    }

    // ambil centang checklist
    public function getChecklistValue(BudgetSubmission $submission): ?array
    {
        if (!Storage::disk('private')->exists($submission->path_file_requirements_status)) {
            return null; // Kembalikan null jika file tidak ditemukan agar tidak crash
        }

        if (Storage::disk('private')->exists($submission->path_file_requirements_status)) {
            $filePathMetadata = Storage::disk('private')->path($submission->path_file_requirements_status);
            $spreadsheet = IOFactory::load($filePathMetadata);
            $worksheet = $spreadsheet->getActiveSheet();
        }

        $namaKegiatan = $worksheet->getCell('B3')->getValue();
        $no = $worksheet->getCell('B4')->getValue();

        $syaratDoc = [];
        $ada = [];
        $tidakada = [];
        $tidakperlu = [];
        $lengkap = [];
        $belum = [];
        $keterangan = [];

        $startCell = 7;
        $endCell = 36;

        for ($i = $startCell; $i <= $endCell; $i++) {
            $syaratDoc[] = $worksheet->getCell("C{$i}")->getValue();
            $ada[] = $worksheet->getCell("D{$i}")->getValue();
            $tidakada[] = $worksheet->getCell("E{$i}")->getValue();
            $tidakperlu[] = $worksheet->getCell("F{$i}")->getValue();
            $lengkap[] = $worksheet->getCell("G{$i}")->getValue();
            $belum[] = $worksheet->getCell("H{$i}")->getValue();
            $keterangan[] = $worksheet->getCell("I{$i}")->getValue();
        }


        $catatan = $worksheet->getCell('B40')->getValue();

        return [
            'nama_kegiatan' => $namaKegiatan,
            'no' => $no,
            'catatan' => $catatan,
            // Ini adalah contoh array di dalam array (Nested Array)
            'checklist_data' => [
                'syarat_doc'  => $syaratDoc,
                'ada'         => $ada,
                'tidak_ada'   => $tidakada,
                'tidak_perlu' => $tidakperlu,
                'lengkap'     => $lengkap,
                'belum'       => $belum,
                'keterangan'  => $keterangan,
            ]
        ];
    }

    // set centang dasar checklist
    public function setDefaultValueChecklist(BudgetSubmission $budgetSubmission): ?array
    {
        if (Storage::disk('private')->exists($budgetSubmission->path_file_requirements_status)) {
            $filePathMetadata = Storage::disk('private')->path($budgetSubmission->path_file_requirements_status);
            $spreadsheet = IOFactory::load($filePathMetadata);
            $worksheet = $spreadsheet->getActiveSheet();
        }

        $namaKegiatan = $worksheet->getCell('B3')->getValue();
        $noKuitansi = $worksheet->getCell('B4')->getValue();

        $startCell = 7;
        $endCell = 36;

        $syaratDoc = [];
        $ada = [];
        $tidakada = [];
        $tidakperlu = [];
        $lengkap = [];
        $belum = [];
        $keterangan = [];

        for ($i = $startCell; $i <= $endCell; $i++) {
            $syaratDoc[] = $worksheet->getCell("C{$i}")->getValue();

            // auto checklist
            if (
                $worksheet->getCell("D{$i}")->getValue() === null &&
                $worksheet->getCell("E{$i}")->getValue() === null &&
                $worksheet->getCell("F{$i}")->getValue() === null
            ) {
                $worksheet->setCellValue("D{$i}", 'Y');
                $writer = new Xlsx($spreadsheet);
                $writer->save($filePathMetadata);
            }

            if (
                $worksheet->getCell("G{$i}")->getValue() === null &&
                $worksheet->getCell("H{$i}")->getValue() === null
            ) {
                $worksheet->setCellValue("G{$i}", 'Y');
                $writer = new Xlsx($spreadsheet);
                $writer->save($filePathMetadata);
            }

            $ada[] = $worksheet->getCell("D{$i}")->getValue();
            $tidakada[] = $worksheet->getCell("E{$i}")->getValue();
            $tidakperlu[] = $worksheet->getCell("F{$i}")->getValue();
            $lengkap[] = $worksheet->getCell("G{$i}")->getValue();
            $belum[] = $worksheet->getCell("H{$i}")->getValue();
            $keterangan[] = $worksheet->getCell("I{$i}")->getValue();
        }

        $catatan = $worksheet->getCell('B40')->getValue();

        return [
            'nama_kegiatan' => $namaKegiatan,
            'no' => $noKuitansi,
            'catatan' => $catatan,
            // Ini adalah contoh array di dalam array (Nested Array)
            'checklist_data' => [
                'syarat_doc'  => $syaratDoc,
                'ada'         => $ada,
                'tidak_ada'   => $tidakada,
                'tidak_perlu' => $tidakperlu,
                'lengkap'     => $lengkap,
                'belum'       => $belum,
                'keterangan'  => $keterangan,
            ]
        ];
    }

    // update nama checklist
    public function updateChecklist(BudgetSubmission $budgetSubmission, Request $request): ?string
    {
        // ubah spasi menjadi underscore
        $namaPengajuan = str_replace(' ', '_', $request->name);

        // nama file checklist
        $checkName = str_replace('_main', '', $this->fileChecklist);
        $newFileName = time() . '_' . $namaPengajuan . '_' . $checkName;
        $destinationPath = 'metadata_pengajuan/' . $newFileName;

        // rename file requirements checklist
        if (
            $budgetSubmission->path_file_requirements_status &&
            Storage::disk('private')->exists($budgetSubmission->path_file_requirements_status)
        ) {
            Storage::disk('private')->move($budgetSubmission->path_file_requirements_status, $destinationPath);
        }

        return $destinationPath;
    }

    // set nilai centang checklist
    public function setValueChecklist(BudgetSubmission $budgetSubmission, Request $request): void
    {
        if (Storage::disk('private')->exists($budgetSubmission->path_file_requirements_status)) {
            $filePathMetadata = Storage::disk('private')->path($budgetSubmission->path_file_requirements_status);
            $spreadsheet = IOFactory::load($filePathMetadata);
            $worksheet = $spreadsheet->getActiveSheet();
        }

        $startCell = 7;
        $endCell = 36;
        $syaratDoc = [];

        for ($i = 0; $startCell <= $endCell; $i++) {

            // baca syarat doc
            $syaratDoc[] = $worksheet->getCell("C{$startCell}")->getValue();

            $ada =  $request->ada[$i] ?? null;
            $ttd =  $request->ttd[$i] ?? null;
            $ket =  $request->keterangan[$i] ?? null;

            $worksheet->setCellValue("D{$startCell}", ($ada == 1) ? 'Y' : '');
            $worksheet->setCellValue("E{$startCell}", ($ada == 0) ? 'Y' : '');
            $worksheet->setCellValue("F{$startCell}", ($ada == 2) ? 'Y' : '');

            $worksheet->setCellValue("G{$startCell}", ($ttd == 1) ? 'Y' : '');
            $worksheet->setCellValue("H{$startCell}", ($ttd == 0) ? 'Y' : '');

            $worksheet->setCellValue("I{$startCell}", $ket);

            $startCell++;
        }

        $worksheet->setCellValue("B41", $request->catatan);

        // save jika sudah ditulis
        $writer = new Xlsx($spreadsheet);
        $writer->save($filePathMetadata);
    }

    public function getValue(string $colomn, BudgetSubmission $budgetSubmission): ?array
    {
        if (Storage::disk('private')->exists($budgetSubmission->path_file_requirements_status)) {
            $filePathMetadata = Storage::disk('private')->path($budgetSubmission->path_file_requirements_status);
            $spreadsheet = IOFactory::load($filePathMetadata);
            $worksheet = $spreadsheet->getActiveSheet();
        }

        $startCekCell = 7;
        $endCekCell = 36;

        $valueResult = [];

        for ($i = $startCekCell; $i <= $endCekCell; $i++) {
            $valueResult[] = $worksheet->getCell("{$colomn}" . "{$i}")->getValue();
        }

        return $valueResult;
    }
}
