<?php

namespace App\Http\Controllers;

use App\Album;
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
		$album = Album::find($id);

		if(!$album)
            return response()->json(['message' => "The album with id {$id} doesn't exist"], 404);

        return response()->json(['data' => $album], 200);
	}

	//update Album
	public function updateAlbum(Request $request, $id){
		$album = Album::find($id);

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
		$album = Album::find($id);

		if(!$album)
            return response()->json(['message' => "The album with id {$id} doesn't exist"], 404);

		$album->delete();

        return response()->json(['data' => "The album with id {$id} has been deleted"], 200);
	}

	/*----------------------------Stats functions--------------------------*/
	//Get the list of all music titles of one Album
	public function getTrackListOfAlbum($id_album){
		$musics = DB::table('albums')
		->join('includes', 'albums.album_id_album', '=', 'includes.album_id_album')
		->join('musics', 'musics.music_id_music', '=', 'includes.music_id_music')
		->join('produce', 'albums.album_id_album', '=', 'produce.album_id_album')
		->join('artists', 'artists.artist_id_artist', '=', 'produce.artist_id_artist')
		->select('musics.id', 'musics.music_title', 'artists.artist_id_artist', 'artists.name') 
		->where('albums.album_id_album', '=', $id_album)
		->get();

		return $this->success($musics, 200);
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
