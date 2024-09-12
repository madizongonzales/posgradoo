@extends('layout')

@section('title', 'Lista de Menús Principales')

@section('content')
<div class="container mt-4">
    <h2>Lista de Menús Principales</h2>
    <a class="btn btn-warning m-3" id="createNewRecord">Agregar nuevo menú principal</a>

    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Módulo</th>
                <th>Nombre</th>
                <th>Ícono</th>
                <th>Orden</th>
                <th>Estado</th>
                <th width="150px">Acciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
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

<!-- Definición de variables para el archivo crud.js -->
<script type="text/javascript">
    var URLindex = '{{ route('menus_principales.index') }}';
    var columnas = [
        {data: 'id_menu_principal', name: 'id_menu_principal'},
        {data: 'modulo.nombre', name: 'modulo.nombre'},
        {data: 'nombre', name: 'nombre'},
        {data: 'icono', name: 'icono'},
        {data: 'orden', name: 'orden'},
        {data: 'estado', name: 'estado'},
        {data: 'action', name: 'action', orderable: false, searchable: false},
    ];
    var titulo = 'Menú Principal';
</script>

<!-- Incluir jQuery y Bootstrap -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<!-- Incluir DataTables -->
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>

<!-- Incluir el archivo CRUD -->
<script src="{{ asset('js/crud.js') }}"></script>
@endsection
