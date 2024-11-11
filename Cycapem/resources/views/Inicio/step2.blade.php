@extends('layouts.layout')
@section('title', 'Inicio de sesion')
@section('content')
<section class="contact_section layout_padding">
    <div class="custom_heading-container">
        <h3 class="text-center">
            Pide nuestro servicio - Paso 2
        </h3>
    </div>
    <div class="container layout_padding2-top">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <form action="{{ route('service.request.step2.submit') }}" method="POST">
                    @csrf
                    <!-- Campo oculto para el ID del cliente -->
                    @auth ('web')
                    <input type="text" name="customer_id" value="{{ Auth::guard('web')->user()->id}}">
                    @endauth
                    @auth ('customer')
                    <input type="text" name="customer_id" value="{{ Auth::guard('customer')->user()->id}}">
                    @endauth
                    <div>
                        <select name="category_id" required>
                            <option value="" disabled selected>Seleccione una categoría</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <input type="date" name="fecha_solicitada" placeholder="Fecha solicitada"
                            value="{{ old('fecha_solicitada') }}" required>
                    </div>
                    <div>
                        <select name="status" required>
                            <option value="" disabled selected>Seleccione el estado</option>
                            <option value="urgent">Urgente</option>
                            <option value="waiting">Dispuesto a esperar</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
