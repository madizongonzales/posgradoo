@extends('layout')

@section('title', 'Crear Universidad')

@section('content')
<div class="container mt-4">
    <h2>Crear Nueva Universidad</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('universidades.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control w-50" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="nombre_abreviado" class="form-label">Nombre Abreviado</label>
            <input type="text" class="form-control w-50" id="nombre_abreviado" name="nombre_abreviado" required>
        </div>
        <div class="mb-3">
            <label for="inicial" class="form-label">Inicial</label>
            <input type="text" class="form-control w-50" id="inicial" name="inicial" required>
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <input type="text" class="form-control w-50" id="estado" name="estado" value="S" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
