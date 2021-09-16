<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;
    protected $table = 'tbl_siswa';


    public function r_user_biodata()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
