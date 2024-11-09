<form method="POST" action="{{ route('register') }}">
    @csrf

    <label for="name">Nombre:</label>
    <input type="text" name="name" value="{{ old('name') }}" required>
    
    <label for="email">Correo Electrónico:</label>
    <input type="email" name="email" value="{{ old('email') }}" required>

    <label for="password">Contraseña:</label>
    <input type="password" name="password" required>

    <label for="password_confirmation">Confirmar Contraseña:</label>
    <input type="password" name="password_confirmation" required>

    <button type="submit">Registrar</button>
</form>
