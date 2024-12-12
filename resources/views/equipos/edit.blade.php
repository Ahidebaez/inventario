@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Equipo</h1>
    <form action="{{ route('equipos.update', $equipo->id) }}" method="POST" onsubmit="return validarEstado()">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre_equipo" class="form-label">Nombre del Equipo</label>
            <input type="text" class="form-control" id="nombre_equipo" name="nombre_equipo"
                value="{{ $equipo->nombre_equipo }}" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" required>{{ $equipo->descripcion }}</textarea>
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select class="form-control" id="estado" name="estado" required>
                <option value="Disponible" {{ $equipo->estado == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                <option value="En reparación" {{ $equipo->estado == 'En reparación' ? 'selected' : '' }}>En reparación</option>
                <option value="Asignado" {{ $equipo->estado == 'Asignado' ? 'selected' : '' }}>Asignado</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="fecha_adquisicion" class="form-label">Fecha de Adquisición</label>
            <input type="date" class="form-control" id="fecha_adquisicion" name="fecha_adquisicion"
                value="{{ $equipo->fecha_adquisicion }}" required>
        </div>
        <div class="mb-3">
            <label for="area" class="form-label">Área</label>
            <input type="number" class="form-control" id="area" name="area" min="0" max="100" value="{{ $equipo->area }}" required>
        </div>
        <div class="mb-3">
            <label for="tipo_equipo" class="form-label">Tipo de Equipo</label>
            <input type="number" class="form-control" id="tipo_equipo" name="tipo_equipo" min="0" max="100" value="{{ $equipo->tipo_equipo }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>

<script>
    function validarEstado() {
        var estado = document.getElementById('estado').value;
        var estadosValidos = ['Disponible', 'En reparación', 'Asignado'];

        if (!estadosValidos.includes(estado)) {
            alert('El estado debe ser uno de los siguientes: Disponible, En reparación, Asignado');
            return false;
        }
        return true;
    }
</script>
@endsection