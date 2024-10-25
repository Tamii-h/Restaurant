<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    protected $model = Cliente::class;

    public function definition()
    {
        return [
            'nombre' => fake()->firstName,
            'apellido' => fake()->lastName,
            'email' => fake()->unique()->safeEmail,
            'telefono' => fake()->phoneNumber,
            'direccion' => fake()->address,
        ];
    }
}
