<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
</head>
<style>
    .user-link {
        text-decoration: none;
        /* Elimina el subrayado del enlace */
        color: #ffffff;
        /* Color del texto del enlace */
    }

    .user-link h1 {
        font-size: 24px;
        margin: 0;
        color: inherit;
        /* Hereda el color del enlace */
    }
</style>

<body>
    <!-- Menu  -->
    <div class="navbar">
        <div class="navbar-header">
            @auth
                <a href="{{ route('admin.panel') }}" class="user-link">
                    <h1>Usuario: {{ Auth::user()->name }}</h1>
                </a>
            @else
                <h1>Cycapem Inicio</h1>
            @endauth
        </div>
        <nav>
            @auth
                <ul class="navbar-menu">
                    <li>
                        <a href="/clientes/registro">Clientes</a>
                    </li>
                    <li>
                        <a href="/empleados/registro">Empleados</a>
                    </li>
                    <li>
                        <a href="/categorias/registro"> Servicios</a>
                    </li>
                    <li>
                        <a href="/order/registro"> Capacitorias</a>
                    </li>
                    <li>
                        <a href="{{ route('auth.salir') }}">Cerrar sesión</a>
                    </li>
                @endauth
            </ul>
        </nav>
    </div>

    <!-- Fin de menu -->
    {{-- Comtenido --}}
    @yield('contenido')
    {{-- Fin del contenido  --}}

</body>

</html>
