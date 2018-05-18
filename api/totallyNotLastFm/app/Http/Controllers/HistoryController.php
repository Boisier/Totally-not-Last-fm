<?php

namespace App\Http\Controllers;

use App\History;
use Illuminate\Support\Facades\DB;
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
		$history = DB::table('histories')
		->where('history_id_history', '=', $id);
		->get();

		if(!$history)
			return $this->error("The history with id {$id} doesn't exist", 404);

		return $this->success($history, 200);
	}

	//update History
	public function updateHistory(Request $request, $id){
		$history = DB::table('histories')
		->where('history_id_history', '=', $id);
		->get();

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
		$history = DB::table('histories')
		->where('history_id_history', '=', $id);
		->get();
		
		if(!$history)
            return response()->json(['message' => "The history with id {$id} doesn't exist"], 404);

		$history->delete();

		return response()->json(['data' => "The history with id {$id} has been deleted"], 200);
	}

	/*----------------------------Stats functions--------------------------*/

	//Get History total playtime of a specific user
	public function getHistoryPlaytime($id_user){
		$musicDuration = DB::table('histories')
		->join('user', 'user.id', '=', 'histories.user_id_user')
		->join('contain', 'histories.history_id_history', '=', 'contain.history_id_history')
		->join('music', 'contain.music_id_music', '=', 'music.music_id_music')
		->select(DB::raw('SEC_TO_TIME(SUM((hour(music.music_duration)*3600) + (minute(music.music_duration)*60) + second(music.music_duration))) as duration'), 'user.id')
		->where([
			['user.id', '=', $id_user],
			['music.music_id_music', '=', $id_music]
		])
		->groupBy('user.id')
		->get();

		return $this->success($musicDuration, 200);
	}

	//Get average, earliest and latest listening periods of a specific user
	public function getListeningPeriodsOfUser($id_user){
		$periods = DB::table('user')
		->join('histories', 'userz.id', '=', 'histories.user_id_user')
		->select(DB::raw('SEC_TO_TIME(AVG(hour(histories.history_play_time)*3600+minute(histories.history_play_time)*60+second(histories.history_play_time))) as average'), 'MAX(histories.history_play_time) as lastest', 'MIN(histories.history_play_time) as earliest', 'user.username')
		->where('user.id', '=', $id_user)
		->groupBy('user.id')
		->get();

		return $this->success($periods, 200);
	}


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
