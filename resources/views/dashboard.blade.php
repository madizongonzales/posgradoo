<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Bienvenido, {{ Session::get('data_session.nombres') }}</h2>
        <p>Este es tu dashboard.</p>
        <a href="{{ route('logout') }}" class="btn btn-danger">Cerrar Sesión</a>

        <nav>
            <ul>
                {!! Session::get('data_session.menu') !!}
            </ul>
        </nav>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>