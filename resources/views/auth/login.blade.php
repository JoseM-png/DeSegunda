<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión | DeSegunda</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-teal-400 via-cyan-500 to-sky-600 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-md">
        <!-- Branding -->
        <div class="flex flex-col items-center mb-8">
            <div class="bg-teal-500 rounded-full w-24 h-24 flex items-center justify-center shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18m-7 5h7" />
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-gray-700 mt-4">DeSegunda</h1>
            <p class="text-sm text-gray-500">Compra y vende artículos de segunda mano</p>
        </div>

        <!-- Formulario -->
        <h2 class="text-3xl font-bold text-center text-teal-600 mb-4">¡Bienvenido de nuevo!</h2>
        <p class="text-center text-gray-600 mb-6">Inicia sesión para explorar y vender productos</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                <input type="email" id="email" name="email" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500" placeholder="nombre@ejemplo.com" required autofocus>
                @error('email')
                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" id="password" name="password" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500" placeholder="Contraseña" required>
                @error('password')
                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <input type="checkbox" id="remember" name="remember" class="mr-2">
                    <label for="remember" class="text-sm text-gray-600">Recordarme</label>
                </div>
                <a href="#" class="text-sm text-teal-500 hover:underline">¿Olvidaste tu contraseña?</a>
            </div>

            <button type="submit" class="w-full py-3 px-4 bg-teal-500 text-white rounded-lg hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-400">
                Iniciar Sesión
            </button>
        </form>

        <div class="mt-6 text-center">
            <p class="text-gray-600">¿No tienes una cuenta? <a href="{{ route('register') }}" class="text-teal-500 hover:text-teal-600 font-medium">Regístrate aquí</a></p>
        </div>
    </div>
</body>

</html>

