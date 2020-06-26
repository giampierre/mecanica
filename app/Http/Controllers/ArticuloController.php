<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
class ArticuloController extends Controller
{   
    public function listarArticulos(){
        $articulos=Articulo::all();
        return $articulos;
    }
    public function crearArticulo(Request $request){
        $nuevoArticulo= new Articulo();
        $nuevoArticulo->codigo = $request->codigo;
        $nuevoArticulo->nombre = $request->nombre;
        $nuevoArticulo->precio = $request->precio;
        $nuevoArticulo->descripcion = $request->descripcion;
        $nuevoArticulo->estado = "1";

        $nuevoArticulo->save();

        return $nuevoArticulo;

    }
}
