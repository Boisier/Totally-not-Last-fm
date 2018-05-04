<?php

namespace App\Http\Controllers;

use App\Playlist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlaylistController extends Controller{
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
}


?>
