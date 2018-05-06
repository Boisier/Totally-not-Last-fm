<?php

namespace App\Http\Controllers;

use App\Playlist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlaylistController extends Controller{
	/*
	//Constructor
	public function __construct(){
		$this->middleware('oauth', ['except' => ['getAllPlaylists', 'getPlaylist']]);
		$this->middleware('authorize:' . __CLASS__, ['except' => ['getAllPlaylists', 'getPlaylist', 'createPlaylist']]);
	}
	*/

	//get All Playlists
	public function getAllPlaylists(){
		$playlists = Playlist::all();

		return $this->success($playlists, 200);
	}

	//create Playlist
	public function createPlaylist(Request $request){
		$this->validateRequestPlaylist($request);

		$playlist = Playlist::create([
			'user_id_user' => $request->get('user_id_user'),
			'playlist_description' => $request->get('playlist_description'),
			'playlist_name' => $request->get('playlist_name')
		]);

		return $this->success("The playlist with id {$playlist->playlist_id_playlist} has been created", 201);
	}

	//get Playlist
	public function getPlaylist($id){
		$playlist = Playlist::find($id);

		if(!$playlist)
			return $this->error("The playlist with {$id} doesn't exist", 404);

		return $this->success($playlist, 200);
	}

	//update Playlist
	public function updatePlaylist(Request $request, $id){
		$playlist = Playlist::find($id);

		if(!$playlist)
			return $this->error("The playlist with {$id} doesn't exist", 404);

		$this->validateRequestPlaylist($request);

		$playlist->user_id_user = $request->get('user_id_user');
		$album->playlist_description = $request->get('playlist_description');
		$album->playlist_name = $request->get('playlist_name');

		$album->save();

		return $this->success("The playlist with id {$playlist->playlist_id_playlist} has been updated", 200);
	}

	//delete Playlist
	public function deletePlaylist($id){
		$playlist = Playlist::find($id);

		if(!$playlist)
			return $this->error("The playlist with {$id} doesn't exist", 404);

		$playlist->delete();

		return $this->success("The playlist with {$id} has been deleted", 200);
	}

	//validate request
	public function validateRequestPlaylist(Request $request){
		$rules = [
			'user_id_user' => 'required',
			'playlist_description' => 'required',
			'playlist_name' => 'required'
		];

		$this->validate($request, $rules);
	}

	//is authorized
	public function isAuthorizedPlaylist(Request $request){
		$resource = "playlists";
		$playlist = Playlist::find($this->getArgs($request)["playlist_id_playlist"]);

		return $this->autorizeUser($request, $resource, $playlist);
	}


/*
	public function index(){
		$Playlists = Playlist::all();

		return response()->json($Playlists);
	}

	//get playlist
	public function getPlaylist($id){
		$Playlist = Playlist::find($id);

		return response()->json($Playlist);
	}

	//create playlist
	public function createPlaylist(Request $request){
		$Playlist = Playlist::create($request->all());

		return response()->json($Playlist);
	}

	//delete playlist
	public function deletePlaylist($id){
		$Playlist = Playlist::find($id);
		$Playlist->delete();

		return response()->json('deleted');
	}

	//update playlist
	public function updatePlaylist(Request $request, $id){
		$Playlist = Playlist::find($id);
		
		$Playlist->playlist_id_playlist = $request->input('playlist_id_playlist');
		$Playlist->user_id_user = $request->input('user_id_user');
		$Playlist->playlist_description = $request->input('playlist_description');
		$Playlist->playlist_name = $request->input('playlist_name');

		$Playlist->save();

		return response()->json($Playlist);
	}
*/

}


?>
