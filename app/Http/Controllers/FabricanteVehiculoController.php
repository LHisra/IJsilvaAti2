<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Fabricante;

use Illuminate\Http\Request;

class FabricanteVehiculoController extends Controller {

	public function __construct(){
		$this->middleware('auth.basic');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		$fabricante = Fabricante::find($id);
		$vehiculos = $fabricante->vehiculos;
		if(!$fabricante){
			return response()->json(['mensaje'=>'No se encuentra al fabricante', 'codigo'=>404],404);
		}
		return response()->json(['datoss'=>$vehiculos],202);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return "Mostrando formulario para crear vehículo del fabricante " .$id;
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($idFabricante, $idVehiculo)
	{
		return "Mostrando el vehículo " .$idVehiculo. " del fabricante " . $idFabricante;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($idFabricante, $idVehiculo)
	{
		return "Mostrando el formulario para editar el vehículo" .$idVehiculo. " del fabricante " . $idFabricante;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($idFabricante, $idVehiculo)
	{
		return "Mostrando el formulario para actualizar el vehículo" .$idVehiculo. "  del fabricante " . $idFabricante;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($idFabricante, $idVehiculo)
	{
		return "Mostrando el formulario para eliminar el vehículo ".$idVehiculo. " del fabricante " . $idFabricante;
	}

}
