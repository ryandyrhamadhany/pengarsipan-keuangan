<?php

class sampahKeuangan{
    public function input_arsip() // tidak dipakai lagi
    {
        return redirect()->route('admin.archive');
    }

    public function all_submit() // tidak dipakai lagi
    {
        $all_submit = BudgetSubmission::latest()->paginate(10, ['*'], 'all_submit');
        $not_check_submit = BudgetSubmission::where('requirements_status', 'Belum Diperiksa')->latest()->paginate('10', ['*'], 'not_check');
        $my_proses = BudgetSubmission::where('requirements_status', 'Belum Lengkap')
            ->where('verification_status', 0)
            ->where('finance_officers_id', Auth::id())->latest()
            ->paginate(5, ['*'], 'my_proses');

        return view('keuangan.pengajuan', compact('all_submit', 'not_check_submit', 'my_proses'));
    }

    public function check_pengajuan($id) // tidak dipakai lagi
    {
        $pengajuan = BudgetSubmission::with('user')->findOrFail($id);

        if (Storage::disk('private')->exists($pengajuan->path_file_requirements_status)) {
            $filePathMetadata = Storage::disk('private')->path($pengajuan->path_file_requirements_status);
            $spreadsheet = IOFactory::load($filePathMetadata);
            $worksheet = $spreadsheet->getActiveSheet();
        }

        $namaKegiatan = $worksheet->getCell('B3')->getValue();
        $nokuitansi = $worksheet->getCell('B4')->getValue();
        $kuitansi = trim(preg_replace('/^Nomor\s*:\s*/i', '', $nokuitansi));

        $startCell = 7;
        // $endCell = 36;
        $currentRow = $startCell;
        $maxRows = 100;

        $syaratDoc = [];

        while (count($syaratDoc) < 30 && $currentRow < $maxRows) {
            $datasyarat = $worksheet->getCell("C{$currentRow}")->getValue();

            // Cek apakah cell C kosong (baik null, spasi, atau empty string)
            if ($datasyarat !== null && trim($datasyarat) !== '') {
                $syaratDoc[] = $datasyarat;

                if (
                    $worksheet->getCell("D{$currentRow}")->getValue() !== null ||
                    $worksheet->getCell("E{$currentRow}")->getValue() !== null ||
                    $worksheet->getCell("F{$currentRow}")->getValue() !== null
                ) {
                    $worksheet->setCellValue("D{$currentRow}", 'Y');
                    $writer = new Xlsx($spreadsheet);
                    $writer->save($filePathMetadata);
                    // $dataada = $worksheet->getCell("D{$currentRow}")->getValue();
                } else {
                    $worksheet->setCellValue("D{$currentRow}", 'Y');
                    $writer = new Xlsx($spreadsheet);
                    $writer->save($filePathMetadata);
                    $dataada = $worksheet->getCell("D{$currentRow}")->getValue();
                }

                if (
                    $worksheet->getCell("G{$currentRow}")->getValue() !== null ||
                    $worksheet->getCell("H{$currentRow}")->getValue() !== null
                ) {
                    $worksheet->setCellValue("D{$currentRow}", 'Y');
                    $writer = new Xlsx($spreadsheet);
                    $writer->save($filePathMetadata);
                    // $lengkap = $worksheet->getCell("G{$currentRow}")->getValue();
                } else {
                    $worksheet->setCellValue("G{$currentRow}", 'Y');
                    $writer = new Xlsx($spreadsheet);
                    $writer->save($filePathMetadata);
                    $datalengkap = $worksheet->getCell("G{$currentRow}")->getValue();
                }

                $ada[] = $worksheet->getCell("D{$currentRow}")->getValue();
                $tidakada[] = $worksheet->getCell("E{$currentRow}")->getValue();
                $tidakperlu[] = $worksheet->getCell("F{$currentRow}")->getValue();
                $lengkap[] = $worksheet->getCell("G{$currentRow}")->getValue();
                $belum[] = $worksheet->getCell("H{$currentRow}")->getValue();
                $keterangan[] = $worksheet->getCell("I{$currentRow}")->getValue();

                // dokumen
            }

            $currentRow++;
        }
        // while ($startCell <= $endCell) {
        //     $datasyarat = $worksheet->getCell("C{$startCell}")->getValue();
        //     if($startCell == 21){
        //         $startCell++;
        //         continue;
        //     }
        //     $syaratDoc[] = $datasyarat;
        //     $startCell++;
        // }

        // // ======== dokumen
        // $startCell = 7;
        // $ada = [];
        // while ($startCell <= $endCell) {
        //     if($startCell == 21){
        //         $startCell++;
        //         continue;
        //     }
        //     if (
        //         $worksheet->getCell("D{$startCell}")->getValue() !== null ||
        //         $worksheet->getCell("E{$startCell}")->getValue() !== null ||
        //         $worksheet->getCell("F{$startCell}")->getValue() !== null
        //     ) {
        //         $dataada = $worksheet->getCell("D{$startCell}")->getValue();
        //     } else {
        //         $worksheet->setCellValue("D{$startCell}", 'Y');
        //         $writer = new Xlsx($spreadsheet);
        //         $writer->save($filePathMetadata);
        //         $dataada = $worksheet->getCell("D{$startCell}")->getValue();
        //     }
        //     $ada[] = $dataada;
        //     $startCell++;
        // }
        // $startCell = 7;
        // $tidakada = [];
        // while ($startCell <= $endCell) {
        //     if($startCell == 21){
        //         $startCell++;
        //         continue;
        //     }
        //     $datatidakada = $worksheet->getCell("E{$startCell}")->getValue();
        //     $tidakada[] = $datatidakada;
        //     $startCell++;
        // }
        // $startCell = 7;
        // $tidakperlu = [];
        // while ($startCell <= $endCell) {
        //     if($startCell == 21){
        //         $startCell++;
        //         continue;
        //     }
        //     $datatidakperlu = $worksheet->getCell("F{$startCell}")->getValue();
        //     $tidakperlu[] = $datatidakperlu;
        //     $startCell++;
        // }

        // // ========== tanda tangan
        // $startCell = 7;
        // $lengkap = [];
        // while ($startCell <= $endCell) {
        //     if($startCell == 21){
        //         $startCell++;
        //         continue;
        //     }
        //     if (
        //         $worksheet->getCell("G{$startCell}")->getValue() !== null ||
        //         $worksheet->getCell("H{$startCell}")->getValue() !== null ||
        //         $worksheet->getCell("I{$startCell}")->getValue() !== null
        //     ) {
        //         $datalengkap = $worksheet->getCell("G{$startCell}")->getValue();
        //     } else {
        //         $worksheet->setCellValue("G{$startCell}", 'Y');
        //         $writer = new Xlsx($spreadsheet);
        //         $writer->save($filePathMetadata);
        //         $datalengkap = $worksheet->getCell("G{$startCell}")->getValue();
        //     }
        //     $lengkap[] = $datalengkap;
        //     $startCell++;
        // }
        // $startCell = 7;
        // $belum = [];
        // while ($startCell <= $endCell) {
        //     if($startCell == 21){
        //         $startCell++;
        //         continue;
        //     }
        //     $databelum = $worksheet->getCell("H{$startCell}")->getValue();
        //     $belum[] = $databelum;
        //     $startCell++;
        // }

        // $startCell = 7;
        // $keterangan = [];
        // while ($startCell <= $endCell) {
        //     if($startCell == 21){
        //         $startCell++;
        //         continue;
        //     }
        //     $dataketerangan = $worksheet->getCell("I{$startCell}")->getValue();
        //     $keterangan[] = $dataketerangan;
        //     $startCell++;
        // }

        $catatan = $worksheet->getCell('B40')->getValue();

        $writer = new Xlsx($spreadsheet);
        $writer->save($filePathMetadata);

        return view('keuangan.check-pengajuan', compact('pengajuan', 'namaKegiatan', 'kuitansi', 'syaratDoc', 'ada', 'tidakada', 'tidakperlu', 'lengkap', 'belum', 'keterangan', 'catatan'));
    }
}