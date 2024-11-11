<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Roboto:400,700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />
</head>
<style>
    .sticky-navbar {
        position: -webkit-sticky;
        /* Soporte para Safari */
        position: sticky;
        top: 0;
        z-index: 1000;
        /* Asegúrate de que el menú esté por encima de otros elementos */
        background-color: #fff;
        /* O el color que prefieras */
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        /* Agrega una sombra para dar efecto de elevación */
    }
</style>

<body>
    <div class="hero_area">

        <!-- Navegador -->
        <header class="header_section">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="{{ route('index') }}">
                        <span>
                            Cycapem
                        </span>
                    </a>
                    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('index') }}">Inicio <span
                                            class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#sobre-nosotros">Sobre nosotros</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#nuestros-servicios">Servicios</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('step.one') }}">Contáctanos</a>
                                </li>           
                            </ul>
                        </div>
                    </div>
                    <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                        <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
                    </form>
                </nav>
            </div>
        </header>
        <!-- Navegador/ -->

        <!-- Contenido -->
        <main>
            @yield('content')
        </main>
        <!-- Contenido/ -->

        <!-- info -->
        <section class="info_section layout_padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="info-logo">
                            <h2>Cycapem</h2>
                            <p>Trabaja duro, sueña a lo grande.<br>– Sheryl Swoopes</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-nav">
                            <h4>Navegador</h4>
                            <ul>
                                <li><a href="{{ route('index') }}">Inicio</a></li>
                                <li><a href="#">Sobre nosotros</a></li>
                                <li><a href="#">Servicios</a></li>
                                <li><a href="{{ route('contact') }}">Contáctanos</a></li>
                                <li><a href="#">Iniciar sesión</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-contact">
                            <h4>Información de contacto</h4>
                            <div class="location">
                                <h6>Localización de las oficinas :</h6>
                                <a href="">
                                    <img src="{{ asset('images/location.png') }}" alt="">
                                    <span>escultores 147. bosques. tonala</span>
                                </a>
                            </div>
                            <div class="call">
                                <h6>Servicio al cliente :</h6>
                                <a href="">
                                    <img src="{{ asset('images/telephone.png') }}" alt="">
                                    <span>(+52 2123200434)</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="discover">
                            <h4>Descubre</h4>
                            <ul>
                                <li><a href="">Ayuda al cliente</a></li>
                                <li><a href="">¿Cómo funciona?</a></li>
                                <li><a href="{{ route('contact') }}">Contáctanos</a></li>
                            </ul>
                            <div class="social-box">
                                <a href=""><img src="{{ asset('images/facebook.png') }}" alt=""></a>
                                <a href=""><img src="{{ asset('images/twitter.png') }}" alt=""></a>
                                <a href=""><img src="{{ asset('images/google-plus.png') }}" alt=""></a>
                                <a href=""><img src="{{ asset('images/linkedin.png') }}" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- info/ -->

        <!-- footer -->
        <section class="container-fluid footer_section">
            <p>Copyright &copy; 2024 All Rights Reserved By Cycapem</p>
        </section>
        <!-- footer/ -->
    </div>

    <script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
</body>

</html>
