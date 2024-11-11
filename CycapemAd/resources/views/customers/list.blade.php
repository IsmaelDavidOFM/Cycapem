@extends ('/template/layout')

@section('titulo', 'Listado de clentes')

@section('contenido')
    <link rel="stylesheet" href="{{ asset('css/list.css') }}"><br><br><br>
    <h2 style="text-align: center">Lista de Clientes</h2>
    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-container">
        <table id="clientesTabla">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Empresa</th>
                    <th>Tipo de negocio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->company }}</td>
                        <td>{{ $customer->business_type }}</td>
                        <td class="actions">
                            <a href="{{ route('customers.toEdit', $customer->id) }}">Editar</a>
                            <form action="{{ route('customers.toDelate', $customer->id) }}" method="POST"
                                style="display:inline;">
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
        <a href="/clientes/registro">Registro de clientes</a>
    </div>
@endsection
