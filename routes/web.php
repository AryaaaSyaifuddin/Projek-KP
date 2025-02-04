<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\pasienController;
use App\Http\Middleware\PerawatMiddleware;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\PredictController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Middleware\RedirectIfLoggedIn;
use App\Http\Middleware\UsersMiddleware;
use App\Http\Controllers\HasilPemeriksaanController;
use App\Http\Controllers\PrediksiHasilPemeriksaanController;
use App\Http\Controllers\StatusPemeriksaanController;

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
Route::middleware([UsersMiddleware::class])->group(function () {

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

    Route::post('/pasien/check-nik', [PasienController::class, 'checkNik'])->name('pasien.checkNik');

    Route::get('/pasien/rekam-medis/create/{id}', [HasilPemeriksaanController::class, 'RekamMedis'])->name('rekam_medis.create');

    Route::post('/pasien/rekam-medis/store', [HasilPemeriksaanController::class, 'storeRekamMedis'])->name('rekam_medis.store');

    Route::get('/pasien/edit/{id}', [PasienController::class, 'edit'])->name('pasien.edit');

    Route::put('/hasil_pemeriksaan/update/{id}', [HasilPemeriksaanController::class, 'updateRekamMedis'])->name('update.hasil.pemeriksaan');

    Route::get('/pasien/rekam-medis/prediksi/{id}', [ViewController::class, 'prediksiHasilPemeriksaan'])->name('hasilPemeriksaan.predict');

    Route::post('/predict', [PredictController::class, 'predictHealthStatus']);

    Route::post('/pasien/rekam-medis/simpan-prediksi', [PrediksiHasilPemeriksaanController::class, 'storePrediksi'])->name('simpan.hasil.pemeriksaan');

    Route::get('/hasil_pemeriksaan/edit/{id}', [HasilPemeriksaanController::class, 'editRekamMedis'])->name('edit.hasil.pemeriksaan');

    Route::get('/hasil_prediksi/edit/{id}', [PrediksiHasilPemeriksaanController::class, 'editPrediksi'])->name('edit.hasil.prediksi');

    Route::put('/hasil_prediksi/update/{id}', [PrediksiHasilPemeriksaanController::class, 'updatePrediksi'])->name('update.hasil.prediksi');

    Route::delete('/hasil_prediksi/delete/{id}', [PrediksiHasilPemeriksaanController::class, 'deletePrediksi'])->name('delete.hasil.prediksi');

    Route::get('/persetujuan_hasil_pemeriksaan', [ViewController::class, 'accHasilPrediksi']);

    Route::put('/status-pemeriksaan/{id}', [StatusPemeriksaanController::class, 'update'])->name('status_pemeriksaan.update');

    Route::put('/status-pemeriksaan/revert/{id}', [StatusPemeriksaanController::class, 'revert'])->name('status_pemeriksaan.revert');

    // ===========================================================================================================================================

    Route::get('/jadwal-pemeriksaan', [ViewController::class, 'dashboardJadwal']);

    // ===========================================================================================================================================

    Route::get('/akun', [adminController::class, 'dashboardAkun'])->name('dashboardAkun')->middleware(AdminMiddleware::class);

    Route::get('/akun/create', [adminController::class, 'showCreateFormAkun'])->name('showCreateFormAkun')->middleware(AdminMiddleware::class);

    Route::get('/akun/edit/{id}', [adminController::class, 'edit'])->name('editAkun')->middleware(AdminMiddleware::class);

    Route::post('/akun', [adminController::class, 'store'])->name('storeAkun')->middleware(AdminMiddleware::class);

    Route::put('/akun/update/{id}', [adminController::class, 'update'])->name('akun.update')->middleware(AdminMiddleware::class);

    Route::get('/akun/cancel', [adminController::class, 'cancelFormAkun'])->name('cancelFormAkun')->middleware(AdminMiddleware::class);

    Route::delete('/akun/{id}', [adminController::class, 'destroy'])->name('destroyAkun')->middleware(AdminMiddleware::class);

    // ============================================================================================================================================

    Route::get('/hasil-pemeriksaan', [ViewController::class, 'dashboardHasilPemeriksaan'])->name('dashboardHasilPemeriksaan');

    // ============================================================================================================================================

    Route::get('/dokter', [ViewController::class, 'dashboardDokter'])->name('dashboardDokter');

    // ============================================================================================================================================

    Route::get('/perawat', [ViewController::class, 'dashboardPerawat'])->name('dashboardPerawat');

    // ============================================================================================================================================


});


// Route::middleware([AdminMiddleware::class])->group(function () {





