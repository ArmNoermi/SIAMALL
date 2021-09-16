<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index()
    {
        $title = 'Pendaftaran';
        return view('front-end.pendaftaran', compact('title'));
    }

    public function user_baru(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'no_hp' => 'required',
            'email' => 'required|unique:users',
            'photo' => 'required|image'
        ], [
            'nama.required' => 'Nama lengkap wajib diisi!',
            'no_hp.required' => 'Nomor Handphone wajib diisi!',
            'email.required' => 'Email wajib diisi!',
            'email.unique' => 'Email sudah dipakai oleh orang lain!',
            'photo.required' => 'Pas foto wajib diisi!',
            'photo.image' => 'Pas foto yang anda masukkan bukan image!'
        ]);

        $data['name'] = $request->nama;
        $data['role'] = 'calon_siswa';
        $data['no_hp'] = $request->no_hp;
        $data['email'] = $request->email;
        $data['remember_token'] = $request->_token;
        $data['password'] = bcrypt('123456');
        $data['id_registrasi'] = 'REG-' . $request->no_hp . date('YmdHis');

        $data['created_at'] = date('Y-m-d H:i:s');

        $nama_foto = 'pas-foto-' . $request->email . '.';
        $file = $request->file('photo');
        if ($file) {
            $file->move('biodata', $nama_foto . $file->getClientOriginalExtension());
            $data['photo'] = $nama_foto . $file->getClientOriginalExtension();
        }

        User::insert($data);
        \Session::flash('sukses', 'Pendaftaran Sukses');
        return redirect(route('pendaftaran'));
    }
}
