<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\pasienController;
use App\Http\Middleware\PerawatMiddleware;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Middleware\RedirectIfLoggedIn;


    // Login Route

// Login Route
Route::get("/", [ViewController::class, "showlogin"])
    ->name('login')
    ->middleware(RedirectIfLoggedIn::class);

Route::post("/", [loginController::class, 'loginPost'])
    ->name('login.post')
    ->middleware(RedirectIfLoggedIn::class);

// Register Route
Route::get("/register", [ViewController::class, "showRegister"])
    ->middleware(RedirectIfLoggedIn::class);

Route::post('/register', [RegisterController::class, 'registerPost'])
    ->name('register.post')
    ->middleware(RedirectIfLoggedIn::class);

// ================================================================================================================================================

// Middleware Perawat
Route::middleware([PerawatMiddleware::class])->group(function () {

    Route::get('/error', [viewController::class, 'error']);

    // ============================================================================================================================================

    Route::post('/logout', [loginController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [viewController::class, 'dashboard']);

    // ============================================================================================================================================

    Route::get('/pasien', [PasienController::class, 'dashboardPasien'])->name('dashboardPasien');

    // Route untuk menampilkan form create
    Route::get('/pasien/create', [PasienController::class, 'showCreateForm'])->name('showCreateForm');

    // Route untuk edit data pasien
    Route::get('/pasien/edit/{id}', [PasienController::class, 'edit'])->name('pasien.edit');

    // Route untuk menyimpan data pasien baru
    Route::post('/pasien', [PasienController::class, 'store'])->name('pasien.store');

    // Route untuk update data pasien
    Route::put('/pasien/update/{id}', [PasienController::class, 'update'])->name('pasien.update');

    // Route untuk membatalkan form (kembali ke tabel)
    Route::get('/pasien/cancel', [PasienController::class, 'cancelForm'])->name('cancelForm');

    // Route untuk hapus data pasien
    Route::delete('/pasien/{id_pasien}', [PasienController::class, 'destroy'])->name('pasien.destroy');

    Route::get('/pasien/search', [PasienController::class, 'search'])->name('pasien.search');

    // ===========================================================================================================================================

    // Route untuk jadwal
    Route::get('/jadwal-pemeriksaan', [ViewController::class, 'dashboardJadwal']);

    // ===========================================================================================================================================

    // Route untuk dashboard akun ( akun )
    Route::get('/akun', [adminController::class, 'dashboardAkun'])->name('dashboardAkun')->middleware(AdminMiddleware::class);

    // Menampilkan form create akun
    Route::get('/akun/create', [adminController::class, 'showCreateFormAkun'])->name('showCreateFormAkun')->middleware(AdminMiddleware::class);

    // Menampilkan form edit akun
    Route::get('/akun/edit/{id}', [adminController::class, 'edit'])->name('editAkun')->middleware(AdminMiddleware::class);

    // Menyimpan data akun baru
    Route::post('/akun', [adminController::class, 'store'])->name('storeAkun')->middleware(AdminMiddleware::class);

    // Mengupdate data akun
    Route::put('/akun/update/{id}', [adminController::class, 'update'])->name('akun.update')->middleware(AdminMiddleware::class);

    // Membatalkan form dan kembali ke tabel
    Route::get('/akun/cancel', [adminController::class, 'cancelForm'])->name('cancelFormAkun')->middleware(AdminMiddleware::class);

    // Menghapus data akun
    Route::delete('/akun/{id}', [adminController::class, 'destroy'])->name('destroyAkun')->middleware(AdminMiddleware::class);

    // ============================================================================================================================================

    Route::get('/hasil-pemeriksaan', [ViewController::class, 'dashboardHasilPemeriksaan'])->name('dashboardHasilPemeriksaan');

});


// Route::middleware([AdminMiddleware::class])->group(function () {





