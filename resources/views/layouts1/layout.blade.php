<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie-edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title')</title>
</head>
<body>
  <div class="header">
<h1>Bienvenidos a mi crud mal hecho</h1>
  </div>

  <div>
    @yield('content')
    <div>
      {!! session('data_session')['menu'] !!}
    </div>
  </div>
</body>

<script src="{{ URL::asset('js/crud.js') }}"></script>
</html>