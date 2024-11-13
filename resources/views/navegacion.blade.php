<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Restaurante</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="/">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/clientes/index">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/reservas/index">Reservas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/pedidos/index">Pedidos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/menus/index">Menú</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/chefs/index">Chefs</a>
                </li>
            </ul>
            
            <!-- Aquí comprobamos si el usuario está autenticado -->
            @auth
                <!-- Si está autenticado, mostramos el nombre del usuario y un enlace para cerrar sesión -->
                <span class="navbar-text text-white me-3">Hola, {{ Auth::user()->name }}</span>
                <a class="btn btn-danger" href="{{ route('logout') }}">Cerrar sesión</a>
            @else
                <!-- Si no está autenticado, mostramos el botón de iniciar sesión -->
                <a class="btn btn-primary" href="{{ route('login') }}">Iniciar Sesión</a>
                <!-- Enlace al formulario de registro -->
                <a class="btn btn-primary ms-2" href="{{ route('register') }}">Registrarse</a>
            @endauth

        </div>
    </div>
</nav>
