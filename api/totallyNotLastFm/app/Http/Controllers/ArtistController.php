<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArtistController extends Controller{
	/*
	//Artist constructor
	public function __construct(){
		$this->middleware('oauth', ['except' => ['getAllArtists', 'getArtist']]);
		$this->middleware('authorize:' . __CLASS__, ['except' => ['getAllArtists', 'getArtist', 'createArtist']]);
	}
	*/

	//get All Artists
	public function getAllArtists(){
		$artists = Artist::all();

        return response()->json(['data' => $artists], 200);
	}

	//create Artist
	public function createArtist(Request $request){
		$this->validateRequestArtist($request);

		$artist = Artist::create([
			'artist_name' => $request->get('artist_name'),
			'artist_birth_year' => $request->get('artist_birth_year'),
			'artist_death_year' => $request->get('artist_death_year')
		]);

        return response()->json(['data' => "The artist with id {$artist->artist_id_artist} has been created"], 201);
	}

	//get Artist
	public function getArtist($id){
		$artist = Artist::find($id);

		if(!$artist)
            return response()->json(['message' => "The artist with id {$id} doesn't exist"], 404);

        return response()->json(['data' => $artist], 200);
	}

	//update Artist
	public function updateArtist(Request $request, $id){
		$artist = Artist::find($id);

		if(!$artist)
	        return response()->json(['message' => "The artist with id {$id} doesn't exist"], 404);

		$this->validateRequestArtist($request);

		$artist->artist_name = $request->get('artist_name');
		$artist->artist_birth_year = $request->get('artist_birth_year');
		$artist->artist_death_year = $request->get('artist_death_year');

		$artist->save();

	    return response()->json(['data' => "The artist with id {$artist->artist_id_artist} has been updated"], 200);
	}

	//delete Artist
	public function deleteArist($id){
		$artist = Artist::find($id);

		if(!$artist)
			return response()->json(['message' => "The artist with id {$id} doesn't exist"], 404);

		$artist->delete();

		return response()->json(['data' => "The artist with id {$id} has been deleted"], 200);
	}

	//validate request artist
	public function validateRequestArtist(Request $request){
		$rules = [
			'artist_name' => 'required',
			'artist_birth_year' => 'required|numeric',
			'artist_death_year' => 'required|numeric'
		];

		$this->validate($request, $rules);
	}

	//is authorized
	public function isAuthorizedArtist(Request $request){
		$resource = "artists"; 
		$artist = Artist::find($this->getArgs($request)["artist_id_artist"]);

		return $this->authorizeUser($request, $resource, $artist);
	}
	//
	
}

?>
