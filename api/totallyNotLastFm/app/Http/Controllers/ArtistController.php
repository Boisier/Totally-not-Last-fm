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

		return $this->success($artists, 200);
	}

	//create Artist
	public function createArtist(Request $request){
		$this->validateRequestArtist($request);

		$artist = Artist::create([
			'artist_name' => $request->get('artist_name'),
			'artist_birth_year' => $request->get('artist_birth_year'),
			'artist_death_year' => $request->get('artist_death_year')
		]);

		return $this->success("The artist with id {$artist->artist_id_artist} has been created", 201);
	}

	//get Artist
	public function getArtist($id){
		$artist = Artist::find($id);

		if(!$artist)
			return $this->error("The artist with {$id} doesn't exist", 404);

		return $this->success($album, 200);
	}

	//update Artist
	public function updateArtist(Request $request, $id){
	$artist = Artist::find($id);

	if(!$artist)
		return $this->error("The artist with {$id} doesn't exist", 404);

	$this->validateRequestArtist($request);

	$artist->artist_name = $request->get('artist_name');
	$artist->artist_birth_year = $request->get('artist_birth_year');
	$artist->artist_death_year = $request->get('artist_death_year');

	$artist->save();

	return $this->success("The album with id {$artist->artist_id_artist} has been updated", 200);
	}

	//delete Artist
	public function deleteArist($id){
		$artist = Artist::find($id);

		if(!$artist)
			return $this->error("The artist with {$id} doesn't exist", 404);

		$artist->delete();

		return $this->success("The artist with {$id} has been deleted", 200);
	}

	//validate request artist
	public function validateRequestArtist(Request $request){
		$rules = [
			'artist_name' => 'required',
			'artist_birth_year' => 'required',
			'artist_death_year' => 'required'
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
	/*
	public function index(){
		$Artists = Artist::all();

		return response()->json($Artists);
	}

	//get Artist
	public function getArtist($id){
		$Artist = Artist::find($id);

		return response()->json($Artist);
	}

	//Create artist
	public function createArtist(Request $request){
		$Artist = Artist::create($request->all());

		return response()->json($Artist);
	}

	//Delete Artist
	public function deleteArtist($id){
		$Artist = Artist::find($id);

		$Artist->delete();

		return response()->json('deleted');
	}

	//Update Artist
	public function updateArtist(Request $request, $id){
		$Artist = Artist::find($id);
		$Artist->artist_id_artist = $request->input('artist_id_artist');
		$Artist->artist_name = $request->input('artist_name');
		$Artist->artist_birth_year = $request->input('artist_birth_year');
		$Artist->artist_death_year = $request->input('artist_death_year');
		$Artist->save();

		return response()->json($Artist);
	}*/
}

?>
