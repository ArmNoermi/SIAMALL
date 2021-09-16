<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Semester;
use App\Models\Siswa;
use Illuminate\Http\Request;

class Nilai_siswaController extends Controller
{
    public function index()
    {
        $title = 'Nilai Siswa';
        $user_id = \Auth::user()->id;

        $data = Siswa::where('user_id', $user_id)->first();
        $semester = Semester::all();

        // dd($data);
        return view('backend.nilai-siswa.index', compact('title', 'data', 'semester'));
    }

    public function nilai_siswa($id)
    {
        // dd($_REQUEST);
        $title = 'Daftar Nilai Siswa';
        $siswa = Siswa::with('r_user_siswa')->find($id);
        $mapel = Mapel::all();

        $nilai = $siswa->mapel->where('semester', $_REQUEST['semester']);

        $categories = [];
        $data = [];

        foreach ($mapel as $mp) {
            if ($siswa->mapel()->wherePivot('mapel_id', $mp->id)->first()) {
                $categories[] = $mp->nama;
                $data[] = $siswa->mapel()->wherePivot('mapel_id', $mp->id)->first()->pivot->nilai;
            }
        }

        return view('backend.nilai-siswa.nilai', [
            'siswa' => $siswa,
            'mapel' => $mapel,
            'nilai' => $nilai,
            'categories' => $categories,
            'data' => $data,
            'title' => $title
        ]);
    }
}
