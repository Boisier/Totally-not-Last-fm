<?php

namespace App\Http\Controllers;

use App\Nationality;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NationalityController extends Controller{
	/*
	//Constructor
	public function __construct(){
		$this->middleware('oauth', ['except' => ['getAllNationalities', 'getNationality']]);
		$this->middleware('authorize:' . __CLASS__, ['except' => ['getAllNationalities', 'getNationality', 'createNationality']]);
	}
	*/

	//get All Nationalities
	public function getAllNationalities(){
		$nationalities = Nationality::all();

		return $this->success($nationalities, 200);
	}

	//create Nationality
	public function createnationality(Request $request){
		$this->validateRequestNationality($request);

		$nationality = Nationality::create([
			'nationality_code' => $request->get('nationality_code');
		]);

		return $this->success("The nationality with id {$nationality->nationality_id_nationality} has been created", 201);
	}

	//get Nationality
	public function getNationality($id){
		$nationality = Nationality::find($id);

		if(!$nationality)
			return $this->error("The nationality with {$id} doesn't exist", 404);

		return $this->success($nationality, 200);
	}

	//update Nationality
	public function updateNationality(Request $request, $id){
		$nationality = Nationality::find($id);

		if(!$nationality)
			return $this->error("The nationality with {$id} doesn't exist", 404);

		$this->validateRequestNationality($request);

		$nationality->nationality_code = $request->get('nationality_code');

		$nationality->save();

		return $this->success("The nationality with id {$nationality->nationality_id_nationality} has been updated", 200);
	}

	//delete Nationality
	public function deleteNationality($id){
		$nationality = Nationality::find($id);

		if(!$nationality)
			return $this->error("The nationality with {$id} doesn't exist", 404);

		$nationality->delete();

		return $this->success("The ,nationality with {$id} has been deleted", 200);
	}

	//validate request
	public function validateRequestNationality(Request $request){
		$rules = [
			'nationality_code' => 'required|alpha'	
		];

		$this->validate($request, $rules);
	}

	//is authorized
	public function isAuthorizedNationality(Request $request){
		$resource = "nationalities";
		$nationality = Nationality::find($this->getArgs($request)["nationality_id_nationality"]);

		return $this->autorizeUser($request, $resource, $nationality);
	}

	/*
	public function index(){
		$Nationalities = Nationality::all();

		return response()->json($Nationalities);
	}

	//get nationality
	public function getNationality($id){
		$Nationality = Nationality::find($id);

		return response()->json($Nationality);
	}

	//create nationality
	public function createNationality(Request $request){
		$Nationality = Nationality::create($request->all());

		return response()->json($Nationality);
	}

	//delete nationality
	public function deleteNationality($id){
		$Nationality = Nationality::find($id);
		$Nationality->delete();

		return response()->json('deleted');
	}

	//update nationality
	public function updateNationality(Request $request, $id){
		$Nationality = Nationality::find($id);
		
		$Nationality->nationality_id_nationality = $request->input('nationality_id_nationality');
		$Nationality->nationality_code = $request->input('nationality_code');
		$Nationality->save();

		return response()->json($Nationality);
	}
	*/
}

?>
