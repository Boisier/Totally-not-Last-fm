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
      /*
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

		/*-------associations-------
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
		});*/
	}

	/*Reverse migrations*/
	
	public function down(){
		//history
		/*Schema::table('histories', function(Blueprint $table){
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

		//be
		Schema::table('be', function(Blueprint $table){
			$table->dropForeign('be_genre_id_genre_foreign');
		});

		Schema::table('be', function(Blueprint $table){
			$table->dropForeign('be_music_id_music_foreign');
		});

		//belong
		Schema::table('belong', function(Blueprint $table){
			$table->dropForeign('belong_playlist_id_playlist_foreign');
		});

		Schema::table('belong', function(Blueprint $table){
			$table->dropForeign('belong_music_id_music_foreign');
		});

		//compose
		Schema::table('compose', function(Blueprint $table){
			$table->dropForeign('compose_artist_id_artist_foreign');
		});

		Schema::table('compose', function(Blueprint $table){
			$table->dropForeign('compose_music_id_music_foreign');
		});

		//contain
		Schema::table('contain', function(Blueprint $table){
			$table->dropForeign('contain_history_id_history_foreign');
		});

		Schema::table('contain', function(Blueprint $table){
			$table->dropForeign('contain_music_id_music_foreign');
		});

		//hold
		Schema::table('hold', function(Blueprint $table){
			$table->dropForeign('hold_artist_id_artist_foreign');
		});

		Schema::table('hold', function(Blueprint $table){
			$table->dropForeign('hold_nationality_id_nationality_foreign');
		});

		//include
		Schema::table('include', function(Blueprint $table){
			$table->dropForeign('include_album_id_album_foreign');
		});

		Schema::table('include', function(Blueprint $table){
			$table->dropForeign('include_music_id_music_foreign');
		});

		//produce
		Schema::table('produce', function(Blueprint $table){
			$table->dropForeign('produce_artist_id_artist_foreign');
		});

		Schema::table('produce', function(Blueprint $table){
			$table->dropForeign('produce_album_id_album_foreign');
		});*/
	}
}
