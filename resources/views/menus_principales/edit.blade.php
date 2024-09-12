@extends('layout')

@section('title', 'Editar Menú Principal')

@section('content')
<div class="container mt-4">
    <h2>Editar Menú Principal</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('menus_principales.update', $menuPrincipal->id_menu_principal) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id_modulo" class="form-label">Módulo</label>
            <select class="form-control w-50" id="id_modulo" name="id_modulo" required>
                @foreach($modulos as $modulo)
                    <option value="{{ $modulo->id_modulo }}" 
                        {{ $menuPrincipal->id_modulo == $modulo->id_modulo ? 'selected' : '' }}>
                        {{ $modulo->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control w-50" id="nombre" name="nombre" value="{{ $menuPrincipal->nombre }}" required>
        </div>
        <div class="mb-3">
            <label for="icono" class="form-label">Icono</label>
            <input type="text" class="form-control w-50" id="icono" name="icono" value="{{ $menuPrincipal->icono }}">
        </div>
        <div class="mb-3">
            <label for="orden" class="form-label">Orden</label>
            <input type="number" class="form-control w-50" id="orden" name="orden" value="{{ $menuPrincipal->orden }}">
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <input type="text" class="form-control w-50" id="estado" name="estado" value="{{ $menuPrincipal->estado }}" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar Menú Principal</button>
    </form>
</div>
@endsection
