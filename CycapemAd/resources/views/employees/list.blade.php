@extends ('/template/layout')

@section('titulo', 'Listado de empleados')

@section('contenido')
    <link rel="stylesheet" href="{{ asset('css/list.css') }}"><br><br><br>
    <h2 style="text-align: center">Empleados Registrados</h2>
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
                    <th>Apellido</th>
                    <th>Fecha de Cumpleaños</th>
                    <th>Email</th>
                    <th>Clave</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Imagen</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->birthdate }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ substr($user->password, 0, 6) }}******</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->address }}</td>
                        <td>
                            @if ($user->picture)
                                <img src="{{ asset('images/' . $user->picture) }}" alt="Imagen de {{ $user->name }}"
                                    width="100">
                            @else
                                No hay imagen
                            @endif
                        </td>
                        <td>{{ $user->status }}</td>
                        <td class="actions">
                            <a href="{{ route('users.toEdit', $user->id) }}">Editar</a>
                            <form action="{{ route('users.toDelate', $user->id) }}" method="POST" style="display:inline;">
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
        <a href="/order/registro">Registro de empleados</a>
    </div>
@endsection
