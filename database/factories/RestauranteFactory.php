<?php

namespace Database\Factories;

use App\Models\Restaurante;
use Illuminate\Database\Eloquent\Factories\Factory;

class RestauranteFactory extends Factory
{
    protected $model = Restaurante::class;

    public function definition()
    {
        return [
            'nombre' => fake()->company,
            'direccion' => fake()->address,
            'telefono' => fake()->phoneNumber,
            'email' => fake()->unique()->safeEmail,
            'horario_apertura' => fake()->time(),
            'horario_cierre' => fake()->time(),
            'capacidad' => fake()->numberBetween(20, 100),
        ];
    }
}
