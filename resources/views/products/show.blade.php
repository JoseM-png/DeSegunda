<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Producto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-gray-800">Tienda</h1>
            <div class="relative">
                <!-- Botón para abrir el menú desplegable -->
                <button id="menu-btn" class="text-gray-800 hover:text-gray-600 focus:outline-none focus:text-gray-600">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>

                <!-- Menú desplegable -->
                <div id="menu" class="absolute right-0 mt-2 bg-white rounded-md shadow-lg w-48 hidden">
                    <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                        Perfil
                    </a>
                    <a href="{{ route('product.create') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                        Vender Producto
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Detalles del Producto -->
    <div class="container mx-auto px-6 py-8">
    <div class="bg-white rounded-lg shadow-md p-6">
        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-64 object-cover rounded-md mb-6">
        <h2 class="text-3xl font-semibold text-gray-800">{{ $product->name }}</h2>
        <p class="text-gray-600 mt-2">${{ number_format($product->price, 2) }}</p>
        <p class="text-gray-600 mt-4">{{ $product->description }}</p>
        <div class="mt-6 flex space-x-4">
            <form action="{{ route('favorites.store', $product->id) }}" method="POST">
                @csrf
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">
                    Guardar en Favoritos
                </button>
            </form>
            <a href="{{ route('checkout', $product->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600">
                Comprar
            </a>
        </div>
    </div>
</div>


    <script>
        // Script para manejar el menú desplegable
        document.getElementById('menu-btn').addEventListener('click', () => {
            const menu = document.getElementById('menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>

