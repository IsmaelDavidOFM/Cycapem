@extends ('/template/layout')

@section('titulo', 'Listado de proveedores')
<style>
    h2 {
        color: #333;
        text-align: center;
        margin-top: 10px;
        margin-bottom: 20px;
    }

    table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
    }

    table,
    th,
    td {
        border: 1px solid #ccc;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f4f4f4;
    }

    .link_nav_sub {
        text-align: center;
        margin-top: 20px;
        font-family: Arial, sans-serif;
    }

    .link_nav_sub a {
        color: #5c4d0c;
        text-decoration: none;
        font-weight: bold;
    }

    .link_nav_sub a:hover {
        text-decoration: underline;
    }
</style>
@section('contenido')
    <link rel="stylesheet" href="{{ asset('css/list.css') }}"><br><br><br>
    <h2>Pedidos Realizados</h2>
    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-container">
        <table id="clientesTabla ">
            <thead>
                <tr>
                    <th>Numero de la Orden</th>
                    <th>ID del Cliente</th>
                    <th>Tipo de consultoria</th>
                    <th>Fecha y Hora</th>
                    <th>Estado de la solicitud</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->customer_id }}</td>
                        <td>{{ $order->category_id }}</td>
                        <td>{{ $order->fecha_solicitada }}</td>
                        <td>{{ $order->status }}</td>
                        <td class="actions">
                            <a href="{{ route('orders.toEdit', $order->id) }}">Editar</a>
                            <form action="{{ route('orders.toDelate', $order->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="link_nav_sub">
        <a href="/order/registro">Registro de ordenes</a>
    </div>
@endsection
