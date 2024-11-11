@extends('layouts.layout')
@section('title', 'Inicio de sesion')
<style>
    .form-container {
        width: 50%;
        margin: 60px auto;
        /* Margen superior e inferior */
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #f9f9f9;
    }

    .tab-buttons {
        display: flex;
        justify-content: space-around;
        margin-bottom: 20px;
    }

    .tab-button {
        padding: 10px 20px;
        border: none;
        background-color: #ddd;
        cursor: pointer;
        border-radius: 4px;
        transition: background-color 0.3s, box-shadow 0.3s;
        margin: 0 5px;
        /* Espaciado horizontal entre botones */
    }

    .tab-button.active,
    .tab-button:hover {
        background-color: #007bff;
        color: white;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .form-content {
        display: none;
    }

    .form-content.active {
        display: block;
    }

    .form-group {
        margin-bottom: 20px;
        /* Margen inferior entre campos del formulario */
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .submit-button {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
        margin: 20px 0;
        /* Margen superior e inferior para el botón */
    }

    .submit-button:hover {
        background-color: #0056b3;
    }
</style>
@section('content')
<div class="form-container">
    <div class="tab-buttons">
        <button class="tab-button active" onclick="showForm('login')">Iniciar sesión</button>
        <button class="tab-button" onclick="showForm('register')">Registrarte</button>
    </div>

    <div id="login" class="form-content active">
        <h3>Iniciar sesión</h3>
        <form action="{{ route('auth.authenticate') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="login_email">Correo Electrónico</label>
                <input type="email" id="login_email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="login_password">Contraseña</label>
                <input type="password" id="login_password" name="password" required>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="submit-button">Iniciar sesión</button>
        </form>
    </div>

    <div id="register" class="form-content">
        <h3>Registrarte</h3>
        <form action="{{ route('auth.register') }}" method="POST">
            @csrf
            <label for="nombre">Nombre del Cliente:</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}"><br>
            @error('nombre')
                <span class="error">{{ $message }}</span>
            @enderror
    
            <label for="apellido">Apellido del Cliente:</label>
            <input type="text" id="apellido" name="apellido" value="{{ old('apellido') }}"><br>
            @error('apellido')
                <span class="error">{{ $message }}</span>
            @enderror
    
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}"><br>
            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror
    
            <label for="verificar_email">Verificar Email:</label>
            <input type="email" id="verificar_email" name="verificar_email" value="{{ old('verificar_email') }}">
            @error('verificar_email')
                <span class="error">{{ $message }}</span>
            @enderror
    
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" value="{{ old('password') }}"><br>
            @error('password')
                <span class="error">{{ $message }}</span>
            @enderror
    
            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" value="{{ old('telefono') }}"><br>
            @error('telefono')
                <span class="error">{{ $message }}</span>
            @enderror
    
            <label for="domicilio">Domicilio:</label>
            <input type="text" id="domicilio" name="domicilio" value="{{ old('domicilio') }}"><br>
            @error('domicilio')
                <span class="error">{{ $message }}</span>
            @enderror
    
            <label for="tipo_negocio">Tipo de Negocio:</label>
            <select id="tipo_negocio" name="tipo_negocio" required>
                <option value="" disabled selected>Seleccione el tipo de negocio</option>
                <option value="independiente" {{ old('tipo_negocio') == 'independiente' ? 'selected' : '' }}>Independiente
                </option>
                <option value="agencia_privada" {{ old('tipo_negocio') == 'agencia privada' ? 'selected' : '' }}>Agencia
                    Privada</option>
                <option value="agencia_publica" {{ old('tipo_negocio') == 'agencia publica' ? 'selected' : '' }}>Agencia
                    Pública</option>
            </select><br>
            @error('tipo_negocio')
                <span class="error">{{ $message }}</span>
            @enderror
    
            <label for="empresa">Empresa:</label>
            <input type="text" id="empresa" name="empresa" value="{{ old('empresa') }}"><br>
            @error('empresa')
                <span class="error">{{ $message }}</span>
            @enderror
    
            <input type="submit" value="Registrar">
        </form>
    </div>
</div>
@endsection
<script>
    function showForm(formId) {
        document.querySelectorAll('.form-content').forEach(form => {
            form.classList.remove('active');
        });
        document.getElementById(formId).classList.add('active');
        
        document.querySelectorAll('.tab-button').forEach(button => {
            button.classList.remove('active');
        });
        document.querySelector(`.tab-button[onclick="showForm('${formId}')"]`).classList.add('active');
    }
</script>