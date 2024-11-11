@extends ('/template/layout')
@section('titulo', 'Listado de clentes')

@section('contenido')
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}">
    <h2>Editar clientes</h2>
    <form action="{{ route('users.toUpdate', $user->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $user->name) }}"><br>
        @error('nombre')
            <span class="error">{{ $message }}</span>
        @enderror

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" value="{{ old('apellido', $user->last_name) }}"><br>
        @error('apellido')
            <span class="error">{{ $message }}</span>
        @enderror

        <label for="fecha_nacimiento">Fecha de Cumpleaños:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"
            value="{{ old('fecha_nacimiento', $user->birthdate) }}"><br>
        @error('fecha_nacimiento')
            <span class="error">{{ $message }}</span>
        @enderror

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"><br>
        @error('email')
            <span class="error">{{ $message }}</span>
        @enderror

        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" value="{{ old('telefono', $user->phone) }}"><br>
        @error('telefono')
            <span class="error">{{ $message }}</span>
        @enderror

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" value="{{ old('direccion', $user->address) }}"><br>
        @error('direccion')
            <span class="error">{{ $message }}</span>
        @enderror

        <label for="imagen">Imagen:</label>
        <input type="file" id="picture_usuario" name="picture_usuario" accept="image/*"><br>
        @error('picture_usuario')
            <span class="error">{{ $message }}</span>
        @enderror

        <label for="status">Estado:</label>
        <select id="status_usuario" name="status_usuario" required>
            <option value="activo" {{ old('status_usuairo', $user->status) == 'activo' ? 'selected' : '' }}>Activo
            </option>
            <option value="inactivo" {{ old('status_usuario', $user->status) == 'inactivo' ? 'selected' : '' }}>
                Inactivo</option>
        </select>

        <input type="submit" value="Actualizar Cliente">
    </form>
    <div class="link_nav_sub">
        <a href="{{ route('users.toList') }}">Volver a la lista de usuarios</a>
    </div>
@endsection
