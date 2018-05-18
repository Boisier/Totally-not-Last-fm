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



/*-----------------------------Albums--------------------------------*/
Route::group([
  'prefix'=> 'albums'  
],function($router){
  Route::get('getAll','AlbumController@getAllAlbums');
  Route::post('create','AlbumController@createAlbum');
  Route::get('get/{album_id_album}','AlbumController@getAlbum');
  
  Route::put('update/{album_id_album}','AlbumController@updateAlbum'); //NOPE  save() doesn't exist
  Route::delete('delete/{album_id_album}','AlbumController@deleteAlbum'); //NOPE delete() doesn't exist
  
  Route::get('allMostListened','AlbumController@getAlbumsMostListened');
  Route::get('userMostListened/{id}','AlbumController@getAlbumsMostListenedByUser'); 
  Route::get('artistMostListened/{artist_id}','AlbumController@getAlbumsMostListenedOfArtist');
  Route::get('userMostListenedArtist/{artist_id}/{id}','AlbumController@getAlbumsMostListenedOfArtistByUser');
  Route::get('suggestion/{genre_id}','AlbumController@suggestAlbumsOfGenre');
});

/* GetAllAlbums
 * return all the albums
 */
   
 
//$router->get('/albums/getAll', 'AlbumController@getAllAlbums');

/* CreateAlbum
Rules:
  $rules = [
        'album_title_album' => 'required',
        'album_nb_tracks' => 'required|numeric'
    ];
*/
//$router->post('/albums/create', 'AlbumController@createAlbum');

 /* GetAlbum
 * return a specific album
 */
//$router->get('/albums/{album_id_album}', 'AlbumController@getAlbum');

/* UpdateAlbum
* return modified album
Rules:
	$rules = [
        'album_title_album' => 'required',
        'album_nb_tracks' => 'required|numeric'
    ];
*/
//$router->put('/albums/{album_id_album}', 'AlbumController@updateAlbum');

/* DeleteAlbum
*/
//$router->delete('/albums/{album_id_album}', 'AlbumController@deleteAlbum');

/* Get the albums the most listened by all users
* return array of albums
*/
//$router->get('/albums/allMostListened/', 'AlbumController@getAlbumsMostListened');

/* Get the albums the most listened by a specific user
* return array of albums
*/
//$router->get('/albums/userMostListened/{user_id}', 'AlbumController@getAlbumsMostListenedByUser');

/* Get the albums the most listened of a specific artist by all users
* return array of albums
*/
//$router->get('/albums/mostListenedArtist/{artist_id}', 'AlbumController@getAlbumsMostListenedOfArtist');

/* Get the albums the most listened of a specific artist by a specific user
* return array of albums
*/
//$router->get('/albums/mostListened/{artist_id}/{user_id}', 'AlbumController@getAlbumsMostListenedOfArtistByUser');

/* Suggestions of albums of a specific genre
* return array of albums
*/
//$router->get('/albums/suggestions/{genre_id}', 'AlbumController@suggestAlbumsOfGenre');


/*-----------------------------Artists--------------------------------*/
/* GetAllArtists
 * return all the artists
 */

Route::group([
  'prefix'=> 'artist'  
],function($router){
  Route::get('getAll','ArtistController@getAllArtists');
  Route::post('create','ArtistController@createArtist');
  Route::get('get/{artist_id_artist}','ArtistController@getArtist');
  Route::put('update/{artist_id_artist}','ArtistController@updateArtist'); // NOPE save()
  Route::delete('delete/{artist_id_artist}','ArtistController@deleteArtist'); //NOPE delete)()
  Route::get('artistListAlbum/{artist_id_artist}','ArtistController@getAlbumListOfArtist');
  Route::get('mostListened','ArtistController@getArtistsMostListened');
  Route::get('userMostListened/{id}','ArtistController@getArtistsMostListenedByUser');
  Route::get('genreMostListened/{genre_id_genre}','ArtistController@getArtistsMostListenedOfGenre');
  Route::get('suggestions/{genre_id_genre}','ArtistController@suggestArtistsOfGenre');
 
});

