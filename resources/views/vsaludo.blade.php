<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <h1>Hola desde saludo vista</h1> -->
    @extends ('layout')
    @section('contenido')
    <h1>Datos de Personas</h1>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>CI</th>
            <th>PATERNO</th>
            <th>MATERNO</th>
            <th>NOMBRE</th>
        </tr>
        </thead>
<tbody>
    @foreach($data as $p)
    <tr>
        <th>{{ $p->id }}</th>
        <th>{{ $p->ci }}</th>
        <th>{{ $p->paterno }}</th>
        <th>{{ $p->materno }}</th>
        <th>{{ $p->nombre }}</th>
    </tr>
    @endforeach
</tbody>
    </table>
    @endsection
</body>
</html>