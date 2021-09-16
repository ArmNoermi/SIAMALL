<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Orang_tua_wali;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{

    public function index()
    {
        $title = 'Siswa';
        $data = Siswa::withCount('r_user_siswa')->orderBy('id', 'asc')->get();
        return view('backend.siswa.index', compact('title', 'data'));
    }

    public function hapus($id)
    {
        try {
            $data =  User::with('r_siswa_user')->find($id);
            $photo = public_path('/biodata/') . $data->photo;
            if (file_exists($photo)) {
                @unlink($photo);
            }

            $ijazah = public_path('/biodata/') . $data->r_siswa_user['ijazah'];
            if (file_exists($ijazah)) {
                @unlink($ijazah);
            }

            $data->delete();
            // \Session::flash('sukses', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            \Session::flash('gagal', $e->getMessage());
        }

        return redirect('/siswa')->with('sukses', 'Data berhasil dihapus');
    }

    public function edit($id)
    {
        $title = 'Edit Data Siswa';
        $dt =  User::with('r_siswa_user')->find($id);
        $orang_tua = Orang_tua_wali::where('user_id', $id)->first();

        return view('backend.siswa.edit', compact(['dt', 'title', 'orang_tua']));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'photo' => 'image',

            'nisn' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'ijazah' => 'mimes:pdf,jpg,jpeg,png'
        ], [
            'photo.image' => 'Pas foto yang anda masukkan bukan image!',
            'ijazah.mimes' => 'Softfile ijazah anda wajib berbentuk pdf atau gambar!'
        ]);

        try {

            // Menyimpan data dari model user
            $user = User::with('r_siswa_user')->find($id);

            // update data users
            $user['name'] = $request->nama;
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

                $photo->move('biodata', $nama_photo . $photo->getClientOriginalExtension());
                $user['photo'] = $nama_photo . $photo->getClientOriginalExtension();
            }

            $user->update();

            // Menyimpan data dari model Siswa, 
            // karna menggunakan where(),
            // maka variabel penyimpan model tidak boleh sama dengan variabel penyimpan data dari form
            $data_siswa = Siswa::where('user_id', $id);

            // update data ke tbl_siswa
            $siswa['nama_panggilan'] = $request->nama_panggilan;
            $siswa['nisn'] = $request->nisn;
            $siswa['jenis_kelamin'] = $request->jenis_kelamin;
            $siswa['tempat_lahir'] = $request->tempat_lahir;
            $siswa['tanggal_lahir'] = $request->tanggal_lahir;
            $siswa['agama'] = $request->agama;
            $siswa['alamat'] = $request->alamat;
            $siswa['asal_sekolah'] = $request->asal_sekolah;
            $siswa['alamat_asal_sekolah'] = $request->alamat_asal_sekolah;
            $siswa['anak_ke'] = $request->anak_ke;
            $siswa['jumlah_saudara'] = $request->jumlah_saudara;
            $siswa['telp_rumah'] = $request->telp_rumah;
            $siswa['provinsi'] = $request->provinsi;
            $siswa['kabupaten'] = $request->kabupaten;
            $siswa['kecamatan'] = $request->kecamatan;
            $siswa['kode_pos'] = $request->kode_pos;
            $siswa['golongan_darah'] = $request->golongan_darah;
            $siswa['tinggi_badan'] = $request->tinggi_badan;
            $siswa['berat_badan'] = $request->berat_badan;
            $siswa['ket_riwayat_penyakit'] = $request->ket_riwayat_penyakit;
            $siswa['status_anak'] = $request->status_anak;
            $siswa['status_orang_tua'] = $request->status_orang_tua;
            $siswa['status_asuh'] = $request->status_asuh;
            // $siswa['jurusan_pilihan1'] = $request->jurusan_pilihan1;
            // $siswa['jurusan_pilihan2'] = $request->jurusan_pilihan2;
            $siswa['updated_at'] = date('Y-m-d H:i:s');

            $old_ijazah = public_path('/biodata/') . $user->r_siswa_user['ijazah'];
            $nama_ijazah = 'ijazah-' . $request->email . '.';
            $ijazah = $request->file('ijazah');
            if ($ijazah) {
                if (file_exists($old_ijazah)) {
                    @unlink($old_ijazah);
                }

                $ijazah->move('biodata', $nama_ijazah . $ijazah->getClientOriginalExtension());
                $siswa['ijazah'] = $nama_ijazah . $ijazah->getClientOriginalExtension();
            }

            $data_siswa->update($siswa);

            $data_ortu = Orang_tua_wali::where('user_id', $id);

            $orang_tua['nama_ayah'] = $request->nama_ayah;
            $orang_tua['penghasilan_ayah'] = $request->penghasilan_ayah;
            $orang_tua['pendidikan_ayah'] = $request->pendidikan_ayah;
            $orang_tua['pekerjaan_ayah'] = $request->pekerjaan_ayah;
            $orang_tua['no_hp_ayah'] = $request->no_hp_ayah;
            $orang_tua['alamat_ayah'] = $request->alamat_ayah;
            $orang_tua['nama_ibu'] = $request->nama_ibu;
            $orang_tua['penghasilan_ibu'] = $request->penghasilan_ibu;
            $orang_tua['pendidikan_ibu'] = $request->pendidikan_ibu;
            $orang_tua['pekerjaan_ibu'] = $request->pekerjaan_ibu;
            $orang_tua['no_hp_ibu'] = $request->no_hp_ibu;
            $orang_tua['alamat_ibu'] = $request->alamat_ibu;
            $orang_tua['nama_wali'] = $request->nama_wali;
            $orang_tua['penghasilan_wali'] = $request->penghasilan_wali;
            $orang_tua['pendidikan_wali'] = $request->pendidikan_wali;
            $orang_tua['pekerjaan_wali'] = $request->pekerjaan_wali;
            $orang_tua['no_hp_wali'] = $request->no_hp_wali;
            $orang_tua['alamat_wali'] = $request->alamat_wali;

            $orang_tua['updated_at'] = date('Y-m-d H:i:s');

            $data_ortu->update($orang_tua);

            \Session::flash('sukses', 'Data siswa berhasil di update');
        } catch (\Exception $e) {
            \Session::flash('gagal', $e->getMessage());
        }

        return redirect('/siswa');
    }

    public function tambah()
    {
        $title = 'Tambah Siswa';
        $data = Siswa::all();
        return view('backend.siswa.tambah', compact('title', 'data'));
    }

    public function post_tambah(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required|unique:users',
            'no_hp' => 'required',
            'photo' => 'required|image',

            'nisn' => 'required|unique:tbl_siswa',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'ijazah' => 'required|mimes:pdf,jpg,jpeg,png',
            'nama_panggilan' => 'required',
            'asal_sekolah' => 'required',
            'alamat_asal_sekolah' => 'required',
            'anak_ke' => 'required',
            'jumlah_saudara' => 'required',
            'telp_rumah' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'kode_pos' => 'required',
            'golongan_darah' => 'required',
            'tinggi_badan' => 'required',
            'berat_badan' => 'required',
            'status_anak' => 'required',
            'status_orang_tua' => 'required',
            'provinsi' => 'required',
            'status_asuh' => 'required',

            'nama_ayah' => 'required',
            'penghasilan_ayah' => 'required',
            'pendidikan_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'no_hp_ayah' => 'required',
            'alamat_ayah' => 'required',

            'nama_ibu' => 'required',
            'penghasilan_ibu' => 'required',
            'pendidikan_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'no_hp_ibu' => 'required',
            'alamat_ibu' => 'required',

            'nama_wali' => 'required',
            'penghasilan_wali' => 'required',
            'pendidikan_wali' => 'required',
            'pekerjaan_wali' => 'required',
            'no_hp_wali' => 'required',
            'alamat_wali' => 'required',

        ], [
            'photo.image' => 'Pas foto yang anda masukkan bukan image!',
            'ijazah.mimes' => 'Softfile ijazah anda wajib berbentuk pdf atau gambar!'
        ]);

        // ( Insert ke tabel user )
        $user = new User;
        $user->role = 'siswa';
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt('123456');
        $user->no_hp = $request->no_hp;
        $user->remember_token = $request->_token;
        $user->is_verifikasi = 1;
        $user->is_lulus = 1;
        $user->is_export = 1;

        // $old_photo = public_path('/biodata/') . $user->photo;
        $nama_photo = 'pas-foto-' . $request->email . '.';
        $photo = $request->file('photo');
        if ($photo) {
            // if (file_exists($old_photo)) {
            //     @unlink($old_photo);
            // }
            $photo->move('biodata/', $nama_photo . $photo->getClientOriginalExtension());
            $user['photo'] = $nama_photo . $photo->getClientOriginalExtension();
        }

        $user->save();



        $user_id = $user->id;

        $data['user_id'] = $user_id;

        $data['semester_id'] = 1;

        $data['nama_panggilan'] = $request->nama_panggilan;
        $data['nisn'] = $request->nisn;
        $data['jenis_kelamin'] = $request->jenis_kelamin;
        $data['tempat_lahir'] = $request->tempat_lahir;
        $data['tanggal_lahir'] = $request->tanggal_lahir;
        $data['agama'] = $request->agama;
        $data['alamat'] = $request->alamat;

        $data['asal_sekolah'] = $request->asal_sekolah;
        $data['alamat_asal_sekolah'] = $request->alamat_asal_sekolah;
        $data['anak_ke'] = $request->anak_ke;
        $data['jumlah_saudara'] = $request->jumlah_saudara;
        $data['telp_rumah'] = $request->telp_rumah;
        $data['provinsi'] = $request->provinsi;
        $data['kabupaten'] = $request->kabupaten;
        $data['kecamatan'] = $request->kecamatan;
        $data['kode_pos'] = $request->kode_pos;
        $data['golongan_darah'] = $request->golongan_darah;
        $data['tinggi_badan'] = $request->tinggi_badan;
        $data['berat_badan'] = $request->berat_badan;
        $data['tgl_mendaftar'] = $request->tgl_mendaftar;
        $data['ket_riwayat_penyakit'] = $request->ket_riwayat_penyakit;
        $data['status_anak'] = $request->status_anak;
        $data['status_orang_tua'] = $request->status_orang_tua;
        $data['status_asuh'] = $request->status_asuh;
        $data['jurusan_pilihan1'] = $request->jurusan_pilihan1;
        $data['jurusan_pilihan2'] = $request->jurusan_pilihan2;

        $nama_ijazah = 'ijazah-skhu-' . $request->email . '.';
        $file = $request->file('ijazah');
        if ($file) {
            $file->move('biodata', $nama_ijazah .  $file->getClientOriginalExtension());
            $data['ijazah'] = $nama_ijazah . $file->getClientOriginalExtension();
        }

        Siswa::insert($data);


        $orang_tua['user_id'] = $user_id;

        $orang_tua['nama_ayah'] = $request->nama_ayah;
        $orang_tua['penghasilan_ayah'] = $request->penghasilan_ayah;
        $orang_tua['pendidikan_ayah'] = $request->pendidikan_ayah;
        $orang_tua['pekerjaan_ayah'] = $request->pekerjaan_ayah;
        $orang_tua['no_hp_ayah'] = $request->no_hp_ayah;
        $orang_tua['alamat_ayah'] = $request->alamat_ayah;

        $orang_tua['nama_ibu'] = $request->nama_ibu;
        $orang_tua['penghasilan_ibu'] = $request->penghasilan_ibu;
        $orang_tua['pendidikan_ibu'] = $request->pendidikan_ibu;
        $orang_tua['pekerjaan_ibu'] = $request->pekerjaan_ibu;
        $orang_tua['no_hp_ibu'] = $request->no_hp_ibu;
        $orang_tua['alamat_ibu'] = $request->alamat_ibu;

        $orang_tua['nama_wali'] = $request->nama_wali;
        $orang_tua['penghasilan_wali'] = $request->penghasilan_wali;
        $orang_tua['pendidikan_wali'] = $request->pendidikan_wali;
        $orang_tua['pekerjaan_wali'] = $request->pekerjaan_wali;
        $orang_tua['no_hp_wali'] = $request->no_hp_wali;
        $orang_tua['alamat_wali'] = $request->alamat_wali;

        Orang_tua_wali::insert($orang_tua);

        return redirect('/siswa')->with('sukses', 'Data berhasil diinput');
    }


    public function profile($id)
    {
        $title = 'Profil Siswa';
        $siswa = Siswa::with('r_user_siswa')->find($id);
        $mapel = Mapel::all();

        $categories = [];
        $data = [];

        foreach ($mapel as $mp) {
            if ($siswa->mapel()->wherePivot('mapel_id', $mp->id)->first()) {
                $categories[] = $mp->nama;
                $data[] = $siswa->mapel()->wherePivot('mapel_id', $mp->id)->first()->pivot->nilai;
            }
        }

        return view('backend.siswa.profile', [
            'siswa' => $siswa,
            'mapel' => $mapel,
            'categories' => $categories,
            'data' => $data,
            'title' => $title
        ]);
    }

    public function tambahNilai(Request $request, $idsiswa)
    {
        // dd($request->all());
        $siswa = Siswa::find($idsiswa);
        if ($siswa->mapel()->where('mapel_id', $request->mapel)->exists()) {
            return redirect('siswa/' . $idsiswa . '/profile')->with('gagal', 'Data mata pelajaran sudah ada');
        }
        $siswa->mapel()->attach($request->mapel, ['nilai' => $request->nilai]);

        return redirect('siswa/' . $idsiswa . '/profile')->with('sukses', 'Nilai berhasil diinput');
    }

    public function delete_nilai($idsiswa, $idmapel)
    {
        $siswa = Siswa::find($idsiswa);
        $siswa->mapel()->detach($idmapel);
        return redirect()->back()->with('sukses', 'Nilai siswa telah dihapus');
    }

    public function profil_saya()
    {
        $title = 'Profil Saya';
        $id = \Auth::user()->id;
        $dt =  User::with('r_siswa_user')->find($id);
        $orang_tua = Orang_tua_wali::where('user_id', $id)->first();
        return view('backend.siswa.profil_saya', compact(['dt', 'title', 'orang_tua']));
    }

    public function update_profil(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'photo' => 'image',

            'nisn' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'ijazah' => 'mimes:pdf,jpg,jpeg,png'
        ], [
            'photo.image' => 'Pas foto yang anda masukkan bukan image!',
            'ijazah.mimes' => 'Softfile ijazah anda wajib berbentuk pdf atau gambar!'
        ]);

        try {

            // Menyimpan data dari model user
            $user = User::with('r_siswa_user')->find($id);

            // update data users
            $user['name'] = $request->nama;
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

                $photo->move('biodata', $nama_photo . $photo->getClientOriginalExtension());
                $user['photo'] = $nama_photo . $photo->getClientOriginalExtension();
            }

            $user->update();

            // Menyimpan data dari model Siswa, 
            // karna menggunakan where(),
            // maka variabel penyimpan model tidak boleh sama dengan variabel penyimpan data dari form

            // Menyimpan data dari model Siswa, 
            // karna menggunakan where(),
            // maka variabel penyimpan model tidak boleh sama dengan variabel penyimpan data dari form
            $data_siswa = Siswa::where('user_id', $id);

            // update data ke tbl_siswa
            $siswa['nama_panggilan'] = $request->nama_panggilan;
            $siswa['nisn'] = $request->nisn;
            $siswa['jenis_kelamin'] = $request->jenis_kelamin;
            $siswa['tempat_lahir'] = $request->tempat_lahir;
            $siswa['tanggal_lahir'] = $request->tanggal_lahir;
            $siswa['agama'] = $request->agama;
            $siswa['alamat'] = $request->alamat;
            $siswa['asal_sekolah'] = $request->asal_sekolah;
            $siswa['alamat_asal_sekolah'] = $request->alamat_asal_sekolah;
            $siswa['anak_ke'] = $request->anak_ke;
            $siswa['jumlah_saudara'] = $request->jumlah_saudara;
            $siswa['telp_rumah'] = $request->telp_rumah;
            $siswa['provinsi'] = $request->provinsi;
            $siswa['kabupaten'] = $request->kabupaten;
            $siswa['kecamatan'] = $request->kecamatan;
            $siswa['kode_pos'] = $request->kode_pos;
            $siswa['golongan_darah'] = $request->golongan_darah;
            $siswa['tinggi_badan'] = $request->tinggi_badan;
            $siswa['berat_badan'] = $request->berat_badan;
            $siswa['ket_riwayat_penyakit'] = $request->ket_riwayat_penyakit;
            $siswa['status_anak'] = $request->status_anak;
            $siswa['status_orang_tua'] = $request->status_orang_tua;
            $siswa['status_asuh'] = $request->status_asuh;
            // $siswa['jurusan_pilihan1'] = $request->jurusan_pilihan1;
            // $siswa['jurusan_pilihan2'] = $request->jurusan_pilihan2;
            $siswa['updated_at'] = date('Y-m-d H:i:s');

            $old_ijazah = public_path('/biodata/') . $user->r_siswa_user['ijazah'];
            $nama_ijazah = 'ijazah-' . $request->email . '.';
            $ijazah = $request->file('ijazah');
            if ($ijazah) {
                if (file_exists($old_ijazah)) {
                    @unlink($old_ijazah);
                }

                $ijazah->move('biodata', $nama_ijazah . $ijazah->getClientOriginalExtension());
                $siswa['ijazah'] = $nama_ijazah . $ijazah->getClientOriginalExtension();
            }

            $data_siswa->update($siswa);

            $data_ortu = Orang_tua_wali::where('user_id', $id);

            $orang_tua['nama_ayah'] = $request->nama_ayah;
            $orang_tua['penghasilan_ayah'] = $request->penghasilan_ayah;
            $orang_tua['pendidikan_ayah'] = $request->pendidikan_ayah;
            $orang_tua['pekerjaan_ayah'] = $request->pekerjaan_ayah;
            $orang_tua['no_hp_ayah'] = $request->no_hp_ayah;
            $orang_tua['alamat_ayah'] = $request->alamat_ayah;
            $orang_tua['nama_ibu'] = $request->nama_ibu;
            $orang_tua['penghasilan_ibu'] = $request->penghasilan_ibu;
            $orang_tua['pendidikan_ibu'] = $request->pendidikan_ibu;
            $orang_tua['pekerjaan_ibu'] = $request->pekerjaan_ibu;
            $orang_tua['no_hp_ibu'] = $request->no_hp_ibu;
            $orang_tua['alamat_ibu'] = $request->alamat_ibu;
            $orang_tua['nama_wali'] = $request->nama_wali;
            $orang_tua['penghasilan_wali'] = $request->penghasilan_wali;
            $orang_tua['pendidikan_wali'] = $request->pendidikan_wali;
            $orang_tua['pekerjaan_wali'] = $request->pekerjaan_wali;
            $orang_tua['no_hp_wali'] = $request->no_hp_wali;
            $orang_tua['alamat_wali'] = $request->alamat_wali;

            $orang_tua['updated_at'] = date('Y-m-d H:i:s');

            $data_ortu->update($orang_tua);

            \Session::flash('sukses', 'Data profil berhasil di update');
        } catch (\Exception $e) {
            \Session::flash('gagal', $e->getMessage());
        }

        return redirect()->back();
    }





    public function ganti_password(Request $request, $id)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect(route('password_baru', $id));
        }
        return redirect()->back()->with('gagal', 'Email atau password anda salah!');
    }

    public function password_baru($id)
    {
        $title = 'Password Baru';

        return view('backend.siswa.password_baru', compact('title', 'id'));
    }

    public function update_password(Request $request, $id)
    {
        // dd($request->all());

        $user = User::find($id);

        // update data users
        $user['password'] = bcrypt($request->password);
        $user->update();

        \Session::flash('sukses', 'Password telah di update');
        return redirect(route('profil_saya'));
    }
}
