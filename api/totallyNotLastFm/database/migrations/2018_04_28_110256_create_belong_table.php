<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBelongTable extends Migration
{
  /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
  {
    Schema::create('belong', function (Blueprint $table) {
      $table->engine = 'InnoDB';
      $table->unsignedBigInteger('playlist_id_playlist');
      $table->unsignedBigInteger('music_id_music');
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
    Schema::dropIfExists('belong');
  }
}
