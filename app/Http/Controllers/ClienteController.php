<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    public function listarClientes()
    {
        $clientes = Cliente::where("estado","=","1")->get();
        return $clientes;
    }

    public function crearCliente(Request $request)
    {
      $nuevoCliente = new Cliente();
      $nuevoCliente->nombre  = $request->nombre;
      $nuevoCliente->dni     = $request->dni;
      $nuevoCliente->estado  = "1";

      $nuevoCliente->save();

      return $nuevoCliente;

    }

    public function actualizarCliente(Request $request, $id)
    {
      $actualizarCliente = Cliente::find($id);
      $actualizarCliente->nombre  = $request->nombre;
      $actualizarCliente->dni     = $request->dni;
      $actualizarCliente->estado  = "1";

      $actualizarCliente->save();

      return $actualizarCliente;

    }

    public function eliminarCliente($id)
    {
        $eliminarCliente = Cliente::find($id);
        $eliminarCliente->estado  = "E";

        $eliminarCliente->save();

        return $eliminarCliente;

    }

}
