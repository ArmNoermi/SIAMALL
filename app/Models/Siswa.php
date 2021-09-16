<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'tbl_siswa';
    protected $fillable = [
        'user_id',
        'kelas_id',
        'semester_id',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'nisn',
        'alamat',
        'ijazah'
    ];

    public function r_user_siswa()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class)->withPivot(['nilai']);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
}
