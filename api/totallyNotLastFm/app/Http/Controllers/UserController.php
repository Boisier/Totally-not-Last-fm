<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller{
	public function index(){
		$Users = User::all();

		return response()->json($Users);
	}

	//get Album
	public function getUser($id){
		$User = User::find($id);

		return response()->json($User);
	}

	//create Album
	public function createUser(Request $request){
		$User = User::create($request->all());

		return response()->json($User);
	}

	//delete Album
	public function deleteUser($id){
		$User = User::find($id);
		$User->delete();

		return response()->json('deleted');
	}

	//upadte Album
	public function updateUser(Request $request, $id){
		$User = User::find($id);
		
		$User->album_id_album = $request->input('album_id_album');
		$User->album_title_album = $request->input('album_title_album');
		$User->album_nb_tracks = $request->input('album_nb_tracks');
		$User->save();

		return response()->json($User);
	}
}

?>
