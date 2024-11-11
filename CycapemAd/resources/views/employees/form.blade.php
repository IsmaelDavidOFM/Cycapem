@extends('/template/layout')

@section('titulo', 'Registro de empleados')

@section('contenido')
<link rel="stylesheet" href="{{ asset('css/forms.css') }}">
    <h2>Registro de empleados</h2>
    <form action="/submit-empleado" method="post" enctype="multipart/form-data">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="{{old('nombre')}}"><br>
        @error ('nombre')
        <span class="error">{{$message}}</span>
        @enderror

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" 
        value="{{old('apellido')}}"><br>
        @error ('apellido')
        <span class="error">{{$message}}</span>
        @enderror

        <label for="fecha_nacimiento">Fecha de Cumpleaños:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" 
        value="{{old('fecha_nacimiento')}}"><br>
        @error ('fecha_nacimiento')
        <span class="error">{{$message}}</span>
        @enderror

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{old('email')}}"><br>
        @error ('email')
        <span class="error">{{$message}}</span>
        @enderror

        <label for="verificar_email">Verificar Email:</label>
        <input type="email" id="verificar_email" name="verificar_email" 
        value="{{old('verificar_email')}}">
        @error ('verificar_email')
        <span class="error">{{$message}}</span>
        @enderror

        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" 
        value="{{old('contrasena')}}"><br>
        @error ('contrasena')
        <span class="error">{{$message}}</span>
        @enderror

        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" 
        value="{{old('telfono')}}"><br>
        @error ('telefono')
        <span class="error">{{$message}}</span>
        @enderror

        <label for="contrasena">Red social:</label>
        <input type="text" id="Red_social" name="Red_social" 
        value="{{old('Red_social')}}"><br>
        @error ('Red_social')
        <span class="error">{{$message}}</span>
        @enderror

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" 
        value="{{old('direccion')}}"><br>
        @error ('direccion')
        <span class="error">{{$message}}</span>
        @enderror

        <label for="imagen">Imagen:</label>
        <input type="file" id="picture_usuario" name="picture_usuario" accept="image/*" 
        value="{{old('picture_usuario')}}">
        @error ('picture_usuario')
        <span class="error">{{$message}}</span>
        @enderror

        <label for="status">Estado:</label>
        <select id="status" name="status_usuario" required>
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
        </select>
        <input type="submit" value="Registrar">
    </form>
    <div class="link_nav_sub">
        <a href="/empleados/listado">Tabla de empleados</a>
    </div>
@endsection
