<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration
{
  /**
     * Run the migrations.
     *
     * @return void
     */
  public function up(){
    /*-------tables-------*/
    //history

    Schema::table('histories', function(Blueprint $table){
      $table->foreign('user_id_user')
        ->references('user_id_user')
        ->on('users')
        ->onDelete('restrict')
        ->onUpdate('restrict');
    });

    //playlist
    Schema::table('playlists', function(Blueprint $table){
      $table->foreign('user_id_user')
        ->references('user_id_user')
        ->on('users')
        ->onDelete('restrict')
        ->onUpdate('restrict');
    });

    //spotify
    Schema::table('spotify', function(Blueprint $table){
      $table->foreign('user_id_user')
        ->references('user_id_user')
        ->on('users')
        ->onDelete('restrict')
        ->onUpdate('restrict');
    });

    /*-------associations------- */
    //be
    Schema::table('be', function (Blueprint $table){
      $table->foreign('genre_id_genre')
        ->references('genre_id_genre')
        ->on('genres')
        ->onDelete('restrict')
        ->onUpdate('restrict');
    });

    Schema::table('be', function (Blueprint $table){
      $table->foreign('music_id_music')
        ->references('music_id_music')
        ->on('musics')
        ->onDelete('restrict')
        ->onUpdate('restrict');
    });

    //belong
    Schema::table('belong', function (Blueprint $table){
      $table->foreign('playlist_id_playlist')
        ->references('playlist_id_playlist')
        ->on('playlists')
        ->onDelete('restrict')
        ->onUpdate('restrict');
    });

    Schema::table('belong', function (Blueprint $table){
      $table->foreign('music_id_music')
        ->references('music_id_music')
        ->on('musics')
        ->onDelete('restrict')
        ->onUpdate('restrict');
    });

    //compose
    Schema::table('compose', function (Blueprint $table){
      $table->foreign('artist_id_artist')
        ->references('artist_id_artist')
        ->on('artists')
        ->onDelete('restrict')
        ->onUpdate('restrict');
    });

    Schema::table('compose', function (Blueprint $table){
      $table->foreign('music_id_music')
        ->references('music_id_music')
        ->on('musics')
        ->onDelete('restrict')
        ->onUpdate('restrict');
    });

    //contain
    Schema::table('contain', function (Blueprint $table){
      $table->foreign('history_id_history')
        ->references('history_id_history')
        ->on('histories')
        ->onDelete('restrict')
        ->onUpdate('restrict');
    });

    Schema::table('contain', function (Blueprint $table){
      $table->foreign('music_id_music')
        ->references('music_id_music')
        ->on('musics')
        ->onDelete('restrict')
        ->onUpdate('restrict');
    });

    //hold
    Schema::table('hold', function (Blueprint $table){
      $table->foreign('artist_id_artist')
        ->references('artist_id_artist')
        ->on('artists')
        ->onDelete('restrict')
        ->onUpdate('restrict');
    });

    Schema::table('hold', function (Blueprint $table){
      $table->foreign('nationality_id_nationality')
        ->references('nationality_id_nationality')
        ->on('nationalities')
        ->onDelete('restrict')
        ->onUpdate('restrict');
    });

    //include
    Schema::table('include', function (Blueprint $table){
      $table->foreign('album_id_album')
        ->references('album_id_album')
        ->on('albums')
        ->onDelete('restrict')
        ->onUpdate('restrict');
    });

    Schema::table('include', function (Blueprint $table){
      $table->foreign('music_id_music')
        ->references('music_id_music')
        ->on('musics')
        ->onDelete('restrict')
        ->onUpdate('restrict');
    });

    //produce
    Schema::table('produce', function (Blueprint $table){
      $table->foreign('album_id_album')
        ->references('album_id_album')
        ->on('albums')
        ->onDelete('restrict')
        ->onUpdate('restrict');
    });

    Schema::table('produce', function (Blueprint $table){
      $table->foreign('artist_id_artist')
        ->references('artist_id_artist')
        ->on('artists')
        ->onDelete('restrict')  
        ->onUpdate('restrict');
    });
  }

  /*Reverse migrations*/

  public function down(){


    //be
    Schema::table('be', function(Blueprint $table){
      $table->dropForeign('genre_id_genre');
    });

    Schema::table('be', function(Blueprint $table){
      $table->dropForeign('music_id_music');
    });

    //belong
    Schema::table('belong', function(Blueprint $table){
      $table->dropForeign('playlist_id_playlist');
    });

    Schema::table('belong', function(Blueprint $table){
      $table->dropForeign('music_id_music');
    });

    //compose
    Schema::table('compose', function(Blueprint $table){
      $table->dropForeign('artist_id_artist');
    });

    Schema::table('compose', function(Blueprint $table){
      $table->dropForeign('music_id_music');
    });

    //contain
    Schema::table('contain', function(Blueprint $table){
      $table->dropForeign('history_id_history');
    });

    Schema::table('contain', function(Blueprint $table){
      $table->dropForeign('music_id_music');
    });

    //hold
    Schema::table('hold', function(Blueprint $table){
      $table->dropForeign('artist_id_artist');
    });

    Schema::table('hold', function(Blueprint $table){
      $table->dropForeign('nationality_id_nationality');
    });

    //include
    Schema::table('include', function(Blueprint $table){
      $table->dropForeign('album_id_album');
    });

    Schema::table('include', function(Blueprint $table){
      $table->dropForeign('music_id_music');
    });

    //produce
    Schema::table('produce', function(Blueprint $table){
      $table->dropForeign('artist_id_artist');
    });

    Schema::table('produce', function(Blueprint $table){
      $table->dropForeign('album_id_album');
    });

    //history
    Schema::table(' histories', function(Blueprint $table){
      $table->dropForeign('histories_user_id_user_foreign');
    });

    //playlist
    Schema::table('playlists', function(Blueprint $table){
      $table->dropForeign('playlists_user_id_user_foreign');
    });

    //playlist
    Schema::table('spotify', function(Blueprint $table){
      $table->dropForeign('spotify_user_id_user_foreign');
    });

  }
}
