@extends ('/template/layout')

@section('titulo', 'Tipos de servicios')

@section('contenido')
    <link rel="stylesheet" href="{{ asset('css/list.css') }}">
    <br><br>
    <h2 style="text-align: center">Tipos de consultorias registradas</h2>
    <div class="table-container">
        <table id="clientesTabla">
            <thead>
                <tr>
                    <th>Tipo de la consultoria</th>
                    <th>Descripcion</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->type }}</td>
                        <td>{{ $category->description }}</td>
                        <td>{{ $category->status }}</td>
                        <td class="actions">
                            <a href="{{ route('categories.toEdit', $category->id) }}">Editar</a>
                            <form action="{{ route('categories.toDelate', $category->id) }}" method="POST"
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
        <a href="/categorias/registro">Volver al registro</a>
    </div>
@endsection
