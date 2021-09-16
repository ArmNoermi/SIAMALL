<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'tbl_guru';
    protected $fillable = [
        'user_id',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'nip',
        'alamat'
    ];

    public function r_user_guru()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function mapel()
    {
        return $this->hasMany(Mapel::class);
    }
}
