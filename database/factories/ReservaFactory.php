<?php

namespace Database\Factories;

use App\Models\Reserva;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservaFactory extends Factory
{
    protected $model = Reserva::class;

    public function definition()
    {
        return [
            'fecha_reserva' => fake()->date(),
            'numero_personas' => fake()->numberBetween(1, 10), // Entre 1 y 10 personas
            'estado' => fake()->word,
            'cliente_id' => \App\Models\Cliente::factory(), // Relación con Cliente
            'restaurante_id' => \App\Models\Restaurante::factory(), // Relación con Restaurante
        ];
    }
}
