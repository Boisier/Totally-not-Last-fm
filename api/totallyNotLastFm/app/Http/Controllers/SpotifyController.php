<?php

namespace App\Http\Controllers;

use App\Spotify;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SpotifyController extends Controller{
	
	/*
	//Constructor
	public function __construct(){
		$this->middleware('oauth', ['except' => ['getAllSpotify', 'getSpotify']]);
		$this->middleware('authorize:' . __CLASS__, ['except' => ['getAllSpotify', 'getSpotify', 'createSpotify']]);
	}
	*/

	//get All Spotify of our database
	public function getAllSpotify(){
		$spotify = Spotify::all();

		return $this->success($spotify, 200);
	}

	//create Spotify account in our database
	public function createSpotify(Request $request){
		$this->validateRequestSpotify($request);

		$spotify = Spotify::create([
			'user_id_user' => $request->get('user_id_user'),
			'spotify_our_id' => $request->get('spotify_our_id')
		]);

		return $this->success("The spotify account with id {$spotify->spotify_user_id} has been created", 201);
	}

	//get one Spotify account in our database
	public function getSpotify($id){
		$spotify = Spotify::find($id);

		if(!$spotify)
			return $this->error("The spotify account with {$id} doesn't exist", 404);

		return $this->success($spotify, 200);
	}

	//update Spotify account in our database
	public function updateSpotify(Request $request, $id){
		$spotify = Spotify::find($id);

		if(!$spotify)
			return $this->error("The spotify with {$id} doesn't exist", 404);

		$this->validateRequestSpotify($request);

		$spotify->user_id_user = $request->get('user_id_user');
		$album->spotify_our_id = $request->get('spotify_our_id');

		$album->save();

		return $this->success("The spotify account with id {$album->album_id_album} has been updated", 200);
	}

	//delete Spotify account in our database
	public function deleteSpotify($id){
		$spotify = Spotify::find($id);

		if(!$spotify)
			return $this->error("The spotify with {$id} doesn't exist", 404);

		$spotify->delete();

		return $this->success("The spotify with {$id} has been deleted", 200);
	}

	//validate request
	public function validateRequestSpotify(Request $request){
		$rules = [
			'user_id_user' => 'required|numeric',
			'spotify_our_id' => 'required|numeric'
		];

		$this->validate($request, $rules);
	}

	//is authorized
	public function isAuthorizedSpotify(Request $request){
		$resource = "spotify";
		$spotify = Spotify::find($this->getArgs($request)["spotify_user_id"]);

		return $this->autorizeUser($request, $resource, $spotify);
	}

	/*
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
	*/
}

?>
