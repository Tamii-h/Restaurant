<?php

namespace App\Http\Controllers;

use App\Models\Restaurante;
use Illuminate\Http\Request;

class RestauranteController extends Controller
{
    /* Mostrar una lista de restaurantes.*/
    public function index()
    {
        $restaurantes = Restaurante::all();
        return view('restaurantes.index', compact('restaurantes'));
    }

    /*Mostrar el formulario para crear un nuevo restaurante.*/
    public function crear()
    {
        return view('restaurantes.crear');
    }

    /* Almacenar un nuevo restaurante en la base de datos.*/
    public function grabar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:500',
            'telefono' => 'required|string|max:20',
            'email' => 'required|email|unique:restaurantes,email',
            'horario_apertura' => 'required|date_format:H:i',
            'horario_cierre' => 'required|date_format:H:i',
            'capacidad' => 'required|integer|min:1',
        ]);

        Restaurante::create($request->all());

        return redirect()->route('restaurantes.index')->with('success', 'Restaurante creado exitosamente.');
    }

    /* Mostrar el formulario para editar un restaurante existente.*/
    public function editar(Restaurante $restaurante)
    {
        return view('restaurantes.editar', compact('restaurante'));
    }

    /* Actualizar el restaurante*/
    public function actualizar(Request $request, Restaurante $restaurante)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:500',
            'telefono' => 'required|string|max:20',
            'email' => 'required|email|unique:restaurantes,email,' . $restaurante->id,
            'horario_apertura' => 'required|date_format:H:i',
            'horario_cierre' => 'required|date_format:H:i',
            'capacidad' => 'required|integer|min:1',
        ]);

        $restaurante->update($request->all());

        return redirect()->route('restaurantes.index')->with('success', 'Restaurante actualizado exitosamente.');
    }

    /*Eliminar un restaurante */
    public function eliminar(Restaurante $restaurante)
    {
        $restaurante->delete();
        return redirect()->route('restaurantes.index')->with('success', 'Restaurante eliminado exitosamente.');
    }
}
