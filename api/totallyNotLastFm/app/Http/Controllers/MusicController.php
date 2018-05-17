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

	//Get number of listening of one music by a specific user
	public function getNbListeningMusic($id_music, $id_user){
		$nbListening = DB::table('histories')
		->join('user', 'user.id', '=', 'histories.user_id_user')
		->join('contain', 'histories.history_id_history', '=', 'contain.history_id_history')
		->join('music', 'music.music_id_music', '=', 'contain.music_id_music')
		->select ('music.music_title', 'user.id', 'count(music.music_id_music) as nbListening')
		->where('music.music_id_music', '=', $id_music)
		->groupBy('musics.music_id_music')
		->get();

		return $this->success($nbListening, 200);
	}

	//Get the list of all music titles of one Album
	public function getTrackListOfAlbum($id_album){
		$musics = DB::table('albums')
		->join('include', 'albums.album_id_album', '=', 'include.album_id_album')
		->join('music', 'music.music_id_music', '=', 'include.music_id_music')
		->join('produce', 'albums.album_id_album', '=', 'produce.album_id_album')
		->join('artists', 'artists.artist_id', '=', 'produce.artist_id_artist')
		->select('albums.album_id_album', 'albums.album_title_album', 'music.music_id_music', 'music.music_title', 'artists.artist_id', 'artists.artist_name')
		->where('albums.album_id_album', '=', $id_album)
		->get();

		return $this->success($musics, 200);
	}

	//Get the musics the most listened by all users
	public function getAlbumsMostListened(){
		$musics = DB::table('user')
		->join('histories', 'user.id', '=', 'histories.user_id_user')
		->join('contain', 'histories.history_id_history', '=', 'contain.history_id_history')
		->join('music', 'contain.music_id_music', '=', 'music.music_id_music')
		->select('music.music_title', 'COUNT(music.music_id_music) as nbListening')
		->groupBy('music.music_id_music')
		->orderBy('nbListening DESC')
		->get();

		return $this->success($musics, 200);
	}

	//Get the musics the most listened by a specific user
	public function getMusicsMostListenedByUser($id_user){
		$musics = DB::table('user')
		->join('histories', 'user.id', '=', 'histories.user_id_user')
		->join('contain', 'histories.history_id_history', '=', 'contain.history_id_history')
		->join('music', 'contain.music_id_music', '=', 'music.music_id_music')
		->select('user.username', 'music.music_title', 'COUNT(music.music_id_music) as nbListening')
		->where('user.id', '=', $id_user)
		->groupBy('music.music_id_music')
		->orderBy('nbListening DESC')
		->get();

		return $this->success($musics, 200);
	}

	//Get the musics the most listened of a specific artist by all users
	public function getMusicsMostListenedOfArtist($id_artist){
		$musics = DB::table('user')
		->join('histories', 'user.id', '=', 'histories.user_id_user')
		->join('contain', 'histories.history_id_history', '=', 'contain.history_id_history')
		->join('music', 'contain.music_id_music', '=', 'music.music_id_music')
		->join('include', 'music.music_id_music', '=', 'include.music_id_music')
		->join('albums', 'include.album_id_album', '=', 'albums.album_id_album')
		->join('produce', 'albums.album_id_album', '=', 'produce.album_id_album')
		->join('artists', 'produce.artist_id_artist', '=', 'artists.artist_id')
		->select('artists.artist_name', 'music.music_title', 'COUNT(music.music_id_music) as nbListening')
		->where('artists.artist_id', '=', $id_artist)
		->groupBy('music.music_id_music')
		->orderBy('nbListening DESC')
		->get();

		return $this->success($musics, 200);
	}

	//Get the musics the most listened of a specific artist by a specific user
	public function getMusicsMostListenedOfArtistByUser($id_artist, $id_user){
		$musics = DB::table('user')
		->join('histories', 'user.id', '=', 'histories.user_id_user')
		->join('contain', 'histories.history_id_history', '=', 'contain.history_id_history')
		->join('music', 'contain.music_id_music', '=', 'music.music_id_music')
		->join('include', 'music.music_id_music', '=', 'include.music_id_music')
		->join('albums', 'include.album_id_album', '=', 'albums.album_id_album')
		->join('produce', 'albums.album_id_album', '=', 'produce.album_id_album')
		->join('artists', 'produce.artist_id_artist', '=', 'artists.artist_id')
		->select('artists.artist_name', 'music.music_title', 'COUNT(music.music_id_music) as nbListening')
		->where([
			['artists.artist_id', '=', $id_artist],
			['user.id', '=', $id_user]
		])
		->groupBy('music.music_id_music')
		->orderBy('nbListening DESC')
		->get();

		return $this->success($musics, 200);
	}

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
