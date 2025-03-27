<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\EditRekamMedisController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasienController;
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
use App\Http\Controllers\RekomendasiMedisController;
use App\Http\Controllers\StatusPemeriksaanController;
use App\Http\Middleware\DokMinMiddleware;

    // Login Route

// Login Route
Route::middleware([RedirectIfLoggedIn::class])->group(function () {

    Route::get("/", [ViewController::class, "showlogin"])->name('login');

    Route::post("/", [LoginController::class, 'loginPost'])->name('login.post');

    Route::get("/register", [ViewController::class, "showRegister"]);

    Route::post('/register', [RegisterController::class, 'registerPost'])->name('register.post');
});
// ==============================================================================================================================================================

// Middleware Perawat
Route::middleware([UsersMiddleware::class])->group(function () {

    // ==========================================================================================================================================================

    Route::get('/error', [viewController::class, 'error']);

    Route::get('/error1', [viewController::class, 'apalah']);

    // ==========================================================================================================================================================

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [viewController::class, 'dashboard']);

    // ==========================================================================================================================================================

    Route::get('/pasien', [PasienController::class, 'dashboardPasien'])->name('dashboardPasien');

    Route::get('/pasien/create', [PasienController::class, 'showCreateForm'])->name('showCreateForm');

    Route::get('/pasien/edit/{id}', [PasienController::class, 'edit'])->name('pasien.edit');

    Route::post('/pasien', [PasienController::class, 'store'])->name('pasien.store');

    Route::put('/pasien/update/{id}', [PasienController::class, 'update'])->name('pasien.update');

    Route::get('/pasien/cancel', [PasienController::class, 'cancelForm'])->name('cancelForm');

    Route::delete('/pasien/{id_pasien}', [PasienController::class, 'destroy'])->name('pasien.destroy');

    Route::get('/pasien/search', [PasienController::class, 'search'])->name('pasien.search');

    Route::post('/pasien/check-nik', [PasienController::class, 'checkNik'])->name('pasien.checkNik');

    // ==========================================================================================================================================================

    Route::get('/pasien/rekam-medis/create/{id}', [HasilPemeriksaanController::class, 'RekamMedis'])->name('rekam_medis.create');

    Route::post('/pasien/rekam-medis/store', [HasilPemeriksaanController::class, 'storeRekamMedis'])->name('rekam_medis.store');

    Route::put('/pasien/rekam-medis/update/{id}', [HasilPemeriksaanController::class, 'updateRekamMedis'])->name('update.hasil.pemeriksaan');

    Route::get('/pasien/rekam-medis/prediksi/{id}', [ViewController::class, 'prediksiHasilPemeriksaan'])->name('hasilPemeriksaan.predict');

    Route::post('/pasien/rekam-medis/simpan-prediksi', [PrediksiHasilPemeriksaanController::class, 'storePrediksi'])->name('simpan.hasil.pemeriksaan');

    Route::get('/pasien/rekam-medis/edit/{id}', [HasilPemeriksaanController::class, 'editRekamMedis'])->name('edit.hasil.pemeriksaan');

    Route::get('/hasilpemeriksaan/detail/{id}', [HasilPemeriksaanController::class, 'detailRekamMedis'])->name('hasil.pemeriksaan.detail');

    Route::get('/hasilpemeriksaan/export-pdf/{id}', [HasilPemeriksaanController::class, 'exportPdf'])->name('hasilpemeriksaan.exportPdf');

    Route::delete('/hasil-pemeriksaan/{id}', [HasilPemeriksaanController::class, 'destroy'])->name('hasil-pemeriksaan.destroy');

    // ==========================================================================================================================================================

    Route::post('/predict', [PredictController::class, 'predictHealthStatus']);

    Route::get('/hasil_prediksi/edit/{id}', [PrediksiHasilPemeriksaanController::class, 'editPrediksi'])->name('edit.hasil.prediksi');

    Route::put('/hasil_prediksi/update/{id}', [PrediksiHasilPemeriksaanController::class, 'updatePrediksi'])->name('update.hasil.prediksi');

    Route::delete('/hasil_prediksi/delete/{id}', [PrediksiHasilPemeriksaanController::class, 'deletePrediksi'])->name('delete.hasil.prediksi');

    // ==========================================================================================================================================================

    Route::get('/persetujuan_hasil_pemeriksaan', [ViewController::class, 'accHasilPrediksi'])->middleware(DokMinMiddleware::class);

    Route::put('/status-pemeriksaan/{id}', [StatusPemeriksaanController::class, 'update'])->name('status_pemeriksaan.update')->middleware(DokMinMiddleware::class);

    Route::put('/status-pemeriksaan/revert/{id}', [StatusPemeriksaanController::class, 'revert'])->name('status_pemeriksaan.revert')->middleware(DokMinMiddleware::class);

    // ==========================================================================================================================================================

    Route::get('/rekomendasi_medis', [ViewController::class, 'rekomendasiMedisHasilPrediksi'])->middleware(DokMinMiddleware::class);

    Route::get('/rekomendasi-medis/{id}', [RekomendasiMedisController::class, 'formRekommendasiMedis'])->name('rekomendasimedis.view')->middleware(DokMinMiddleware::class);

    Route::post('/rekomendasi-medis/generate/{id}', [RekomendasiMedisController::class, 'storeRekomendasiMedis'])->name('generate.rekammedis')->middleware(DokMinMiddleware::class);

    Route::post('/rekomendasi-medis/simpan', [RekomendasiMedisController::class, 'store'])->name('simpan.hasil.rekommedis')->middleware(DokMinMiddleware::class);

    Route::get('/rekomendasimedis/detail/{id}', [RekomendasiMedisController::class, 'detail'])->name('rekomendasimedis.detail')->middleware(DokMinMiddleware::class);

    Route::delete('/rekomendasimedis/{id}', [RekomendasiMedisController::class, 'destroy'])->name('rekomendasimedis.destroy')->middleware(DokMinMiddleware::class);

    Route::get('/rekomendasimedis/detail/{id}', [RekomendasiMedisController::class, 'show'])->name('rekomendasimedis.detail');
    
    Route::put('/rekomendasimedis/{id}', [RekomendasiMedisController::class, 'update'])->name('rekomendasimedis.update');

    // ==========================================================================================================================================================

    Route::get('/jadwal-pemeriksaan', [ViewController::class, 'dashboardJadwal']);

    // ==========================================================================================================================================================

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

    Route::get('/dokter', [ViewController::class, 'dashboardDokter'])->name('dashboardDokter')->middleware(AdminMiddleware::class);

    // ============================================================================================================================================

    Route::get('/perawat', [ViewController::class, 'dashboardPerawat'])->name('dashboardPerawat')->middleware(AdminMiddleware::class);

    // ============================================================================================================================================


});


// Route::middleware([AdminMiddleware::class])->group(function () {





