<?php

use App\Http\Controllers\Admin\AccountManageController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArchiveFileController;
use App\Http\Controllers\Admin\FundingSourceController;
use App\Http\Controllers\Admin\PaymentMethodController;
use App\Http\Controllers\Bendahara\BendaharaController;
use App\Http\Controllers\Keuangan\KeuanganController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Features\domain\Arsip\Archive\ArchiveController;
use App\Http\Controllers\Features\domain\Arsip\ArsipController;
use App\Http\Controllers\Features\domain\Arsip\Cabinet\CabinetController;
use App\Http\Controllers\Features\domain\Arsip\Category\CategoryController;
use App\Http\Controllers\Features\domain\Arsip\DigitalArchive\DigitalArchiveController;
use App\Http\Controllers\Features\domain\Arsip\Folder\FolderController;
use App\Http\Controllers\Features\domain\Arsip\Rack\RackController;
use App\Http\Controllers\Features\domain\Arsip\SubCategory\SubCategoryController;
use App\Http\Controllers\Features\domain\Arsip\Year\YearController;
use App\Http\Controllers\Features\File_Access\ArchiveFileAccessController;
use App\Http\Controllers\Features\File_Access\FileAccessController;
use App\Http\Controllers\Features\Final_Verification\FinalVerificationController;
use App\Http\Controllers\Features\Final_Verification\SearchFinalVerificationController;
use App\Http\Controllers\Features\domain\Pengajuan\ReturnSubmissionController;
use App\Http\Controllers\Features\domain\Pengajuan\SubmissionController;
use App\Http\Controllers\Features\domain\Report\ReportController;
use App\Http\Controllers\Features\domain\Verification\VerificationController;
use App\Http\Controllers\Features\PPSPM_Verification\PPSPMVerificationController;
use App\Http\Controllers\Features\PPSPM_Verification\SearchPPSPMController;
use App\Http\Controllers\Features\Verifikasi\SearchVerificationController;
// use App\Http\Controllers\Features\domain\Keuangan\VerificationController;
use App\Http\Controllers\Kepala\KepalaController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PPSPM\PPSPMController;
use App\Http\Controllers\User\BudgetSubmissionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'verified')->get('/dashboard', function () {
    $role = Auth::user()->role;
    if ($role == "Admin") {
        return redirect()->route('admin.dashboard');
    } else if ($role == "Keuangan") {
        return redirect()->route('keuangan.dashboard');
    } else if ($role == "Bendahara") {
        return redirect()->route('bendahara.dashboard');
    } else if ($role == "PPSPM") {
        return redirect()->route('PPSPM.dashboard');
    } else if ($role == "Kepala") {
        return redirect()->route('kepala.dashboard');
    } else {
        return redirect()->route('user.dashboard');
    }
})->name('dashboard');

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/keuangan/dashboard', [KeuanganController::class, 'index'])->name('keuangan.dashboard');
    Route::get('/bendahara/dashboard', [BendaharaController::class, 'index'])->name('bendahara.dashboard');
    Route::get('/ppspm/dashboard', [PPSPMController::class, 'index'])->name('PPSPM.dashboard');
    Route::get('/divisi/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/kepala/dashboard', [KepalaController::class, 'index'])->name('kepala.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/keuangan/dashboard', [KeuanganController::class, 'index'])->name('keuangan.dashboard');
    Route::get('/bendahara/dashboard', [BendaharaController::class, 'index'])->name('bendahara.dashboard');
    Route::get('/divisi/dashboard', [UserController::class, 'index'])->name('user.dashboard');

    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::post('/notifications/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.readAll');
    Route::delete('/notifications/{id}', [NotificationController::class, 'destroy'])->name('notifications.delete');
    Route::delete('/notifications/read/clear', [NotificationController::class, 'deleteRead'])->name('notifications.deleteRead');
});

require __DIR__ . '/auth.php';



