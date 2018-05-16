<?php

namespace App\Http\Controllers;

use App\History;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HistoryController extends Controller{
	/*
	//Constructor
	public function __construct(){
		$this->middleware('oauth', ['except' => ['getAllHistories', 'getHistory']]);
		$this->middleware('authorize:' . __CLASS__, ['except' => ['getAllHistories', 'getHistory', 'createHistory']]);
	}
	*/

	/*----------------------------Basic functions--------------------------*/


	//get All Histories
	public function getAllHistories(){
		$histories = History::all();

        return response()->json(['data' => $histories], 200);
	}

	//create History
	public function createHistory(Request $request){
		$this->validateRequestHistory($request);

		$history = History::create([
			'history_play_time' => $request->get('history_play_time'),
			'user_id_user' => $request->get('user_id_user')
		]);

		return response()->json(['data' => "The history with id {$history->history_id_history} has been created"], 201);
	}

	//get History
	public function getHistory($id){
		$history = History::find($id);

		if(!$history)
			return $this->error("The history with id {$id} doesn't exist", 404);
		
		return $this->success($history, 200);
	}

	//update History
	public function updateHistory(Request $request, $id){
		$history = History::find($id);

		if(!$history)
            return response()->json(['message' => "The history with id {$id} doesn't exist"], 404);

		$this->validateRequestHistory($request);

		$hsitory->history_playtime = $request->get('history_play_time');
		$history->user_id_user = $request->get('user_id_user');

		$history->save();

        return response()->json(['data' => "The history with id {$history->history_id_history} has been updated"], 200);
	}

	//delete History
	public function deleteHistory($id){
		$history = History::find($id);

		if(!$history)
            return response()->json(['message' => "The history with id {$id} doesn't exist"], 404);

		$history->delete();

		return response()->json(['data' => "The history with id {$id} has been deleted"], 200);
	}

	/*----------------------------Stats functions--------------------------*/
	//Get number of listening of one music
	public function getNbListeningMusic($id_music, $id_user){
		$nbListening = DB::table('histories')
		->join('users', 'users.user_id_user', '=', 'histories.user_id_user')
		->join('contain', 'histories.history_id_history', '=', 'contain.history_id_history')
		->join('musics', 'musics.music_id_music', '=', 'contain.music_id_music')
		->join('compose', 'musics.music_id_music', '=', 'compose.music_id_music')
		->join('artists', 'artists.artist_id_artist', '=', 'compose.artist_id_artist')
		
		->select count('users.user_id_user', 'histories.history_id_history', 'musics.music_id_music', 'musics.title', 'artists.artist_id_artist', 'artists.arist_name')
		->where('musics.music_id_music', '=', $id_music)
		->groupBy('musics.music_id_music')
		->get();

		return $this->success($nbListening, 200);
	}

	//Get History playtime
	public function getHistoryPlaytime($id_user){
		$playtime = DB::table('histories')
		->join('users', 'users.user_id_user', '=', 'histories.user_id_user')
		->select('histories.history_play_time')
		->where('users.user_id_user', '=', $id_user)
		->get();

		return $this->success($playtime, 200);
	}

	//Get the genres the most listened
	public function getGenreMostListened($id_user){
		$nbListeningGenre = DB::table('histories')
		->join('users', 'users.user_id_user', '=', 'histories.user_id_user')
		->join('contain', 'histories.history_id_history', '=', 'contain.history_id_history')
		->join('musics', 'musics.music_id_music', '=', 'contain.music_id_music')
		->join('be', 'musics.music_id_music', '=', 'be.music_id_music')
		->join('genres', 'genres.genre_id_genre', '=', 'be.genre_id_genre')
		->select count('users.user_id_user', 'histories.history_id_history', 'genres.genre_id_genre', 'genres.genre_name_genre')
		->where('users.user_id_user', '=', $id_user)
		->groupBy('genres.genre_id_genre')
		->get();

		return $this->success($nbListeningGenre, 200);
	}

	//Get the artists the most listened by genre
	/*public function getArtistMostListenedByGenre($id_user){
		$nbListening = DB::table('histories')
		->join('users', 'users.user_id_user', '=', 'histories.user_id_user')
		->join('contain', 'histories.history_id_history', '=', 'contain.history_id_history')
		->join('musics', 'musics.music_id_music', '=', 'contain.music_id_music')
		->join('be', 'musics.music_id_music', '=', 'be.music_id_music')
		->join('genres', 'genres.genre_id_genre', '=', 'be.genre_id_genre')
		->select('users.user_id_user', 'histories.history_id_history', 'genres.genre_id_genre', 'genres.genre_name_genre')
		->where('users.user_id_user', '=', $id_user)
		->groupBy count('genres.genre_id_genre', 'desc')
		->get();

		return $this->success($albums, 200);
	}*/


	/*----------------------------Annex functions--------------------------*/

	//Validate request
	public function validateRequestHistory(Request $request){
		$rules = [
			'history_play_time' => 'required|time',
			'user_id_user' => 'required|numeric'
		];

		$this->validate($request, $rules);
	}

	//is authorized
	public function isAuthorizedHistory(Request $request){
		$resource = "histories";
		$history = History::find($this->getArgs($request)["history_id_history"]);

		return $this->autorizeUser($request, $resource, $history);
	}

}
?>