//$router->get('/artists', 'ArtistController@getAllArtists');
//
///* CreateArtist
//Rules:
//  $rules = [
//        'artist_name' => 'required',
//        'artist_birth_year' => 'required|date',
//        'artist_death_year' => 'required|date', OR NULL
//    ];
//*/
//$router->post('/artists', 'ArtistController@createArtist');
//
// /* GetArtist
// * return a specific artist */
//$router->get('/artists/{artist_id_artist}', 'ArtistController@getArtist');
//
///* UpdateArtist
//* return modified artist
//Rules:
//	 $rules = [
//        'artist_name' => 'required',
//        'artist_birth_year' => 'required|numeric',
//        'artist_death_year' => 'required|numeric', OR NULL
//    ];
//*/
//$router->put('/artists/{artist_id_artist}', 'ArtistController@updateArtist');
//
///* DeleteArtist
//*/
//$router->delete('/artists/{artist_id_artist}', 'ArtistController@deleteArtist');
//
//
//$router->get('/artists/listOfAlbums/{artist_id_artist}', 'ArtistController@getAlbumListOfArtist');
//
//$router->get('/artists/mostListened', 'ArtistController@getArtistsMostListened');
//
//$router->get('/artists/mostListenedUser/{user_id}', 'ArtistController@getArtistsMostListenedByUser');
//
//$router->get('/artists/mostListenedGenre/{genre_id_genre}', 'ArtistController@getArtistsMostListenedOfGenre');
//
///* Suggestions of artists of a specific genre
//* return array of artists
//*/
//$router->get('/artists/suggestions/{genre_id}', 'ArtistController@suggestsArtistOfGenre');
//
//
//
//
//
//
///*-----------------------------Genres--------------------------------*/

Route::group([
  'prefix'=> 'genre'  
],function($router){
  Route::get('getAll','GenreController@getAllGenres');
  Route::post('create','GenreController@createGenre');
  Route::get('get/{genre_id_genre}','GenreController@getGenre');
  Route::put('update/{genre_id_genre}','GenreController@updateGenre'); // NOPE save()
  Route::delete('delete/{genre_id_genre}','GenreController@deleteGenre'); //NOPE delete)()
  
  Route::get('mostListened','AlbumController@getGenresMostListened');
  Route::get('userMostListened/{id}','AlbumController@getGenresMostListenedByUser');
 
});
///* GetAllGenres
// * return all the genres
// */
//$router->get('/genres', 'GenreController@getAllGenres');
//
///* CreateGenre
//Rules:
//    $rules = [
//        'genre_name_genre' => 'required|alpha'
//    ];
//*/
//$router->post('/genres', 'GenreController@createGenre');
//
// /* GetGenre
// * return a specific genre */
//$router->get('/genres/{genre_id_genre}', 'GenreController@getGenre');
//
///* UpdateGenre
//* return modified genre
//Rules:
//	$rules = [
//        'genre_name_genre' => 'required|alpha'
//    ];
//*/
//$router->put('/genres/{genre_id_genre}', 'GenreController@updateGenre');
//
///* DeleteGenre */
//$router->delete('/genres/{genre_id_genre}', 'GenreController@deleteGenre');
//
///* Get the genres the most listened by all users
//* return array of genres
//*/
//$router->get('/genres/mostListened', 'AlbumController@getGenresMostListened');
//
///* Get the genres the most listened by a specific user
//* return array of genres
//*/
//$router->get('/genres/{id_user}', 'AlbumController@getGenresMostListenedByUser');
//
//
//
//
///*-----------------------------Histories--------------------------------*/

Route::group([
  'prefix'=> 'history'  
],function($router){
  Route::get('getAll','HistoryController@getAllHistories');
  Route::post('create','HistoryController@createHistory');
  Route::get('get/{history_id_history}','HistoryController@getHistory');
  Route::put('update/{history_id_history}','HistoryController@updateHistory');
  Route::delete('delete/{history_id_history}','HistoryController@deleteHistory');
  Route::get('playtime/{id}','HistoryController@gethistoryPlaytime');
  Route::get('listeningPeriods/{id}','HistoryController@getListeningPeriodsOfUser');
});
///* GetAllHistories
// * return all the histories
// */
//$router->get('/histories', 'HistoryController@getAllHistories'); DONE
//
///* CreateHistory
//Rules:
//    $rules = [
//        'history_play_time' => 'required|time',
//        'user_id_user' => 'required|numeric'
//    ];
//*/
//$router->post('/histories', 'HistoryController@createHistory'); DONE
//
// /* GetHistory
// * return a specific history */
//$router->get('/histories/{history_id_history}', 'HistoryController@getHistory');  DONE
//
///* UpdateHistory
//* return modified history
//Rules:
//	$rules = [
//        'history_play_time' => 'required|time',
//        'user_id_user' => 'required|numeric'
//    ];
//*/
//$router->put('/histories/{history_id_history}', 'HistoryController@updateHistory'); DONE
//
///* DeleteHistory
//*/
//$router->delete('/histories/{history_id_history}', 'HistoryController@deleteHistory');
//
//
//$router->get('/history/historyPlaytime/{user_id}', 'HistoryController@getHistoryPlaytime');
//
//$router->get('/history/isteningPeriods/{user_id}', 'HistoryController@ggetListeningPeriodsOfUser');
//
//
//
///*-----------------------------Musics--------------------------------*/
Route::group([
  'prefix'=> 'music'  
],function($router){
  Route::get('getAll','MusicController@getAllMusics');
  Route::post('create','MusicController@createHistory');
  Route::get('get/{music_id_music}','MusicController@getMusic');
  Route::put('update/{music_id_music}','MusicController@updateMusic');
  Route::delete('delete/{music_id_music}','MusicController@deleteMusic');
  Route::get('userNbListeningMusic/{music_id_music}/{id}','AlbumController@getNbListeningMusic');
  Route::get('tracklistMusicAlbum/{id_album}','AlbumController@getTrackListofAlbum');
  Route::get('mostListened','MusicController@getMusicsMostListened');
  Route::get('userMostListened','MusicController@getMusicsMostListenedByUser');
  Route::get('artistAllMostListened/{artist_id}','MusicController@getMusicsMostListenedOfArtist');
  Route::get('mostListenedOfArtistByUser/{artist_id}/{id}','MusicController@getMusicsMostListenedOfArtistByUser');
});

