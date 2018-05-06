<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});

/*
$router->get('/user/{name}', function ($name) {
    return $name;
});
*/



/*-----------------Albums------------------*/
/* GetAllAlbums
 * return all the albums
 */
$app->get('/albums', 'AlbumController@getAllAlbums');
/* CreateAlbum
Rules:
  $rules = [
        'album_title_album' => 'required',
        'album_nb_tracks' => 'required|numeric'
    ];
*/
$app->post('/albums', 'AlbumController@createAlbum');
 /* GetAlbum
 * return a specific album
 */
$app->get('/albums/{album_id_album}', 'AlbumController@getAlbum');
/* UpdateAlbum
* return modified album
Rules:
	$rules = [
        'album_title_album' => 'required',
        'album_nb_tracks' => 'required|numeric'
    ];
*/
$app->put('/albums/{album_id_album}', 'AlbumController@updateAlbum');
/* DeleteAlbum
*/
$app->delete('/albums/{album_id_album}', 'AlbumController@deleteAlbum');




/*-----------------Artists------------------*/
/* GetAllArtists
 * return all the artists
 */
$app->get('/artists', 'ArtistController@getAllArtists');
/* CreateArtist
Rules:
  $rules = [
        'artist_name' => 'required',
        'artist_birth_year' => 'required|date',
        'artist_death_year' => 'required|date', OR NULL
    ];
*/
$app->post('/artists', 'ArtistController@createArtist');
 /* GetArtist
 * return a specific artist */
$app->get('/artists/{artist_id_artist}', 'ArtistController@getArtist');
/* UpdateArtist
* return modified artist
Rules:
	 $rules = [
        'artist_name' => 'required',
        'artist_birth_year' => 'required|numeric',
        'artist_death_year' => 'required|numeric', OR NULL
    ];
*/
$app->put('/artists/{artist_id_artist}', 'ArtistController@updateArtist');
/* DeleteArtist
*/
$app->delete('/artists/{artist_id_artist}', 'ArtistController@deleteArtist');







/*-----------------Genres------------------*/
/* GetAllGenres
 * return all the genres
 */
$app->get('/genres', 'GenreController@getAllGenres');
/* CreateGenre
Rules:
    $rules = [
        'genre_name_genre' => 'required|alpha'
    ];
*/
$app->post('/genres', 'GenreController@createGenre');
 /* GetGenre
 * return a specific genre */
$app->get('/genres/{genre_id_genre}', 'GenreController@getGenre');
/* UpdateGenre
* return modified genre
Rules:
	$rules = [
        'genre_name_genre' => 'required|alpha'
    ];
*/
$app->put('/genres/{genre_id_genre}', 'GenreController@updateGenre');
/* DeleteGenre
*/
$app->delete('/genres/{genre_id_genre}', 'GenreController@deleteGenre');





/*-----------------Histories------------------*/
/* GetAllHistories
 * return all the histories
 */
$app->get('/histories', 'HistoryController@getAllHistories');
/* CreateHistory
Rules:
    $rules = [
        'history_play_time' => 'required|time',
        'user_id_user' => 'required|numeric'
    ];
*/
$app->post('/histories', 'HistoryController@createHistory');
 /* GetHistory
 * return a specific history */
$app->get('/histories/{history_id_history}', 'HistoryController@getHistory');
/* UpdateHistory
* return modified history
Rules:
	$rules = [
        'history_play_time' => 'required|time',
        'user_id_user' => 'required|numeric'
    ];
*/
$app->put('/histories/{history_id_history}', 'HistoryController@updateHistory');
/* DeleteHistory
*/
$app->delete('/histories/{history_id_history}', 'HistoryController@deleteHistory');





/*-----------------Musics------------------*/
/* GetAllMusics
 * return all the musics
 */
$app->get('/musics', 'MusicController@getAllMusics');
/* CreateMusic
Rules:
    $rules = [
        'music_title' => 'required',
        'music_duration' => 'required|time',
        'music_release_date' => 'required|date'
    ];
*/
$app->post('/musics', 'MusicController@createMusic');
 /* GetMusic
 * return a specific music */
$app->get('/musics/{music_id_music}', 'MusicController@getMusic');
/* UpdateMusic
* return modified music
Rules:
    $rules = [
        'music_title' => 'required',
        'music_duration' => 'required|time',
        'music_release_date' => 'required|date'
    ];
*/
$app->put('/musics/{music_id_music}', 'MusicController@updateMusic');
/* DeleteMusic
*/
$app->delete('/musics/{music_id_music}', 'MusicController@deleteMusic');






/*-----------------Nationalities------------------*/
/* GetAllNationalities
 * return all the nationaloties
 */
$app->get('/nationalities', 'NationalityController@getAllNationalities');
/* CreateNationality
Rules:
    $rules = [
        'nationality_code' => 'required|alpha'
    ];
*/
$app->post('/nationalities', 'NationalityController@createNationality');
 /* GetNationality
 * return a specific nationality */
