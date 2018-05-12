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

	//get All Histories
	public function getAllHistories(){
		$histories = History::all();

		return $this->success($histories, 200);
	}

	//create History
	public function createHistory(Request $request){
		$this->validateRequestHistory($request);

		$history = History::create([
			'history_play_time' => $request->get('history_play_time'),
			'user_id_user' => $request->get('user_id_user')
		]);

		return $this->success("the album with id {$history->history_id_history} has been created", 201);
	}

	//get History
	public function getHistory($id){
		$history = History::find($id);

		if(!$history)
			return $this->error("The album with {$id} doesn't exist", 404);
		
		return $this->success($history, 200);
	}

	//update History
	public function updateHistory(Request $request, $id){
		$history = History::find($id);

		if(!$history)
			return $this->error("The album with {$id} doesn't exist", 404);

		$this->validateRequestHistory($request);

		$hsitory->history_playtime = $request->get('history_play_time');
		$history->user_id_user = $request->get('user_id_user');

		$history->save();

		return $this->success("The history with id {$history->history_id_history} has been updated", 200);
	}

	//delete History
	public function deleteHistory($id){
		$history = History::find($id);

		if(!$history)
			return $this->error("The history with {$id} doesn't exist", 404);

		$history->delete();

		return $this->success("The history with {$id} has been deleted", 200);
	}

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
