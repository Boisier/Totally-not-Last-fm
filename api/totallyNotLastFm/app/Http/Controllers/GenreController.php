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

	//get all Genres
	public function getAllGenres(){
		$genres = Genre::all();

		return $this->success($genres, 200);
	}

	//create Genre
	public function createGenre(Request $request){
		$this->validateRequestGenre($request);

		$genre = Genre::create([
			'genre_name_genre' => $request->get('genre_name_genre')
		]);

		return $this->success("The genre with id {$genre->genre_id_genre} has been created", 201);
	}

	//get Genre
	public function getGenre($id){
		$genre = Genre::find($id);

		if(!$genre)
			return $this->error("The genre with {$id} doesn't exist", 404);

		return $this->success($genre, 200);

		//update genre
		public function updateGenre(Request $request, $id){
			$genre = Genre::find($id);

			if(!$genre)
				return $this->error("The genre with {$id} doesn't exist", 404);

			$this->validateRequestGenre($request);

			$genre->genre_name_genre = $request->get('genre_name_genre');

			$genre->save();

			return $this->success("The genre with id {$genre->genre_id_genre} has been updated", 200);
		}

		//delete Genre
		public function deleteGenre($id){
			$genre = Genre::find($id);

			if(!$genre)
				return $this->error("The genre with {$id} has been deleted", 200);
		}

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

	/*public function index(){
		$Genres = Genre::all();

		return response()->json($Genres);
	}

	//get Genre
	public function getGenre($id){
		$Genre = Genre::find($id);

		return response()->json($Genre);
	}

	//create Genre
	public function createGenre(Request $request){
		$Genre = Genre::create($request->all());

		return response()->json($Genre);
	}

	//delete Genre
	public function deleteGenre($id){
		$Genre = Genre::find($id);
		$Genre->delete();

		return response()->json('deleted');
	}

	//update Genre
	public function updateGenre(Request $request, $id){
		$Genre = Genre::find($id);
		$Genre->genre_id_genre = $request->input('genre_id_genre');
		$Genre->genre_name_genre = $request->input('genre_name_genre');
		$Genre->save();

		return response()->json($Genre);
	}*/
}

?>
