<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $category_id
 * @property string $archive_name
 * @property string|null $from_division
 * @property string $submiter_name
 * @property string $finance_officer_name
 * @property string $revenue_officer_name
 * @property string $file_path_archive
 * @property string $archive_code
 * @property int $nominal
 * @property string $archive_by
 * @property string $disposal_date
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
 * @property string|null $retensi_arsip_aktif
 * @property string|null $retensi_arsip_inaktif
 * @property string|null $nasib_akhir_arsip
 * @property string|null $klasifikasi_keamanan
 * @property string|null $status
 * @property string|null $keterangan
 * @property string|null $link_arsip
 * @property int|null $jenis_rak
 * @property int|null $folder
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereArchiveBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereArchiveCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereArchiveName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereDisposalDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereFilePathArchive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereFinanceOfficerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereFolder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereFromDivision($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereIndeks1($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereIndeks2($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereJenisRak($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereJenisSp2d($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereJenisSpm($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereJumlahHalaman($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereKlasifikasiKeamanan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereKodeKlasifikasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereLinkArsip($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereNasibAkhirArsip($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereNilaiSp2d($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereNoInvoice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereNoItem($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereNoSp2d($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereNoSpby($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereNoSpm($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereNominal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereRetensiArsipAktif($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereRetensiArsipInaktif($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereRevenueOfficerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereSubmiterName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereTglInvoice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereTglSelesaiSp2d($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereTglSp2d($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereTglTerima($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereTingkatPertimbangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DigitalArchive whereUraian($value)
 * @mixin \Eloquent
 */
class DigitalArchive extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'id',
        'category_id',
        'archive_name',
        'from_division',
        'submiter_name',
        'finance_officer_name',
        'revenue_officer_name',
        'file_path_archive',
        'archive_code',
        'nominal',
        'archive_by',
        'disposal_date',
        // 'created_at',
        // 'updated_at',
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
