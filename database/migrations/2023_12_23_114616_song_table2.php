<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id('song_id');
            $table->string('name');
            $table->time('duration'); 
            $table->bigInteger('artist_id')->unsigned()->index()->nullable();
            $table->foreign('artist_id')->references('artist_id')->on('artists')->onDelete('cascade');
            $table->bigInteger('album_id')->unsigned()->index()->nullable();
            $table->foreign('album_id')->references('album_id')->on('albums')->onDelete('cascade');
            $table->timestamps();
        });    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songs');
    }
};
