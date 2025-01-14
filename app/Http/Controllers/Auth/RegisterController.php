<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function registerPost(Request $request)
    {

        $request->validate([
            'nama' => 'required|string|max:255',
            'role' => 'required|string',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string|min:8|confirmed',
            'email' => 'required|email|unique:users,email',
            'no_hp' => 'required|string|max:15',
        ]);

        Users::create([
            'nama' => $request['nama'],
            'role' => $request['role'],
            'username' => $request['username'],
            'password' => bcrypt($request['password']),
            'email' => $request['email'],
            'no_hp' => $request['no_hp'],
        ]);

        return redirect()->back()->with('success', 'Registration successful. Please wait for verification.');
    }

}
