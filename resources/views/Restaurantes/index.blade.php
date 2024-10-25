@extends('plantilla')

@section('Titulo')
    Restaurant - index
@endsection

@section('contenido')
    <h1>Listado de Restaurantes</h1>
    <a href="{{ route('restaurantes.crear') }}">Crear Nuevo Restaurante</a>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Horario Apertura</th>
                <th>Horario Cierre</th>
                <th>Capacidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($restaurantes as $restaurante)
                <tr>
                    <td>{{ $restaurante->id }}</td>
                    <td>{{ $restaurante->nombre }}</td>
                    <td>{{ $restaurante->direccion }}</td>
                    <td>{{ $restaurante->telefono }}</td>
                    <td>{{ $restaurante->email }}</td>
                    <td>{{ $restaurante->horario_apertura }}</td>
                    <td>{{ $restaurante->horario_cierre }}</td>
                    <td>{{ $restaurante->capacidad }}</td>
                    <td>
                        <a href="{{ route('restaurantes.editar', $restaurante->id) }}">Editar</a>
                        <form action="{{ route('restaurantes.eliminar', $restaurante->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este restaurante?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <a href="{{url('/')}}" class="btn btn-primary">Ir al home</a>
@endsection
