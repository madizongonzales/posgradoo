@extends('layout')

@section('title', 'Editar Configuración')

@section('content')
<div class="container mt-4">
    <h2>Editar Configuración</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('configuraciones.update', $configuracion->id_configuracion) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id_universidad" class="form-label">Universidad</label>
            <select class="form-control w-50" id="id_universidad" name="id_universidad" required>
                @foreach($universidades as $universidad)
                    <option value="{{ $universidad->id_universidad }}" 
                        {{ $configuracion->id_universidad == $universidad->id_universidad ? 'selected' : '' }}>
                        {{ $universidad->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <input type="text" class="form-control w-50" id="tipo" name="tipo" value="{{ $configuracion->tipo }}" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control w-50" id="descripcion" name="descripcion">{{ $configuracion->descripcion }}</textarea>
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <input type="text" class="form-control w-50" id="estado" name="estado" value="{{ $configuracion->estado }}" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar Configuración</button>
    </form>
</div>
@endsection
