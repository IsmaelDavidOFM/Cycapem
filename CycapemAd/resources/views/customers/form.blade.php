@extends('/template/layout')

@section('titulo', 'Registro de Clientes')
@section('contenido')
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}">
    <h2>Registro de Clientes</h2>
    <form action="/submit-cliente" method="post" enctype="multipart/form-data"><br>
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
    <div class="link_nav_sub">
        <a href="/clientes/listado">Tabla de clientes</a>
    </div>
@endsection
