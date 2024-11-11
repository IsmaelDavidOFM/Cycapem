@extends('/template/layout')
@section('titulo', 'Login')
@section('contenido')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <div class="login-container">
        <h1>Inicio de sesión</h1>
        <form action="/autenticacion" method="post">
            @csrf
            <div class="form-group">
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    placeholder="Introduce tu correo electrónico">
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" name="password" id="password" placeholder="Introduce tu contraseña">
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="submit-button">Acceder</button>
            <p class="register-link">
                <a href="/register">Crear una cuenta</a>
            </p>
        </form>
    </div>
@endsection
