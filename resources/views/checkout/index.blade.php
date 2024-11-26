<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagar Producto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-lg">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Proceso de Pago</h2>

        <!-- Información del producto -->
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h3>
            <p class="text-gray-600 mt-2">Precio: ${{ number_format($product->price, 2) }}</p>
            <p class="text-gray-600 mt-2">{{ $product->description }}</p>
        </div>

        <!-- Botón de Confirmar Compra -->
        <form action="{{ route('checkout.process', $product->id) }}" method="POST">
            @csrf
            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                Confirmar Compra
            </button>
        </form>
    </div>
</body>
</html>
