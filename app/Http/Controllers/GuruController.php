<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{
    public function index()
    {
        $title = 'Guru';
        $data = Guru::withCount('r_user_guru')->orderBy('id', 'asc')->get();
        return view('backend.guru.index', compact('title', 'data'));
    }

    public function tambah()
    {
        $title = 'Tambah Data Guru';
        return view('backend.guru.tambah', compact('title'));
    }

    public function post_tambah(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'no_hp' => 'required',
            'photo' => 'required|image',

            'nip' => 'required|unique:tbl_guru',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'agama' => 'required'
        ], [
            'photo.image' => 'Pas foto yang anda masukkan bukan image!'
        ]);

        // ( Insert ke tabel user )
        $user = new User;
        $user->role = 'guru';
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt('123456');
        $user->no_hp = $request->no_hp;
        $user->remember_token = $request->_token;

        $nama_photo = 'pas-foto-' . $request->email . '.';
        $photo = $request->file('photo');
        if ($photo) {
            $photo->move('biodata/', $nama_photo . $photo->getClientOriginalExtension());
            $user['photo'] = $nama_photo . $photo->getClientOriginalExtension();
        }

        $user->save();

        // ( Insert ke tbl_siswa )
        $request->request->add(['user_id' => $user->id]);

        $siswa = Guru::create($request->all());

        $siswa->save();
        return redirect('/guru')->with('sukses', 'Data guru telah berhasil disimpan');
    }

    public function edit($id)
    {
        $title = 'Edit Data Guru';
        $dt =  User::with('r_guru_user')->find($id);
        return view('backend.guru.edit', compact(['dt', 'title']));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'photo' => 'image',

            'nip' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'agama' => 'required'
        ], [
            'photo.image' => 'Pas foto yang anda masukkan bukan image!'
        ]);

        try {

            // Menyimpan data dari model user
            $user = User::with('r_guru_user')->find($id);

            // update data users
            $user['name'] = $request->name;
            $user['email'] = $request->email;
            $user['no_hp'] = $request->no_hp;
            $user['updated_at'] = date('Y-m-d H:i:s');

            $old_photo = public_path('/biodata/') . $user->photo;
            $nama_photo = 'pas-foto-' . $request->email . '.';
            $photo = $request->file('photo');
            if ($photo) {
                if (file_exists($old_photo)) {
                    @unlink($old_photo);
                }

                $photo->move('biodata/', $nama_photo . $photo->getClientOriginalExtension());
                $user['photo'] = $nama_photo . $photo->getClientOriginalExtension();
            }

            $user->update();

            // Menyimpan data dari model Guru, 
            // karna menggunakan where(),
            // maka variabel penyimpan model tidak boleh sama dengan variabel penyimpan data dari form
            $data_guru = Guru::where('user_id', $id);

            // update data ke tbl_guru
            $guru['nip'] = $request->nip;
            $guru['nama'] = $request->nama;
            $guru['jenis_kelamin'] = $request->jenis_kelamin;
            $guru['agama'] = $request->agama;
            $guru['alamat'] = $request->alamat;
            $guru['tempat_lahir'] = $request->tempat_lahir;
            $guru['tanggal_lahir'] = $request->tanggal_lahir;
            $guru['updated_at'] = date('Y-m-d H:i:s');

            $data_guru->update($guru);

            \Session::flash('sukses', 'Data berhasil di update!');
        } catch (\Exception $e) {
            \Session::flash('gagal', $e->getMessage());
        }

        return redirect('/guru');
    }

    public function hapus($id)
    {
        try {
            $data =  User::with('r_guru_user')->find($id);
            $photo = public_path('/biodata/') . $data->photo;
            if (file_exists($photo)) {
                @unlink($photo);
            }

            // $ijazah = public_path('/biodata/') . $data->r_guru_user['ijazah'];
            // if (file_exists($ijazah)) {
            //     @unlink($ijazah);
            // }

            $data->delete();
            \Session::flash('sukses', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            \Session::flash('gagal', $e->getMessage());
        }

        return redirect('/guru')->with('sukses', 'Data berhasil dihapus');
    }

    public function profil_saya()
    {
        $title = 'Profil Saya';
        $id = \Auth::user()->id;
        $dt =  User::with('r_guru_user')->find($id);
        return view('backend.guru.profil_saya', compact('title', 'dt'));
    }

    public function update_profil(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'photo' => 'image',

            'nip' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'agama' => 'required'
        ], [
            'photo.image' => 'Pas foto yang anda masukkan bukan image!'
        ]);

        try {

            // Menyimpan data dari model user
            $user = User::with('r_guru_user')->find($id);

            // update data users
            $user['name'] = $request->name;
            $user['email'] = $request->email;
            $user['no_hp'] = $request->no_hp;
            $user['updated_at'] = date('Y-m-d H:i:s');

            $old_photo = public_path('/biodata/') . $user->photo;
            $nama_photo = 'pas-foto-' . $request->email . '.';
            $photo = $request->file('photo');
            if ($photo) {
                if (file_exists($old_photo)) {
                    @unlink($old_photo);
                }

                $photo->move('biodata/', $nama_photo . $photo->getClientOriginalExtension());
                $user['photo'] = $nama_photo . $photo->getClientOriginalExtension();
            }

            $user->update();

            // Menyimpan data dari model Guru, 
            // karna menggunakan where(),
            // maka variabel penyimpan model tidak boleh sama dengan variabel penyimpan data dari form
            $data_guru = Guru::where('user_id', $id);

            // update data ke tbl_guru
            $guru['nip'] = $request->nip;
            $guru['nama'] = $request->nama;
            $guru['jenis_kelamin'] = $request->jenis_kelamin;
            $guru['agama'] = $request->agama;
            $guru['alamat'] = $request->alamat;
            $guru['tempat_lahir'] = $request->tempat_lahir;
            $guru['tanggal_lahir'] = $request->tanggal_lahir;
            $guru['updated_at'] = date('Y-m-d H:i:s');

            $data_guru->update($guru);

            \Session::flash('sukses', 'Data berhasil di update!');
        } catch (\Exception $e) {
            \Session::flash('gagal', $e->getMessage());
        }

        return redirect()->back();
    }

    public function update_password(Request $request, $id)
    {
        // dd($request->all());

        $user = User::find($id);

        // update data users
        $user['password'] = bcrypt($request->password);
        $user->update();

        \Session::flash('sukses', 'Password di update');
        return redirect('/profil-saya');
    }

    public function password_baru($id)
    {
        $title = 'Password Baru';

        return view('backend.guru.password_baru', compact('title', 'id'));
    }

    public function ganti_password(Request $request, $id)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect(route('guru.password_baru', $id));
        }
        return redirect()->back()->with('gagal', 'Email atau password anda salah!');
    }
}
