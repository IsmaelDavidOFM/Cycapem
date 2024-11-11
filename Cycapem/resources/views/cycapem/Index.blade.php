<!-- resources/views/cycapem/index.blade.php -->
@extends('layouts.layout')

@section('title', 'Inicio')

@section('content')
    <div style="text-align: center;">
        <div class="img-box layout_padding2">
            <img src="{{ asset('images/cycapem hd2.jpg') }}" alt="" width="900" height="400">
        </div>
    </div>

    <!-- Sobre Nosotros -->
    <section id="sobre-nosotros" class="about_section layout_padding">
        <div class="container">
            <div class="custom_heading-container">
                <h3>Sobre nosotros</h3>
            </div>
            <p class="layout_padding2-bottom">
                En Cycapem, nos dedicamos a ofrecer servicios de consultoría y capacitación empresarial de la más alta calidad.<br>
                Nuestra misión es ayudar a las organizaciones a alcanzar su máximo potencial a través de soluciones innovadoras y personalizadas que se ajusten a sus necesidades específicas.
            </p>
        </div>
    </section>

    <div style="text-align: center;">
        <div class="img-box layout_padding2">
            <img src="{{ asset('images/1.jpg') }}" alt="" width="500" height="350">
        </div>
    </div>

    <!-- Nuestros Servicios -->
    <section id="nuestros-servicios" class="about_section layout_padding">
        <div class="container">
            <div class="custom_heading-container">
                <h3>NUESTROS SERVICIOS</h3>
            </div>
            <p>
                Consultoría Empresarial: Ofrecemos análisis detallados y estrategias personalizadas para optimizar
                procesos,<br>
                mejorar la productividad y maximizar la rentabilidad. Nuestro enfoque integral nos permite abordar desde
                problemas operativos hasta desafíos estratégicos.<br><br>
                Capacitación Empresarial: Diseñamos programas de formación a medida para desarrollar las competencias y
                habilidades del personal,<br>
                promoviendo un ambiente de aprendizaje continuo. Nuestros cursos y talleres abarcan áreas como
                liderazgo,<br>
                gestión de proyectos, ventas, y servicio al cliente, entre otros.
            </p>
        </div>

        <!-- Cómo funciona -->
        <section class="work_section layout_padding">
            <div class="container">
                <div class="custom_heading-container">
                    <h3>¿Cómo funciona?</h3>
                </div>
            </div>
            <div class="work_container">
                <div class="box b-1">
                    <div class="img-box">
                        <img src="{{ asset('images/pc.png') }}" alt="">
                    </div>
                    <div class="name">
                        <h6>Te comunicas con nosotros</h6>
                    </div>
                </div>
                <div class="box b-2">
                    <div class="img-box">
                        <img src="{{ asset('images/globos.png') }}" alt="">
                    </div>
                    <div class="name">
                        <h6>Nos Cuentas tu problema</h6>
                    </div>
                </div>
                <div class="box b-3">
                    <div class="img-box">
                        <img src="{{ asset('images/hablando.png') }}" alt="">
                    </div>
                    <div class="name">
                        <h6>Te proporcionamos nuestros servicios</h6>
                    </div>
                </div>
                <div class="box b-4">
                    <div class="img-box">
                        <img src="{{ asset('images/up.png') }}" alt="">
                    </div>
                    <div class="name">
                        <h6>Tu negocio consigue más personas capacitadas</h6>
                    </div>
                </div>
            </div>
        </section>

        <!-- Nuestro equipo -->
        <section class="about_section layout_padding">
            <div class="container">
                <div class="custom_heading-container">
                    <h3>Nuestro equipo de profesionales</h3>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="card-group">
                        <div class="card">
                            <img src="{{ asset('images/n.jpg') }}" class="card-img-top"
                                alt="Salvador Nathaniel Parra Mayoral">
                            <div class="card-body">
                                <h5 class="card-title">Salvador Nathaniel Parra Mayoral</h5>
                                <p class="card-text">Administrador de ejemplo.</p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="{{ asset('images/d.jpg') }}" class="card-img-top"
                                alt="Espinoza Rodríguez David Ismael">
                            <div class="card-body">
                                <h5 class="card-title">Espinoza Rodríguez David Ismael</h5>
                                <p class="card-text">Ceo de Cycapem.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Opinión de clientes -->
        <section class="client_section layout_padding-bottom">
            <div class="container">
                <div class="custom_heading-container">
                    <h3>Opinión de clientes</h3>
                </div>
                <div class="layout_padding2-top">
                    <div class="client_container">
                        <div class="detail-box">
                            <p>
                                Trabajar con Cycapem ha sido una experiencia transformadora para nuestra empresa.
                                Desde el primer contacto, su equipo demostró una profunda comprensión de nuestras
                                necesidades y desafíos. La consultoría que recibimos fue precisa y efectiva,
                                permitiéndonos optimizar nuestros procesos y mejorar significativamente nuestra
                                productividad.
                            </p>
                        </div>
                        <div class="client_id">
                            <div class="img-box">
                                <img src="{{ asset('images/client.png') }}" alt="Cliente">
                            </div>
                            <div class="name">
                                <h5>Jose Salinas</h5>
                                <h6>CEO de Mega</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
