<?php

namespace App\Http\Controllers;
use App\Models\Song;
use App\Models\artist;
use App\Models\Album;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index()
    {   $artists = Artist::all();
        $albums = Album::all();
        $songs = Song::all();
        return view('index', compact('artists', 'albums', 'songs'));
    }

    public function create()
    {
        return view('songs.create');
    }

    public function store(Request $request)
    {  
      
            $this->validate($request, [
            'name' => 'required|string',
            'duration' => 'required|date_format:H:i',
            'album_id' => 'required|exists:albums,album_id',
        ]);
        $song = new Song;
        $song->name =$request->input('name');
        $song->duration =$request->input('duration');
        $albumId = $request->input('album_id');
        $album = Album::findOrFail($albumId);
        $song->album()->associate($album); 
         $artist = $album->artist;
        $song->artist()->associate($artist);
    
        $song->save();
        return back();
     }

    public function show($id)
    {
        $song = Song::findOrFail($id);
        return view('songs.show', compact('song'));
    }

    public function edit($id)
    {
        $song = Song::findOrFail($id);
        return view('songs.edit', compact('song'));
    }

    public function update(Request $request, $id)
    {

        $song = Song::find($id);
        $song->name =$request->input('name');
        $song->duration =$request->input('duration');
        $albumId = $request->input('album_id');
        $album = Album::findOrFail($albumId);
        $song->album()->associate($album); 
         $artist = $album->artist;
        $song->artist()->associate($artist);
        

        $song->save();
        return back();
    }

    public function destroy($id)
    {
        $song = Song::findOrFail($id);
        $song->delete();

        return redirect()->route('songs.index')->with('success', 'Şarkı başarıyla silindi.');
    }
}