Route::middleware('auth', 'verified')->group(function () {
    // =============================================================== api Submission
    Route::resource("/submit", SubmissionController::class);
    Route::put('/submit/fixing/{id}', [SubmissionController::class, 'fixing'])->name('submit.fixing');
    Route::get('/divisi/report/laporan_pengajuan', [ReportController::class, 'report_submission'])->name('laporan.all.divisi');
    Route::get('/divisi/report/laporan_pengajuan_nominal', [ReportController::class, 'report_submit_nominal'])->name('laporan.all.nominal');

    // =============================================================== api Verification
    Route::get('/verification/search', [SearchVerificationController::class, 'search'])->name('verification.search');
    Route::put('/verification/keuangan/item/verify/{id}', [VerificationController::class, 'verify_keuangan'])->name('verify.keuangan');
    Route::get('/keuangan/report/laporan_pengajuan', [ReportController::class, 'report_submit_nominal'])->name('laporan.all.keuangan');
    Route::get('/keuangan/report/laporan_pengajuan_verifikasi', [ReportController::class, 'report_submit_nominal'])->name('laporan.keuangan.verify');
    // Route::resource('/verification', VerificationController::class);

    // =============================================================== api Final Verification
    Route::put('/verification/bendahara/item/verify/{id}', [VerificationController::class, 'verify_bendahara'])->name('verify.bendahara');
    Route::get('/bendahara/report/laporan_pengajuan', [ReportController::class, 'report_sign_submission'])->name('laporan.all.bendahara');
    Route::get('/bendahara/report/nominal', [ReportController::class, 'report_sign_submission_nominal'])->name('laporan.nominal.bendahara');
    Route::get('/bendahara/report/sign', [ReportController::class, 'report_all_sign_submission'])->name('laporan.sign.bendahara');
    Route::get('/final/search', [SearchFinalVerificationController::class, 'search'])->name('final.search');
    Route::resource('/final', FinalVerificationController::class);

    // =============================================================== api Verification PPSPM
    Route::get('/verification/ppspm/item/verify/{id}', [VerificationController::class, 'verify_ppspm'])->name('verify.ppspm');
    Route::get('/validation/search', [SearchPPSPMController::class, 'search'])->name('validation.search');
    Route::put('/validation/return/{id}', [PPSPMVerificationController::class, 'return'])->name('validation.return');
    Route::resource('/validation', PPSPMVerificationController::class);

    // =============================================================== api file access
    Route::get('/file/stream/{id}', [FileAccessController::class, 'stream'])->name('file.stream');
    Route::get('/file/download/{id}', [FileAccessController::class, 'download'])->name('file.download');
    Route::get('/file/metadata/{id}', [FileAccessController::class, 'download_metadata'])->name('file.access.metadata');
    Route::get('/file/stream/digital/{id}', [ArchiveFileAccessController::class, 'stream_digital_archive'])->name('archive.digital.stream');
    Route::get('/file/download/digital/{id}', [ArchiveFileAccessController::class, 'download_digital_archive'])->name('archive.digital.download');
    Route::get('/file/stream/archive/{id}', [ArchiveFileAccessController::class, 'stream_archive'])->name('archive.stream');
    Route::get('/file/download/archive/{id}', [ArchiveFileAccessController::class, 'download_archive'])->name('archive.download');

    // =============================================================== api arsip
    // Route::resource('/arsip', ArsipController::class);
    Route::resource('/cabinet', CabinetController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/subcategory', SubCategoryController::class);
    Route::resource('/year', YearController::class);
    Route::resource('/rack', RackController::class);
    Route::resource('/folder', FolderController::class);
    Route::resource('/digital', DigitalArchiveController::class);
    Route::resource('/archive', ArchiveController::class);

    // route admin
    Route::get('/administrator/report_account', [AdminController::class, 'report_account_submission'])->name('admin.report_account');
    Route::get('/administrator/report_status', [AdminController::class, 'report_count_status'])->name('admin.report_status');
    Route::resource('/payment', PaymentMethodController::class);
    Route::resource('/funding', FundingSourceController::class);

    // kepala
    Route::get('/kepala/report_aktif', [KepalaController::class, 'report_aktif'])->name('kepala.report_aktif');
    Route::get('/kepala/report_approved', [KepalaController::class, 'report_approved'])->name('kepala.report_approved');
});

// route tampilan
Route::middleware('auth', 'verified')->group(function () {
    // route tampilan user
    Route::get('/divisi/monitor', [UserController::class, 'worklist'])->name('user.monitoring');

    // route tampilan keuangan
    Route::get('/verification/keuangan', [VerificationController::class, 'list_verify_keuangan'])->name('verify.list.keuangan');
    Route::get('/verification/keuangan/item/{id}', [VerificationController::class, 'get_item_keuangan'])->name('verify.item.keuangan');

    // route tampilan bendahara
    Route::get('/verification/bendahara', [VerificationController::class, 'list_verify_bendahara'])->name('verify.list.bendahara');
    Route::get('/verification/bendahara/item/{id}', [VerificationController::class, 'get_item_bendahara'])->name('verify.item.bendahara');

    // route tampilan ppspm
    Route::get('/verification/ppspm', [VerificationController::class, 'list_verify_ppspm'])->name('verify.list.ppspm');
    Route::get('/verification/ppspm/item{id}', [VerificationController::class, 'get_item_ppspm'])->name('verify.item.ppspm');

    //route tampilan arsip
    Route::get('/arsip', [ArsipController::class, 'arsip'])->name('arsip');
    Route::get('/arsip/cabinet', [ArsipController::class, 'cabinet'])->name('arsip.cabinet');
    // Route::get('/arsip/category/{id}', [ArsipController::class, 'category'])->name('arsip.category');
    // Route::get('/arsip/sub_category/{id}', [ArsipController::class, 'sub_category'])->name('arsip.sub_category');
    // Route::get('/arsip/year/{id}', [ArsipController::class, 'year'])->name('arsip.year');
    // Route::get('/arsip/rack/{id}', [ArsipController::class, 'rack'])->name('arsip.rack');
    // Route::get('/arsip/folder/{id}', [ArsipController::class, 'rack'])->name('arsip.folder');
    // Route::get('/arsip/file/{id}', [ArsipController::class, 'archive'])->name('arsip.archive');

    //route tampilan admin
    Route::get('/administrator/setting/environment', [AdminController::class, 'environment'])->name('admin.envi');
    Route::get('/administrator/manage/user', [AdminController::class, 'kelola_user'])->name('admin.kelola');

    // route tampilan report
    Route::get('/report/divisi', [ReportController::class, 'report_pengajuan'])->name('report.submiter');
    Route::get('/report/divisi/all', [ReportController::class, 'my_all_report_pengajuan'])->name('report.submiter.all');
    Route::get('/report/divisi/nominal', [ReportController::class, 'my_total_report_pengajuan'])->name('report.submiter.nominal');

    Route::get('/report/keuangan', [ReportController::class, 'report_keuangan'])->name('report.keuangan');
    Route::get('/report/keuangan/all', [ReportController::class, 'report_all_submit'])->name('report.keuangan.all');
    Route::get('/report/keuangan/verify', [ReportController::class, 'report_verify'])->name('report.keuangan.verify');


    Route::get('/report/bendahara', [ReportController::class, 'report_bendahara'])->name('report.bendahara');
    Route::get('/report/bendahara/all', [ReportController::class, 'report_all_bendahara'])->name('report.bendahara.all');
    Route::get('/report/bendahara/nominal', [ReportController::class, 'report_nominal_bendahara'])->name('report.bendahara.nominal');
    Route::get('/report/bendahara/sign', [ReportController::class, 'report_sign_bendahara'])->name('report.bendahara.sign');


    Route::get('/report/administrator', [ReportController::class, 'report_administrator'])->name('report.administrator');
    Route::get('/report/administrator/account', [ReportController::class, 'report_account'])->name('report.administrator.account');
    Route::get('/report/administrator/count', [ReportController::class, 'report_count'])->name('report.administrator.count');
    Route::get('/report/administrator/divisi/all', [ReportController::class, 'admin_all_divisi'])->name('report.administrator.divisi.all');
    Route::get('/report/administrator/divisi/nominal', [ReportController::class, 'admin_nominal'])->name('report.administrator.divisi.nominal');
    Route::get('/report/administrator/keuangan/all', [ReportController::class, 'admin_all_keuangan'])->name('report.administrator.keuangan.all');
    Route::get('/report/administrator/keuangan/verify', [ReportController::class, 'admin_verify'])->name('report.administrator.keuangan.verify');
    Route::get('/report/administrator/bendahara/all', [ReportController::class, 'admin_all_bendahara'])->name('report.administrator.bendahara.all');
    Route::get('/report/administrator/bendahara/nominal', [ReportController::class, 'admin_nominal_bendahara'])->name('report.administrator.bendahara.nominal');
    Route::get('/report/administrator/bendahara/sign', [ReportController::class, 'admin_sign_bendahara'])->name('report.administrator.bendahara.sign');
    Route::get('/report/administrator/kepala/aktif', [ReportController::class, 'admin_kepala_aktif'])->name('report.administrator.kepala.aktif');
    Route::get('/report/administrator/kepala/approved', [ReportController::class, 'admin_kepala_approved'])->name('report.administrator.kepala.approved');


    Route::get('/report/kepala', [ReportController::class, 'report_kepala'])->name('report.kepala');
    Route::get('/report/kepala/approved', [ReportController::class, 'report_approved'])->name('report.kepala.approved');
    Route::get('/report/kepala/aktif', [ReportController::class, 'report_aktif'])->name('report.kepala.aktif');
    Route::get('/report/kepala/divisi/all', [ReportController::class, 'kepala_all_divisi'])->name('report.kepala.divisi.all');
    Route::get('/report/kepala/divisi/nominal', [ReportController::class, 'kepala_nominal'])->name('report.kepala.divisi.nominal');
    Route::get('/report/kepala/keuangan/all', [ReportController::class, 'kepala_all_keuangan'])->name('report.kepala.keuangan.all');
    Route::get('/report/kepala/keuangan/verify', [ReportController::class, 'kepala_verify'])->name('report.kepala.keuangan.verify');
    Route::get('/report/kepala/bendahara/all', [ReportController::class, 'kepala_all_bendahara'])->name('report.kepala.bendahara.all');
    Route::get('/report/kepala/bendahara/nominal', [ReportController::class, 'kepala_nominal_bendahara'])->name('report.kepala.bendahara.nominal');
    Route::get('/report/kepala/bendahara/sign', [ReportController::class, 'kepala_sign_bendahara'])->name('report.kepala.bendahara.sign');
});










// =============================================================================================== route tampilan admin
Route::get('/admin/search', [AdminController::class, 'search_archive'])->name('admin.search');

// Route::get('/create/category/{id}', [CategoryController::class, 'create_category_form_cabinet'])->name('category.create');
// Route::get('/list/category/{id}', [CategoryController::class, 'all_list'])->name('category.list');
// Route::delete('/delete/category/{id}', [CategoryController::class, 'destroy_category'])->name('category.delete');
// Route::get('/edit/category/{id}', [CategoryController::class, 'edit_category'])->name('category.edit');
// Route::put('/update/category/{id}', [CategoryController::class, 'update_category'])->name('category.update');

// Route::get('/list/subcategory/{id}', [CategoryController::class, 'create_sub_category'])->name('subcategory.create');
// Route::post('/create/subcategory/{id}', [CategoryController::class, 'add_subcategory'])->name('subcategory.store');
// Route::get('/create/subcategory/{id}', [CategoryController::class, 'sub_category_show'])->name('subcategory.show');
// Route::get('/edit/subcategory/{id}', [CategoryController::class, 'edit_subcategory'])->name('subcategory.edit');
// Route::put('/update/subcategory/{id}', [CategoryController::class, 'update_subcategory'])->name('subcategory.update');
// Route::delete('/delete/subcategory/{id}', [CategoryController::class, 'destroy_subcategory'])->name('subcategory.delete');

// Route::get('/list/year/{id}', [CategoryController::class, 'create_year'])->name('year.create');
// Route::post('/create/year/{id}', [CategoryController::class, 'add_year'])->name('year.store');
// Route::delete('/delete/year/{id}', [CategoryController::class, 'destroy_year'])->name('year.delete');
// Route::get('/edit/year/{id}', [CategoryController::class, 'edit_year'])->name('year.edit');
// Route::put('/update/year/{id}', [CategoryController::class, 'update_year'])->name('year.update');
// Route::get('/list/rack/{id}', [CategoryController::class, 'year_show'])->name('year.show');

// Route::get('/create/rack/{id}', [FolderController::class, 'create_rack'])->name('rack.create');
// Route::post('/add/rack', [FolderController::class, 'add_rack'])->name('rack.store');
// Route::get('/edit/rack/{id}', [FolderController::class, 'edit_rack'])->name('rack.edit');
// Route::put('/update/rack/{id}', [FolderController::class, 'update_rack'])->name('rack.update');
// Route::delete('/delete/rack/{id}', [FolderController::class, 'destroy_rack'])->name('rack.delete');
// Route::get('/list/folder/{id}', [FolderController::class, 'rack_show'])->name('rack.show');

// Route::get('/create/folder/{id}', [FolderController::class, 'create_folder'])->name('folder.create');
// Route::post('/create/folder/{id}', [FolderController::class, 'add_folder'])->name('folder.store');
// Route::get('/edit/folder/{id}', [FolderController::class, 'edit_folder'])->name('folder.edit');
// Route::put('/update/folder/{id}', [FolderController::class, 'update_folder'])->name('folder.update');
// Route::delete('/delete/folder/{id}', [FolderController::class, 'destroy_folder'])->name('folder.delete');

// Route::get('/list/archive/{id}', [FolderController::class, 'folder_show'])->name('archive.list');
// Route::get('/input/archive', [AdminController::class, 'input_archive'])->name('admin.archive');
// Route::get('/file/create/{id}', [ArchiveFileController::class, 'create_with_folder'])->name('file.create_with_folder');
// Route::get('/file/download/archive/{id}', [ArchiveFileController::class, 'download_file'])->name('file.download.archive');
// Route::get('/file/{id}', [ArchiveFileController::class, 'name_file'])->name('archive.looks');
// Route::post('/file/upload/{id}', [ArchiveFileController::class, 'update_new_file'])->name('archive.upload.store');



Route::get('/administrator/report', [AdminController::class, 'report'])->name('admin.report');


// =================================================================== Route tampilan User
// Route::get('/pengajuan', [UserController::class, 'pengajuan'])->name('user.pengajuan');





// ==================================================================== Route Keuangan
Route::get('/keuangan/input', [KeuanganController::class, 'input_arsip'])->name('keuangan.input');
// Route::get('/keuangan/check/{id}', [KeuanganController::class, 'check_pengajuan'])->name('keuangan.check'); // diganti verif show
Route::put('/keuangan/update/{id}', [BudgetSubmissionController::class, 'update_check'])->name('keuangan.checkandupate');
// Route::put('/keuangan/perbaiki/{id}', [BudgetSubmissionController::class, 'perbaikan'])->name('keuangan.perbaiki');
// Route::get('/keuangan/pengajuan', [KeuanganController::class, 'all_submit'])->name('keuangan.pengajuan');
// Route::get('/keuangan/search', [KeuanganController::class, 'search_pengajuan'])->name('keuangan.search');
// Route::get('/keuangan/report', [KeuanganController::class, 'report'])->name('keuangan.report');
// Route::get('/keuangan/report/all_submission', [KeuanganController::class, 'report_all_submission'])->name('keuangan.report.semua_pengajuan');
// Route::get('/keuangan/report/verify_submission', [KeuanganController::class, 'report_verification_submission'])->name('keuangan.report.pengajuan_diverifikasi');

// ===================================================================== Route Bendahara
Route::get('/bendahara/sign/{id}', [BendaharaController::class, 'document_sign'])->name('bendahara.sign');
Route::put('/bendahara/verifikasi/{id}', [BudgetSubmissionController::class, 'final_verification'])->name('bendahara.verification');
// Route::get('/archive/pengajuan/{id}', [DigitalArchiveController::class, 'show_in_year'])->name('digital.archive');
// Route::get('/archive/pengajuan/show/{id}', [DigitalArchiveController::class, 'show_digital_archive'])->name('digital.archive.show');
// Route::get('/bendahara/pengajuan', [BendaharaController::class, 'pengajuan'])->name('bendahara.pengajuan');
// Route::get('/bendahara/search', [BendaharaController::class, 'search_pengajuan'])->name('bendahara.search');
Route::get('/bendahara/report', [BendaharaController::class, 'report'])->name('bendahara.report');
Route::get('/bendahara/report_sign', [BendaharaController::class, 'report_sign_submission'])->name('bendahara.report_sign');
Route::get('/bendahara/report_sign_nominal', [BendaharaController::class, 'report_sign_submission_nominal'])->name('bendahara.report_sign_nominal');
Route::get('/bendahara/report_sign_all', [BendaharaController::class, 'report_all_sign_submission'])->name('bendahara.report_sign_all');

// Route::get('/lihat/digital/{id}', [DigitalArchiveController::class, 'name_file'])->name('lihat.digital_archive');
// Route::get('/download/digital/{id}', [DigitalArchiveController::class, 'download_file'])->name('download.digital_archive');


// =================================================================== Route Kepala 
Route::get('/kepala/report', [KepalaController::class, 'report'])->name('kepala.report');


// =================================================================== Route Resource
// Route::resource('/cabinet', CabinetController::class);
// Route::resource('/category', CategoryController::class);
Route::resource('/document/file', ArchiveFileController::class);
// Route::resource('/document/search', SearchController::class);

Route::resource('/account', AccountManageController::class);


Route::resource('/pengajuan', BudgetSubmissionController::class);
// Route::resource('/archive/digital', DigitalArchiveController::class);

Route::get('register', [RegisteredUserController::class, 'create'])->name('register');

// Route::resource('/digital', DigitalArchiveController::class);

// ======================================================================= costum global
// Route::get('/viewfile/{id}', [BudgetSubmissionController::class, 'lihat_pengajuan'])->name('view.file');
// Route::get('/file/download/{id}', [BudgetSubmissionController::class, 'download_pengajuan'])->name('download.file');
// Route::get('/metadata/download/{id}', [BudgetSubmissionController::class, 'download_metadata_pengajuan'])->name('download.metadata');
