<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    protected $primaryKey = 'song_id';
    protected $fillable = ['name', 'duration', 'artist_id', 'album_id'];

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id');
    }

    public function artist()
    {
        return $this->belongsTo(Artist::class, 'artist_id');
    }
}
