<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Mi Aplicación')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>@yield('title')</title>
    <!-- Incluye Bootstrap u otro framework CSS si no lo has hecho -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>@yield('title', 'Laravel DataTable')</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Estilos personalizados -->
    <style>
        body {
            display: flex;
            flex-direction: column;
        }

        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            height: 100vh;
            padding-top: 20px;
            position: fixed;
        }

        .sidebar a {
            color: white;
            display: block;
            padding: 10px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .content {
            margin-left: 260px;
            /* Espacio para la barra lateral */
            padding: 20px;
        }

        .navbar-custom {
            padding-left: 260px;
            background-color: #343a40;
        }

        .navbar-custom .navbar-brand,
        .navbar-custom .navbar-nav .nav-link {
            color: white;
        }
    </style>
</head>

<body>
    <!-- Navbar superior -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            {{-- <a class="navbar-brand" href="#">Mi Aplicación</a> --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('universidades.index') }}">Universidades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('areas.index') }}">Áreas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('facultades.index') }}">Facultades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('menus.index') }}">Menus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('roles.index') }}">Roles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('menus_principales.index') }}">Menús Principales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('roles_menus_principales.index') }}">Roles menus
                            Principales</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>

    <!-- Sidebar dinámico -->
    <div class="sidebar">
        <h1>Menú</h2>
            <div class="user-info">
                <h4>Usuario: {{ session('username') }}</h4>
            </div>
            <ul class="list-unstyled">
                @if (session()->has('menu'))
                    {!! session('menu') !!}
                @else
                    <li>No hay elementos en el menú.</li>
                @endif
            </ul>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
            </form>
    </div>


    <!-- Contenido principal -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
