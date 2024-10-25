@extends('plantilla')

@section('Titulo')
    Reservas - editar
@endsection

@section('contenido')
    <h1>Editar Reserva</h1>
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
    <form action="{{ route('reservas.actualizar', $reserva->id) }}" method="POST">
        @csrf
        <label for="cliente_id">Cliente:</label><br>
        <select id="cliente_id" name="cliente_id">
            <option value="">-- Seleccionar Cliente --</option>
            @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}" {{ (old('cliente_id', $reserva->cliente_id) == $cliente->id) ? 'selected' : '' }}>
                    {{ $cliente->nombre }} {{ $cliente->apellido }}
                </option>
            @endforeach
        </select><br><br>

        <label for="restaurante_id">Restaurante:</label><br>
        <select id="restaurante_id" name="restaurante_id">
            <option value="">-- Seleccionar Restaurante --</option>
            @foreach($restaurantes as $restaurante)
                <option value="{{ $restaurante->id }}" {{ (old('restaurante_id', $reserva->restaurante_id) == $restaurante->id) ? 'selected' : '' }}>
                    {{ $restaurante->nombre }}
                </option>
            @endforeach
        </select><br><br>

        <label for="fecha_reserva">Fecha Reserva:</label><br>
        <input type="date" id="fecha_reserva" name="fecha_reserva" value="{{ old('fecha_reserva', $reserva->fecha_reserva) }}"><br><br>

        <label for="numero_personas">Número de Personas:</label><br>
        <input type="number" id="numero_personas" name="numero_personas" value="{{ old('numero_personas', $reserva->numero_personas) }}"><br><br>

        <label for="estado">Estado:</label><br>
        <select id="estado" name="estado">
            <option value="confirmada" {{ (old('estado', $reserva->estado) == 'confirmada') ? 'selected' : '' }}>Confirmada</option>
            <option value="cancelada" {{ (old('estado', $reserva->estado) == 'cancelada') ? 'selected' : '' }}>Cancelada</option>
        </select><br><br>

        <button type="submit">Actualizar Reserva</button>
    </form>
    <br>
    <a href="{{url('/')}}" class="btn btn-primary">Ir al home</a>
@endsection
