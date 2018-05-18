<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller{
	
	//Constructor
	public function __construct(){
		//$this->middleware('auth', ['only' => ['me']]);
	}
	

	/*----------------------------Basic functions--------------------------*/
	

	/* Récupère email + mdp et génère token si good */
	/*public function authenticate(Request $request){
        print_r($request);
		return $this->success(["token" => md5(time())], 200); //md5 = génère une chaine de charactère
	}
*/
	//get all users
	public function getAllUsers(){
		$users = User::all();
		
        return response()->json(['data' => $users], 200);
	}

	//create user
	public function createUser(Request $request){
		$this->validateRequestUser($request);

		$user = User::create([
			'username' => $request->get('username'),
			'birthday' => $request->get('birthday'),
			'mail' => $request->get('mail'),
			'password' => Hash::make($request->get('password'))
		]);

		return response()->json(['data' => "The user with id {$user->id} has been created"], 201);
	}

	//get User
	public function getUser($id){
		$user = User::find($id);

		if(!$user)
			return response()->json(['message' => "The user with id {$id} doesn't exist"], 404);

		return response()->json(['data' => $user], 200);
	}

	//update User
	public function updateUser(Request $request, $id){
		$user = User::find($id);

		if(!$user)
			return response()->json(['message' => "The user with id {$id} doesn't exist"], 404);

		$this->validateRequestUser($request);

		$user->username = $request->get('username');
		$user->birthday = $request->get('birthday');
		$user->mail = $request->get('mail');
		$user->password = Hash::make($request->get('password'));

		$user->save();

        return response()->json(['data' => "The user with id {$user->id} has been updated"], 200);
	}

	//delete User
	public function deleteUser($id){
		$user = User::find($id);

		if(!$user)
			return response()->json(['message' => "The user with id {$id} doesn't exist"], 404);

		$user->delete();

		return response()->json(['data' => "The user with id {$id} has been deleted"], 200);
	}
	/*----------------------------Stats functions--------------------------*/


	/*----------------------------Annex functions--------------------------*/


	//validate request
	public function validateRequestUser(Request $request){
		$rules = [
			'username' => 'required',
			'birthday' => 'required|date',
			'mail' => 'required|email|unique:users',
			'password' => 'required|min:6'
		];

		$this->validate($request, $rules);
	}

}

?>
