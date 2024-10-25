@extends('plantilla')

@section('Titulo')
    Chefs - index
@endsection

@section('contenido')
    <h1>Editar Chef</h1>
    <a href="{{ route('chefs.index') }}">Volver al Listado</a>
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('chefs.actualizar', $chef->id) }}" method="POST">
        @csrf
        <label for="restaurante_id">Restaurante:</label><br>
        <select id="restaurante_id" name="restaurante_id">
            <option value="">-- Seleccionar Restaurante --</option>
            @foreach($restaurantes as $restaurante)
                <option value="{{ $restaurante->id }}" {{ (old('restaurante_id', $chef->restaurante_id) == $restaurante->id) ? 'selected' : '' }}>
                    {{ $restaurante->nombre }}
                </option>
            @endforeach
        </select><br><br>

        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $chef->nombre) }}"><br><br>

        <label for="apellido">Apellido:</label><br>
        <input type="text" id="apellido" name="apellido" value="{{ old('apellido', $chef->apellido) }}"><br><br>

        <label for="especialidad">Especialidad:</label><br>
        <input type="text" id="especialidad" name="especialidad" value="{{ old('especialidad', $chef->especialidad) }}"><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="{{ old('email', $chef->email) }}"><br><br>

        <label for="telefono">Teléfono:</label><br>
        <input type="text" id="telefono" name="telefono" value="{{ old('telefono', $chef->telefono) }}"><br><br>

        <button type="submit">Actualizar Chef</button>
    </form>
    <br>
    <a href="{{url('/')}}" class="btn btn-primary">Ir al home</a>
@endsection
