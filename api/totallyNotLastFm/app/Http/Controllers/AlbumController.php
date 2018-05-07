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

	//get All Albums
	public function getAllAlbums(){
	// 	$albums = Album::all();

	// 	return $this->success($albums, 200);

		return $this->success("", 201);
	}

	//create Album
	public function createAlbum(Request $request){
		$this->validateRequestAlbum($request);

		$album = Album::create([
			'album_title_album' => $request->get('album_title_album'),
			'album_nb_tracks' => $request->get('album_nb_tracks')
		]);

		return $this->success("The album with id {$album->album_id_album} has been created", 201);
	}

	//get Album
	public function getAlbum($id){
		$album = Album::find($id);

		if(!$album)
			return $this->error("The album with {$id} doesn't exist", 404);

		return $this->success($album, 200);
	}

	//update Album
	public function updateAlbum(Request $request, $id){
		$album = Album::find($id);

		if(!$album)
			return $this->error("The album with {$id} doesn't exist", 404);

		$this->validateRequestAlbum($request);

		$album->album_title_album = $request->get('album_title_album');
		$album->album_nb_tracks = $request->get('album_nb_tracks');

		$album->save();

		return $this->success("The album with id {$album->album_id_album} has been updated", 200);
	}

	//delete Album
	public function deleteAlbum($id){
		$album = Album::find($id);

		if(!$album)
			return $this->error("The album with {$id} doesn't exist", 404);

		$album->delete();

		return $this->success("The album with {$id} has been deleted", 200);
	}

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
/*
	//get Album
	public function getAlbum($id){
		$Album = Album::find($id);

		return response()->json($Album);
	}

	//create Album
	public function createAlbum(Request $request){
		$Album = Album::create($request->all());

		return response()->json($Album);
	}

	//delete Album
	public function deleteAlbum($id){
		$Album = Album::find($id);
		$Album->delete();

		return response()->json('deleted');
	}

	//upadte Album
	public function updateAlbum(Request $request, $id){
		$Album = Album::find($id);
		
		$Album->album_id_album = $request->input('album_id_album');
		$Album->album_title_album = $request->input('album_title_album');
		$Album->album_nb_tracks = $request->input('album_nb_tracks');
		$Album->save();

		return response()->json($Album);
	}*/

}



?>
