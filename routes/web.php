<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\SongController;
Route::resource('/orm', ArtistController::class);
Route::post('/artists/create', ArtistController::class .'@store')->name('artists.store');
Route::delete('/artists/{id}', ArtistController::class .'@destroy')->name('artist.destroy');
Route::put('/artists/{id}', ArtistController::class .'@update')->name('artist.update');
Route::post('/albums/create', AlbumController::class .'@store')->name('album.store');
Route::delete('/albums/{id}', AlbumController::class .'@destroy')->name('album.destroy');
Route::put('/albums/{id}', AlbumController::class .'@update')->name('album.update');
Route::post('/songs/create', SongController::class .'@store')->name('song.store');
Route::delete('/songs/{id}', SongController::class .'@destroy')->name('song.destroy');
Route::put('/songs/{id}', SongController::class .'@update')->name('song.update');