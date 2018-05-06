<?php

use Illuminate\Database\Seeder;
use App\Album;
use App\Artist;
use App\Genre;
use App\History;
use App\Music;
use App\Nationality;
use App\Playlist;
use App\Spotify;
use App\User;

class DatabaseSeeder extends Seeder
{
  /**
     * Run the database seeds.
     *
     * @return void
     */
  public function run()
  {
    // $this->call('UsersTableSeeder');
    //DB::statement('SET FOREIGN_KEY_CHECKS = 0');

/*    Model::unguard();

    $this->call(DatabaseSeeder  ::class);

    Model::reguard();*/


    factory(App\Album::class,100)->create();
    factory(App\Artist::class,100)->create();
    factory(App\Genre::class,100)->create();
    factory(App\History::class,100)->create();
    factory(App\Music::class,100)->create();
    factory(App\Nationality::class,100)->create();
    factory(App\Playlist::class,100)->create();
    factory(App\Spotify::class,100)->create();
    factory(App\User::class,100)->create();

    //DB::statement('SET FOREIGN_KEY_CHECKS = 1');
  }
}
