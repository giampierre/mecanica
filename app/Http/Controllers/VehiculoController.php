<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehiculo;

class VehiculoController extends Controller
{
   public function listarVehiculos()
   {
       $vehiculos = Vehiculo::where("estado","=","1")->get();
       return $vehiculos;
   }

   public function crearVehiculo(Request $request)
   {
        $nuevoVehiculo = new Vehiculo();
        $nuevoVehiculo->placa       = $request->placa;
        $nuevoVehiculo->descripcion = $request->descripcion;
        $nuevoVehiculo->estado      = "1";
        
        $nuevoVehiculo->save();

        return $nuevoVehiculo;
   }

   public function eliminarVehiculo($id)
   {
       $eliminarVehiculo = Vehiculo::find($id);
       $eliminarVehiculo->estado = "E";
       
       $eliminarVehiculo->save();

       return $eliminarVehiculo;

   }
}
