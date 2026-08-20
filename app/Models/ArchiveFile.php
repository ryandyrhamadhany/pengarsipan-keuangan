<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

/**
 * @property int $id
 * @property int $folder_id
 * @property string $file_name
 * @property string|null $file_path
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $kode_klasifikasi
 * @property string|null $indeks1
 * @property string|null $indeks2
 * @property int|null $no_item
 * @property string|null $uraian
 * @property string|null $no_spby
 * @property string|null $no_spm
 * @property string|null $jenis_spm
 * @property string|null $no_sp2d
 * @property string|null $nilai_sp2d
 * @property string|null $jenis_sp2d
 * @property string|null $tgl_sp2d
 * @property string|null $tgl_selesai_sp2d
 * @property string|null $no_invoice
 * @property string|null $tgl_invoice
 * @property string|null $tgl_terima
 * @property string|null $tingkat_pertimbangan
 * @property int|null $jumlah_halaman
 * @property int|null $retensi_arsip_aktif
 * @property int|null $retensi_arsip_inaktif
 * @property string|null $nasib_akhir_arsip
 * @property string|null $klasifikasi_keamanan
 * @property string|null $status
 * @property string|null $keterangan
 * @property string|null $link_arsip
 * @property int|null $jenis_rak
 * @property int|null $folder
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchiveFile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchiveFile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchiveFile query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchiveFile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchiveFile whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchiveFile whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchiveFile whereFilePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchiveFile whereFolder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchiveFile whereFolderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchiveFile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchiveFile whereIndeks1($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchiveFile whereIndeks2($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchiveFile whereJenisRak($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchiveFile whereJenisSp2d($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchiveFile whereJenisSpm($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchiveFile whereJumlahHalaman($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchiveFile whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchiveFile whereKlasifikasiKeamanan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchiveFile whereKodeKlasifikasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchiveFile whereLinkArsip($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchiveFile whereNasibAkhirArsip($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchiveFile whereNilaiSp2d($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchiveFile whereNoInvoice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchiveFile whereNoItem($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchiveFile whereNoSp2d($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchiveFile whereNoSpby($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchiveFile whereNoSpm($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchiveFile whereRetensiArsipAktif($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchiveFile whereRetensiArsipInaktif($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchiveFile whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchiveFile whereTglInvoice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchiveFile whereTglSelesaiSp2d($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchiveFile whereTglSp2d($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchiveFile whereTglTerima($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchiveFile whereTingkatPertimbangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchiveFile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchiveFile whereUraian($value)
 * @mixin \Eloquent
 */
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
