<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos | DeSegunda</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-teal-400 via-cyan-500 to-sky-600 min-h-screen">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg py-4">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <!-- Logo -->
            <h1 class="text-3xl font-bold text-teal-600">DeSegunda</h1>
            <div class="relative group">
                <button class="flex items-center text-gray-800 hover:text-gray-600 focus:outline-none">
                    <span class="mr-2">Menú</span>
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
                <div class="absolute right-0 mt-2 bg-white rounded-md shadow-lg w-48 opacity-0 group-hover:opacity-100 transition-opacity">
                    <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Perfil</a>
                    <a href="{{ route('product.create') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Vender Producto</a>
                    <a href="{{ route('favorites.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Favoritos</a>
                    <a href="{{ route('notifications.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Notificaciones</a>
                    <form method="POST" action="{{ route('logout') }}" class="block px-4 py-2">
                        @csrf
                        <button type="submit" class="w-full text-left text-gray-700 hover:bg-gray-100">Cerrar Sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-6 py-12">
        <h2 class="text-4xl font-semibold text-white text-center mb-8">Productos Disponibles</h2>

        <!-- Filtro de categoría -->
        <div class="mb-6 text-center">
            <form action="{{ route('products.index') }}" method="GET">
                <select name="category" class="p-3 w-64 border border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500 transition duration-300 ease-in-out hover:shadow-lg">
                    <option value="">Selecciona una categoría</option>
                    <option value="hogar" {{ request('category') == 'hogar' ? 'selected' : '' }}>Hogar</option>
                    <option value="tecnologia" {{ request('category') == 'tecnologia' ? 'selected' : '' }}>Tecnología</option>
                    <option value="moda" {{ request('category') == 'moda' ? 'selected' : '' }}>Moda</option>
                    <option value="decoracion" {{ request('category') == 'decoracion' ? 'selected' : '' }}>Decoración</option>
                    <option value="otros" {{ request('category') == 'otros' ? 'selected' : '' }}>Otros</option>
                </select>
                <button type="submit" class="mt-4 py-2 px-4 bg-teal-500 text-white font-semibold rounded-md hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-400 focus:ring-opacity-75">Filtrar</button>
            </form>
        </div>

        <!-- Productos -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @forelse ($products as $product)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition-all hover:scale-105 hover:shadow-xl">
                    <img src="{{ $product->image_url ? asset('storage/products/' . $product->image_url) : 'default_image.jpg' }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-md mb-4 transition-transform duration-300 ease-in-out">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800">{{ $product->name }}</h3>
                        <p class="text-teal-500 text-lg mt-2">${{ number_format($product->price, 2) }}</p>
                        <p class="text-gray-600 text-sm mt-2">{{ Str::limit($product->description, 100) }}</p>
                        <div class="flex justify-between items-center mt-4">
                            <a href="{{ route('product.show', $product->id) }}" class="bg-teal-500 text-white px-4 py-2 rounded-md hover:bg-teal-600 transition duration-300 ease-in-out">Más Info</a>
                            <!-- Agregar a favoritos -->
                            <form action="{{ route('favorites.store', $product->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 transition duration-300 ease-in-out">
                                    <svg class="w-5 h-5 mr-2 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7 7 7-7-7-7-7 7z"/>
                                    </svg>
                                    Favoritos
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-white text-xl">No hay productos disponibles para esta categoría.</p>
            @endforelse
        </div>
    </div>

</body>

</html>

