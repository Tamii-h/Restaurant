@extends('plantilla')

@section('Titulo')
    Clientes - index
@endsection

@section('contenido')
    <h1>Listado de Clientes</h1>
    <a href="{{ route('clientes.crear') }}">Crear Nuevo Cliente</a>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->apellido }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>{{ $cliente->direccion }}</td>
                    <td>
                        <a href="{{ route('clientes.editar', $cliente->id) }}">Editar</a>
                        <form action="{{ route('clientes.eliminar', $cliente->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este cliente?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <a href="{{url('/')}}" class="btn btn-primary">Ir al home</a>
@endsection
