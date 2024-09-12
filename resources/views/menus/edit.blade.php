@extends('layout')

@section('title', 'Editar Menú')

@section('content')
<div class="container mt-4">
    <h2>Editar Menú</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('menus.update', $menu->id_menu) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id_menu_principal" class="form-label">Menú Principal</label>
            <select class="form-control w-50" id="id_menu_principal" name="id_menu_principal" required>
                @foreach($menusPrincipales as $menuPrincipal)
                    <option value="{{ $menuPrincipal->id_menu_principal }}" 
                        {{ $menu->id_menu_principal == $menuPrincipal->id_menu_principal ? 'selected' : '' }}>
                        {{ $menuPrincipal->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control w-50" id="nombre" name="nombre" value="{{ $menu->nombre }}" required>
        </div>
        <div class="mb-3">
            <label for="directorio" class="form-label">Directorio</label>
            <input type="text" class="form-control w-50" id="directorio" name="directorio" value="{{ $m
