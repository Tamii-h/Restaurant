@extends('plantilla')

@section('Titulo', 'Iniciar Sesión')

@section('contenido')
    <h1>Iniciar Sesión</h1>
    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div>
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required value="{{ old('email') }}">
            @error('email')
                <div style="color: red">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            @error('password')
                <div style="color: red">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label>
                <input type="checkbox" name="remember"> Recordarme
            </label>
        </div>

        <button type="submit">Iniciar Sesión</button>
    </form>
@endsection
