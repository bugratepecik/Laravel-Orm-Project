<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;
    protected $primaryKey = 'artist_id';
    protected $fillable = ['name', 'country',  'genre'];

    public function albums()
    {
        return $this->hasMany(Album::class, 'artist_id');
    }
     public function songs()
    {
        return $this->hasMany(Song::class, 'artist_id');
    }
}
