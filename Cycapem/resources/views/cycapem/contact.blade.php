<!-- resources/views/cycapem/contact.blade.php -->
@extends('layouts.layout')

@section('title', 'Contáctanos')

@section('content')
    <!-- Contactanos -->
    <section class="contact_section layout_padding">
        <div class="custom_heading-container">
            <h3 class=" ">
                Pide nuestro servicio
            </h3>
        </div>
        <div class="container layout_padding2-top">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <form action="">
                        <div>
                            <input type="text" placeholder="Nombre">
                        </div>
                        <div>
                            <input type="email" placeholder="Correo Electronico">
                        </div>
                        <div>
                            <input type="text" placeholder="Número de teléfono">
                        </div>
                        <div>
                            <select name="" id="">
                                <option value="" disabled selected>Tipo de servicio</option>
                                <option value="">Consultoría empresarial</option>
                                <option value="">Capacitación empresarial</option>
                            </select>
                        </div>
                        <div>
                            <input type="text" class="message-box" placeholder="Mensaje">
                        </div>
                        <div class="d-flex justify-content-center ">
                            <button>Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Contactanos/ -->
@endsection

