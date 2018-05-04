<?php

namespace App\Http\Controllers;

use App\Nationality;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NationalityController extends Controller{
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
}

?>
