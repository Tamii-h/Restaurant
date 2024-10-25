@extends('plantilla')

@section('Titulo')
    Restaurantes - crear
@endsection

@section('contenido')
    <h1>Crear Nuevo Restaurante</h1>
    <a href="{{ route('restaurantes.index') }}">Volver al Listado</a>
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('restaurantes.grabar') }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}"><br><br>

        <label for="direccion">Dirección:</label><br>
        <input type="text" id="direccion" name="direccion" value="{{ old('direccion') }}"><br><br>

        <label for="telefono">Teléfono:</label><br>
        <input type="text" id="telefono" name="telefono" value="{{ old('telefono') }}"><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="{{ old('email') }}"><br><br>

        <label for="horario_apertura">Horario Apertura:</label><br>
        <input type="time" id="horario_apertura" name="horario_apertura" value="{{ old('horario_apertura') }}"><br><br>

        <label for="horario_cierre">Horario Cierre:</label><br>
        <input type="time" id="horario_cierre" name="horario_cierre" value="{{ old('horario_cierre') }}"><br><br>

        <label for="capacidad">Capacidad:</label><br>
        <input type="number" id="capacidad" name="capacidad" value="{{ old('capacidad') }}"><br><br>

        <button type="submit">Crear Restaurante</button>
    </form>
    <br>
    <a href="{{url('/')}}" class="btn btn-primary">Ir al home</a>
@endsection
