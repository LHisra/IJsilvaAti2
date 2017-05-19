<?php namespace App\Http\Controllers;
use App\MiModelo;

 class MiControlador extends Controller{
    function index(){
      $modelo = new MiModelo();
      $resultado = $modelo->saludar("Israel");
      return view("Prueba.index",["saludo"=>$resultado]);
   }
}
