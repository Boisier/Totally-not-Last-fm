<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Album::class, function (Faker\Generator $faker) {
  return [
    'album_id_album' => $faker->id,
    'album_title_album' => $faker->title,
    'album_nb_tracks' => $faker->mt_rand(5,15)
  ];
});

$factory->define(App\Artist::class, function(Faker\Generator $faker){
  return [
    'artist_id' => $faker->id,
    'artist_name' => $faker->name,
    'artist_birth_year' => $faker->date("Y-m-d",mt_rand(1262055681,1262055681)),
    'artist_death_year'=> 'NULL'
  ];
});

$factory->define(App\Genre::class, function(Faker\Generator $faker){
  return [
    'genre_id_genre' => $faker->id,
    'genre_name_genre' => $faker->name
  ];
});

$factory->define(App\History::class, function(Faker\Generator $faker){
  return [
    'history_id_history' => $faker->id,
    'user_id_user' => $faker->id,
    'history_play_time' => $faker->,
  ];
});

$factory->define(App\Music::class, function(Faker\Generator $faker){
  return [
    'music_id_music' => $faker->id,
    'music_title' => $faker->title,
    'music_duration' => '04:50',
    'music_release_date' => $faker->date("Y-m-d"),
  ];
});

$factory->define(App\Nationality::class, function(Faker\Generator $faker){
  return [
    'nationality_id_nationality' => $faker->id,
    'nationality_code' => 'FR',
  ];
});

$factory->define(App\Playlist::class, function(Faker\Generator $faker){
  return [
    'playlist_id_playlist' => $faker->id,
});

$factory->define(App\Spotify::class, function(Faker\Generator $faker){
  return [
    'spotify_user_id' => $faker->id,
    'user_id_user' => $faker->id
  ];
});

$factory->define(App\Spotify::class, function(Faker\Generator $faker){
  return [
    'user_id_user' => $faker->id,
  ];
});



















