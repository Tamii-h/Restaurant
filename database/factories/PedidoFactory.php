<?php

namespace Database\Factories;

use App\Models\Pedido;
use Illuminate\Database\Eloquent\Factories\Factory;

class PedidoFactory extends Factory
{
    protected $model = Pedido::class;

    public function definition()
    {
        return [
            'cliente_id' => \App\Models\Cliente::factory(), // Relación con Cliente
            'restaurante_id' => \App\Models\Restaurante::factory(), // Relación con Restaurante
            'fecha_pedido' => fake()->date(),
            'total' => fake()->randomFloat(2, 10, 100), // Total entre 10 y 100
            'estado' => fake()->word,
        ];
    }
}
