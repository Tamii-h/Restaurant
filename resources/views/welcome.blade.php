@extends('plantilla')

@section('titulo')

@section('contenido')
<div class="jumbotron text-center my-4">
    <h1 class="display-4">Bienvenido a Nuestro Restaurante</h1>
    <p class="lead">Entregando comida deliciosa por más de 18 años.</p>
    <div class="button-container">
        <a class="btn btn-primary btn-lg" href="/equipo/index" role="button">Nuestro equipo</a>
        <a class="btn btn-outline-light btn-lg" href="/reservas/crear" role="button">Reserva una Mesa</a>
    </div>

<div class="row text-center py-5">
    <div class="col-md-4">
        <h2>Menús</h2>
        <p>Explora nuestros platos exquisitos y menus diarios.</p>
        <a class="btn btn-secondary" href="/menus/index">Ver Menús</a>
    </div>
    <div class="col-md-4">
        <h2>Chefs</h2>
        <p>Conoce a nuestros chefs profesionales.</p>
        <a class="btn btn-secondary" href="/chefs/index">Ver Chefs</a>
    </div>
    <div class="col-md-4">
        <h2>Reservas</h2>
        <p>Reserva tu mesa fácilmente y disfruta.</p>
        <a class="btn btn-secondary" href="/reservas/crear">Haz una Reserva</a>
    </div>
</div>
</div>

@endsection
