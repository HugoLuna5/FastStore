<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast - @yield('titulo')</title>
</head>
<body>

    @include('tienda.secciones.menu')
    @yield('contenido')
    @include('tienda.secciones.footer')
    
</body>
</html>