<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function showlogin(){
        return view("login_form");
    }

    public function register(){
        return view("register_form");
    }
}
