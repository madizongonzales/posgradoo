@extends('layout')

@section('contenido')
    <h1>Crear Menú Principal</h1>
    <form action="{{ route('menu_principal.store') }}" method="POST">
        @csrf

        <label for="id_modulo">Módulo:</label>
        <select name="id_modulo" id="id_modulo" required>
            @foreach($modulos as $modulo)
                <option value="{{ $modulo->id_modulo }}">{{ $modulo->nombre }}</option>
            @endforeach
        </select><br/>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br/>

        <label for="icono">Ícono:</label>
        <input type="text" name="icono" id="icono"><br/>

        <label for="orden">Orden:</label>
        <input type="number" name="orden" id="orden"><br/>

        <button type="submit">Guardar Datos</button>
    </form>

    <a href="{{ route('menu_principal.index') }}">Cancelar</a>
@endsection
