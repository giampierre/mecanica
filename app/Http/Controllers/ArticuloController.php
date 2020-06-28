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
        $nuevoArticulo->oem = $request->oem;
        $nuevoArticulo->cod_gen = $request->cod_gen;        
        $nuevoArticulo->descripcion = $request->descripcion;
        $nuevoArticulo->marca = $request->marca;
        $nuevoArticulo->id_ubi = $request->id_ubi;
        $nuevoArticulo->costo = $request->costo;
        $nuevoArticulo->costo_igv = $request->costo_igv;
        $nuevoArticulo->venta = $request->venta;
        $nuevoArticulo->cantidad = $request->cantidad;
        $nuevoArticulo->estado = "1";
        $nuevoArticulo->save();
        return $nuevoArticulo;
    }
}
