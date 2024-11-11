@extends('/template/layout')
@section('titulo', 'Login')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@section('contenido')
    <div class="login-container">
        <h1>Registro</h1>
        <form action="/submit-register" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"required>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required>
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="submit-button">Registrar</button>
            <p class="register-link">
                <a href="/login">Inicio de sesión</a>
            </p>
        </form>
    </div>
@endsection
