@extends('layout')

@section('contenido')
    <h1>Detalles de la Asignación de Rol a Menú Principal</h1>

    <p>ID: {{ $rolMenuPrincipal->id_rol_menu_principal }}</p>
    <p>Rol: {{ $rolMenuPrincipal->rol->nombre }}</p>
    <p>Menú Principal: {{ $rolMenuPrincipal->menuPrincipal->nombre }}</p>
    <p>Estado: {{ $rolMenuPrincipal->estado }}</p>

    <a href="{{ route('rol_menu_principal.index') }}">Volver al Listado</a>
@endsection
