@extends('layout')

@section('title', 'Lista de Configuraciones')

@section('content')
<div class="container mt-4">
    <h2>Lista de Configuraciones</h2>
    <a class="btn btn-warning m-3" id="createNewRecord">Agregar nueva configuración</a>

    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Descripción</th>
                <th>Universidad</th>
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
                    <input type="hidden" name="id_configuracion" id="table_id">
                    <div class="form-group">
                        <label for="tipo" class="col-sm-2 control-label">Tipo</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Ingresa tipo" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="descripcion" class="col-sm-2 control-label">Descripción</label>
                        <div class="col-sm-12">
                            <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Ingresa descripción" ></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="id_universidad" class="col-sm-2 control-label">Universidad</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="id_universidad" name="id_universidad" >
                                @foreach ($universidades as $universidad)
                                    <option value="{{ $universidad->id_universidad }}">{{ $universidad->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="estado" class="col-sm-2 control-label">Estado</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="estado" name="estado" placeholder="Ingresa estado" >
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
    var URLindex = '{{ route('configuraciones.index') }}';
    var columnas = [
        {data: 'id_configuracion', name: 'id_configuracion'},
        {data: 'tipo', name: 'tipo'},
        {data: 'descripcion', name: 'descripcion'},
        {data: 'universidad.nombre', name: 'universidad.nombre'},
        {data: 'estado', name: 'estado'},
        {data: 'action', name: 'action', orderable: false, searchable: false},
    ];
    var titulo = 'Configuración';
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
