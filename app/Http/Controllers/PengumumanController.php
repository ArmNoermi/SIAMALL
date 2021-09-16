<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        $title = 'Pengumuman';
        $user = \Auth::user();
        return view('backend.pengumuman.index', compact('title', 'user'));
    }

    public function lulus()
    {
        $title = 'Calon Siswa Lulus';
        $user = User::where([
            'is_lulus' => 1,
            'id_registrasi' => 0
        ])->get();

        return view('backend.pengumuman.lulus', compact('title', 'user'));
    }
}
