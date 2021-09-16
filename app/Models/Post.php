<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;
    protected $table = 'tbl_posting';
    protected $fillable = ['user_id', 'title', 'highlight', 'konten', 'slug', 'thumbnail'];
    protected $dates = ['created_at'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function thumbnail()
    {
        return !$this->thumbnail ? asset('/thumbnail-berita/no-thumbnail.jpg') : '/thumbnail-berita/' . $this->thumbnail;
    }
}
