<?php

namespace App\Http\Controllers;

use App\Music;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MusicController extends Controller{
	public function index(){
		$Musics = Music::all();

		return response()->json($Musics);
	}

	//get music
	public function getMusic($id){
		$Music = Music::find($id);

		return response()->json($Music);
	}

	//create music
	public function createMusic(Request $request){
		$Music = Music::create($request->all());

		return response()->json($Music);
	}

	//delete music
	public function deleteMusic($id){
		$Music = Music::find($id);
		$Music->delete();

		return response()->json('deleted');
	}

	//update music
	public function updateMusic(Request $request, $id){
		$Music = music::find($id);
		$Music->music_id_music = $request->input('music_id_music');
		$Music->music_title = $request->input('music_title');
		$Music->music_duration = $request->input('music_duration');
		$Music->music_release_date = $request->input('music_release_date');

		$Music->save();

		return response()->json($Music);
	}
}

?>
