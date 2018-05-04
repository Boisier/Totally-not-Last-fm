<?php

namespace App\Http\Controllers;

use App\Spotify;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SpotifyController extends Controller{
	public function index(){
		$Spotify = Spotify::all();

		return response()->json($Spotify);
	}

	//get spotify
	public function getSpotify($id){
		$Spotify = Spotify::find($id);

		return response()->json($Spotify);
	}

	//create spotify
	public function createSpotify(Request $request){
		$Spotify = Spotify::create($request->all());

		return response()->json($Spotify);
	}

	//delete spotify
	public function deleteSpotify($id){
		$Spotify = Spotify::find($id);
		$Spotify->delete();

		return response()->json('deleted');
	}

	//update spotify
	public function updateSpotify(Request $request, $id){
		$Spotify = Spotify::find($id);
		$Spotify->spotify_user_id = $request->input('spotify_user_id');
		$Spotify->user_id_user = $request->input('user_id_user');
		$Spotify->spotify_our_id = $request->input('spotify_our_id');
		$Spotify->save();

		return response()->json($Spotify);
	}
}

?>
