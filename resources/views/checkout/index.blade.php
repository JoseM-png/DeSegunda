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

        <!-- Formulario de pago -->
        <form action="{{ route('checkout.process', $product->id) }}" method="POST">
            @csrf

            <!-- Datos de la tarjeta -->
            <div class="mb-4">
                <label for="card_number" class="block text-gray-700">Número de tarjeta</label>
                <input type="text" id="card_number" name="card_number" class="w-full p-3 border border-gray-300 rounded-md mt-2" placeholder="1234 5678 9101 1121" required>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="expiry_date" class="block text-gray-700">Fecha de Expiración</label>
                    <input type="month" id="expiry_date" name="expiry_date" class="w-full p-3 border border-gray-300 rounded-md mt-2" required>
                </div>
                <div>
                    <label for="cvv" class="block text-gray-700">CVV</label>
                    <input type="text" id="cvv" name="cvv" class="w-full p-3 border border-gray-300 rounded-md mt-2" placeholder="123" required>
                </div>
            </div>

            <!-- Botón de Confirmar Compra -->
            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                Confirmar Compra
            </button>
        </form>
    </div>
</body>
</html>

