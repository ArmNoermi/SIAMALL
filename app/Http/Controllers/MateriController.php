<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mapel;
use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index()
    {
        $title = 'Materi Pelajaran';

        $materi = Materi::all();
        return view('backend.materi.index', compact('title',  'materi'));
    }

    public function tambah()
    {
        $title = 'Tambah Materi Pelajaran';
        $user_id = \Auth::user()->id;
        $data = Guru::where('user_id', $user_id)->first();

        $guru_id = $data->id;
        $mapel = Mapel::where('guru_id', $guru_id)->get();
        return view('backend.materi.tambah', compact('title', 'mapel'));
    }

    public function post_tambah(Request $request)
    {

        // dd($request->all());
        $this->validate($request, [
            'mapel' => 'required',
            'judul_materi' => 'required',
            'file' => 'required|mimes:pdf'
        ], [
            'mapel.required' => 'Mata pelajaran wajib diisi!',
            'judul_materi.required' => 'Judul wajib diisi!',
            'file.required' => 'Harap masukkan file materi pelajaran anda!',
            'file.mimes' => 'Softfile ijazah anda wajib berbentuk pdf!'
        ]);

        $data['mapel_id'] = $request->mapel;
        $data['judul_materi'] = $request->judul_materi;

        $nama_materi = 'materi-' . $request->judul_materi . '.';
        $file = $request->file('file');
        if ($file) {
            $file->move('materi-pelajaran', $nama_materi .  $file->getClientOriginalExtension());
            $data['file'] = $nama_materi . $file->getClientOriginalExtension();
        }

        Materi::insert($data);
        return redirect('/materi')->with('sukses', 'Data materi telah berhasil ditambahkan');
    }

    public function hapus($id)
    {
        // $materi = Materi::find($id);
        // $materi->delete();
        // return redirect()->back()->with('sukses', 'Data berhasil dihapus');

        try {
            $data =  Materi::find($id);
            $file = public_path('/materi-pelajaran/') . $data->file;
            if (file_exists($file)) {
                @unlink($file);
            }

            $data->delete();
        } catch (\Exception $e) {
            \Session::flash('gagal', $e->getMessage());
        }

        return redirect()->back()->with('sukses', 'Data berhasil dihapus');
    }

    public function edit($id)
    {
        $title = 'Edit Materi Pelajaran';
        $user_id = \Auth::user()->id;
        $data = Guru::where('user_id', $user_id)->first();

        $guru_id = $data->id;
        $mapel = Mapel::where('guru_id', $guru_id)->get();

        $materi = Materi::find($id);
        return view('backend.materi.edit', compact('title', 'mapel', 'materi'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'mapel' => 'required',
            'judul_materi' => 'required',
            'file' => 'mimes:pdf'
        ], [
            'mapel.required' => 'Mata pelajaran wajib diisi!',
            'judul_materi.required' => 'Judul wajib diisi!',
            'file.mimes' => 'Softfile ijazah anda wajib berbentuk pdf!'
        ]);

        $materi = Materi::find($id);

        $materi['mapel_id'] = $request->mapel;
        $materi['judul_materi'] = $request->judul_materi;

        $materi['updated_at'] = date('Y-m-d H:i:s');

        $old_file = public_path('/materi-pelajaran/') . $materi->file;
        $nama_file = 'materi-' . $request->judul_materi . '.';
        $file = $request->file('file');
        if ($file) {
            if (file_exists($old_file)) {
                @unlink($old_file);
            }

            $file->move('materi-pelajaran', $nama_file . $file->getClientOriginalExtension());
            $materi['file'] = $nama_file . $file->getClientOriginalExtension();
        }

        $materi->update();
        \Session::flash('sukses', 'Data telah berhasil diupdate!');

        return redirect('/materi');
    }
}
