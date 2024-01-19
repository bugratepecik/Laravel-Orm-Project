<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Song;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        $artists = Artist::all();
        $albums = Album::all();
        $songs = Song::all();
        return view('index', compact('artists', 'albums', 'songs'));
    }

    public function create()
    {
        return view('albums.create');
    }

    public function store(Request $request)
    {
  
        $request->validate([
            'artist_id' => 'required|exists:artists,artist_id',
            'name' => 'required',
            'year' => 'required|numeric|min:1400|max:2099',
            'genre' => 'required',
            'lang' => 'required',
        ]);
        try{
        $album = new Album;
        $album->name = $request->input('name');
        $album->year = $request->input('year');
        $album->genre = $request->input('genre');
        $album->lang = $request->input('lang');
        $artistId = $request->input('artist_id');
        $artist = Artist::findOrFail($artistId);
        $album->artist()->associate($artist);
                $album->save();

        return back()->with('success', 'Albüm başarıyla oluşturuldu. İlişkili sanatçı: ' . $artist->name);
        }
        catch (\Exception $e) {
            dd($e->getMessage());

        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'artist_id' => 'required|exists:artists,artist_id',
            'name' => 'required',
            'year' => 'required|numeric|min:1400|max:2099',
            'genre' => 'required',
            'lang' => 'required',
        ]);

        $album = Album::findOrFail($id);
        $album->name = $request->input('name');
        $album->year = $request->input('year');
        $album->genre = $request->input('genre');
        $album->lang = $request->input('lang');
        $album->artist_id = $request->input('artist_id');
        $album->save();

        return back()->with('success', 'Albüm başarıyla güncellendi.');
    }

    public function destroy($id)
    {
        Album::find($id)->delete();
        return back();
    }
}