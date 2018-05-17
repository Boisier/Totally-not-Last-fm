<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlbumController extends Controller{
	/*
	//Constructor
	public function __construct(){
		$this->middleware('oauth', ['except' => ['getAllAlbums', 'getAlbum']]);
		$this->middleware('authorize:' . __CLASS__, ['except' => ['getAllAlbums', 'getAlbum', 'createAlbum']]);
	}
	*/

	/*----------------------------Basic functions--------------------------*/

	//get All Albums
	public function getAllAlbums(){
		$albums = Album::all();

        return response()->json(['data' => $albums], 200);

	}

	//create Album
	public function createAlbum(Request $request){
		$this->validateRequestAlbum($request);

		$album = Album::create([
			'album_title_album' => $request->get('album_title_album'),
			'album_nb_tracks' => $request->get('album_nb_tracks')
		]);

		return response()->json(['data' => "The album with id {$album->album_id_album} has been created"], 201);
	}

	//get Album
	public function getAlbum($id){
		$albums = DB::table('albums')
		->where('album_id_album', '=', $id)
		->get();

		if(!$album)
            return response()->json(['message' => "The album with id {$id} doesn't exist"], 404);

        return response()->json(['data' => $album], 200);
	}

	//update Album
	public function updateAlbum(Request $request, $id){
		$albums = DB::table('albums')
		->where('album_id_album', '=', $id)
		->get();

		if(!$album)
            return response()->json(['message' => "The album with id {$id} doesn't exist"], 404);

		$this->validateRequestAlbum($request);

		$album->album_title_album = $request->get('album_title_album');
		$album->album_nb_tracks = $request->get('album_nb_tracks');

		$album->save();

        return response()->json(['data' => "The album with id {$album->album_id_album} has been updated"], 200);
	}

	//delete Album
	public function deleteAlbum($id){
		$albums = DB::table('albums')
		->where('album_id_album', '=', $id)
		->get();

		if(!$album)
            return response()->json(['message' => "The album with id {$id} doesn't exist"], 404);

		$album->delete();

        return response()->json(['data' => "The album with id {$id} has been deleted"], 200);
	}

	/*----------------------------Stats functions--------------------------*/
	//Get the list of all music titles of one Album
	public function getTrackListOfAlbum($id_album){
		$musics = DB::table('albums')
		->join('include', 'albums.album_id_album', '=', 'include.album_id_album')
		->join('music', 'music.music_id_music', '=', 'include.music_id_music')
		->join('produce', 'albums.album_id_album', '=', 'produce.album_id_album')
		->join('artists', 'artists.artist_id', '=', 'produce.artist_id_artist')
		->select('albums.album_id_album', 'albums.album_title_album', 'music.music_id_music', 'music.music_title', 'artists.artist_id', 'artists.artist_name')
		->where('albums.album_id_album', '=', $id_album)
		->get();

		return $this->success($musics, 200);
	}

	//Get the albums the most listened by all users
	public function getAlbumsMostListened(){
		$albums = DB::table('user')
		->join('histories', 'user.id', '=', 'histories.user_id_user')
		->join('contain', 'histories.history_id_history', '=', 'contain.history_id_history')
		->join('music', 'contain.music_id_music', '=', 'music.music_id_music')
		->join('include', 'music.music_id_music', '=', 'include.music_id_music')
		->join('albums', 'include.album_id_album', '=', 'albums.album_id_album')
		->select('albums.album_title_album', 'COUNT(albums.album_id_album) as nbListening')
		->groupBy('albums.album_title_album')
		->orderBy('nbListening DESC')
		->get();

		return $this->success($albums, 200);
	}

	//Get the albums the most listened by a specific user
	public function getAlbumsMostListenedByUser($id_user){
		$albums = DB::table('user')
		->join('histories', 'user.id', '=', 'histories.user_id_user')
		->join('contain', 'histories.history_id_history', '=', 'contain.history_id_history')
		->join('music', 'contain.music_id_music', '=', 'music.music_id_music')
		->join('include', 'music.music_id_music', '=', 'include.music_id_music')
		->join('albums', 'include.album_id_album', '=', 'albums.album_id_album')
		->select('user.username', 'user.id', 'COUNT(albums.album_id_album) as nbListening')
		->where('user.id', '=', $id_user)
		->groupBy('albums.album_id_album')
		->orderBy('nbListening DESC')
		->get();

		return $this->success($albums, 200);
	}



	/*----------------------------Annex functions--------------------------*/

	//validate request
	public function validateRequestAlbum(Request $request){
		$rules = [
			'album_title_album' => 'required',
			'album_nb_tracks' => 'required|numeric'
		];

		$this->validate($request, $rules);
	}

	//is authorized
	public function isAuthorizedAlbum(Request $request){
		$resource = "albums";
		$album = Album::find($this->getArgs($request)["album_id_album"]);

		return $this->autorizeUser($request, $resource, $album);
	}

}



?>
