<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /* Mostrar una lista de clientes.*/
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    /* Mostrar el formulario para crear un nuevo cliente.*/
    public function crear()
    {
        return view('clientes.crear');
    }

    /* Almacenar un nuevo cliente en la bd.*/
    public function grabar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes,email',
            'telefono' => 'required|string|max:20',
            'direccion' => 'required|string|max:500',
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente creado exitosamente.');
    }

    /* Mostrar el formulario para editar un cliente existente.*/
    public function editar(Cliente $cliente)
    {
        return view('clientes.editar', compact('cliente'));
    }

    /* Actualizar el cliente en la bd.*/
    public function actualizar(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes,email,' . $cliente->id,
            'telefono' => 'required|string|max:20',
            'direccion' => 'required|string|max:500',
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado exitosamente.');
    }

    /* Eliminar un cliente de la base de datos.*/
    public function eliminar(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado exitosamente.');
    }
}
