<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;

Route::get("/", [ViewController::class,"showlogin"]);
Route::get("/register", [ViewController::class,"register"]);
