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
    public function actualizarArticulo(Request $request, $id){
        $fecha_actual = new \DateTime();
        $fecha_actual->format('d-m-Y H:i:s');
   
        $actualizandoArticulo = Articulo::find($id);
        $actualizandoArticulo->oem = $request->oem;
        $actualizandoArticulo->cod_gen = $request->cod_gen;        
        $actualizandoArticulo->descripcion = $request->descripcion;
        $actualizandoArticulo->marca = $request->marca;
        $actualizandoArticulo->id_ubi = $request->id_ubi;
        $actualizandoArticulo->costo = $request->costo;
        $actualizandoArticulo->costo_igv = $request->costo_igv;
        $actualizandoArticulo->venta = $request->venta;
        $actualizandoArticulo->cantidad = $request->cantidad;
        $actualizandoArticulo->estado = "1";
        $actualizandoArticulo->updated_at = $fecha_actual;
        $actualizandoArticulo->save();
       
        return $actualizandoArticulo;
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
