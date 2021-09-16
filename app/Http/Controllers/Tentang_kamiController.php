<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Tentang_kamiController extends Controller
{
    public function index()
    {
        $title = 'Tentang Kami';
        return view('front-end.tentang_kami', compact(['title']));
    }
}
