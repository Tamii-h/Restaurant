<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\Restaurante;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    /* Mostrar una lista de chefs.*/
    public function index()
    {
        $chefs = Chef::with('restaurante')->get();
        return view('chefs.index', compact('chefs'));
    }

    /* Mostrar el formulario para crear un nuevo chef.*/
    public function crear()
    {
        $restaurantes = Restaurante::all();
        return view('chefs.crear', compact('restaurantes'));
    }

    /* Almacenar un nuevo chef en la bd.*/
    public function grabar(Request $request)
    {
        $request->validate([
            'restaurante_id' => 'required|exists:restaurantes,id',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'especialidad' => 'required|string|max:255',
            'email' => 'required|email|unique:chefs,email',
            'telefono' => 'required|string|max:20',
        ]);

        Chef::create($request->all());

        return redirect()->route('chefs.index')->with('success', 'Chef creado exitosamente.');
    }

    /* Mostrar el formulario para editar un chef existente.*/
    public function editar(Chef $chef)
    {
        $restaurantes = Restaurante::all();
        return view('chefs.editar', compact('chef', 'restaurantes'));
    }

    /* Actualizar en bd*/
    public function actualizar(Request $request, Chef $chef)
    {
        $request->validate([
            'restaurante_id' => 'required|exists:restaurantes,id',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'especialidad' => 'required|string|max:255',
            'email' => 'required|email|unique:chefs,email,' . $chef->id,
            'telefono' => 'required|string|max:20',
        ]);

        $chef->update($request->all());

        return redirect()->route('chefs.index')->with('success', 'Chef actualizado exitosamente.');
    }

    /* Eliminar un chef de la base de datos.*/
    public function eliminar(Chef $chef)
    {
        $chef->delete();
        return redirect()->route('chefs.index')->with('success', 'Chef eliminado exitosamente.');
    }
}
