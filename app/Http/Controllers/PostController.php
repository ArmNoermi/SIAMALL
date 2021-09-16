<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $title = 'Postingan';
        $posts = Post::all();
        return view('backend.posting.index', compact('title', 'posts'));
    }

    public function tambah()
    {
        $title = 'Tambah Postingan';
        return view('backend.posting.tambah', compact('title'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'highlight' => 'required',
            'konten' => 'required',
            'thumbnail' => 'required|image'
        ], [
            'thumbnail.image' => 'Thumbnail yang anda masukkan bukan image!'
        ]);

        $request->request->add(['user_id' => auth()->user()->id]);
        $posts = Post::create($request->all());

        $nama_thumbnail = 'thumbnail-' . $request->title . '.';
        $thumbnail = $request->file('thumbnail');

        if ($request->hasFile('thumbnail')) {
            $thumbnail->move('thumbnail-berita/', $nama_thumbnail . $thumbnail->getClientOriginalExtension());
            $posts->thumbnail = $nama_thumbnail . $thumbnail->getClientOriginalExtension();
            $posts->save();
        }
        return redirect('/posts')->with('sukses', 'Posting telah berhasil');
    }

    public function edit($id)
    {
        $title = 'Edit Data Postingan';
        $dt =  Post::find($id);
        return view('backend.posting.edit', compact(['dt', 'title']));
    }

    public function update(Request $request, $id)
    {
        $posts = Post::find($id);
        $posts->update($request->all());

        $old_thumbnail = public_path('/thumbnail-berita/') . $posts->thumbnail;
        $nama_thumbnail = 'thumbnail-' . $request->title . '.';

        if ($request->hasFile('thumbnail')) {
            if (file_exists($old_thumbnail)) {
                @unlink($old_thumbnail);
            }

            $request->file('thumbnail')->move('thumbnail-berita/', $nama_thumbnail . $request->file('thumbnail')->getClientOriginalExtension());
            $posts->thumbnail = $nama_thumbnail . $request->file('thumbnail')->getClientOriginalExtension();
            $posts->save();
        }

        return redirect('/posts')->with('sukses', 'Data berhasil diupdate');
    }

    public function hapus($id)
    {
        $posts = Post::find($id);
        $old_thumbnail = public_path('/thumbnail-berita/') . $posts->thumbnail;

        if (file_exists($old_thumbnail)) {
            @unlink($old_thumbnail);
        }

        $posts->delete();
        return redirect('/posts')->with('sukses', 'Data berhasil dihapus');
    }
}
