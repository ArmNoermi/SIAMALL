<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function edit_nilai(Request $request, $id)
    {
        // return $request->all();
        $siswa = Siswa::find($id);
        $siswa->mapel()->updateExistingPivot($request->pk, [
            'nilai' => $request->value,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
