@extends('plantilla')

@section('Titulo')
    Editar menus
@endsection

@section('contenido')
    <h1>Editar Menú</h1>
    <a href="{{ route('menus.index') }}">Volver al Listado</a>
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('menus.actualizar', $menu->id) }}" method="POST">
        @csrf
        <label for="restaurante_id">Restaurante:</label><br>
        <select id="restaurante_id" name="restaurante_id">
            <option value="">-- Seleccionar Restaurante --</option>
            @foreach($restaurantes as $restaurante)
                <option value="{{ $restaurante->id }}" {{ (old('restaurante_id', $menu->restaurante_id) == $restaurante->id) ? 'selected' : '' }}>
                    {{ $restaurante->nombre }}
                </option>
            @endforeach
        </select><br><br>

        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $menu->nombre) }}"><br><br>

        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion">{{ old('descripcion', $menu->descripcion) }}</textarea><br><br>

        <label for="precio">Precio:</label><br>
        <input type="number" step="0.01" id="precio" name="precio" value="{{ old('precio', $menu->precio) }}"><br><br>

        <label for="disponibilidad">Disponibilidad:</label><br>
        <select id="disponibilidad" name="disponibilidad">
            <option value="1" {{ (old('disponibilidad', $menu->disponibilidad) == '1') ? 'selected' : '' }}>Sí</option>
            <option value="0" {{ (old('disponibilidad', $menu->disponibilidad) == '0') ? 'selected' : '' }}>No</option>
        </select><br><br>

        <button type="submit">Actualizar Menú</button>
    </form>
    <br>
    <a href="{{url('/')}}" class="btn btn-primary">Ir al home</a>
@endsection