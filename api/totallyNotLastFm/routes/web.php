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

$router->get('/', function () use ($router) {
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
$router->get('/albums', 'AlbumController@getAllAlbums');
/* CreateAlbum
Rules:
  $rules = [
        'album_title_album' => 'required',
        'album_nb_tracks' => 'required|numeric'
    ];
*/
$router->post('/albums', 'AlbumController@createAlbum');
 /* GetAlbum
 * return a specific album
 */
$router->get('/albums/{album_id_album}', 'AlbumController@getAlbum');
/* UpdateAlbum
* return modified album
Rules:
	$rules = [
        'album_title_album' => 'required',
        'album_nb_tracks' => 'required|numeric'
    ];
*/
$router->put('/albums/{album_id_album}', 'AlbumController@updateAlbum');
/* DeleteAlbum
*/
$router->delete('/albums/{album_id_album}', 'AlbumController@deleteAlbum');




/*-----------------Artists------------------*/
/* GetAllArtists
 * return all the artists
 */
$router->get('/artists', 'ArtistController@getAllArtists');
/* CreateArtist
Rules:
  $rules = [
        'artist_name' => 'required',
        'artist_birth_year' => 'required|date',
        'artist_death_year' => 'required|date', OR NULL
    ];
*/
$router->post('/artists', 'ArtistController@createArtist');
 /* GetArtist
 * return a specific artist */
$router->get('/artists/{artist_id_artist}', 'ArtistController@getArtist');
/* UpdateArtist
* return modified artist
Rules:
	 $rules = [
        'artist_name' => 'required',
        'artist_birth_year' => 'required|numeric',
        'artist_death_year' => 'required|numeric', OR NULL
    ];
*/
$router->put('/artists/{artist_id_artist}', 'ArtistController@updateArtist');
/* DeleteArtist
*/
$router->delete('/artists/{artist_id_artist}', 'ArtistController@deleteArtist');







/*-----------------Genres------------------*/
/* GetAllGenres
 * return all the genres
 */
$router->get('/genres', 'GenreController@getAllGenres');
/* CreateGenre
Rules:
    $rules = [
        'genre_name_genre' => 'required|alpha'
    ];
*/
$router->post('/genres', 'GenreController@createGenre');
 /* GetGenre
 * return a specific genre */
$router->get('/genres/{genre_id_genre}', 'GenreController@getGenre');
/* UpdateGenre
* return modified genre
Rules:
	$rules = [
        'genre_name_genre' => 'required|alpha'
    ];
*/
$router->put('/genres/{genre_id_genre}', 'GenreController@updateGenre');
/* DeleteGenre */
$router->delete('/genres/{genre_id_genre}', 'GenreController@deleteGenre');





/*-----------------Histories------------------*/
/* GetAllHistories
 * return all the histories
 */
$router->get('/histories', 'HistoryController@getAllHistories');
/* CreateHistory
Rules:
    $rules = [
        'history_play_time' => 'required|time',
        'user_id_user' => 'required|numeric'
    ];
*/
$router->post('/histories', 'HistoryController@createHistory');
 /* GetHistory
 * return a specific history */
$router->get('/histories/{history_id_history}', 'HistoryController@getHistory');
/* UpdateHistory
* return modified history
Rules:
	$rules = [
        'history_play_time' => 'required|time',
        'user_id_user' => 'required|numeric'
    ];
*/
$router->put('/histories/{history_id_history}', 'HistoryController@updateHistory');
/* DeleteHistory
*/
$router->delete('/histories/{history_id_history}', 'HistoryController@deleteHistory');





/*-----------------Musics------------------*/
/* GetAllMusics
 * return all the musics
 */
$router->get('/musics', 'MusicController@getAllMusics');
/* CreateMusic
Rules:
    $rules = [
        'music_title' => 'required',
        'music_duration' => 'required|time',
        'music_release_date' => 'required|date'
    ];
*/
$router->post('/musics', 'MusicController@createMusic');
 /* GetMusic
 * return a specific music */
$router->get('/musics/{music_id_music}', 'MusicController@getMusic');
/* UpdateMusic
* return modified music
Rules:
    $rules = [
        'music_title' => 'required',
        'music_duration' => 'required|time',
        'music_release_date' => 'required|date'
    ];
*/
$router->put('/musics/{music_id_music}', 'MusicController@updateMusic');
/* DeleteMusic
*/
$router->delete('/musics/{music_id_music}', 'MusicController@deleteMusic');



/*-----------------Nationalities------------------*/
/* GetAllNationalities
 * return all the nationaloties
 */
$router->get('/nationalities', 'NationalityController@getAllNationalities');
/* CreateNationality
Rules:
    $rules = [
        'nationality_code' => 'required|alpha'
    ];
*/
$router->post('/nationalities', 'NationalityController@createNationality');
 /* GetNationality
 * return a specific nationality */
$router->get('/nationalities/{nationality_id_nationality}', 'NationalityController@getNationality');
/* UpdateNationality
* return modified nationality
Rules:
    $rules = [
        'nationality_code' => 'required|alpha'
    ];
*/
$router->put('/nationalities/{nationality_id_nationality}', 'NationalityController@updateNationality');
/* DeleteNationality
*/
$router->delete('/nationalities/{nationality_id_nationality}', 'NationalityController@deleteNationality');






/*-----------------Playlists------------------*/
/* GetAllPlaylists
 * return all the playlists
 */
$router->get('/playlists', 'PlaylistController@getAllPlaylists');
/* CreatePlaylist
Rules:
    $rules = [
        'playlist_name' => 'required',
        'playlist_description' => 'required',
        'user_id_user' => 'required|numeric'
    ];
*/
$router->post('/playlists', 'PlaylistController@createPlaylist');
 /* GetPlaylist
 * return a specific playlist */
$router->get('/playlists/{playlist_id_playlist}', 'PlaylistController@getPlaylist');
/* UpdatePlaylist
* return modified playlist
Rules:
    $rules = [
        'playlist_name' => 'required',
        'playlist_description' => 'required',
        'user_id_user' => 'required|numeric'
    ];
*/
$router->put('/playlists/{playlist_id_playlist}', 'PlaylistController@updatePlaylist');
/* DeletePlaylist
*/
$router->delete('/playlists/{playlist_id_playlist}', 'PlaylistController@deletePlaylist');




/*-----------------Spotify------------------*/
/* GetAllSpotify
 * return all the spotify
 */
$router->get('/spotify', 'SpotifyController@getAllSpotify');
/* CreateSpotify
Rules:
    $rules = [
        'spotify_our_id' => 'required|numeric',
        'user_id_user' => 'required|numeric'
    ];
*/
$router->post('/spotify', 'SpotifyController@createSpotify');
 /* GetSpotify
 * return a specific spotify */
$router->get('/spotify/{spotify_id_spotify}', 'SpotifyController@getSpotify');
/* UpdateSpotify
* return modified spotify
Rules:
    $rules = [
        'spotify_our_id' => 'required|numeric',
        'user_id_user' => 'required|numeric'
    ];
*/
$router->put('/spotify/{spotify_id_spotify}', 'SpotifyController@updateSpotify');
/* DeleteSpotify
*/
$router->delete('/spotify/{spotify_id_spotify}', 'SpotifyController@deleteSpotify');





/*-----------------Users------------------*/
/* GetAllUsers
 * return all the users
 */
$router->get('/users', 'UserController@getAllUsers');
/* CreateUser
Rules:
    $rules = [
        'user_username' => 'required',
        'user_birthday' => 'required|date',
        'user_mail' => 'required|email',
        'user_password' => 'required|min:6'
    ];
*/
$router->post('/users', 'UserController@createUser');
 /* GetUser
 * return a specific user*/
$router->get('/users/{user_id_user}', 'UserController@getUser');
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
$router->put('/users/{user_id_user}', 'UserController@updateUser');
/* DeleteUser
*/
$router->delete('/users/{user_id_user}', 'UserController@deleteUser');

/*$router->post('/auth', 'UserController@authenticate');*/

$router->post(
    'auth/login',
    [
       'uses' => 'AuthController@authenticate'
    ]
);
