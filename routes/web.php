<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArchiveFileController;
use App\Http\Controllers\Admin\CabinetController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DocumentFolderController;
use App\Http\Controllers\Admin\DocumentRackController;
use App\Http\Controllers\Admin\SearchController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\YearController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
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
    return match ($role) {
        'admin' => redirect()->route('admin.dashboard'),
        'user' => redirect()->route('user.dashboard'),
        default => abort(403),
    };
})->name('dashboard');

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
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

Route::resource('/cabinet', CabinetController::class);
Route::resource('/category', CategoryController::class);
Route::resource('/subcategory', SubCategoryController::class);
Route::resource('/year', YearController::class);
Route::resource('/document/rak', DocumentRackController::class);
Route::resource('/document/folder', DocumentFolderController::class);
Route::resource('/document/file', ArchiveFileController::class);
Route::resource('/document/search', SearchController::class);
