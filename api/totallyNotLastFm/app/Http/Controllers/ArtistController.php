<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArtistController extends Controller{
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
	}
}

?>
