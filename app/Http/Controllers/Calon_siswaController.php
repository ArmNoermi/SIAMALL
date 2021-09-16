<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\Orang_tua_wali;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class Calon_siswaController extends Controller
{
    public function index()
    {
        $title = 'Calon Siswa';
        $data = Biodata::withCount(['r_user_biodata'])->orderBy('status_anak', 'asc')->get();
        return view('backend.calon-siswa.index', compact('title', 'data'));
    }

    public function verifikasi($id)
    {
        try {
            User::where('id', $id)->update([
                'is_verifikasi' => 1
            ]);
            \Session::flash('sukses', 'Peserta diverifikasi');
        } catch (\Exception $e) {
            \Session::flash('gagal', $e->getMessage());
        }
        return redirect()->back();
    }

    public function lulus($id)
    {
        try {
            User::where('id', $id)->update([
                'is_lulus' => 1,
                'is_menunggu' => 0
            ]);
            \Session::flash('sukses', 'Peserta telah diluluskan');
        } catch (\Exception $e) {
            \Session::flash('gagal', $e->getMessage());
        }
        return redirect()->back();
    }

    // public function terverifikasi()
    // {
    //     $title = 'Calon Siswa Terverifikasi';
    //     $data = User::withCount('r_biodata_user')->where('is_verifikasi', 1)->orderBy('id', 'asc')->get();
    //     return view('backend.calon-siswa.index', compact('title', 'data'));
    // }

    // public function tak_terverifikasi()
    // {
    //     $title = 'Calon Siswa Belum Terverifikasi';
    //     $data = User::withCount('r_biodata_user')->whereNull('is_verifikasi')->orderBy('id', 'asc')->get();
    //     return view('backend.calon-siswa.index', compact('title', 'data'));
    // }

    public function edit($id)
    {
        $title = 'Edit Calon Siswa';
        $dt = User::with('r_biodata_user')->find($id);
        $orang_tua = Orang_tua_wali::where('user_id', $id)->first();

        return view('backend.calon-siswa.edit', compact('title', 'dt', 'orang_tua'));
    }

    public function update(Request $request, $id)
    {
        try {
            // Menyimpan data dari model user
            $user = User::with('r_biodata_user')->find($id);

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

            // Menyimpan data dari model Biodata, 
            // karna menggunakan where(),
            // maka variabel penyimpan model tidak boleh sama dengan variabel penyimpan data dari form
            $data_bio = Biodata::where('user_id', $id);

            // update data Biodata
            $biodata['nama_panggilan'] = $request->nama_panggilan;
            $biodata['nisn'] = $request->nisn;
            $biodata['jenis_kelamin'] = $request->jenis_kelamin;
            $biodata['tempat_lahir'] = $request->tempat_lahir;
            $biodata['tanggal_lahir'] = $request->tanggal_lahir;
            $biodata['agama'] = $request->agama;
            $biodata['alamat'] = $request->alamat;
            $biodata['asal_sekolah'] = $request->asal_sekolah;
            $biodata['alamat_asal_sekolah'] = $request->alamat_asal_sekolah;
            $biodata['anak_ke'] = $request->anak_ke;
            $biodata['jumlah_saudara'] = $request->jumlah_saudara;
            $biodata['telp_rumah'] = $request->telp_rumah;
            $biodata['provinsi'] = $request->provinsi;
            $biodata['kabupaten'] = $request->kabupaten;
            $biodata['kecamatan'] = $request->kecamatan;
            $biodata['kode_pos'] = $request->kode_pos;
            $biodata['golongan_darah'] = $request->golongan_darah;
            $biodata['tinggi_badan'] = $request->tinggi_badan;
            $biodata['berat_badan'] = $request->berat_badan;
            $biodata['ket_riwayat_penyakit'] = $request->ket_riwayat_penyakit;
            $biodata['status_anak'] = $request->status_anak;
            $biodata['status_orang_tua'] = $request->status_orang_tua;
            $biodata['status_asuh'] = $request->status_asuh;
            $biodata['jurusan_pilihan1'] = $request->jurusan_pilihan1;
            $biodata['jurusan_pilihan2'] = $request->jurusan_pilihan2;
            $biodata['updated_at'] = date('Y-m-d H:i:s');

            $old_ijazah = public_path('/biodata/') . $user->r_biodata_user['ijazah'];
            $nama_ijazah = 'ijazah-' . $request->email . '.';
            $ijazah = $request->file('ijazah');
            if ($ijazah) {
                if (file_exists($old_ijazah)) {
                    @unlink($old_ijazah);
                }

                $ijazah->move('biodata', $nama_ijazah . $ijazah->getClientOriginalExtension());
                $biodata['ijazah'] = $nama_ijazah . $ijazah->getClientOriginalExtension();
            }

            $data_bio->update($biodata);

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

            \Session::flash('sukses', 'Data calon siswa berhasil di update');
        } catch (\Exception $e) {
            \Session::flash('gagal', $e->getMessage());
        }

        return redirect('/calon-siswa');
    }

    // public function export($id)
    // {
    //     $title = 'Export Data Peserta';
    //     $dt = User::with('r_biodata_user')->find($id);
    //     // $siswa = Siswa::find($id);

    //     return view('backend.calon-siswa.export', compact('title', 'dt'));
    // }

    public function export($id)
    {
        try {
            User::where('id', $id)->update([
                'is_export' => 1,
                'role' => 'siswa'
            ]);
            \Session::flash('sukses', 'Peserta telah diluluskan');
        } catch (\Exception $e) {
            \Session::flash('gagal', $e->getMessage());
        }
        return redirect()->back();
    }

    public function hapus($id)
    {
        try {
            $data =  User::with('r_biodata_user')->find($id);
            $photo = public_path('/biodata/') . $data->photo;
            if (file_exists($photo)) {
                @unlink($photo);
            }

            $ijazah = public_path('/biodata/') . $data->r_biodata_user['ijazah'];
            if (file_exists($ijazah)) {
                @unlink($ijazah);
            }

            $data->delete();
            \Session::flash('sukses', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            \Session::flash('gagal', $e->getMessage());
        }
        return redirect()->back();
    }
}
