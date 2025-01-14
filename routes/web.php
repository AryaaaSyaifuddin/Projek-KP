<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\pasienController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\Auth\RegisterController;

// Login Route
Route::get("/", [ViewController::class,"showlogin"])->name('login');
Route::post("/", [loginController::class, 'loginPost'])->name('login.post');
// Register Route
Route::get("/register", [ViewController::class,"showRegister"]);
Route::post('/register', [RegisterController::class, 'registerPost'])->name('register.post');

Route::get('/dashboard', [ViewController::class, 'dashboard']);
Route::get('/pasien', [pasienController::class, 'dashboardPasien']);
