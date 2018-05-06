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

//-----------------Albums------------------
/* GetAllAlbums
 *return all the albums
 */
$app->get('/albums', 'AlbumController@getAllAlbums'); 
$app->post('/albums', 'AlbumController@createAlbum'); //create an album
$app->get('/albums/{album_id_album}', 'AlbumController@getAlbum'); //return a specific album
$app->put('/albums/{album_id_album}', 'AlbumController@updateAlbum'); //modify an album
$app->delete('/albums/{album_id_album}', 'AlbumController@deleteAlbum'); //delete an album



/* Add an album 
 Datas : 
 'album_title_album' => 'string'
 'album_nb_tracks' => 'integer'
 */
//$router->post('/albums', 'AlbumController@')