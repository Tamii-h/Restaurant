@extends('plantilla')

@section('titulo')

@section('contenido')
<div class="container py-5">
    <h1 class="text-center mb-4">Nuestro Equipo</h1>
    <p class="text-center mb-5">Conoce a las personas que hacen posible nuestro éxito.</p>

    <div class="row">
        <!-- Primera persona -->
        <div class="col-md-4">
            <div class="card text-center">
                <img class="card-img-top rounded-circle mx-auto mt-4" src="{{ asset('img/empleado1.jpg') }}" alt="Empleado 1" style="width: 150px; height: 150px;">
                <div class="card-body">
                    <h5 class="card-title">Marina</h5>
                    <p class="card-text">Posición: Chef</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Repite para más personas -->
        <div class="col-md-4">
            <div class="card text-center">
                <img class="card-img-top rounded-circle mx-auto mt-4" src="{{ asset('img/empleado2.jpg') }}" alt="Empleado 2" style="width: 150px; height: 150px;">
                <div class="card-body">
                    <h5 class="card-title">Carla</h5>
                    <p class="card-text">Posición: Administrador</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <img class="card-img-top rounded-circle mx-auto mt-4" src="{{ asset('img/empleado3.jpg') }}" alt="Empleado 3" style="width: 150px; height: 150px;">
                <div class="card-body">
                    <h5 class="card-title">Cristian</h5>
                    <p class="card-text">Posición: Gerente</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <img class="card-img-top rounded-circle mx-auto mt-4" src="{{ asset('img/empleado4.jpg') }}" alt="Empleado 3" style="width: 150px; height: 150px;">
                <div class="card-body">
                    <h5 class="card-title">Ambar</h5>
                    <p class="card-text">Posición: Ayudante de cocina</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <img class="card-img-top rounded-circle mx-auto mt-4" src="{{ asset('img/empleado5.jpg') }}" alt="Empleado 3" style="width: 150px; height: 150px;">
                <div class="card-body">
                    <h5 class="card-title">Dario</h5>
                    <p class="card-text">Posición: Chef</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <img class="card-img-top rounded-circle mx-auto mt-4" src="{{ asset('img/empleado6.jpg') }}" alt="Empleado 3" style="width: 150px; height: 150px;">
                <div class="card-body">
                    <h5 class="card-title">Pablo</h5>
                    <p class="card-text">Posición: Mozo</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
