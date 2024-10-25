@extends('plantilla')

@section('Titulo')
    Pedidos - index
@endsection

@section('contenido')
    <h1>Listado de Pedidos</h1>
    <a href="{{ route('pedidos.crear') }}">Crear Nuevo Pedido</a>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Restaurante</th>
                <th>Fecha Pedido</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->id }}</td>
                    <td>{{ $pedido->cliente->nombre }} {{ $pedido->cliente->apellido }}</td>
                    <td>{{ $pedido->restaurante->nombre }}</td>
                    <td>{{ $pedido->fecha_pedido }}</td>
                    <td>${{ number_format($pedido->total, 2) }}</td>
                    <td>{{ ucfirst($pedido->estado) }}</td>
                    <td>
                        <a href="{{ route('pedidos.editar', $pedido->id) }}">Editar</a>
                        <form action="{{ route('pedidos.eliminar', $pedido->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este pedido?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <a href="{{url('/')}}" class="btn btn-primary">Ir al home</a>
@endsection
