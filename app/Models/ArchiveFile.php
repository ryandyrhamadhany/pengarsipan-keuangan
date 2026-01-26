<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ArchiveFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'folder_id',
        // 'jenis_rak',
        'file_name',
        'file_path',
        // 'description',
        'kode_klasifikasi',
        'indeks1',
        'indeks2',
        'no_item',
        'uraian',
        'no_spby',
        'no_spm',
        'jenis_spm',
        'no_sp2d',
        'nilai_sp2d',
        'jenis_sp2d',
        'tgl_sp2d',
        'tgl_selesai_sp2d',
        'no_invoice',
        'tgl_invoice',
        'tgl_terima',
        'tingkat_pertimbangan',
        'jumlah_halaman',
        'retensi_arsip_aktif',
        'retensi_arsip_inaktif',
        'nasib_akhir_arsip',
        'klasifikasi_keamanan',
        'status',
        'keterangan',
        'link_arsip',
    ];
}
