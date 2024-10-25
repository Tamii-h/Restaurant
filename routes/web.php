<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\RestauranteController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ReservaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puedes registrar todas las rutas web para tu aplicación.
| Estas rutas son cargadas por el RouteServiceProvider dentro de un grupo
| que contiene el middleware "web". Ahora crea algo grandioso!
|
*/

// Ruta de bienvenida
Route::get('/', function () {
    return view('welcome');
})->name('welcome');


// Rutas para Clientes
Route::get('/clientes/index', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('/clientes/crear', [ClienteController::class, 'crear'])->name('clientes.crear');
Route::post('/clientes/grabar', [ClienteController::class, 'grabar'])->name('clientes.grabar');
Route::get('/clientes/editar/{cliente}', [ClienteController::class, 'editar'])->name('clientes.editar');
Route::post('/clientes/actualizar/{cliente}', [ClienteController::class, 'actualizar'])->name('clientes.actualizar');
Route::delete('/clientes/eliminar/{cliente}', [ClienteController::class, 'eliminar'])->name('clientes.eliminar');

// Rutas para Restaurantes
Route::get('/restaurantes/index', [RestauranteController::class, 'index'])->name('restaurantes.index');
Route::get('/restaurantes/crear', [RestauranteController::class, 'crear'])->name('restaurantes.crear');
Route::post('/restaurantes/grabar', [RestauranteController::class, 'grabar'])->name('restaurantes.grabar');
Route::get('/restaurantes/editar/{restaurante}', [RestauranteController::class, 'editar'])->name('restaurantes.editar');
Route::post('/restaurantes/actualizar/{restaurante}', [RestauranteController::class, 'actualizar'])->name('restaurantes.actualizar');
Route::delete('/restaurantes/eliminar/{restaurante}', [RestauranteController::class, 'eliminar'])->name('restaurantes.eliminar');

// Rutas para Chefs
Route::get('/chefs/index', [ChefController::class, 'index'])->name('chefs.index');
Route::get('/chefs/crear', [ChefController::class, 'crear'])->name('chefs.crear');
Route::post('/chefs/grabar', [ChefController::class, 'grabar'])->name('chefs.grabar');
Route::get('/chefs/editar/{chef}', [ChefController::class, 'editar'])->name('chefs.editar');
Route::post('/chefs/actualizar/{chef}', [ChefController::class, 'actualizar'])->name('chefs.actualizar');
Route::delete('/chefs/eliminar/{chef}', [ChefController::class, 'eliminar'])->name('chefs.eliminar');

// Rutas para Menús
Route::get('/menus/index', [MenuController::class, 'index'])->name('menus.index');
Route::get('/menus/crear', [MenuController::class, 'crear'])->name('menus.crear');
Route::post('/menus/grabar', [MenuController::class, 'grabar'])->name('menus.grabar');
Route::get('/menus/editar/{menu}', [MenuController::class, 'editar'])->name('menus.editar');
Route::post('/menus/actualizar/{menu}', [MenuController::class, 'actualizar'])->name('menus.actualizar');
Route::delete('/menus/eliminar/{menu}', [MenuController::class, 'eliminar'])->name('menus.eliminar');

// Rutas para Pedidos
Route::get('/pedidos/index', [PedidoController::class, 'index'])->name('pedidos.index');
Route::get('/pedidos/crear', [PedidoController::class, 'crear'])->name('pedidos.crear');
Route::post('/pedidos/grabar', [PedidoController::class, 'grabar'])->name('pedidos.grabar');
Route::get('/pedidos/editar/{pedido}', [PedidoController::class, 'editar'])->name('pedidos.editar');
Route::post('/pedidos/actualizar/{pedido}', [PedidoController::class, 'actualizar'])->name('pedidos.actualizar');
Route::delete('/pedidos/eliminar/{pedido}', [PedidoController::class, 'eliminar'])->name('pedidos.eliminar');

// Rutas para Reservas
Route::get('/reservas/index', [ReservaController::class, 'index'])->name('reservas.index');
Route::get('/reservas/crear', [ReservaController::class, 'crear'])->name('reservas.crear');
Route::post('/reservas/grabar', [ReservaController::class, 'grabar'])->name('reservas.grabar');
Route::get('/reservas/editar/{reserva}', [ReservaController::class, 'editar'])->name('reservas.editar');
Route::post('/reservas/actualizar/{reserva}', [ReservaController::class, 'actualizar'])->name('reservas.actualizar');
Route::delete('/reservas/eliminar/{reserva}', [ReservaController::class, 'eliminar'])->name('reservas.eliminar');

//Para Equipo
Route::view('/equipo/index', 'Equipo.index')->name('equipo.index');
