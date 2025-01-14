<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function showlogin(){
        return view("login_form");
    }

    public function showRegister(){
        return view("register_form");
    }

    public function dashboard(){
        return view("dashboard");
    }

    public function pasien(){
        return view("pasien_dashboard");
    }
}
