<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        $title = 'Mata Pelajaran';
        $data = Mapel::all();
        return view('backend.mapel.index', compact('title', 'data'));
    }

    public function tambah()
    {
        $title = 'Tambah Mata Pelajaran';
        $guru = Guru::pluck('nama', 'id');
        return view('backend.mapel.tambah', compact('title', 'guru'));
    }

    public function post_tambah(Request $request)
    {

        // dd($request->all());
        Mapel::create($request->all());
        return redirect('/mapel')->with('sukses', 'Data mata pelajaran berhasil ditambahkan');
    }

    public function hapus($id)
    {
        $mapel = Mapel::find($id);
        $mapel->delete();
        return redirect('/mapel')->with('sukses', 'Data mata pelajaran berhasil dihapus');
    }

    public function edit($id)
    {
        $title = 'Edit Mata Pelajaran';
        $guru = Guru::pluck('nama', 'id');
        $dt =  Mapel::find($id);
        return view('backend.mapel.edit', compact(['dt', 'title', 'guru']));
    }

    public function update(Request $request, $id)
    {
        $mapel = Mapel::find($id);
        $mapel->update($request->all());
        return redirect('/mapel')->with('sukses', 'Data berhasil diupdate');
    }
}
