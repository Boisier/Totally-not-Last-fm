<?php

namespace App\Http\Controllers;

use App\Genre;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GenreController extends Controller{
	/*
	//Genre constructor
	public function __construct(){
		$this->middleware('oauth', ['except' => ['getAllGenres', 'getGenre']]);
		$this->middleware('authorize:' . __CLASS__, ['except' => ['getAllGenres', 'getGenre', 'createGenre']]);
	}
	*/

	/*----------------------------Basic functions--------------------------*/

	//get all Genres
	public function getAllGenres(){
		$genres = Genre::all();

        return response()->json(['data' => $genres], 200);
	}

	//create Genre
	public function createGenre(Request $request){
		$this->validateRequestGenre($request);

		$genre = Genre::create([
			'genre_name_genre' => $request->get('genre_name_genre')
		]);

        return response()->json(['data' => "The genre with id {$genre->genre_id_genre} has been created"], 201);
	}

	//get Genre
	public function getGenre($id){
		$genre = Genre::find($id);

		if(!$genre)
            return response()->json(['message' => "The genre with id {$id} doesn't exist"], 404);

        return response()->json(['data' => $genre], 200);
	}
	//update genre
	public function updateGenre(Request $request, $id){
		$genre = Genre::find($id);

		if(!$genre)
            return response()->json(['message' => "The genre with id {$id} doesn't exist"], 404);

		$this->validateRequestGenre($request);

		$genre->genre_name_genre = $request->get('genre_name_genre');

		$genre->save();

        return response()->json(['data' => "The genre with id {$genre->genre_id_genre} has been updated"], 200);
	}

	//delete Genre
	public function deleteGenre($id){
		$genre = Genre::find($id);

		if(!$genre)
			return response()->json(['message' => "The genre with id {$id} doesn't exist"], 404);

		return response()->json(['data' => "The genre with id {$id} has been deleted"], 200);
	}

	/*----------------------------Stats functions--------------------------*/
	
	/*----------------------------Annex functions--------------------------*/


	//validate request
	public function validateRequestGenre(Request $request){
		$rules = [
			'genre_name_genre' => 'required|alpha'
		];

		$this->validate($request, $rules);
	}

	//is authorized
	public function isAuthorizedGenre(Request $request){
		$resource = "genres";
		$genre = Genre::find($this->getArgs($request)["genre_id_genre"]);

		return $this->authorizeUser($request, $resource, $genre);
	}

}

?>
