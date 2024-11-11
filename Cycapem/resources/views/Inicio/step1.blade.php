@extends('layouts.layout')
@section('title', 'Inicio de sesion')
@section('content')
    <section class="contact_section layout_padding">
        <div class="custom_heading-container">
            <h3>Pide nuestro servicio</h3>
        </div>
        <div class="container layout_padding2-top">
            <div class="row">
                <div class="col-md-6 mx-auto">

                    <!-- Formulario para Registro -->
                    <div id="registerForm">
                        <form action="{{ route('step.one.register') }}" method="POST">
                            @csrf
                            <div>
                                <input type="text" name="name" placeholder="Nombre" value="{{ old('name') }}"
                                    required>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <input type="text" name="last_name" placeholder="Apellido" value="{{ old('last_name') }}"
                                    required>
                                @error('last_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <input type="email" name="email" placeholder="Correo Electrónico"
                                    value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <input type="password" name="password" placeholder="Contraseña" required>
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <input type="text" name="phone" placeholder="Número de Teléfono"
                                    value="{{ old('phone') }}" required>
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <input type="text" name="address" placeholder="Domicilio" value="{{ old('address') }}"
                                    required>
                                @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <input type="text" name="company" placeholder="Empresa" value="{{ old('company') }}"
                                    required>
                                @error('company')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <select name="business_type" required>
                                    <option value="" disabled selected>Tipo de negocio</option>
                                    <option value="independiente"
                                        {{ old('business_type') == 'independiente' ? 'selected' : '' }}>Independiente
                                    </option>
                                    <option value="agencia_privada"
                                        {{ old('business_type') == 'agencia_privada' ? 'selected' : '' }}>Agencia Privada
                                    </option>
                                    <option value="agencia_publica"
                                        {{ old('business_type') == 'agencia_publica' ? 'selected' : '' }}>Agencia Pública
                                    </option>
                                </select>
                                @error('business_type')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary mt-3">Registrar</button>
                            </div>
                        </form>
                        <div class="d-flex justify-content-center mt-3">
                            <button type="button" class="btn btn-link" onclick="showRegisterForm()">¿tienes cuenta?
                                Continua </button>
                        </div>
                    </div>

                    <!-- Formulario para solicitar Consultoria -->
                    <div id="loginForm" style="display: none;">
                        <form action="/submit-order" method="POST">
                            @csrf
                            <!-- Campo para seleccionar el usuario (cliente) --><label for="customer_mail">Correo del Usuario:</label>
                            <input type="mail" name="customer_id" id="customer_mail" value="{{ old('customer_mail') }}">
                            @error('customer_mail')
                                <span class="error">{{ $message }}</span>
                            @enderror

                            <!-- Campo para seleccionar el tipo de consultoría -->
                            <label for="category_id">Tipo de Consultoría:</label>
                            <select id="category_id" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->type }}
                                    </option>
                                @endforeach
                            </select><br>
                            @error('category_id')
                                <span class="error">{{ $message }}</span>
                            @enderror

                            <!-- Campo para seleccionar la fecha -->
                            <label for="datetime">Fecha y Hora:</label>
                            <input type="datetime-local" id="datetime" name="datetime" value="{{ old('datetime') }}"><br>
                            @error('datetime')
                                <span class="error">{{ $message }}</span>
                            @enderror

                            <!-- Campo para seleccionar el estado de la orden -->
                            <label for="status">Estado:</label>
                            <select id="status" name="status">
                                <option value="urgente" {{ old('status') == 'urgente' ? 'selected' : '' }}>Urgente</option>
                                <option value="prioritario" {{ old('status') == 'prioritario' ? 'selected' : '' }}>
                                    Prioritario</option>
                                <option value="espera" {{ old('status') == 'espera' ? 'selected' : '' }}>Espera</option>
                                <option value="cumplida" {{ old('status') == 'cumplida' ? 'selected' : '' }}>Cumplida
                                </option>
                            </select><br>
                            @error('status')
                                <span class="error">{{ $message }}</span>
                            @enderror

                            <input type="submit" value="Realizar pedido">
                        </form>
                        <div class="d-flex justify-content-center mt-3">
                            <button type="button" class="btn btn-link" onclick="showLoginForm()">¿No tienes cuenta?
                                Regístrate</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
<script>
    function showRegisterForm() {
        document.getElementById('registerForm').style.display = 'none';
        document.getElementById('loginForm').style.display = 'block';
    }

    function showLoginForm() {
        document.getElementById('registerForm').style.display = 'block';
        document.getElementById('loginForm').style.display = 'none';
    }

    // Inicialmente, mostramos el formulario de registro
    showRegisterForm();
</script>
