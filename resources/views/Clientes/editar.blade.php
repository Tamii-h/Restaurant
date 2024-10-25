@extends('plantilla')

@section('Titulo')
    Clientes - editar
@endsection

@section('contenido')
    <h1>Editar Cliente</h1>
    <a href="{{ route('clientes.index') }}">Volver al Listado</a>
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('clientes.actualizar', $cliente->id) }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $cliente->nombre) }}"><br><br>

        <label for="apellido">Apellido:</label><br>
        <input type="text" id="apellido" name="apellido" value="{{ old('apellido', $cliente->apellido) }}"><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="{{ old('email', $cliente->email) }}"><br><br>

        <label for="telefono">Teléfono:</label><br>
        <input type="text" id="telefono" name="telefono" value="{{ old('telefono', $cliente->telefono) }}"><br><br>

        <label for="direccion">Dirección:</label><br>
        <textarea id="direccion" name="direccion">{{ old('direccion', $cliente->direccion) }}</textarea><br><br>

        <button type="submit">Actualizar Cliente</button>
    </form>
    <br>
    <a href="{{url('/')}}" class="btn btn-primary">Ir al home</a>
@endsection
