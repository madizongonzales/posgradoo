@extends('layout')

@section('contenido')
    <h1>Mostrar Menú Principal</h1>

    <div>
        <strong>Nombre:</strong>
        {{ $menu->nombre }}
    </div>

    <div>
        <strong>Ícono:</strong>
        {{ $menu->icono }}
    </div>

    <div>
        <strong>Orden:</strong>
        {{ $menu->orden }}
    </div>

    <div>
        <strong>Módulo:</strong>
        {{ $menu->modulo->nombre }}
    </div>

    <a href="{{ route('menu_principal.index') }}">Volver</a>
@endsection
