@extends('plantilla')

@section('Titulo')
    Menus - index
@endsection

@section('contenido')
    <h1>Listado de Menús</h1>
    <a href="{{ route('menus.crear') }}">Crear Nuevo Menú</a>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Restaurante</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Disponibilidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
                <tr>
                    <td>{{ $menu->id }}</td>
                    <td>{{ $menu->restaurante->nombre }}</td>
                    <td>{{ $menu->nombre }}</td>
                    <td>{{ $menu->descripcion }}</td>
                    <td>${{ number_format($menu->precio, 2) }}</td>
                    <td>{{ $menu->disponibilidad ? 'Sí' : 'No' }}</td>
                    <td>
                        <a href="{{ route('menus.editar', $menu->id) }}">Editar</a>
                        <form action="{{ route('menus.eliminar', $menu->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este menú?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <a href="{{url('/')}}" class="btn btn-primary">Ir al home</a>
@endsection
