<?php

namespace App\Http\Controllers;

use App\History;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HistoryController extends Controller{
	public function index(){
		$Histories = History::all();

		return response()->json($Histories);
	}

	//get History
	public function getHistory($id){
		$History = history::find($id);

		return response()->json($History);
	}

	//create History
	public function createHistory(Request $request){
		$History = History::create($request->all());

		return response()->json($History);
	}

	//delete History
	public function deleteHistory($id){
		$History = history::find($id);
		$History->delete();

		return response()->json('deleted');
	}

	//update History
	public function updateHistory(Request $request, $id){
		$History = History::find($id);
		$History->history_id_history = $request->input('history_id_history');
		$History->history_playtime = $request->input('history_playtime');
		$History->user_id_user = $request->input('user_id_user');
		$History->save();

		return response()->json($History);
	}
}
?>
