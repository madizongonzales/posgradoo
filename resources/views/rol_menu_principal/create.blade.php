@extends('layout')

@section('contenido')
    <h1>Asignar Rol a Menú Principal</h1>
    <form action="{{ route('rol_menu_principal.store') }}" method="POST">
        @csrf

        <label for="id_rol">Rol:</label>
        <select name="id_rol" id="id_rol" required>
            @foreach($roles as $rol)
                <option value="{{ $rol->id_rol }}">{{ $rol->nombre }}</option>
            @endforeach
        </select><br/>

        <label for="id_menu_principal">Menú Principal:</label>
        <select name="id_menu_principal" id="id_menu_principal" required>
            @foreach($menusPrincipales as $menuPrincipal)
                <option value="{{ $menuPrincipal->id_menu_principal }}">{{ $menuPrincipal->nombre }}</option>
            @endforeach
        </select><br/>

        <label for="estado">Estado:</label>
        <input type="text" name="estado" id="estado" value="S"><br/>

        <button type="submit">Guardar Datos</button>
    </form>

    <a href="{{ route('rol_menu_principal.index') }}">Cancelar</a>
@endsection
