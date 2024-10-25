@extends('plantilla')

@section('Titulo')
    Pedidos - editar
@endsection

@section('contenido')
    <h1>Editar Pedido</h1>
    <a href="{{ route('pedidos.index') }}">Volver al Listado</a>
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('pedidos.actualizar', $pedido->id) }}" method="POST">
        @csrf
        <label for="cliente_id">Cliente:</label><br>
        <select id="cliente_id" name="cliente_id">
            <option value="">-- Seleccionar Cliente --</option>
            @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}" {{ (old('cliente_id', $pedido->cliente_id) == $cliente->id) ? 'selected' : '' }}>
                    {{ $cliente->nombre }} {{ $cliente->apellido }}
                </option>
            @endforeach
        </select><br><br>

        <label for="restaurante_id">Restaurante:</label><br>
        <select id="restaurante_id" name="restaurante_id">
            <option value="">-- Seleccionar Restaurante --</option>
            @foreach($restaurantes as $restaurante)
                <option value="{{ $restaurante->id }}" {{ (old('restaurante_id', $pedido->restaurante_id) == $restaurante->id) ? 'selected' : '' }}>
                    {{ $restaurante->nombre }}
                </option>
            @endforeach
        </select><br><br>

        <label for="fecha_pedido">Fecha Pedido:</label><br>
        <input type="date" id="fecha_pedido" name="fecha_pedido" value="{{ old('fecha_pedido', $pedido->fecha_pedido) }}"><br><br>

        <label for="total">Total:</label><br>
        <input type="number" step="0.01" id="total" name="total" value="{{ old('total', $pedido->total) }}"><br><br>

        <label for="estado">Estado:</label><br>
        <select id="estado" name="estado">
            <option value="pendiente" {{ (old('estado', $pedido->estado) == 'pendiente') ? 'selected' : '' }}>Pendiente</option>
            <option value="completado" {{ (old('estado', $pedido->estado) == 'completado') ? 'selected' : '' }}>Completado</option>
            <option value="cancelado" {{ (old('estado', $pedido->estado) == 'cancelado') ? 'selected' : '' }}>Cancelado</option>
        </select><br><br>

        <button type="submit">Actualizar Pedido</button>
    </form>
    <br>
    <a href="{{url('/')}}" class="btn btn-primary">Ir al home</a>
@endsection