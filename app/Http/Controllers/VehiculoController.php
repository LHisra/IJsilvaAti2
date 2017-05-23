<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller {

	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$vehiculo = Vehiculo::all();
		if(!$vehiculo){
			return response()->json(['mensaje'=> 'No se encontra al vehiculo','codigo'=>404],404);
		}
		return response()->json(['datos'=>$vehiculo],202);
	}

	
	public function show($id)
	{
		$vehiculo = Vehiculo::find($id);
		if(!$vehiculo){
			return response()->json(['mensaje'=> 'No se encontra al vehiculo','codigo'=>404],404);
		}
		return response()->json(['datos'=>$vehiculo],202);
	}


}
