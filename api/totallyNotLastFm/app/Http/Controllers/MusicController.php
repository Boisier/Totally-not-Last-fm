<?php

namespace App\Http\Controllers;

use App\Music;
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

	//get All Musics
	public function getAllMusics(){
		$musics = Music::all();

		return $this->success($musics, 200);
	}

	//create Music
	public function createMusic(Request $request){
		$this->validateRequestMusic($request);

		$music = Musics::create([
			'music_title' => $request->get('music_title'),
			'music_duration' => $request->get('music_duration'),
			'music_release_date' => $request->get('music_release_date')
		]);

		return $this->success("The music with id {$music->music_id_music} has been created", 201);
	}

	//get Music
	public function getMusic($id){
		$music = Music::find($id);

		if(!$music)
			return $this->error("The music with {$id} doesn't exist", 404);

		return $this->success($music, 200);
	}

	//update Music
	public function updateMusic(Request $request, $id){
		$music = Music::find($id);

		if(!$music)
			return $this->error("The music with {$id} doesn't exist", 404);

		$this->validateRequestMusic($request);

		$music->music_title = $request->get('music_title');
		$music->music_duration = $request->get('music_duration');
		$music->music_release_date = $request->get('music_release_date');

		$music->save();

		return $this->success("The music with id {$music->music_id_music} has been updated", 200);
	}

	//delete Music
	public function deleteMusic($id){
		$music = Music::find($id);

		if(!$music)
			return $this->error("The music with {$id} doesn't exist", 404);

		$music->delete();

		return $this->success("The music with {$id} has been deleted", 200);
	}

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
	
	/*
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
	*/
}

?>
