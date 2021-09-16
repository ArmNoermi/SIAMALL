<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;
    protected $table = 'tbl_semester';
    protected $fillable = ['nama'];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }

    public function mapel()
    {
        return $this->hasMany(Mapel::class);
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
}
