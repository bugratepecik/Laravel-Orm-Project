<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $primaryKey = 'album_id';
    protected $fillable = ['name', 'year', 'genre', 'lang', 'artist_id'];

    public function songs()
    {
        return $this->hasMany(Song::class, 'album_id');
    }

    public function artist()
    {
        return $this->belongsTo(Artist::class, 'artist_id');
    }
}
