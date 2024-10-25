<?php

namespace Database\Factories;

use App\Models\Chef;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChefFactory extends Factory
{
    protected $model = Chef::class;

    public function definition()
    {
        return [
            'restaurante_id' => \App\Models\Restaurante::factory(),
            'nombre' => fake()->firstName,
            'apellido' => fake()->lastName,
            'especialidad' => fake()->word,
            'email' => fake()->unique()->safeEmail,
            'telefono' => fake()->phoneNumber,
        ];
    }
}
