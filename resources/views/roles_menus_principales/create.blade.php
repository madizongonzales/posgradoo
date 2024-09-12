@extends('layout')

@section('title', 'Crear Rol-Menú Principal')

@section('content')
<div class="container mt-4">
    <h2>Crear Nuevo Rol-Menú Principal</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('roles_menus_principales.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_rol" class="form-label">Rol</label>
            <select class="form-control w-50" id="id_rol" name="id_rol" required>
                <option value="" disabled selected>Seleccione un rol</option>
                @foreach($roles as $rol)
                    <option value="{{ $rol->id_rol }}">{{ $rol->nombre }}</option>
                @endforeach
            </select>
        </div>
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
            <label for="estado" class="form-label">Estado</label>
            <input type="text" class="form-control w-50" id="estado" name="estado" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar Rol-Menú Principal</button>
    </form>
</div>
@endsection
