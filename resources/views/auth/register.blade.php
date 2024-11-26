<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-teal-400 via-cyan-500 to-sky-600 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-md">
        <h2 class="text-3xl font-bold text-center text-teal-600 mb-4">Crear Cuenta</h2>
        <p class="text-center text-gray-600 mb-6">Regístrate para acceder</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Campo Nombre -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" id="name" name="name" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500" placeholder="Tu nombre completo" required autofocus>
                @error('name')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campo Correo Electrónico -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                <input type="email" id="email" name="email" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500" placeholder="nombre@ejemplo.com" required>
                @error('email')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campo Contraseña -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" id="password" name="password" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500" placeholder="Contraseña" required>
                @error('password')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirmación de Contraseña -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Contraseña</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500" placeholder="Confirmar contraseña" required>
                @error('password_confirmation')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Botón de Registro -->
            <button type="submit" class="w-full py-3 px-4 bg-teal-500 text-white rounded-lg hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-400">
                Crear Cuenta
            </button>
        </form>

        <!-- Pie de página -->
        <div class="mt-4 text-center">
            <small class="text-gray-600">¿Ya tienes una cuenta? <a href="{{ route('login') }}" class="text-teal-500 hover:text-teal-600">Inicia sesión aquí</a></small>
        </div>
    </div>

</body>

</html>
