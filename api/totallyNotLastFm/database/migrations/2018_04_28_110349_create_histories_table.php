<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriesTable extends Migration
{
  /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
  {
    Schema::create('histories', function (Blueprint $table) {
      $table->engine = 'InnoDB';
      $table->increments('history_id_history');
      $table->bigInteger('user_id_user');
      $table->time('history_play_time');
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
    Schema::dropIfExists('histories');
  }
}
