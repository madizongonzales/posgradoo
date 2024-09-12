@extends('layout')

@section('title', 'Editar Universidad')

@section('content')
<div class="container mt-4">
    <h2>Editar Universidad</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('universidades.update', $universidad->id_universidad) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control w-50" id="nombre" name="nombre" value="{{ $universidad->nombre }}" required>
        </div>
        <div class="mb-3">
            <label for="nombre_abreviado" class="form-label">Nombre Abreviado</label>
            <input type="text" class="form-control w-50" id="nombre_abreviado" name="nombre_abreviado" value="{{ $universidad->nombre_abreviado }}" required>
        </div>
        <div class="mb-3">
            <label for="inicial" class="form-label">Inicial</label>
            <input type="text" class="form-control w-50" id="inicial" name="inicial" value="{{ $universidad->inicial }}" required>
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <input type="text" class="form-control w-50" id="estado" name="estado" value="{{ $universidad->estado }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
