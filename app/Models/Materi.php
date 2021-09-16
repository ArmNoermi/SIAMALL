<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;
    protected $table = 'tbl_materi';
    protected $fillable = ['mapel_id', 'judul_materi', 'file'];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
}
