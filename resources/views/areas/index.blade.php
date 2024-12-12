@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Gestión de Áreas</h1>

    <!-- Formulario de búsqueda -->
    <form method="GET" action="{{ route('areas.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Buscar por nombre o ubicación" value="{{ $search ?? '' }}">
            <button class="btn btn-primary" type="submit">Buscar</button>
        </div>
    </form>

    <!-- Botón para agregar nueva área -->
    <div class="mb-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            Agregar Área
        </button>
    </div>

    <!-- Tabla de áreas -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Ubicación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($areas as $area)
            <tr>
                <td>{{ $area->id_area }}</td>
                <td>{{ $area->nombre_area }}</td>
                <td>{{ $area->ubicacion }}</td>
                <td>
                    <!-- Botón Ver -->
                    <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal{{ $area->id_area }}">Ver</button>

                    <!-- Botón Editar -->
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $area->id_area }}">Editar</button>

                    <!-- Botón Eliminar -->
                    <form action="{{ route('area.destroy', $area->id_area) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta área?');" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>

            <!-- Modal Ver -->
            <div class="modal fade" id="viewModal{{ $area->id_area }}" tabindex="-1" aria-labelledby="viewModalLabel{{ $area->id_area }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewModalLabel{{ $area->id_area }}">Detalles del Área</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Nombre:</strong> {{ $area->nombre_area }}</p>
                            <p><strong>Ubicación:</strong> {{ $area->ubicacion }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Editar -->
            <div class="modal fade" id="editModal{{ $area->id_area }}" tabindex="-1" aria-labelledby="editModalLabel{{ $area->id_area }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('areas.update', $area->id_area) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel{{ $area->id_area }}">Editar Área</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="nombre_area" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" name="nombre_area" value="{{ $area->nombre_area }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="ubicacion" class="form-label">Ubicación</label>
                                    <input type="text" class="form-control" name="ubicacion" value="{{ $area->ubicacion }}" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>

    <!-- Paginación -->
    <div class="d-flex justify-content-center">
        {{ $areas->links('pagination::bootstrap-5') }}
    </div>
</div>

<!-- Modal Crear -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('areas.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Agregar Nueva Área</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nombre_area" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre_area" required>
                    </div>
                    <div class="mb-3">
                        <label for="ubicacion" class="form-label">Ubicación</label>
                        <input type="text" class="form-control" name="ubicacion" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection