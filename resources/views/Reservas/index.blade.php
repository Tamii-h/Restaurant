@extends('plantilla')

@section('Titulo')
    Reservas - index
@endsection

@section('contenido')
    <h1>Listado de Reservas</h1>
    <a href="{{ route('reservas.crear') }}">Crear Nueva Reserva</a>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Restaurante</th>
                <th>Fecha Reserva</th>
                <th>Número de Personas</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservas as $reserva)
                <tr>
                    <td>{{ $reserva->id }}</td>
                    <td>{{ $reserva->cliente->nombre }} {{ $reserva->cliente->apellido }}</td>
                    <td>{{ $reserva->restaurante->nombre }}</td>
                    <td>{{ $reserva->fecha_reserva }}</td>
                    <td>{{ $reserva->numero_personas }}</td>
                    <td>{{ ucfirst($reserva->estado) }}</td>
                    <td>
                        <a href="{{ route('reservas.editar', $reserva->id) }}">Editar</a>
                        <form action="{{ route('reservas.eliminar', $reserva->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Estás seguro de eliminar esta reserva?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <a href="{{url('/')}}" class="btn btn-primary">Ir al home</a>
@endsection
