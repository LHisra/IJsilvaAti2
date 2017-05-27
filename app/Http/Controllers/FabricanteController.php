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
		//return response()->json(['datos'=>Fabricante::all()],202);
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
	public function update(Request $request, $id)
	{
		$flag = false;
		$metodo=$request->method();
		$fabricante=Fabricante::find($id);
		if($metodo ==="PATCH"){
			$nombre = $request->get('nombre');
			if($nombre!=null && $nombre != ''){
				$fabricante->nombre=$nombre;
				$flag= true;
			}
			$telefono = $request->get('telefono');
			if($telefono!=null && $telefono != ''){
				$fabricante->telefono=$telefono;
				$flag= true;
			}
			if($flag){
				$fabricante->save();
			return "registro editado con patch";
			}
			
			return response()->json(['mensaje'=>'No se an guardado los cambios, Datos nulos''codigo'=>202],202);

		}
		$nombre = $request->get('nombre');
		$telefono = $request->get('telefono');
		if(!$nombre || !$telefono){
			return response()->json(['mensaje'=>'Datos invalidos'],404);

		}
		
		$fabricante->nombre=$nombre;
		$fabricante->telefono=$telefono;
		$fabricante->save();
		return response()->json(['mensaje'=>'EL fabricante ha sido editado'],202);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$fabricante = Fabricante::find($idFabricante);
		if(!$fabricante){
			return resopnse->json(['mensaje'=>'El fabricante no se encuentra', 'codigo'=>'404'],404);

		}
		$vehiculos->$fabricante->vehiculos;
		if(sizeof($vehiculos)>0){
			return rsponse()->json(['mensaje'->'El fabricante posee vehiculos y no se puede elminar, elimine los vehiculos primero']);
		}
		$fabricante->delete();
		return response()->json( ['mensaje'=>'El fabricante ha sido eliminado'],200);
	}

}
