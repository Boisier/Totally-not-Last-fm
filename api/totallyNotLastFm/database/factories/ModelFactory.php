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
    'album_title_album' => $faker->text,
    'album_nb_tracks' => mt_rand(5,15),
    'album_updated_at'=> $faker->date("Y-m-d",mt_rand(1262055681,1262455681)),
    'album_created_at'=> $faker->date("Y-m-d",mt_rand(1262055681,1262455681))
  ];
});

$factory->define(App\Artist::class, function(Faker\Generator $faker){
  return [
    'artist_name' => $faker->name,
    'artist_birth_year' => date("Y-m-d",mt_rand(1262055681,1262455681)),
    'artist_death_year'=> 'NULL'
  ];
});

$factory->define(App\Genre::class, function(Faker\Generator $faker){
  return [
    'genre_name_genre' => $faker->name
  ];
});

$factory->define(App\History::class, function(Faker\Generator $faker){
  return [
    'user_id_user' => $faker->randomDigit,
    'history_play_time' => $faker->time()
  ];
});

$factory->define(App\Music::class, function(Faker\Generator $faker){
  return [
    'music_title' => $faker->title,
    'music_duration' => '04:50',
    'music_release_date' => date("Y-m-d",mt_rand(1262055681,1262455681)),
  ];
});

$factory->define(App\Nationality::class, function(Faker\Generator $faker){
  return [
    'nationality_code' => 'FR',
  ];
});

$factory->define(App\Playlist::class, function(Faker\Generator $faker){
  return [
    'playlist_description' => $faker->name,
    'playlist_name'=>$faker->name
    ];
});

$factory->define(App\Spotify::class, function(Faker\Generator $faker){
  return [
    'user_id_user' => $faker->randomDigit
  ];
});

$factory->define(App\User::class, function(Faker\Generator $faker){
  return [
  ];
});
