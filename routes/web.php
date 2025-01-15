<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\pasienController;
use App\Http\Middleware\PerawatMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\Auth\RegisterController;
USE App\Http\Middleware\LoginMiddleware;


// Login Route
Route::get("/", [ViewController::class,"showlogin"])->name('login');
Route::post("/", [loginController::class, 'loginPost'])->name('login.post');
Route::post('/logout', [loginController::class, 'logout'])->name('logout');
// Register Route
Route::get("/register", [ViewController::class,"showRegister"]);
Route::post('/register', [RegisterController::class, 'registerPost'])->name('register.post');


Route::middleware([PerawatMiddleware::class])->group(function () {
        // Tampilan Dashboard
        Route::get('/dashboard', [ViewController::class, 'dashboard'])->middleware(LoginMiddleware::class);
        // Tabel Pasien
        Route::get('/pasien', [pasienController::class, 'dashboardPasien']);
        Route::get('/pasien/create-form', [pasienController::class, 'showCreateForm'])->middleware(LoginMiddleware::class)->name('showCreateForm');
        Route::get('/pasien/cancel-form', [pasienController::class, 'cancelForm'])->middleware(LoginMiddleware::class)->name('cancelForm');
        Route::post('/pasien', [PasienController::class, 'store'])->name('pasien.store');

});
