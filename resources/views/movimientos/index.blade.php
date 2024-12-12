@extends('layouts.layout')

@section('content')
    <h2>Movimientos de Equipos</h2>

    <!-- Mensajes de éxito y error -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Botón para abrir el modal de agregar -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#agregarMovimiento">Agregar Movimiento</button>

    <!-- Formulario de búsqueda -->
    <form method="GET" action="{{ route('movimientos.index') }}" class="mb-3">
        <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Buscar por ID, Usuario">
        <button type="submit" class="btn btn-primary mt-2">Buscar</button>
    </form>

    <!-- Tabla de resultados -->
    <table class="table table-striped table-hover mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha de Movimiento</th>
                <th>Tipo</th>
                <th>Usuario</th>
                <th>Equipo</th>
                <th>Observaciones</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movimientos as $movimiento)
                <tr>
                    <td>{{ $movimiento->id }}</td>
                    <td>{{ $movimiento->fecha_movimiento }}</td>
                    <td>{{ $movimiento->tipo_movimiento }}</td>
                    <td>{{ $movimiento->usuario }}</td>
                    <td>{{ $movimiento->equipo }}</td>
                    <td>{{ $movimiento->observaciones }}</td>
                    <td>
                        <!-- Botón para abrir el modal de editar -->
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarMovimiento{{ $movimiento->id }}">Editar</button>
                    
                      <!-- Botón para abrir el modal de ver -->
                <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#verMovimiento{{ $movimiento->id }}">Ver</button>


                        <!-- Formulario para eliminar -->
                        <form action="{{ route('movimientos.destroy', $movimiento->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar este movimiento?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
     <!-- Modal para ver movimiento -->
     <div class="modal fade" id="verMovimiento{{ $movimiento->id }}" tabindex="-1" aria-labelledby="verMovimientoLabel{{ $movimiento->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verMovimientoLabel{{ $movimiento->id }}">Ver Movimiento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>ID:</strong> {{ $movimiento->id }}</p>
                    <p><strong>Fecha:</strong> {{ $movimiento->fecha_movimiento }}</p>
                    <p><strong>Tipo de Movimiento:</strong> {{ $movimiento->tipo_movimiento }}</p>
                    <p><strong>Usuario:</strong> {{ $movimiento->usuario }}</p>
                    <p><strong>Equipo:</strong> {{ $movimiento->equipo }}</p>
                    <p><strong>Observaciones:</strong> {{ $movimiento->observaciones }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
               
              <!-- Modal para editar movimiento -->
<div class="modal fade" id="editarMovimiento{{ $movimiento->id }}" tabindex="-1" aria-labelledby="editarMovimientoLabel{{ $movimiento->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('movimientos.update', $movimiento->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editarMovimientoLabel{{ $movimiento->id }}">Editar Movimiento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Campo ID (solo lectura) -->
                    <div class="mb-3">
                        <label for="id" class="form-label">ID (Solo lectura)</label>
                        <input type="text" class="form-control" value="{{ $movimiento->id }}" readonly>
                    </div>
                    
                    <!-- Campo Fecha -->
                    <div class="mb-3">
                        <label for="fecha_movimiento" class="form-label">Fecha</label>
                        <input type="date" name="fecha_movimiento" class="form-control" value="{{ $movimiento->fecha_movimiento }}" required>
                    </div>

                    <!-- Campo Tipo de Movimiento -->
                    <div class="mb-3">
                        <label for="tipo_movimiento" class="form-label">Tipo</label>
                        <input type="text" name="tipo_movimiento" class="form-control" value="{{ $movimiento->tipo_movimiento }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="usuario" class="form-label">Usuario</label>
                        <input type="number" name="usuario" class="form-control" value="{{ $movimiento->usuario }}" min="1" max="7" required>
                    </div>
                    <div class="mb-3">
                        <label for="equipo" class="form-label">Equipo</label>
                        <input type="number" name="equipo" class="form-control" value="{{ $movimiento->equipo }}" min="1" max="100" required>
                    </div>

                    <!-- Campo Observaciones -->
                    <div class="mb-3">
                        <label for="observaciones" class="form-label">Observaciones</label>
                        <textarea name="observaciones" class="form-control">{{ $movimiento->observaciones }}</textarea>
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

   
   <!-- Modal para agregar movimiento -->
   <div class="modal fade" id="agregarMovimiento" tabindex="-1" aria-labelledby="agregarMovimientoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('movimientos.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="agregarMovimientoLabel">Agregar Movimiento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="fecha_movimiento" class="form-label">Fecha</label>
                        <input type="date" name="fecha_movimiento" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="tipo_movimiento" class="form-label">Tipo</label>
                        <input type="text" name="tipo_movimiento" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="usuario" class="form-label">Usuario</label>
                        <input type="number" name="usuario" class="form-control" min="1" max="7" required>
                    </div>
                    <div class="mb-3">
                        <label for="equipo" class="form-label">Equipo</label>
                        <input type="number" name="equipo" class="form-control" min="1" max="100" required>
                    </div>
                    <div class="mb-3">
                        <label for="observaciones" class="form-label">Observaciones</label>
                        <textarea name="observaciones" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <!-- Paginación -->
    <div class="d-flex justify-content-center mt-4">
        {{ $movimientos->appends(request()->query())->links('pagination::bootstrap-5') }}
    </div>
@endsection