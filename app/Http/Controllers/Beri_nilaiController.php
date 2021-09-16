<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Semester;
use App\Models\Siswa;
use Illuminate\Http\Request;

class Beri_nilaiController extends Controller
{
    public function index()
    {
        $title = 'Beri Nilai';
        $user_id = \Auth::user()->id;
        $data = Guru::where('user_id', $user_id)->first();

        $guru_id = $data->id;
        $mapel = Mapel::where('guru_id', $guru_id)->get();

        $kelas = Kelas::all();
        $semester = Semester::all();
        $siswa = Siswa::first();

        // $mapel_id = $mapel->id;

        // dd($siswa);
        return view('backend.beri-nilai.index', compact(['title', 'semester', 'data', 'mapel', 'kelas', 'siswa']));
    }

    public function beri_nilai()
    {
        // dd($_REQUEST);
        $title = 'Penilaian Siswa';
        $siswa = Siswa::where([
            'kelas_id' => $_REQUEST['kelas'],
            'semester_id' => $_REQUEST['semester']
        ])->get();
        $mapel = Mapel::all();

        // $nilai = $siswa->mapel->where('semester', $_REQUEST['semester']);

        // $categories = [];
        // $data = [];

        // foreach ($mapel as $mp) {
        //     if ($siswa->mapel()->wherePivot('mapel_id', $mp->id)->first()) {
        //         $categories[] = $mp->nama;
        //         $data[] = $siswa->mapel()->wherePivot('mapel_id', $mp->id)->first()->pivot->nilai;
        //     }
        // }

        return view('backend.beri-nilai.beri_nilai', [
            'siswa' => $siswa,
            'mapel' => $mapel,
            // 'nilai' => $nilai,
            // 'categories' => $categories,
            // 'data' => $data,
            'title' => $title
        ]);
    }

    public function penilaian($idsiswa, $idsemester)
    {
        $title = 'Penilaian';
        $siswa = Siswa::with('r_user_siswa')->find($idsiswa);

        $mapel = $siswa->mapel->where('semester', $idsemester);

        $mata_pelajaran = Mapel::where('semester', $idsemester)->get();

        return view('backend.beri-nilai.penilaian', [
            'siswa' => $siswa,
            'mapel' => $mapel,
            'mata_pelajaran' => $mata_pelajaran,
            // 'nilai' => $nilai,
            // 'categories' => $categories,
            // 'data' => $data,
            'title' => $title
        ]);
    }

    public function tambahNilai(Request $request, $idsiswa)
    {
        // dd($request->all());
        $siswa = Siswa::find($idsiswa);
        if ($siswa->mapel()->where('mapel_id', $request->mapel)->exists()) {
            return redirect()->back()->with('gagal', 'Data mata pelajaran sudah ada');
        }
        $siswa->mapel()->attach($request->mapel, ['nilai' => $request->nilai]);

        return redirect()->back()->with('sukses', 'Nilai berhasil diinput');
    }

    public function hapus_nilai($idsiswa, $idmapel)
    {
        $siswa = Siswa::find($idsiswa);
        $siswa->mapel()->detach($idmapel);
        return redirect()->back()->with('sukses', 'Nilai telah dihapus');
    }
}
