<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getPhoto()
    {
        if (!$this->photo) {
            return asset('biodata/default.jpg');
        }
        return asset('biodata/' . $this->photo);
    }

    public function r_biodata_user()
    {
        return $this->hasOne('App\Models\Biodata', 'user_id', 'id')->withDefault([
            'nama_panggilan' => null
        ]);
    }

    public function r_orang_tua_user()
    {
        return $this->hasOne('App\Models\Orang_tua_wali', 'user_id', 'id')->withDefault([
            'nama_ayah' => null
        ]);
    }

    public function r_siswa_user()
    {
        return $this->hasOne('App\Models\Siswa', 'user_id', 'id')->withDefault([
            'nama_lengkap' => null
        ]);
    }

    public function r_guru_user()
    {
        return $this->hasOne('App\Models\Guru', 'user_id', 'id')->withDefault([
            'nama' => null
        ]);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function mapel()
    {
        return $this->hasMany(Mapel::class);
    }
}
