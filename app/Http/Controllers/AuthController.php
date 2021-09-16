<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function index()
    {
        $title = 'Login';
        return view('back-end.login', compact('title'));
    }

    public function post_login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/dashboard')->with('sukses', 'Selamat datang!');
        }
        return redirect('/login')->with('gagal', 'Email atau password anda salah!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('sukses', 'Logout berhasil!');
    }
}
