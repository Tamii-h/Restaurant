<?php

namespace Database\Factories;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{
    protected $model = Menu::class;

    public function definition()
    {
        return [
            'restaurante_id' => \App\Models\Restaurante::factory(),
            'nombre' => fake()->word,
            'descripcion' => fake()->text,
            'precio' => fake()->randomFloat(2, 5, 50), // Precio entre 5 y 50
            'disponibilidad' => fake()->boolean,
        ];
    }
}
