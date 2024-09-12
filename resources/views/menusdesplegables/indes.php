<!DOCTYPE html>
<html>
<head>
    <title>Menús Desplegables</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">

    <style>
        .menu-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        .menu-list li {
            margin: 5px 0;
        }
        .menu-details {
            display: none;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Menús Desplegables</h2>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>Nombre del Menú Principal</th>
                <th>Menús Asociados</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menuPrincipal)
            <tr>
                <td>
                    <button class="btn btn-primary btn-sm toggle-menu" data-id="{{ $menuPrincipal->id_menu_principal }}">
                        {{ $menuPrincipal->nombre }}
                    </button>
                </td>
                <td>
                    <div class="menu-details" id="menu-details-{{ $menuPrincipal->id_menu_principal }}">
                        <ul class="menu-list">
                            @foreach($menuPrincipal->menus as $menu)
                                <li>{{ $menu->nombre }}</li>
                            @endforeach
                        </ul>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('.data-table').DataTable({
        "ordering": false, // Desactiva el ordenamiento por defecto
        "paging": false,   // Desactiva la paginación
        "info": false       // Desactiva la información de la tabla
    });

    $('.toggle-menu').click(function() {
        var menuId = $(this).data('id');
        var details = $('#menu-details-' + menuId);
        details.toggle(); // Alterna la visibilidad
    });
});
</script>
</body>
</html>