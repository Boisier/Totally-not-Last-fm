<?php

namespace App\Http\Controllers;

use App\Music;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MusicController extends Controller{
	/*
	//Constructor
	public function __construct(){
		$this->middleware('oauth', ['except' => ['getAllMusics', 'getMusics']]);
		$this->middleware('authorize:' . __CLASS__, ['except' => ['getAllMusics', 'getMusic', 'createMusic']]);
	}
	*/

	/*----------------------------Basic functions--------------------------*/


	//get All Musics
	public function getAllMusics(){
		$musics = Music::all();

        return response()->json(['data' => $musics], 200);
	}

	//create Music
	public function createMusic(Request $request){
		$this->validateRequestMusic($request);

		$music = Musics::create([
			'music_title' => $request->get('music_title'),
			'music_duration' => $request->get('music_duration'),
			'music_release_date' => $request->get('music_release_date')
		]);

		return response()->json(['data' => "The music with id {$music->music_id_music} has been created"], 201);
	}

	//get Music
	public function getMusic($id){
		$history = DB::table('music')
		->where('music_id_music', '=', $id);
		->get();

		if(!$music)
            return response()->json(['message' => "The music with id {$id} doesn't exist"], 404);

        return response()->json(['data' => $music], 200);
	}

	//update Music
	public function updateMusic(Request $request, $id){
		$history = DB::table('music')
		->where('music_id_music', '=', $id);
		->get();

		if(!$music)
			return $this->error("The music with id {$id} doesn't exist", 404);

		$this->validateRequestMusic($request);

		$music->music_title = $request->get('music_title');
		$music->music_duration = $request->get('music_duration');
		$music->music_release_date = $request->get('music_release_date');

		$music->save();

		return $this->success("The music with id {$music->music_id_music} has been updated", 200);
	}

	//delete Music
	public function deleteMusic($id){
		$history = DB::table('music')
		->where('music_id_music', '=', $id);
		->get();
		
		if(!$music)
            return response()->json(['message' => "The music with id {$id} doesn't exist"], 404);

		$music->delete();

        return response()->json(['data' => "The music with id {$id} has been deleted"], 200);
	}

	/*----------------------------Stats functions--------------------------*/

	/*----------------------------Annex functions--------------------------*/


	//validate request
	public function validateRequestMusic(Request $request){
		$rules = [
			'music_title' => 'required',
			'music_duration' => 'required|time',
			'music_release_date' => 'required|date'
		];

		$this->validate($request, $rules);
	}

	//is authorized
	public function isAuthorizedMusic(Request $request){
		$resource = "musics";
		$music = Music::find($this->getArgs($request)["music_id_music"]);

		return $this->autorizeUser($request, $resource, $music);
	}

}

?>