$app->get('/nationalities/{nationality_id_nationality}', 'NationalityController@getNationality');
/* UpdateNationality
* return modified nationality
Rules:
    $rules = [
        'nationality_code' => 'required|alpha'
    ];
*/
$app->put('/nationalities/{nationality_id_nationality}', 'NationalityController@updateNationality');
/* DeleteNationality
*/
$app->delete('/nationalities/{nationality_id_nationality}', 'NationalityController@deleteNationality');





/*-----------------Nationalities------------------*/
/* GetAllNationalities
 * return all the nationaloties
 */
$app->get('/nationalities', 'NationalityController@getAllNationalities');
/* CreateNationality
Rules:
    $rules = [
        'nationality_code' => 'required|alpha'
    ];
*/
$app->post('/nationalities', 'NationalityController@createNationality');
 /* GetNationality
 * return a specific nationality */
$app->get('/nationalities/{nationality_id_nationality}', 'NationalityController@getNationality');
/* UpdateNationality
* return modified nationality
Rules:
    $rules = [
        'nationality_code' => 'required|alpha'
    ];
*/
$app->put('/nationalities/{nationality_id_nationality}', 'NationalityController@updateNationality');
/* DeleteNationality
*/
$app->delete('/nationalities/{nationality_id_nationality}', 'NationalityController@deleteNationality');






/*-----------------Playlists------------------*/
/* GetAllPlaylists
 * return all the playlists
 */
$app->get('/playlists', 'PlaylistController@getAllPlaylists');
/* CreatePlaylist
Rules:
    $rules = [
        'playlist_name' => 'required',
        'playlist_description' => 'required',
        'user_id_user' => 'required|numeric'
    ];
*/
$app->post('/playlists', 'PlaylistController@createPlaylist');
 /* GetPlaylist
 * return a specific playlist */
$app->get('/playlists/{playlist_id_playlist}', 'PlaylistController@getPlaylist');
/* UpdatePlaylist
* return modified playlist
Rules:
    $rules = [
        'playlist_name' => 'required',
        'playlist_description' => 'required',
        'user_id_user' => 'required|numeric'
    ];
*/
$app->put('/playlists/{playlist_id_playlist}', 'PlaylistController@updatePlaylist');
/* DeletePlaylist
*/
$app->delete('/playlists/{playlist_id_playlist}', 'PlaylistController@deletePlaylist');






/*-----------------Spotify------------------*/
/* GetAllSpotify
 * return all the spotify
 */
$app->get('/spotify', 'SpotifyController@getAllSpotify');
/* CreateSpotify
Rules:
    $rules = [
        'spotify_our_id' => 'required|numeric',
        'user_id_user' => 'required|numeric'
    ];
*/
$app->post('/spotify', 'SpotifyController@createSpotify');
 /* GetSpotify
 * return a specific spotify */
$app->get('/spotify/{spotify_id_spotify}', 'SpotifyController@getSpotify');
/* UpdateSpotify
* return modified spotify
Rules:
    $rules = [
        'spotify_our_id' => 'required|numeric',
        'user_id_user' => 'required|numeric'
    ];
*/
$app->put('/spotify/{spotify_id_spotify}', 'SpotifyController@updateSpotify');
/* DeleteSpotify
*/
$app->delete('/spotify/{spotify_id_spotify}', 'SpotifyController@deleteSpotify');





/*-----------------Spotify------------------*/
/* GetAllSpotify
 * return all the spotify
 */
$app->get('/spotify', 'SpotifyController@getAllSpotify');
/* CreateSpotify
Rules:
    $rules = [
        'spotify_our_id' => 'required|numeric',
        'user_id_user' => 'required|numeric'
    ];
*/
$app->post('/spotify', 'SpotifyController@createSpotify');
 /* GetSpotify
 * return a specific spotify */
$app->get('/spotify/{spotify_id_spotify}', 'SpotifyController@getSpotify');
/* UpdateSpotify
* return modified spotify
Rules:
    $rules = [
        'spotify_our_id' => 'required|numeric',
        'user_id_user' => 'required|numeric'
    ];
*/
$app->put('/spotify/{spotify_id_spotify}', 'SpotifyController@updateSpotify');
/* DeleteSpotify
*/
$app->delete('/spotify/{spotify_id_spotify}', 'SpotifyController@deleteSpotify');





/*-----------------Users------------------*/
/* GetAllUsers
 * return all the users
 */
$app->get('/users', 'UserController@getAllUsers');
/* CreateUser
Rules:
    $rules = [
        'user_username' => 'required',
        'user_birthday' => 'required|date',
        'user_mail' => 'required|email',
        'user_password' => 'required|min:6'
    ];
*/
$app->post('/users', 'UserController@createUser');
 /* GetUser
 * return a specific user*/
$app->get('/users/{user_id_user}', 'UserController@getUser');
/* UpdateUser
* return modified user
Rules:
    $rules = [
        'user_username' => 'required',
        'user_birthday' => 'required|date',
        'user_mail' => 'required|email',
        'user_password' => 'required|min:6'
    ];
*/
$app->put('/users/{user_id_user}', 'UserController@updateUser');
/* DeleteUser
*/
$app->delete('/users/{user_id_user}', 'UserController@deleteUser');

