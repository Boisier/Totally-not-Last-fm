<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
  /**
     * Run the migrations.
     *
     * @return void
     */
<<<<<<< HEAD
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id_user');
            $table->string('user_password', 255);
            $table->date('user_birthday');
            $table->string('user_email', 255);
        });
    }
=======
  public function up()
  {
    Schema::create('user', function (Blueprint $table) {
      $table->engine = 'InnoDB';
      $table->bigIncrements('user_id_user');
      $table->string('user_mail');
      $table->string('user_username');
      $table->string('user_password');
      $table->date('user_birthday');
      $table->nullableTimestamps();
    });
  }
>>>>>>> feature/back/seeder

  /**
     * Reverse the migrations.
     *
     * @return void
     */
  public function down()
  {
    DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    Schema::dropIfExists('user');
    DB::statement('SET FOREIGN_KEY_CHECKS = 1');
  }
}
