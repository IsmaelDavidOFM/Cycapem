@extends ('/template/layout')
@section('titulo', 'Listado de clentes')
@section('contenido')
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}">
    <h2>Editar Consulta</h2>
    <form action="{{ route('orders.toUpdate', ['id' => $order->id]) }}" method="post">
        @csrf
        <!-- Especificar el método HTTP POST para actualización -->

        <!-- Campo para seleccionar el usuario (cliente) -->
        <label for="customer_id">Nombre del Usuario:</label>
        <select id="customer_id" name="customer_id">
            @foreach ($customers as $customer)
                <option value="{{ $customer->id }}" {{ $order->customer_id == $customer->id ? 'selected' : '' }}>
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
                <option value="{{ $category->id }}" {{ $order->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->type }}
                </option>
            @endforeach
        </select><br>
        @error('category_id')
            <span class="error">{{ $message }}</span>
        @enderror

        <!-- Campo para seleccionar la fecha -->
        <label for="datetime">Fecha y Hora:</label>
        <input type="datetime-local" id="datetime" name="datetime" value="{{ $order->fecha_solicitada }}"><br>
        @error('datetime')
            <span class="error">{{ $message }}</span>
        @enderror

        <!-- Campo para seleccionar el estado de la orden -->
        <label for="status">Estado:</label>
        <select id="status" name="status">
            <option value="urgente" {{ $order->status == 'urgente' ? 'selected' : '' }}>Urgente</option>
            <option value="prioritario" {{ $order->status == 'prioritario' ? 'selected' : '' }}>Prioritario</option>
            <option value="espera" {{ $order->status == 'espera' ? 'selected' : '' }}>Espera</option>
            <option value="cumplida" {{ $order->status == 'cumplida' ? 'selected' : '' }}>Cumplida</option>
        </select><br>
        @error('status')
            <span class="error">{{ $message }}</span>
        @enderror

        <input type="submit" value="Actualizar">
    </form>
    <div class="link_nav_sub">
        <a href="/order/listado">Tabla de órdenes</a>
    </div>

@endsection
