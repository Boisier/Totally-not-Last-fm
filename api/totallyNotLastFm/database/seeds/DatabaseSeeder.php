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
      DB::statement('SET FOREIGN_KEY_CHECKS = 0');
      
        
      factory(Album::class,100)->create();
      factory(Artist::class,100)->create();
      factory(Genre::class,100)->create();
      factory(History::class,100)->create();
      factory(Music::class,100)->create();
      factory(Nationality::class,100)->create();
      factory(Playlist::class,100)->create();
      factory(Spotify::class,100)->create();
      factory(User::class,100)->create();
      
      DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
