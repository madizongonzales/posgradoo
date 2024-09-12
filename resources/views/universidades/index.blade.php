@extends('layout')

@section('title', 'Lista de Universidades')

@section('content')
    <!DOCTYPE html>
    <html>

    <head>
        <title>Laravel 11 DataTable</title>
    </head>

    <body>
        <div class="container mt-4">
            <h2>Lista de Universidades</h2>
            <a class="btn btn-warning m-3" id="createNewRecord">Agregar nueva universidad</a>

            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Nombre Abreviado</th>
                        <th>Inicial</th>
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
                            <input type="hidden" name="id_universidad" id="table_id">
                            <div class="form-group">
                                <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                        placeholder="Ingresa nombre">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nombre_abreviado" class="col-sm-4 control-label">Nombre Abreviado</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="nombre_abreviado" name="nombre_abreviado"
                                        placeholder="Ingresa nombre abreviado">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inicial" class="col-sm-2 control-label">Inicial</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="inicial" name="inicial"
                                        placeholder="Ingresa inicial">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="estado" class="col-sm-2 control-label">Estado</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="estado" name="estado"
                                        placeholder="Ingresa estado">
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
            var URLindex = '{{ route('universidades.index') }}';
            var columnas = [{
                    data: 'id_universidad',
                    name: 'id_universidad'
                },
                {
                    data: 'nombre',
                    name: 'nombre'
                },
                {
                    data: 'nombre_abreviado',
                    name: 'nombre_abreviado'
                },
                {
                    data: 'inicial',
                    name: 'inicial'
                },
                {
                    data: 'estado',
                    name: 'estado'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ];
            var titulo = 'Universidad';
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
