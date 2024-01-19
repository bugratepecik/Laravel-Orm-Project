<?php

namespace App\Http\Controllers;
use App\Models\artist;
use App\Models\Album;
use App\Models\Song;
use Illuminate\Http\Request;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\SongController;

class ArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::all();
        $albums = Album::all();
        $songs = Song::all();
        return view('orm', compact(['artists','albums','songs']));
    }
    public function store(Request $request)
    {
        $artist = new artist;

        $artist->name =$request->input('name');
        $artist->country =$request->input('country');
        $artist->birth_date =$request->input('birth_date');
        $artist->genre =$request->input('genre');
        $artist->save();
        return back();
    }

    public function edit($id)
    {
        $artist = Artist::findOrFail($id);
        return view('artists.edit', compact('artist'));
    }

    public function update(Request $request, $id)
    {
        $artist = Artist::findOrFail($id);
        $artist->name =$request->input('name');
        $artist->country =$request->input('country');
        $artist->birth_date =$request->input('birth_date');
        $artist->genre =$request->input('genre');
        $artist->save();
        return back();
    }

    public function destroy($id)
    {
      Artist::find($id)->delete();
        return back();
    }

public function create()
    {
        return view('artists.create');
    }
public function saved(){
    return view('index');
}

}