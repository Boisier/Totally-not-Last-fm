<?php

namespace App\Http\Controllers;

use App\Nationality;
use Illuminate\Support\Facades\DB;
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

	/*----------------------------Basic functions--------------------------*/

	//get All Nationalities
	public function getAllNationalities(){
		$nationalities = Nationality::all();

        return response()->json(['data' => $nationalities], 200);
	}

	//create Nationality
	public function createnationality(Request $request){
		$this->validateRequestNationality($request);

		$nationality = Nationality::create([
			'nationality_code' => $request->get('nationality_code')
		]);

        return response()->json(['data' => "The nationality with id {$nationality->nationality_id_nationality} has been created"], 201);
	}

	//get Nationality
	public function getNationality($id){
		$nationality = DB::table('nationalities')
		->where('nationality_id_nationality', '=', $id);
		->get();

		if(!$nationality)
            return response()->json(['message' => "The nationality with id {$id} doesn't exist"], 404);

        return response()->json(['data' => $nationality], 200);
	}

	//update Nationality
	public function updateNationality(Request $request, $id){
		$nationality = DB::table('nationalities')
		->where('nationality_id_nationality', '=', $id);
		->get();

		if(!$nationality)
            return response()->json(['message' => "The nationality with id {$id} doesn't exist"], 404);

		$this->validateRequestNationality($request);

		$nationality->nationality_code = $request->get('nationality_code');

		$nationality->save();

        return response()->json(['data' => "The nationality with id {$nationality->nationality_id_nationality} has been updated"], 200);
	}

	/*----------------------------Stats functions--------------------------*/

	/*----------------------------Annex functions--------------------------*/

	//delete Nationality
	public function deleteNationality($id){
		$nationality = DB::table('nationalities')
		->where('nationality_id_nationality', '=', $id);
		->get();
		
		if(!$nationality)
            return response()->json(['message' => "The nationality with id {$id} doesn't exist"], 404);

		$nationality->delete();

		return response()->json(['data' => "The nationality with id {$id} has been deleted"], 200);
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


}

?>
