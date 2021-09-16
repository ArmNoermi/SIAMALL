<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\Orang_tua_wali;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PDF;

class BiodataController extends Controller
{
    public function index()
    {
        $title = 'Biodata';
        $cek = Biodata::where('user_id', \Auth::user()->id)->count();
        return view('backend.biodata.index', compact('title', 'cek'));
    }


    public function complete_bio(Request $request, $id)
    {
        $this->validate($request, [

            'nisn' => 'unique:tbl_siswa',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
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
            'jurusan_pilihan1' => 'required',
            'jurusan_pilihan2' => 'required',

        ], [
            'nisn.unique' => 'NISN telah digunakan sebelumnya!',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi!',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi!',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih!',
            'agama.required' => 'Agama calon siswa wajib dipilih!',
            'alamat.required' => 'Alamat calon siswa wajib diisi!',
            'ijazah.required' => 'Harap masukkan softfile ijazah anda!',
            'ijazah.mimes' => 'Softfile ijazah anda wajib berbentuk pdf atau gambar!'
        ]);

        $data['user_id'] = $id;

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

        $nama_ijazah = 'ijazah-skhu-' . \Auth::user()->email . '.';
        $file = $request->file('ijazah');
        if ($file) {
            $file->move('biodata', $nama_ijazah .  $file->getClientOriginalExtension());
            $data['ijazah'] = $nama_ijazah . $file->getClientOriginalExtension();
        }

        Biodata::insert($data);

        $orang_tua['user_id'] = $id;

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

        \Session::flash('sukses', 'Data diri telah dilengkapi!');

        return redirect(route('bio_data'));
    }

    public function edit_bio($id)
    {
        $title = 'Edit Biodata';
        $biodata = Biodata::where('user_id', \Auth::user()->id)->first();
        $orang_tua = Orang_tua_wali::where('user_id', \Auth::user()->id)->first();
        return view('backend.biodata.edit', compact('title', 'biodata', 'orang_tua'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nisn' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'ijazah' => 'mimes:pdf,jpg,jpeg,png'
        ], [
            'nisn.unique' => 'NISN telah digunakan sebelumnya!',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi!',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi!',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih!',
            'agama.required' => 'Agama calon siswa wajib dipilih!',
            'alamat.required' => 'Alamat calon siswa wajib diisi!',

            'ijazah.mimes' => 'Softfile ijazah anda wajib berbentuk pdf atau gambar!'
        ]);

        $data = Biodata::where('user_id', $id)->first();

        $data['user_id'] = $id;

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
        $data['ket_riwayat_penyakit'] = $request->ket_riwayat_penyakit;
        $data['status_anak'] = $request->status_anak;
        $data['status_orang_tua'] = $request->status_orang_tua;
        $data['status_asuh'] = $request->status_asuh;
        $data['jurusan_pilihan1'] = $request->jurusan_pilihan1;
        $data['jurusan_pilihan2'] = $request->jurusan_pilihan2;

        $data['updated_at'] = date('Y-m-d H:i:s');

        // $in_storage = Biodata::user()->biodata()->ijazah;
        // if ($in_storage) {
        //     Storage::delete('biodata/' . $in_storage);
        // }

        $old_ijazah = public_path('/biodata/') . $data->ijazah;
        $nama_ijazah = 'ijazah-' . \Auth::user()->email . '.';
        $file = $request->file('ijazah');
        if ($file) {
            if (file_exists($old_ijazah)) {
                @unlink($old_ijazah);
            }

            $file->move('biodata', $nama_ijazah .  $file->getClientOriginalExtension());
            $data['ijazah'] = $nama_ijazah . $file->getClientOriginalExtension();
        }

        $data->update();
        // Biodata::where('users', $id)->update($data);

        $orang_tua['user_id'] = $id;

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

        Orang_tua_wali::where('user_id', $id)->update($orang_tua);

        \Session::flash('sukses', 'Data diri telah berhasil diupdate!');

        return redirect(route('bio_data'));
    }

    // public function cetak_bukti_pendaftaran()
    // {
    //     $cetak_bukti = User::all();
    //     $pdf = PDF::loadView('back-end.biodata.cetak_bukti', compact('cetak_bukti'));
    //     return $pdf->stream('bukti-pendaftaran.pdf');
    // }

    public function cetak_bukti()
    {
        try {
            $dt = User::where('id', \Auth::user()->id)->with('r_biodata_user')->first();

            $pdf = PDF::loadview('backend.biodata.cetak_bukti', compact('dt'))->setPaper('a4', 'portrait');
            return $pdf->stream();
        } catch (\Exception $e) {
            \Session::flash('gagal', $e->getMessage() . ' ! ' . $e->getLine());
        }

        return redirect()->back();
    }

    public function ganti_password(Request $request, $id)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect(route('bio_data.password_baru', $id));
        }
        return redirect()->back()->with('gagal', 'Email atau password anda salah!');
    }

    public function password_baru($id)
    {
        $title = 'Password Baru';
        return view('backend.biodata.password_baru', compact('title', 'id'));
    }

    public function update_password(Request $request, $id)
    {
        // dd($request->all());

        $user = User::find($id);

        // update data users
        $user['password'] = bcrypt($request->password);
        $user->update();

        \Session::flash('sukses', 'Password di update');
        return redirect(route('bio_data'));
    }
}
