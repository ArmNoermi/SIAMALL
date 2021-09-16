<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    protected $table = 'tbl_mapel';
    protected $fillable = [
        'kode',
        'nama',
        'semester',
        'guru_id'
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class)->withPivot(['nilai']);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function materi()
    {
        return $this->hasMany(Materi::class);
    }
}
