<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaylistsTable extends Migration
{
  /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
  {
    Schema::create('playlists', function (Blueprint $table) {
      $table->engine = 'InnoDB';
      $table->increments('playlist_id_playlist');
      $table->char('playlist_description');
      $table->char('playlist_name');
      $table->nullableTimestamps();
    });
  }

  /**
     * Reverse the migrations.
     *
     * @return void
     */
  public function down()
  {
    Schema::dropIfExists('playlists');
  }
}
