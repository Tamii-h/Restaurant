<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Restaurante;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /*Mostrar una lista de pedidos.*/
    public function index()
    {
        $pedidos = Pedido::with(['cliente', 'restaurante'])->get();
        return view('pedidos.index', compact('pedidos'));
    }

    /* Mostrar el formulario para crear un nuevo pedido.*/
    public function crear()
    {
        $clientes = Cliente::all();
        $restaurantes = Restaurante::all();
        return view('pedidos.crear', compact('clientes', 'restaurantes'));
    }

    /* Almacenar un nuevo pedido.*/
    public function grabar(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'restaurante_id' => 'required|exists:restaurantes,id',
            'fecha_pedido' => 'required|date',
            'total' => 'required|numeric|min:0',
            'estado' => 'required|string|max:255',
        ]);

        Pedido::create($request->all());

        return redirect()->route('pedidos.index')->with('success', 'Pedido creado exitosamente.');
    }

    /* Mostrar el formulario para editar un pedido existente.*/
    public function editar(Pedido $pedido)
    {
        $clientes = Cliente::all();
        $restaurantes = Restaurante::all();
        return view('pedidos.editar', compact('pedido', 'clientes', 'restaurantes'));
    }

    /* Actualizar el pedido.*/
    public function actualizar(Request $request, Pedido $pedido)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'restaurante_id' => 'required|exists:restaurantes,id',
            'fecha_pedido' => 'required|date',
            'total' => 'required|numeric|min:0',
            'estado' => 'required|string|max:255',
        ]);

        $pedido->update($request->all());

        return redirect()->route('pedidos.index')->with('success', 'Pedido actualizado exitosamente.');
    }

    /* Eliminar un pedido de la base de datos.*/
    public function eliminar(Pedido $pedido)
    {
        $pedido->delete();
        return redirect()->route('pedidos.index')->with('success', 'Pedido eliminado exitosamente.');
    }
}
