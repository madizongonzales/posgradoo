@extends('layout')

@section('title', 'Crear Facultad')

@section('content')
<div class="container mt-4">
    <h2>Crear Nueva Facultad</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('facultades.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_area" class="form-label">Área</label>
            <select class="form-control" id="id_area" name="id_area" required>
                <option value="" disabled selected>Seleccione un área</option>
                @foreach($areas as $area)
                    <option value="{{ $area->id_area }}">{{ $area->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="nombre_abreviado" class="form-label">Nombre Abreviado</label>
            <input type="text" class="form-control" id="nombre_abreviado" name="nombre_abreviado">
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion">
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono">
        </div>
        <div class="mb-3">
            <label for="telefono_interno" class="form-label">Teléfono Interno</label>
            <input type="text" class="form-control" id="telefono_interno" name="telefono_interno">
        </div>
        <div class="mb-3">
            <label for="fax" class="form-label">Fax</label>
            <input type="text" class="form-control" id="fax" name="fax">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="latitud" class="form-label">Latitud</label>
            <input type="text" class="form-control" id="latitud" name="latitud">
        </div>
        <div class="mb-3">
            <label for="longitud" class="form-label">Longitud</label>
            <input type="text" class="form-control" id="longitud" name="longitud">
        </div>
        <div class="mb-3">
            <label for="fecha_creacion" class="form-label">Fecha de Creación</label>
            <input type="date" class="form-control" id="fecha_creacion" name="fecha_creacion">
        </div>
        <div class="mb-3">
            <label for="escudo" class="form-label">Escudo</label>
            <input type="text" class="form-control" id="escudo" name="escudo">
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="text" class="form-control" id="imagen" name="imagen">
        </div>
        <div class="mb-3">
            <label for="estado_virtual" class="form-label">Estado Virtual</label>
            <input type="text" class="form-control" id="estado_virtual" name="estado_virtual">
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <input type="text" class="form-control" id="estado" name="estado" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Facultad</button>
    </form>
</div>
@endsection
