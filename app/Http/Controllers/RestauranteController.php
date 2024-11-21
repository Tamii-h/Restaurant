<?php

namespace App\Http\Controllers;

use App\Models\Restaurante;
use Illuminate\Http\Request;

class RestauranteController extends Controller
{
    /* Mostrar una lista de restaurantes.Lista de todos los recursos.*/
    public function index()
    {
        $restaurantes = Restaurante::all(); /*Obtiene todos los registros de la tabla restaurantes y los guarda en la variable $restaurantes */
        return view('restaurantes.index',  /*Indica que se va a renderizar la vista index que está en la carpeta restaurantes.*/
        compact('restaurantes')); /*Pasa la variable $restaurantes a la vista. */
    }

    /*Mostrar el formulario para crear un nuevo restaurante. Crea un nuevo recurso.*/
    public function crear()
    {
        return view('restaurantes.crear');
    }

    /* Almacenar un nuevo restaurante en la base de datos. Nuevo recurso en la db*/
    public function grabar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:500',
            'telefono' => 'required|string|max:20',
            'email' => 'required|email|unique:restaurantes,email',
            'horario_apertura' => 'required|date_format:H:i:s',
            'horario_cierre' => 'required|date_format:H:i:s',
            'capacidad' => 'required|integer|min:1',
        ]);

        Restaurante::create($request->all());

        return redirect()->route('restaurantes.index')->with('success', 'Restaurante creado exitosamente.');
    }

    /* Mostrar el formulario para editar un restaurante existente.Edita un recurso existente.*/
    public function editar(Restaurante $restaurante)
    {
        return view('restaurantes.editar', compact('restaurante'));
    }

    /* Actualizar el restaurante. Actualiza un recurso existente en la db.*/
    public function actualizar(Request $request, Restaurante $restaurante)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:500',
            'telefono' => 'required|string|max:20',
            'email' => 'required|email|unique:restaurantes,email,' . $restaurante->id,
            'horario_apertura' => 'required|date_format:H:i:s',
            'horario_cierre' => 'required|date_format:H:i:s',
            'capacidad' => 'required|integer|min:1',
        ]);

        $restaurante->update($request->all());

        return redirect()->route('restaurantes.index')->with('success', 'Restaurante actualizado exitosamente.');
    }

    /*Eliminar un restaurante. Elimina un recuso especifico de la db.*/
    public function eliminar(Restaurante $restaurante)
    {
        $restaurante->delete();
        return redirect()->route('restaurantes.index')->with('success', 'Restaurante eliminado exitosamente.');
    }
}
