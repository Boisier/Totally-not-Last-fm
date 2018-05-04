<?php

namespace App\Http\Controllers;

use App\Genre;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GenreController extends Controller{
	public function index(){
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
	}
}

?>
