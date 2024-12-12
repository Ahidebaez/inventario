@extends('layouts.layout')

@section('content')
    <h2>Usuarios</h2>

    <!-- Botón para agregar nuevo usuario -->
    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalNuevoUsuario">Nuevo Usuario</button>

  <!-- Formulario de búsqueda -->
<form method="GET" action="{{ route('usuarios.index') }}" class="mb-4">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Buscar por nombre o correo" value="{{ request('search') }}">
        <button class="btn btn-primary" type="submit">Buscar</button>
    </div>
</form>

    <!-- Tabla de usuarios -->
    <table class="table table-striped table-hover mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->nombre_usuario }}</td>
                    <td>{{ $usuario->correo }}</td>
                    <td>{{ $usuario->telefono }}</td>
                    <td>{{ $usuario->rol }}</td>
                    <td>
                        <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalVerUsuario{{ $usuario->id }}">Ver</button>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditarUsuario{{ $usuario->id }}">Editar</button>
                        <form method="POST" action="{{ route('usuarios.destroy', $usuario->id) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar</button>
                        </form>
                    </td>
                </tr>

                <!-- Modal Ver Usuario -->
                <div class="modal fade" id="modalVerUsuario{{ $usuario->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Detalles del Usuario</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p><strong>ID:</strong> {{ $usuario->id }}</p>
                                <p><strong>Nombre:</strong> {{ $usuario->nombre_usuario }}</p>
                                <p><strong>Correo:</strong> {{ $usuario->correo }}</p>
                                <p><strong>Teléfono:</strong> {{ $usuario->telefono }}</p>
                                <p><strong>Rol:</strong> {{ $usuario->rol }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Editar Usuario -->
                <div class="modal fade" id="modalEditarUsuario{{ $usuario->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">

                             



                            <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $usuario->id }}">
                                <div class="modal-header">
                                    <h5 class="modal-title">Editar Usuario</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="nombre_usuario_{{ $usuario->id }}" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="nombre_usuario_{{ $usuario->id }}" name="nombre_usuario" value="{{ $usuario->nombre_usuario }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="correo_{{ $usuario->id }}" class="form-label">Correo</label>
                                        <input type="email" class="form-control" id="correo_{{ $usuario->id }}" name="correo" value="{{ $usuario->correo }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="telefono_{{ $usuario->id }}" class="form-label">Teléfono</label>
                                        <input type="text" class="form-control" id="telefono_{{ $usuario->id }}" name="telefono" value="{{ $usuario->telefono }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="rol_{{ $usuario->id }}" class="form-label">Rol</label>
                                        <input type="text" class="form-control" id="rol_{{ $usuario->id }}" name="rol" value="{{ $usuario->rol }}" readonly>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                </div>
                            </form>



                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>

    <!-- Modal Nuevo Usuario -->
    <div class="modal fade" id="modalNuevoUsuario" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('usuarios.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Nuevo Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nuevo_nombre_usuario" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nuevo_nombre_usuario" name="nombre_usuario" required>
                        </div>
                        <div class="mb-3">
                            <label for="nuevo_correo" class="form-label">Correo</label>
                            <input type="email" class="form-control" id="nuevo_correo" name="correo" required>
                        </div>
                        <div class="mb-3">
                            <label for="nuevo_telefono" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" id="nuevo_telefono" name="telefono">
                        </div>
                        <div class="mb-3">
                            <label for="nuevo_rol" class="form-label">Rol</label>
                            <select class="form-control" id="nuevo_rol" name="rol" required>
                                <option value="Administrador">Administrador</option>
                                <option value="Residente">Residente</option>
                                <option value="Usuario">Usuario</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection