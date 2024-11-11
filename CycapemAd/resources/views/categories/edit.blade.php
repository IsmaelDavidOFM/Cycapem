@extends('/template/layout')

@section('titulo', 'Servicios MOD')

@section('contenido')
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}"><br>
    <h2 style="text-align: center">Edición tipos de servicio</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <form action="{{ route('categories.toUpdate', $category->id) }}" method="post">
        @csrf
        @method('POST') <!-- Cambiado a POST según las rutas definidas -->
    
        <label for="name">Nombre del servicio:</label>
        <input type="text" id="type" name="type" value="{{ old('name', $category->type) }}" required>
        @error('name')
            <span class="error">{{ $message }}</span>
        @enderror
        <label for="description">Descripción de la Categoría:</label>
        <textarea id="description" name="description">{{ old('description', $category->description) }}</textarea>
        @error('description')
            <span class="error">{{ $message }}</span>
        @enderror
    
        <label for="status">Estado:</label>
        <select id="status" name="status" required>
            <option value="active" {{ old('status', $category->status) == 'active' ? 'selected' : '' }}>Activo</option>
            <option value="inactive" {{ old('status', $category->status) == 'inactive' ? 'selected' : '' }}>Inactivo</option>
        </select>
        @error('status')
            <span class="error">{{ $message }}</span>
        @enderror
    
        <input type="submit" value="Actualizar">
    </form>
    <div class="link_nav_sub">
        <a href="{{ route('categories.toList') }}">Tabla de categorías</a>
    </div>
@endsection
