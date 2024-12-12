@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($tipo) ? 'Editar' : 'Crear' }} Tipo de Equipos</h1>

    <!-- Formulario de búsqueda -->
    <form method="GET" action="{{ route('tipos.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Buscar por nombre de tipo" value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Buscar</button>
        </div>
    </form>

    <!-- Mensaje de éxito -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Formulario para crear o editar tipo -->
    <form action="{{ isset($tipo) ? route('tipos.update', $tipo->id_tipo_equipo) : route('tipos.store') }}" method="POST">
        @csrf
        @if(isset($tipo))
            @method('PUT')  <!-- Método PUT para actualización -->
        @endif

        <div class="form-group">
            <label for="nombre_tipo">Nombre Tipo</label>
            <input type="text" name="nombre_tipo" id="nombre_tipo" class="form-control" value="{{ isset($tipo) ? $tipo->nombre_tipo : old('nombre_tipo') }}" required>
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">
                {{ isset($tipo) ? 'Modificar' : 'Crear' }} Tipo
            </button>
        </div>
    </form>

    <hr>

    <!-- Tabla de tipos -->
    <h4>Listado de Tipos</h4>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre Tipo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tipos as $item)
                <tr>
                    <td>{{ $item->id_tipo_equipo }}</td>
                    <td>{{ $item->nombre_tipo }}</td>
                    <td>
                        <!-- Botón para ver detalles -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewTipoModal-{{ $item->id_tipo_equipo }}">
                            Ver
                        </button>

                        <!-- Enlace para editar el tipo -->
                        <a href="{{ route('tipos.edit', $item->id_tipo_equipo) }}" class="btn btn-warning">Editar</a>

                        <!-- Formulario de eliminación -->
                        <form action="{{ route('tipos.destroy', $item->id_tipo_equipo) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este tipo?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>

                <!-- Modal para mostrar los detalles -->
                <div class="modal fade" id="viewTipoModal-{{ $item->id_tipo_equipo }}" tabindex="-1" aria-labelledby="viewTipoModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="viewTipoModalLabel">Detalles de Tipo</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p><strong>ID:</strong> {{ $item->id_tipo_equipo }}</p>
                                <p><strong>Nombre Tipo:</strong> {{ $item->nombre_tipo }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>

      {{-- <!-- Paginación -->
      <div class="d-flex justify-content-center">
        {{ $tipos->links('pagination::bootstrap-5') }}
    </div> --}}
</div>

        
@endsection