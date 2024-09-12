@extends('layout')

@section('title', 'Editar Facultad')

@section('content')
<div class="container mt-4">
    <h2>Editar Facultad</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('facultades.update', $facultad->id_facultad) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id_area" class="form-label">Área</label>
            <select class="form-control" id="id_area" name="id_area" required>
                @foreach($areas as $area)
                    <option value="{{ $area->id_area }}" {{ $facultad->id_area == $area->id_area ? 'selected' : '' }}>
                        {{ $area->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control w-50" id="nombre" name="nombre" value="{{ $facultad->nombre }}" required>
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control w-50" id="direccion" name="direccion" value="{{ $facultad->direccion }}">
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control w-50" id="telefono" name="telefono" value="{{ $facultad->telefono }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Facultad</button>
    </form>
</div>
@endsection
