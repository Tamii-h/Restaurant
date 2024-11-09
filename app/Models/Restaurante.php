<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurante extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'direccion', 'telefono', 'email', 'horario_apertura', 'horario_cierre', 'capacidad'];

    public function chefs()
    {
        return $this->hasMany(Chef::class, 'restaurante_id');
    }

    public function menus()
    {
        return $this->hasMany(Menu::class, 'restaurante_id');
    }

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'restaurante_id');
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'restaurante_id');
    }



}
