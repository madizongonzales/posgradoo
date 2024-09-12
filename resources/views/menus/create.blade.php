@extends('layout')

@section('title', 'Crear Menú')

@section('content')
<div class="container mt-4">
    <h2>Crear Nuevo Menú</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('menus.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_menu_principal" class="form-label">Menú Principal</label>
            <select class="form-control w-50" id="id_menu_principal" name="id_menu_principal" required>
                <option value="" disabled selected>Seleccione un menú principal</option>
                @foreach($menusPrincipales as $menuPrincipal)
                    <option value="{{ $menuPrincipal->id_menu_principal }}">{{ $menuPrincipal->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control w-50" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="directorio" class="form-label">Directorio</label>
            <input type="text" class="form-control w-50" id="directorio" name="directorio" required>
        </div>
        <div class="mb-3">
            <label for="icono" class="form-label">Icono</label>
            <input type="text" class="form-control w-50" id="icono" name="icono">
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="text" class="form-control w-50" id="imagen" name="imagen">
        </div>
        <div class="mb-3">
            <label for="color" class="form-label">Color</label>
            <input type="text" class="form-control w-50" id="color" name="color">
        </div>
        <div class="mb-3">
            <label for="orden" class="form-label">Orden</label>
            <input type="number" class="form-control w-50" id="orden" name="orden">
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <input type="text" class="form-control w-50" id="estado" name="estado" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar Menú</button>
    </form>
</div>
@endsection
