@extends('plantilla')

@section('Titulo')
    Crear Nueva Reserva
@endsection

@section('contenido')
    <h1>Crear Nueva Reserva</h1>
    <a href="{{ route('reservas.index') }}">Volver al Listado</a>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reservas.grabar') }}" method="POST">
        @csrf

        <!-- Seleccionar Cliente -->
        <label for="cliente_id">Cliente:</label><br>
        <select id="cliente_id" name="cliente_id">
            <option value="">-- Seleccionar Cliente --</option>
            @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>
                    {{ $cliente->nombre }} {{ $cliente->apellido }}
                </option>
            @endforeach
        </select><br><br>

        <!-- Seleccionar Restaurante -->
        <label for="restaurante_id">Restaurante:</label><br>
        <select id="restaurante_id" name="restaurante_id">
            <option value="">-- Seleccionar Restaurante --</option>
            @foreach($restaurantes as $restaurante)
                <option value="{{ $restaurante->id }}" {{ old('restaurante_id') == $restaurante->id ? 'selected' : '' }}>
                    {{ $restaurante->nombre }}
                </option>
            @endforeach
        </select><br><br>

        <!-- Seleccionar Fecha de Reserva -->
        <label for="fecha_reserva">Fecha Reserva:</label><br>
        <input type="date" id="fecha_reserva" name="fecha_reserva" value="{{ old('fecha_reserva') }}"><br><br>

        <!-- Número de Personas -->
        <label for="numero_personas">Número de Personas:</label><br>
        <input type="number" id="numero_personas" name="numero_personas" value="{{ old('numero_personas') }}"><br><br>

        <!-- Estado de la Reserva -->
        <label for="estado">Estado:</label><br>
        <select id="estado" name="estado">
            <option value="confirmada" {{ old('estado') == 'confirmada' ? 'selected' : '' }}>Confirmada</option>
            <option value="cancelada" {{ old('estado') == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
        </select><br><br>

        <button type="submit">Crear Reserva</button>
    </form>
@endsection
