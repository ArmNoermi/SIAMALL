<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\Guru;
use App\Models\Mapel;
use App\Models\Post;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';

        $user_id = \Auth::user()->id;

        $data = auth()->user();

        $cek = Biodata::where('user_id', $user_id)->count();
        if ($cek < 1) {
            $pesan = 'Harap Melengkapi Biodata Anda Terlebih Dahulu :)';
        } else {
            $pesan = 'Biodata Anda Telah Lengkap. Terima Kasih :)';
        }

        $cek_verifikasi = User::find($user_id);

        if ($cek_verifikasi->is_verifikasi == 1) {
            $status = 'Yay anda telah diverifikasi !';
        } else {
            $status = 'Status Anda Belum Diverifikasi';
        }

        $cek_lulus = User::find($user_id);

        if ($cek_lulus->is_lulus == 1) {
            $pesan_lulus = 'Asik anda telah dinyatakan lulus !';
        } else {
            $pesan_lulus = 'Status Anda Belum Diluluskan';
        }

        $jumlah_guru = Guru::count();
        $jumlah_siswa = Siswa::count();
        $jumlah_postingan = Post::count();
        $jumlah_mapel = Mapel::count();

        return view('backend.dashboard.index', compact(
            'title',
            'pesan',
            'cek',
            'status',
            'pesan_lulus',
            'data',
            'jumlah_siswa',
            'jumlah_guru',
            'jumlah_postingan',
            'jumlah_mapel'
        ));
    }

    // public function index()
    // {
    //     $title = 'Dashboard';
    //     return view('backend.dashboard.index', compact('title'));
    // }
}
