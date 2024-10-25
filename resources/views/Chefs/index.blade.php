@extends('plantilla')

@section('Titulo')
    Chefs - index
@endsection

@section('contenido')
    <h1>Listado de Chefs</h1>
    <a href="{{ route('chefs.crear') }}">Crear Nuevo Chef</a>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Restaurante</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Especialidad</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($chefs as $chef)
                <tr>
                    <td>{{ $chef->id }}</td>
                    <td>{{ $chef->restaurante->nombre }}</td>
                    <td>{{ $chef->nombre }}</td>
                    <td>{{ $chef->apellido }}</td>
                    <td>{{ $chef->especialidad }}</td>
                    <td>{{ $chef->email }}</td>
                    <td>{{ $chef->telefono }}</td>
                    <td>
                        <a href="{{ route('chefs.editar', $chef->id) }}">Editar</a>
                        <form action="{{ route('chefs.eliminar', $chef->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este chef?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <a href="{{url('/')}}" class="btn btn-primary">Ir al home</a>
@endsection
