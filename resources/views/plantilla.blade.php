<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Iconos redes sociales -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
    
    <style>
        body {
            background-image: url('/img/1.jpg');
            padding-top: 56px; /* Espacio para la barra de navegación fija */
            color: #ffffff; /* Color texto */
            height: 100%; /* Asegura que el body tenga 100% de altura */
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        .content {
            flex: 1; /* Toma todo el espacio disponible */
        }
        .footer {
            background-color: rgba(0, 0, 0, 0.9);/* Color de fondo */
            padding: 5px 0; /* Espaciado interno */
            text-align: center; /* Alineación del texto */
}
        
    </style>
<body>

    @include('navegacion')

    <div class="container">
        <h1 class="my-4">@yield('titulo')</h1>
        @yield('contenido')
    </div>

    <footer class="footer text-center">
        <p>&copy; 2024 Restaurante. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
