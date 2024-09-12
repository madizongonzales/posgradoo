@extends('layout')

@section('contenido')
    <h1>Editar Menú Principal</h1>
    <form action="{{ route('menu_principal.update', $menu->id_menu_principal) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="id_modulo">Módulo:</label>
        <select name="id_modulo" id="id_modulo" required>
            @foreach($modulos as $modulo)
                <option value="{{ $modulo->id_modulo }}" {{ $menu->id_modulo == $modulo->id_modulo ? 'selected' : '' }}>
                    {{ $modulo->nombre }}
                </option>
            @endforeach
        </select><br/>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="{{ $menu->nombre }}" required><br/>

        <label for="icono">Ícono:</label>
        <input type="text" name="icono" id="icono" value="{{ $menu->icono }}"><br/>

        <label for="orden">Orden:</label>
        <input type="number" name="orden" id="orden" value="{{ $menu->orden }}"><br/>

        <button type="submit">Actualizar Datos</button>
    </form>

    <a href="{{ route('menu_principal.index') }}">Cancelar</a>
@endsection
