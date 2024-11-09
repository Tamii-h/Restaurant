<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Cliente;
use App\Models\Restaurante;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    /* Mostrar una lista de reservas. */
    public function index()
    {
        $reservas = Reserva::with(['cliente', 'restaurante'])->get();
        return view('reservas.index', compact('reservas'));
    }

    /* Mostrar el formulario para crear una nueva reserva. */
    public function crear(Request $request)
    {
        $clientes = Cliente::all();
        $restaurantes = Restaurante::all();
        
        // Elimina la lógica de mesas, ya no filtramos mesas disponibles.
        return view('reservas.crear', compact('clientes', 'restaurantes'));
    }

    /* Almacenar una nueva reserva en la base de datos. */
    public function grabar(Request $request)
    {
        // Validación de los campos
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'restaurante_id' => 'required|exists:restaurantes,id',
            'fecha_reserva' => 'required|date',
            'numero_personas' => 'required|integer|min:1',
            'estado' => 'required|string|max:255',
        ]);

        // Crear la reserva sin asociar mesas
        Reserva::create($request->all());

        return redirect()->route('reservas.index')->with('success', 'Reserva creada exitosamente.');
    }

    /* Mostrar el formulario para editar una reserva existente. */
    public function editar(Reserva $reserva)
    {
        $clientes = Cliente::all();
        $restaurantes = Restaurante::all();
        return view('reservas.editar', compact('reserva', 'clientes', 'restaurantes'));
    }

    /* Actualizar la reserva en la base de datos. */
    public function actualizar(Request $request, Reserva $reserva)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'restaurante_id' => 'required|exists:restaurantes,id',
            'fecha_reserva' => 'required|date',
            'numero_personas' => 'required|integer|min:1',
            'estado' => 'required|string|max:255',
        ]);

        $reserva->update($request->all());

        return redirect()->route('reservas.index')->with('success', 'Reserva actualizada exitosamente.');
    }

    /* Eliminar una reserva de la base de datos. */
    public function eliminar(Reserva $reserva)
    {
        $reserva->delete();
        return redirect()->route('reservas.index')->with('success', 'Reserva eliminada exitosamente.');
    }
}
