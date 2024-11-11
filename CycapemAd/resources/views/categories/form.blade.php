@extends('/template/layout')

@section('titulo', 'Categorias')

@section('contenido')
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}"><br>
    <h2>Registro de Categorías</h2>
    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif
    
    <form action="/submit-categoria" method="post">
        @csrf
    
        <label for="type">Tipo de asesoria:</label>
        <input type="text" id="type" name="type" value="{{ old('type') }}">
        @error('type')
            <span class="error">{{ $message }}</span>
        @enderror
    
        <label for="description">Descripción de la asesoria:</label>
        <textarea id="description" name="description">{{ old('description') }}</textarea>
        @error('description')
            <span class="error">{{ $message }}</span>
        @enderror
    
        <label for="status">Estado:</label>
        <select id="status" name="status">
            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Activo</option>
            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactivo</option>
        </select>
        @error('status')
            <span class="error">{{ $message }}</span>
        @enderror
    
        <input type="submit" value="Registrar">
    </form>
    <div class="link_nav_sub">
        <a href="/categorias/listado">Tabla de categorías</a>
    </div>
@endsection
