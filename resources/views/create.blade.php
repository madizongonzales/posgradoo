@extends('layouts.master')

@section('contenido')
    <h1>CREATE</h1>
    <form action="{{ route('persona.crear') }}" method="POST">
        @csrf
        <label for="paterno">Paterno:</label>
        <input type="text" name="paterno" id="paterno"><br/>
        <label for="materno">Materno:</label>
        <input type="text" name="materno" id="materno"><br/>
        <label for="nombre">Nombre(s):</label>
        <input type="text" name="nombre" id="nombre"><br/>
        <button type="submit">Guardar Datos</button>
    </form>
@endsection
