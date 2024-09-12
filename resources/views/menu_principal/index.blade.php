@extends('layout')

@section('contenido')
    <h1>Listado de Menús Principales</h1>

    <!-- Incluir las dependencias de DataTables -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Ícono</th>
                            <th>Orden</th>
                            <th>Módulo</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Incluir los scripts necesarios para DataTables -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

    <!-- Inicialización de DataTables -->
    <script type="text/javascript">
        $(function () {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('menu_principal.index') }}",
                columns: [
                    {data: 'id_menu_principal', name: 'id_menu_principal'},
                    {data: 'nombre', name: 'nombre'},
                    {data: 'icono', name: 'icono'},
                    {data: 'orden', name: 'orden'},
                    {data: 'modulo.nombre', name: 'modulo.nombre'},
                    {data: 'estado', name: 'estado'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endsection
