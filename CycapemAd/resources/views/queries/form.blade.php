@extends('/template/layout')

@section('titulo', 'Registro de proveedores')

@section('contenido')
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}">
    <h2>Registro de Consultorias</h2>
    <form action="/submit-order" method="post" >
        @csrf
        <!-- Campo para seleccionar el usuario (cliente) -->
        <label for="customer_id">Nombre del Usuario:</label>
        <select id="customer_id" name="customer_id">
            @foreach ($customers as $customer)
                <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                    {{ $customer->name }} {{ $customer->last_name }}
                </option>
            @endforeach
        </select><br>
        @error('customer_id')
            <span class="error">{{ $message }}</span>
        @enderror

        <!-- Campo para seleccionar el tipo de consultoría -->
        <label for="category_id">Tipo de Consultoría:</label>
        <select id="category_id" name="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
            <option value="prioritario" {{ old('status') == 'prioritario' ? 'selected' : '' }}>Prioritario</option>
            <option value="espera" {{ old('status') == 'espera' ? 'selected' : '' }}>Espera</option>
            <option value="cumplida" {{ old('status') == 'cumplida' ? 'selected' : '' }}>Cumplida</option>
        </select><br>
        @error('status')
            <span class="error">{{ $message }}</span>
        @enderror

        <input type="submit" value="Registrar">
    </form>
    <div class="link_nav_sub">
        <a href="/order/listado">Tabla de ordenes</a>
    </div>
@endsection
