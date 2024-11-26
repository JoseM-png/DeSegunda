<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Aplicación')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    @include('partials.navbar')
    <main class="py-4">
        @yield('content')
    </main>
</body>
</html>
