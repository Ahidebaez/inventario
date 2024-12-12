@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Gestión de Equipos</h1>

    <!-- Buscador -->
    <form action="{{ route('equipos.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar equipos..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </form>

    <!-- Botón Agregar Equipo -->
    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalCrearEquipo">Agregar Equipo</button>

    <!-- Tabla de Equipos -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Fecha de Adquisición</th>
                <th>Área</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($equipos as $equipo)
            <tr>
                <td>{{ $equipo->id }}</td>
                <td>{{ $equipo->nombre_equipo }}</td>
                <td>{{ $equipo->descripcion }}</td>
                <td>{{ $equipo->estado }}</td>
                <td>{{ $equipo->fecha_adquisicion }}</td>
                <td>{{ $equipo->area }}</td>
                <td>{{ $equipo->tipo_equipo }}</td>
                <td>
                    <!-- Mostrar botón de "Ver" solo si hay una búsqueda -->
                    @if(request('search'))
                        <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalEquipo">Ver</a>
                    @endif
                    <a href="{{ route('equipos.edit', $equipo->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('equipos.destroy', $equipo->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este equipo?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center">No se encontraron equipos.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Paginación -->
    <div class="d-flex justify-content-center mt-3">
        {{ $equipos->links('pagination::bootstrap-4') }}
    </div>
</div>

<!-- Modal para Crear Equipo -->
<div class="modal fade" id="modalCrearEquipo" tabindex="-1" aria-labelledby="modalCrearEquipoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCrearEquipoLabel">Crear Nuevo Equipo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('equipos.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre_equipo" class="form-label">Nombre del Equipo</label>
                        <input type="text" class="form-control" id="nombre_equipo" name="nombre_equipo" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-control" id="estado" name="estado" required>
                            <option value="Disponible">Disponible</option>
                            <option value="En reparación">En reparación</option>
                            <option value="Asignado">Asignado</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_adquisicion" class="form-label">Fecha de Adquisición</label>
                        <input type="date" class="form-control" id="fecha_adquisicion" name="fecha_adquisicion" required>
                    </div>
                    <div class="mb-3">
                        <label for="area" class="form-label">Área</label>
                        <input type="number" class="form-control" id="area" name="area" min="1" max="100" required>
                    </div>
                    <div class="mb-3">
                        <label for="tipo_equipo" class="form-label">Tipo de Equipo</label>
                        <input type="number" class="form-control" id="tipo_equipo" name="tipo_equipo" min="1" max="100" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal para Ver Detalles -->
<div class="modal fade" id="modalEquipo" tabindex="-1" aria-labelledby="modalEquipoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEquipoLabel">Detalles del Equipo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>ID:</strong> {{ $equipo->id ?? '' }}</p>
                <p><strong>Nombre:</strong> {{ $equipo->nombre_equipo ?? '' }}</p>
                <p><strong>Descripción:</strong> {{ $equipo->descripcion ?? '' }}</p>
                <p><strong>Estado:</strong> {{ $equipo->estado ?? '' }}</p>
                <p><strong>Fecha de Adquisición:</strong> {{ $equipo->fecha_adquisicion ?? '' }}</p>
                <p><strong>Área:</strong> {{ $equipo->area ?? '' }}</p>
                <p><strong>Tipo:</strong> {{ $equipo->tipo_equipo ?? '' }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

@endsection