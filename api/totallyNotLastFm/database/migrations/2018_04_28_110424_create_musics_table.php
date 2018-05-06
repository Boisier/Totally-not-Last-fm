<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMusicsTable extends Migration
{
  /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
  {
    Schema::create('musics', function (Blueprint $table) {
      $table->engine = 'InnoDB';
      $table->increments('music_id_music');
      $table->string('music_title', 255);
      $table->time('music_duration');
      $table->dateTime('music_release_date');
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
    Schema::dropIfExists('musics');
  }
}
