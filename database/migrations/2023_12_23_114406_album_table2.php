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
        Schema::create('albums', function (Blueprint $table) {
            $table->id('album_id');
            $table->string('name');
            $table->integer('year');
            $table->string('genre');
            $table->decimal('sale') -> nullable();
            $table->string('lang');
            $table->bigInteger('artist_id')->unsigned()->index()->nullable();
            $table->foreign('artist_id')->references('artist_id')->on('artists')->onDelete('cascade');
            $table->timestamps();
        });    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('albums');
   
    }
};
