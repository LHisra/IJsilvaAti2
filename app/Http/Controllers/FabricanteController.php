<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Fabricante;
use Illuminate\Http\Request;

class FabricanteController extends Controller {

	public function __construct(){
		$this->middleware('auth.basic',['only'=>['store','update', 'destroy'] ]);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return response()->json(['datos'=>Fabricante::all()],202);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
	
		if(!$request->get('nombre') || !$request->get('telefono')){
			return response()->json(['mensaje'=>'Datos Inválidos o Incompletos','codigo'=>'422'],422);
		}
		Fabricante::create([$request->all()]);
		return response()->json(['mensaje'=>'El fabricante ha sido creado'],202);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$fabricante = Fabricante::find($id);
		if(!$fabricante){
			return response()->json(['mensaje'=> 'No se encontra al fabricante','codigo'=>404],404);
		}
		return response()->json(['datos'=>$fabricante],202);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		return "Mostrando el formulario para actualizar el fabricante con id " .$id;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return "Mostrando el formulario para eliminar el fabricante con id " .$id;
	}

}
