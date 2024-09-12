@extends('layout')

@section('title', 'Lista de Menús Principales')

@section('content')
<div class="container mt-4">
    <h2>Lista de Menús Principales</h2>
    <a class="btn btn-warning m-3" id="createNewRecord">Agregar nuevo menú principal</a>

    <div class="accordion" id="accordionMenus">
        @foreach($menus as $index => $menuPrincipal)
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading{{ $menuPrincipal->id_menu_principal }}">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $menuPrincipal->id_menu_principal }}" aria-expanded="true" aria-controls="collapse{{ $menuPrincipal->id_menu_principal }}">
                    {{ $menuPrincipal->nombre }}
                </button>
            </h2>
            <div id="collapse{{ $menuPrincipal->id_menu_principal }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $menuPrincipal->id_menu_principal }}" data-bs-parent="#accordionMenus">
                <div class="accordion-body">
                    <ul class="list-group">
                        @foreach($menuPrincipal->menus as $menu)
                            <li class="list-group-item">{{ $menu->nombre }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Modal para crear/editar -->
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="form" name="form" class="form-horizontal">
                    @csrf
                    <input type="hidden" name="id_menu_principal" id="table_id">
                    <div class="form-group">
                        <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa nombre">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="icono" class="col-sm-2 control-label">Ícono</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="icono" name="icono" placeholder="Ingresa ícono">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="orden" class="col-sm-2 control-label">Orden</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="orden" name="orden" placeholder="Ingresa orden">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="id_modulo" class="col-sm-2 control-label">Módulo</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="id_modulo" name="id_modulo">
                                @foreach ($modulos as $modulo)
                                    <option value="{{ $modulo->id_modulo }}">{{ $modulo->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="estado" class="col-sm-2 control-label">Estado</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="estado" name="estado" placeholder="Ingresa estado">
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Incluir Bootstrap JS -->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

<!-- Custom CSS -->
<style>
    .accordion-button {
        display: flex;
        align-items: center;
        justify-content: space-between;
        text-align: left;
    }

    .accordion-body {
        display: flex;
        flex-direction: column;
    }

    .accordion-collapse {
        display: flex;
        flex-direction: row;
    }

    .accordion-collapse .accordion-body {
        flex: 1;
        margin-left: 20px;
    }
</style>
@endsection
