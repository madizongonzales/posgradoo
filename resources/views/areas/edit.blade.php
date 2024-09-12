@extends('layout')

@section('title', 'Editar Área')

@section('content')
<div class="container mt-4">
    <h2>Editar Área</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('areas.update', $area->id_area) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id_universidad" class="form-label">Universidad</label>
            <select class="form-control w-50" id="id_universidad" name="id_universidad" required>
                @foreach($universidades as $universidad)
                    <option value="{{ $universidad->id_universidad }}" 
                        {{ $area->id_universidad == $universidad->id_universidad ? 'selected' : '' }}>
                        {{ $universidad->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control w-50" id="nombre" name="nombre" value="{{ $area->nombre }}" required>
        </div>
        <div class="mb-3">
            <label for="nombre_abreviado" class="form-label">Nombre Abreviado</label>
            <input type="text" class="form-control w-50" id="nombre_abreviado" name="nombre_abreviado" value="{{ $area->nombre_abreviado }}">
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <input type="text" class="form-control w-50" id="estado" name="estado" value="{{ $area->estado }}" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar Área</button>
    </form>
</div>
@endsection
