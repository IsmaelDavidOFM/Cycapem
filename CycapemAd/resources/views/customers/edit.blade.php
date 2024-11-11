@extends ('/template/layout')
@section('titulo', 'Listado de clentes')
@section('contenido')
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}">
    <h2>Editar Cliente</h2>
    <form action="{{ route('customers.toUpdate', $customer->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="nombre">Nombre del Cliente:</label>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $customer->name) }}"><br>
        @error('nombre')
            <span class="error">{{ $message }}</span>
        @enderror

        <label for="apellido">Apellido del Cliente:</label>
        <input type="text" id="apellido" name="apellido" value="{{ old('apellido', $customer->last_name) }}"><br>
        @error('apellido')
            <span class="error">{{ $message }}</span>
        @enderror

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email', $customer->email) }}"><br>
        @error('email')
            <span class="error">{{ $message }}</span>
        @enderror

        <label for="verificar_email">Verificar Email:</label>
        <input type="email" id="verificar_email" name="verificar_email"
            value="{{ old('verificar_email', $customer->email_verified_at) }}">
        @error('verificar_email')
            <span class="error">{{ $message }}</span>
        @enderror

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" value="{{ old('password, $customer->email_verified_at) ') }}"><br>
        @error('password')
            <span class="error">{{ $message }}</span>
        @enderror

        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" value="{{ old('telefono', $customer->phone) }}"><br>
        @error('telefono')
            <span class="error">{{ $message }}</span>
        @enderror

        <label for="domicilio">Domicilio:</label>
        <input type="text" id="domicilio" name="domicilio" value="{{ old('domicilio', $customer->address) }}"><br>
        @error('domicilio')
            <span class="error">{{ $message }}</span>
        @enderror

        <label for="tipo_negocio">Tipo de Negocio:</label>
        <select id="tipo_negocio" name="tipo_negocio" required>
            <option value="" disabled>Seleccione el tipo de negocio</option>
            <option value="independiente"
                {{ old('tipo_negocio', $customer->company) == 'independiente' ? 'selected' : '' }}>Independiente</option>
            <option value="agencia_privada"
                {{ old('tipo_negocio', $customer->company) == 'agencia_privada' ? 'selected' : '' }}>Agencia Privada
            </option>
            <option value="agencia_publica"
                {{ old('tipo_negocio', $customer->company) == 'agencia_publica' ? 'selected' : '' }}>Agencia Pública
            </option>
        </select><br>
        @error('tipo_negocio')
            <span class="error">{{ $message }}</span>
        @enderror

        <label for="empresa">Empresa:</label>
        <input type="text" id="empresa" name="empresa" value="{{ old('empresa', $customer->company) }}"><br>
        @error('empresa')
            <span class="error">{{ $message }}</span>
        @enderror

        <input type="submit" value="Actualizar Cliente">
    </form>

    <div class="link_nav_sub">
        <a href="{{ route('customers.toList') }}">Volver a la lista de clientes</a>
    </div>
@endsection
