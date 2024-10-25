<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;
use App\Models\Restaurante;
use App\Models\Chef;
use App\Models\Menu;
use App\Models\Pedido;
use App\Models\Reserva;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Crear 10 clientes
        $clientes = Cliente::factory(10)->create();
        $this->command->info('10 clientes creados.');

        // Crear 5 restaurantes
        $restaurantes = Restaurante::factory(5)->create();
        $this->command->info('5 restaurantes creados.');

        // Crear 10 chefs, asignando cada uno a un restaurante aleatorio
        Chef::factory(10)->create()->each(function($chef) use ($restaurantes) {
            $chef->restaurante_id = $restaurantes->random()->id;
            $chef->save();
        });
        $this->command->info('10 chefs creados.');

        // Crear 15 menús, asignando cada uno a un restaurante aleatorio
        Menu::factory(15)->create()->each(function($menu) use ($restaurantes) {
            $menu->restaurante_id = $restaurantes->random()->id;
            $menu->save();
        });
        $this->command->info('15 menús creados.');

        // Crear 20 pedidos, asignando cada uno a un cliente y restaurante aleatorios
        Pedido::factory(20)->create()->each(function($pedido) use ($clientes, $restaurantes) {
            $pedido->cliente_id = $clientes->random()->id;
            $pedido->restaurante_id = $restaurantes->random()->id;
            $pedido->save();
        });
        $this->command->info('20 pedidos creados.');

        // Crear 10 reservas, asignando cada una a un cliente y restaurante aleatorios
        Reserva::factory(10)->create()->each(function($reserva) use ($clientes, $restaurantes) {
            $reserva->cliente_id = $clientes->random()->id;
            $reserva->restaurante_id = $restaurantes->random()->id;
            $reserva->save();
        });
        $this->command->info('10 reservas creadas.');
    }
}
