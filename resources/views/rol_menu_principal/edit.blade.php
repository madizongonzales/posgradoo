@extends('layout')

@section('contenido')
    <h1>Editar Asignación de Rol a Menú Principal</h1>
    <form action="{{ route('rol_menu_principal.update', $rolMenuPrincipal->id_rol_menu_principal) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="id_rol">Rol:</label>
        <select name="id_rol" id="id_rol" required>
            @foreach($roles as $rol)
                <option value="{{ $rol->id_rol }}" {{ $rol->id_rol == $rolMenuPrincipal->id_rol ? 'selected' : '' }}>
                    {{ $rol->nombre }}
                </option>
            @endforeach
        </select><br/>

        <label for="id_menu_principal">Menú Principal:</label>
        <select name="id_menu_principal" id="id_menu_principal" required>
            @foreach($menusPrincipales as $menuPrincipal)
                <option value="{{ $menuPrincipal->id_menu_principal }}" {{ $menuPrincipal->id_menu_principal == $rolMenuPrincipal->id_menu_principal ? 'selected' : '' }}>
                    {{ $menuPrincipal->nombre }}
                </option>
            @endforeach
        </select><br/>

        <label for="estado">Estado:</label>
        <input type="text" name="estado" id="estado" value="{{ $rolMenuPrincipal->estado }}"><br/>

        <button type="submit">Actualizar Datos</button>
    </form>

    <a href="{{ route('rol_menu_principal.index') }}">Cancelar</a>
@endsection
