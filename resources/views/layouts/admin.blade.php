<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('/css/admin.css')}}">
    <title>Fast Store Admin</title>
</head>
<body>
<div id="app">
    @include('tienda.admin.nav')

    @if(\Session::has('mensaje'))
        @include('layouts.mensaje')
    @endif

    @yield('content')
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/feather-icons@4.28.0/dist/feather.min.js"></script>
<script>
    feather.replace();
</script>

</body>
</html>