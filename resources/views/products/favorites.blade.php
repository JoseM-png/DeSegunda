<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favoritos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-teal-500 shadow-lg">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ route('products.index') }}" class="text-2xl font-bold text-white hover:text-gray-200">
                DeSegunda
            </a>
            <a href="{{ route('favorites.index') }}" class="text-white font-medium hover:text-gray-200">
                Mis Favoritos
            </a>
        </div>
    </nav>

    <!-- Contenido -->
    <div class="container mx-auto px-6 py-8">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Mis Favoritos</h1>

        <!-- Mensaje si no hay favoritos -->
        @if($favorites->isEmpty())
            <div class="text-center mt-16">
                <h2 class="text-2xl font-semibold text-gray-800">Aún no tienes favoritos</h2>
                <p class="text-gray-600 mt-2">¡Descubre los mejores productos y guárdalos como favoritos!</p>
                <a href="{{ route('products.index') }}" class="mt-4 inline-block bg-teal-500 text-white px-6 py-2 rounded-md hover:bg-teal-600">
                    Explorar Productos
                </a>
            </div>
        @else
            <!-- Grid de productos -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-8">
                @foreach($favorites as $product)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800">{{ $product->name }}</h3>
                        <p class="text-gray-600 mt-2">{{ Str::limit($product->description, 50) }}</p>
                        <p class="text-teal-500 text-lg font-bold mt-2">${{ number_format($product->price, 2) }}</p>
                        <div class="flex justify-between items-center mt-4">
                            <a href="{{ route('product.show', $product->id) }}" class="bg-teal-500 text-white px-4 py-2 rounded-md hover:bg-teal-600">
                                Ver Producto
                            </a>
                            <form action="{{ route('favorites.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500 hover:text-red-700">Quitar</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Botón para limpiar favoritos -->
            <div class="text-center mt-8">
                <form action="{{ route('favorites.clear') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
                        Limpiar Favoritos
                    </button>
                </form>
            </div>
        @endif
    </div>

</body>
</html>
