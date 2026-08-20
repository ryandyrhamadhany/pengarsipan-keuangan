<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
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
	class ArchiveFile extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property int|null $finance_officers_id
 * @property int|null $revenue_officer_id
 * @property string $budget_submission_name
 * @property int|null $nominal
 * @property int|null $assigned_payment_method
 * @property int|null $assigned_funding_source
 * @property string|null $path_file_submission
 * @property string $requirements_status
 * @property int $verification_status
 * @property string|null $path_file_requirements_status
 * @property int|null $is_archive
 * @property int $is_marked
 * @property int|null $is_return
 * @property int|null $digital_archive_id
 * @property string|null $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\DigitalArchive|null $category_archive
 * @property-read \App\Models\User|null $finance_officer
 * @property-read \App\Models\FundingSource|null $funding_source
 * @property-read \App\Models\PaymentMethod|null $payment_method
 * @property-read \App\Models\User|null $revenue_officer
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission whereAssignedFundingSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission whereAssignedPaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission whereBudgetSubmissionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission whereDigitalArchiveId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission whereFinanceOfficersId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission whereIsArchive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission whereIsMarked($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission whereIsReturn($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission whereNominal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission wherePathFileRequirementsStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission wherePathFileSubmission($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission whereRequirementsStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission whereRevenueOfficerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission whereVerificationStatus($value)
 * @mixin \Eloquent
 */
	class BudgetSubmission extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $cabinet_name
 * @property string $cabinet_code
 * @property int|null $total_racks
 * @property int|null $total_document
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cabinet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cabinet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cabinet query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cabinet whereCabinetCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cabinet whereCabinetName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cabinet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cabinet whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cabinet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cabinet whereTotalDocument($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cabinet whereTotalRacks($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cabinet whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Cabinet extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $cabinet_id
 * @property string $category_name
 * @property string|null $sub_category
 * @property string|null $year
 * @property int|null $payment_method_id
 * @property int|null $funding_source_id
 * @property string|null $url_icon
 * @property string|null $path_icon
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\FundingSource|null $funding_source
 * @property-read \App\Models\PaymentMethod|null $payment_method
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereCabinetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereCategoryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereFundingSourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category wherePathIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category wherePaymentMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereSubCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereUrlIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereYear($value)
 * @mixin \Eloquent
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
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
	class DigitalArchive extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $category_id
 * @property string|null $rack_name
 * @property string|null $folder_name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category $category
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DocumentFolder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DocumentFolder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DocumentFolder query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DocumentFolder whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DocumentFolder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DocumentFolder whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DocumentFolder whereFolderName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DocumentFolder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DocumentFolder whereRackName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DocumentFolder whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class DocumentFolder extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $funding_source_name
 * @property string|null $sub_category
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FundingSource newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FundingSource newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FundingSource query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FundingSource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FundingSource whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FundingSource whereFundingSourceName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FundingSource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FundingSource whereSubCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FundingSource whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class FundingSource extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $message
 * @property string $type
 * @property string|null $url
 * @property int $is_read
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification whereIsRead($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification whereUserId($value)
 * @mixin \Eloquent
 */
	class Notification extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $payment_method_name
 * @property string|null $sub_category
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod wherePaymentMethodName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod whereSubCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class PaymentMethod extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string $role
 * @property string|null $sub_role
 * @property int $is_privileged
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Notification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereIsPrivileged($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereSubRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