///* GetAllMusics
// * return all the musics
// */
//$router->get('/musics', 'MusicController@getAllMusics'); DONE
//
///* CreateMusic
//Rules:
//    $rules = [
//        'music_title' => 'required',
//        'music_duration' => 'required|time',
//        'music_release_date' => 'required|date'
//    ];
//*/
//$router->post('/musics', 'MusicController@createMusic'); DONE
//
// /* GetMusic
// * return a specific music */
//$router->get('/musics/{music_id_music}', 'MusicController@getMusic'); DONE
//
///* UpdateMusic
//* return modified music
//Rules:
//    $rules = [
//        'music_title' => 'required',
//        'music_duration' => 'required|time',
//        'music_release_date' => 'required|date'
//    ];
//*/
//$router->put('/musics/{music_id_music}', 'MusicController@updateMusic'); DONE
//
///* DeleteMusic
//*/
//$router->delete('/musics/{music_id_music}', 'MusicController@deleteMusic'); DONE
//
///* Get number of listening of one music by a specific user
//* return number of listening
//*/
//$router->get('/musics/{id_music}/{user_id}/nbListening', 'AlbumController@getNbListeningMusic'); DONE
//
///* Get the list of all music titles of one Album
//* return array of musics
//*/
//$router->get('/musics/{id_album}/tracklist', 'AlbumController@getTrackListOfAlbum'); DONE
//
///* Get the musics the most listened by all users
//* return array of musics
//*/
//$router->get('/musics/mostListened', 'AlbumController@getAlbumsMostListened'); DONE
//
///* Get the musics the most listened by a specific user
//* return array of musics
//*/
//$router->get('/musics/mostListened/{user_id}', 'AlbumController@getMusicsMostListenedByUser'); DONE
//
///* Get the musics the most listened of a specific artist by all users
//* return array of musics
//*/
//$router->get('/musics/mostListened/{artist_id}', 'AlbumController@getMusicsMostListenedOfArtist'); DONE
//
///* Get the musics the most listened of a specific artist by a specific user
//* return array of musics
//*/
//$router->get('/musics/mostListened/{artist_id}/{user_id}', 'AlbumController@getMusicsMostListenedOfArtistByUser');
//
//
///*-----------------------------Nationalities--------------------------------*/
Route::group([
  'prefix'=> 'nationality'  
],function($router){
  Route::get('getAll','NationalityController@getAllNationalities');
  Route::post('create','NationalityController@createNationality');
  Route::get('get/{nationality_id_nationality}','NationalityController@getNationality');
  Route::put('update/{nationality_id_nationality}','NationalityController@updateNationality');
  Route::delete('delete/{nationality_id_nationality}','NationalityController@deleteNationality');
  
});
///* GetAllNationalities
// * return all the nationaloties
// */
//$router->get('/nationalities', 'NationalityController@getAllNationalities');
//
///* CreateNationality
//Rules:
//    $rules = [
//        'nationality_code' => 'required|alpha'
//    ];
//*/
//$router->post('/nationalities', 'NationalityController@createNationality');
//
// /* GetNationality
// * return a specific nationality */
//$router->get('/nationalities/{nationality_id_nationality}', 'NationalityController@getNationality');
//
///* UpdateNationality
//* return modified nationality
//Rules:
//    $rules = [
//        'nationality_code' => 'required|alpha'
//    ];
//*/
//$router->put('/nationalities/{nationality_id_nationality}', 'NationalityController@updateNationality');
//
///* DeleteNationality
//*/
//$router->delete('/nationalities/{nationality_id_nationality}', 'NationalityController@deleteNationality');
//
//
//
//
///*-----------------------------Playlists--------------------------------*/
Route::group([
  'prefix'=> 'playlist'  
],function($router){
  Route::get('getAll','PlaylistController@getAllPlaylists');
  Route::post('create','PlaylistController@createPlaylist');
  Route::get('get/{playlist_id_playlist}','PlaylistController@getPlaylist');
  Route::put('update/{playlist_id_playlist}','PlaylistController@updatePlaylist');
  Route::delete('delete/{playlist_id_playlist}','PlaylistController@deletePlaylist');
  
});
///* GetAllPlaylists
// * return all the playlists
// */
//$router->get('/playlists', 'PlaylistController@getAllPlaylists');
//
///* CreatePlaylist
//Rules:
//    $rules = [
//        'playlist_name' => 'required',
//        'playlist_description' => 'required',
//        'user_id_user' => 'required|numeric'
//    ];
//*/
//$router->post('/playlists', 'PlaylistController@createPlaylist');
//
// /* GetPlaylist
// * return a specific playlist */
//$router->get('/playlists/{playlist_id_playlist}', 'PlaylistController@getPlaylist');
//
///* UpdatePlaylist
//* return modified playlist
//Rules:
//    $rules = [
//        'playlist_name' => 'required',
//        'playlist_description' => 'required',
//        'user_id_user' => 'required|numeric'
//    ];
//*/
//$router->put('/playlists/{playlist_id_playlist}', 'PlaylistController@updatePlaylist');
//
///* DeletePlaylist
//*/
//$router->delete('/playlists/{playlist_id_playlist}', 'PlaylistController@deletePlaylist');
//
//
//
///*-----------------------------Spotify--------------------------------*/
Route::group([
  'prefix'=> 'spotify'  
],function($router){
  Route::get('getAll','SpotifyController@getAllSpotify');
  Route::post('create','SpotifyController@createSpotify');
  Route::get('get/{spotify_id_spotify}','SpotifyController@getSpotify');
  Route::put('update/{spotify_id_spotify}','SpotifyController@updateSpotify');
  Route::delete('delete/{spotify_id_spotify}','SpotifyController@deleteSpotify');
  
});
///* GetAllSpotify
// * return all the spotify
// */
//$router->get('/spotify', 'SpotifyController@getAllSpotify');
//
///* CreateSpotify
//Rules:
//    $rules = [
//        'spotify_our_id' => 'required|numeric',
//        'user_id_user' => 'required|numeric'
//    ];
//*/
//$router->post('/spotify', 'SpotifyController@createSpotify');
//
// /* GetSpotify
// * return a specific spotify */
//$router->get('/spotify/{spotify_id_spotify}', 'SpotifyController@getSpotify');
//
///* UpdateSpotify
//* return modified spotify
//Rules:
//    $rules = [
//        'spotify_our_id' => 'required|numeric',
//        'user_id_user' => 'required|numeric'
//    ];
//*/
//$router->put('/spotify/{spotify_id_spotify}', 'SpotifyController@updateSpotify');
//
///* DeleteSpotify
//*/
//$router->delete('/spotify/{spotify_id_spotify}', 'SpotifyController@deleteSpotify');
//
//
//
//
///*-----------------------------Users--------------------------------*/
Route::group([
  'prefix'=> 'user'  
],function($router){
  Route::get('getAll','UserController@getAllUsers');
  Route::post('create','UserController@createUser');
  Route::get('get/{id}','UserController@getUser');
  Route::put('update/{id}','UserController@updateUser');
  Route::delete('delete/{id}','UserController@deleteUser');
  
});
///* GetAllUsers
// * return all the users
// */
//$router->get('/users', 'UserController@getAllUsers');
//
///* CreateUser
//Rules:
//    $rules = [
//        'user_username' => 'required',
//        'user_birthday' => 'required|date',
//        'user_mail' => 'required|email',
//        'user_password' => 'required|min:6'
//    ];
//*/
//$router->post('/users', 'UserController@createUser');
//
// /* GetUser
// * return a specific user*/
//$router->get('/users/{user_id_user}', 'UserController@getUser');
//
///* UpdateUser
//* return modified user
//Rules:
//    $rules = [
//        'user_username' => 'required',
//        'user_birthday' => 'required|date',
//        'user_mail' => 'required|email',
//        'user_password' => 'required|min:6'
//    ];
//*/
//$router->put('/users/{user_id_user}', 'UserController@updateUser');
//
///* DeleteUser
//*/
//$router->delete('/users/{user_id_user}', 'UserController@deleteUser');

$router->post('/auth', 'UserController@authenticate');

/*$router->group(['prefix' => 'auth'], function($router) {
	$router->post('/login', 'AuthController@login');
	$router->post('/logout', 'AuthController@logout');
});*/

Route::group([
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});
