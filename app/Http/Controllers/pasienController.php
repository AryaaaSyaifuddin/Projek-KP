<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pasienController extends Controller
{
    public function dashboardPasien(){
        return view("pasien_dashboard");
    }
}
