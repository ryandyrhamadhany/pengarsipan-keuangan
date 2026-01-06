<?php

use App\Http\Controllers\Admin\AccountManageController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArchiveFileController;
use App\Http\Controllers\Admin\CabinetController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DocumentFolderController;
use App\Http\Controllers\Admin\DocumentRackController;
use App\Http\Controllers\Admin\SearchController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\YearController;
use App\Http\Controllers\Bendahara\BendaharaController;
use App\Http\Controllers\Bendahara\DigitalArchiveController;
use App\Http\Controllers\Keuangan\KeuanganController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\PengajuanController;
use App\Http\Controllers\User\UserController;
use App\Models\Pengajuan;
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
    } else {
        return redirect()->route('user.dashboard');
    }
})->name('dashboard');

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/keuangan/dashboard', [KeuanganController::class, 'index'])->name('keuangan.dashboard');
    Route::get('/bendahara/dashboard', [BendaharaController::class, 'index'])->name('bendahara.dashboard');
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// =============================================================================================== route tampilan admin
Route::get('/input/archive', [AdminController::class, 'input_archive'])->name('admin.archive');
Route::get('/category/list/{id}', [CategoryController::class, 'index_list'])->name('category.list_with_cabinet');
Route::get('/category/create/{id}', [CategoryController::class, 'create_with_cabinet'])->name('category.create_with_cabinet');
Route::get('/subcategory/create/{id}', [SubCategoryController::class, 'create_with_category'])->name('subcategory.create_with_category');
Route::get('/year/create/{id}', [YearController::class, 'create_with_category'])->name('year.create_with_category');
Route::get('/subyear/create/{id}', [YearController::class, 'create_with_subcategory'])->name('subyear.create_with_subcategory');
Route::get('/rak/create/{id}', [DocumentRackController::class, 'create_with_year'])->name('rack.create_with_year');
Route::get('/folder/create/{id}', [DocumentFolderController::class, 'create_wit_rack'])->name('folder.create_with_rack');
Route::get('/file/create/{id}', [ArchiveFileController::class, 'create_with_folder'])->name('file.create_with_folder');
Route::get('/file/download/{id}', [ArchiveFileController::class, 'download_file'])->name('archive.download');
Route::post('/file/upload/{id}', [ArchiveFileController::class, 'update_new_file'])->name('archive.upload.store');

Route::get('/kelola/user', [AdminController::class, 'kelola_user'])->name('admin.kelola');

// =================================================================== Route tampilan User
// Route::get('/pengajuan', [UserController::class, 'pengajuan'])->name('user.pengajuan');
Route::get('/worklist', [UserController::class, 'worklist'])->name('user.worklist');


// ==================================================================== Route Keuangan
Route::get('/keuangan/input', [KeuanganController::class, 'input_arsip'])->name('keuangan.input');
Route::get('/keuangan/check/{id}', [KeuanganController::class, 'check_pengajuan'])->name('keuangan.check');
Route::put('/keuangan/update/{id}', [PengajuanController::class, 'update_check'])->name('keuangan.checkandupate');
Route::put('/keuangan/perbaiki/{id}', [PengajuanController::class, 'perbaikan'])->name('keuangan.perbaiki');
Route::middleware('auth')->get('/keuangan/pengajuan', function () {
    $pengajuans = \App\Models\Pengajuan::all();
    return view('keuangan.pengajuan', compact('pengajuans'));
})->name('keuangan.pengajuan');


// ===================================================================== Route Bendahara
Route::get('/bendahara/sign/{id}', [BendaharaController::class, 'document_sign'])->name('bendahara.sign');
Route::put('/bendahara/verifikasi/{id}', [PengajuanController::class, 'final_verification'])->name('bendahara.verification');
Route::get('/archive/pengajuan/{id}', [DigitalArchiveController::class, 'show_in_year'])->name('digital.archive');
Route::get('/archive/pengajuan/show/{id}', [DigitalArchiveController::class, 'show_digital_archive'])->name('digital.archive.show');
Route::get(
    '/bendahara/pengajuan',
    [BendaharaController::class, 'pengajuan']
)->name('bendahara.pengajuan');

// =================================================================== Route Resource
Route::resource('/cabinet', CabinetController::class);
Route::resource('/category', CategoryController::class);
Route::resource('/subcategory', SubCategoryController::class);
Route::resource('/year', YearController::class);
Route::resource('/document/rak', DocumentRackController::class);
Route::resource('/document/folder', DocumentFolderController::class);
Route::resource('/document/file', ArchiveFileController::class);
Route::resource('/document/search', SearchController::class);

Route::resource('/account', AccountManageController::class);

Route::resource('/pengajuan', PengajuanController::class);
Route::resource('/archive/digital', DigitalArchiveController::class);

// ======================================================================= costum global
Route::get('/viewfile/{id}', [PengajuanController::class, 'lihat_pengajuan'])->name('view.file');
Route::get('/file/download/{id}', [PengajuanController::class, 'download_pengajuan'])->name('download.file');
