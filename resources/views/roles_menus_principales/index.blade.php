@extends('layout')

@section('title', 'Lista de Roles Menús Principales')

@section('content')
<div class="container mt-4">
    <h2>Lista de Roles Menús Principales</h2>
    <a class="btn btn-warning m-3" id="createNewRecord">Agregar nuevo rol menú principal</a>

    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Rol</th>
                <th>Menú Principal</th>
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
                    <input type="hidden" name="id_rol_menu_principal" id="table_id">
                    <div class="form-group">
                        <label for="id_rol" class="col-sm-2 control-label">Rol</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="id_rol" name="id_rol" required>
                                @foreach ($roles as $rol)
                                    <option value="{{ $rol->id_rol }}">{{ $rol->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="id_menu_principal" class="col-sm-4 control-label">Menú Principal</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="id_menu_principal" name="id_menu_principal">
                                @foreach ($menus_principales as $menuPrincipal)
                                    <option value="{{ $menuPrincipal->id_menu_principal }}">{{ $menuPrincipal->nombre }}</option>
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
    var URLindex = '{{ route('roles_menus_principales.index') }}';
    var columnas = [
    {data: 'id_rol_menu_principal', name: 'id_rol_menu_principal'},
    {data: 'rol.nombre', name: 'rol.nombre'},
    {data: 'menu_principal.nombre', name: 'menu_principal.nombre'}, // Cambio aquí
    {data: 'estado', name: 'estado'},
    {data: 'action', name: 'action', orderable: false, searchable: false},
];

    var titulo = 'Rol Menú Principal';
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
