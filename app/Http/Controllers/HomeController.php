<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Home';
        $posts = Post::all();
        $guru = User::with('r_guru_user')->where('role', 'guru')->get();
        return view('front-end.home', compact(['title', 'posts', 'guru']));
    }

    public function single_post($slug)
    {
        $title = $slug;
        $post = Post::where('slug', '=', $slug)->first();
        return view('front-end.posting.single_post', compact('post', 'title'));
    }
}
