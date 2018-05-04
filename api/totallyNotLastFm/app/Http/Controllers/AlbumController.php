<?php

namespace App\Http\Controllers;

use App\Album;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlbumController extends Controller{
	public function index(){
		$Albums = Album::all();

		return response()->json($Albums);
	}

	//get Album
	public function getAlbum($id){
		$Album = Album::find($id);

		return response()->json($Album);
	}

	//create Album
	public function createAlbum(Request $request){
		$Album = Album::create($request->all());

		return response()->json($Album);
	}

	//delete Album
	public function deleteAlbum($id){
		$Album = Album::find($id);
		$Album->delete();

		return response()->json('deleted');
	}

	//upadte Album
	public function updateAlbum(Request $request, $id){
		$Album = Album::find($id);
		
		$Album->album_id_album = $request->input('album_id_album');
		$Album->album_title_album = $request->input('album_title_album');
		$Album->album_nb_tracks = $request->input('album_nb_tracks');
		$Album->save();

		return response()->json($Album);
	}
}



?>
