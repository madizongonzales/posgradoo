@extends('layout')

@section('title', 'Editar Rol-Menú Principal')

@section('content')
<div class="container mt-4">
    <h2>Editar Rol-Menú Principal</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('roles_menus_principales.update', $rolMenuPrincipal->id_rol_menu_principal) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id_rol" class="form-label">Rol</label>
            <select class="form-control w-50" id="id_rol" name="id_rol" required>
                @foreach($roles as $rol)
                    <option value="{{ $rol->id_rol }}" 
                        {{ $rolMenuPrincipal->id_rol == $rol->id_rol ? 'selected' : '' }}>
                        {{ $rol->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_menu_principal" class="form-label">Menú Principal</label>
            <select class="form-control w-50" id="id_menu_principal" name="id_menu_principal" required>
                @foreach($menusPrincipales as $menuPrincipal)
                    <option value="{{ $menuPrincipal->id_menu_principal }}" 
                        {{ $rolMenuPrincipal->id_menu_principal == $menuPrincipal->id_menu_principal ? 'selected' : '' }}>
                        {{ $menuPrincipal->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <input type="text" class="form-control w-50" id="estado" name="estado" value="{{ $rolMenuPrincipal->estado }}" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar Rol-Menú Principal</button>
    </form>
</div>
@endsection
