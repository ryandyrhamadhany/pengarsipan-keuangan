<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArchiveFile;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Dokumen tersimpan (sudah upload file)
        $dokumenTersimpan = ArchiveFile::whereNotNull('file_path')->count();

        // Dokumen tidak tersimpan (belum upload file)
        $dokumenTidakTersimpan = ArchiveFile::whereNull('file_path')->count();

        // Jumlah user
        $jumlahUser = User::count();

        return view('admin.admin-dashboard', compact(
            'dokumenTersimpan',
            'dokumenTidakTersimpan',
            'jumlahUser'
        ));
    }
}
