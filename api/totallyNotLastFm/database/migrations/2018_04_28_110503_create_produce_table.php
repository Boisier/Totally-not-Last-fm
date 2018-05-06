<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduceTable extends Migration
{
  /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
  {
    Schema::create('produce', function (Blueprint $table) {
      $table->engine = 'InnoDB';
      $table->increments('artist_id_artist');
      $table->integer('album_id_album');
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
    Schema::dropIfExists('produce');
  }
}
