<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComposeTable extends Migration
{
  /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
  {
    Schema::create('compose', function (Blueprint $table) {
      $table->engine = 'InnoDB';
      $table->increments('artist_id_artist', 255);
      $table->integer('music_id_music');
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
    Schema::dropIfExists('compose');
  }
}
