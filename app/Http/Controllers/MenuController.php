<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Restaurante;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /* Mostrar una lista de menús.*/
    public function index()
    {
        $menus = Menu::with('restaurante')->get();
        return view('menus.index', compact('menus'));
    }

    /* Mostrar el formulario para crear un nuevo menú. */
    public function crear()
    {
        $restaurantes = Restaurante::all();
        return view('menus.crear', compact('restaurantes'));
    }

    /* Almacenar un nuevo menú. */
    public function grabar(Request $request)
    {
        $request->validate([
            'restaurante_id' => 'required|exists:restaurantes,id',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'disponibilidad' => 'required|boolean',
        ]);

        Menu::create($request->all());

        return redirect()->route('menus.index')->with('success', 'Menú creado exitosamente.');
    }

    /* Mostrar el formulario para editar un menú existente. */
    public function editar(Menu $menu)
    {
        $restaurantes = Restaurante::all();
        return view('menus.editar', compact('menu', 'restaurantes'));
    }

    /* Actualizar el menú. */
    public function actualizar(Request $request, Menu $menu)
    {
        $request->validate([
            'restaurante_id' => 'required|exists:restaurantes,id',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'disponibilidad' => 'required|boolean',
        ]);

        $menu->update($request->all());

        return redirect()->route('menus.index')->with('success', 'Menú actualizado exitosamente.');
    }

    /* Eliminar un menú de la base de datos.*/
    public function eliminar(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menú eliminado exitosamente.');
    }
}
