<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto | DeSegunda</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-teal-400 via-cyan-500 to-sky-600 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
        <h2 class="text-3xl font-semibold text-center text-teal-600 mb-6">Añadir Nuevo Producto</h2>

        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Nombre del producto -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre del Producto</label>
                <input type="text" id="name" name="name" required
                    class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500 transition duration-300 ease-in-out hover:shadow-lg">
            </div>

            <!-- Descripción -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea id="description" name="description" required
                    class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500 transition duration-300 ease-in-out hover:shadow-lg"></textarea>
            </div>

            <!-- Precio -->
            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Precio</label>
                <input type="number" id="price" name="price" required
                    class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500 transition duration-300 ease-in-out hover:shadow-lg">
            </div>

            
            <div class="mb-4">
                <label for="category" class="block text-sm font-medium text-gray-700">Categoría del Producto</label>
                <select id="category" name="category" class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500 transition duration-300 ease-in-out hover:shadow-lg">
                    <option value="">Selecciona una categoría</option>
                    <option value="hogar">Hogar</option>
                    <option value="tecnologia">Tecnología</option>
                    <option value="moda">Moda</option>
                    <option value="decoracion">Decoración</option>
                    <option value="otros">Otros</option>
                </select>
            </div>


            <!-- Subir imagen del producto -->
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Imagen del Producto</label>
                <input type="file" id="image" name="image" accept="image/*"
                    class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500 transition duration-300 ease-in-out hover:shadow-lg">
            </div>

            <!-- Botón de submit -->
            <button type="submit"
                class="w-full py-3 px-4 bg-teal-500 text-white font-semibold rounded-md hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-400 transition duration-300 ease-in-out">
                Crear Producto
            </button>
        </form>
    </div>

</body>

</html>

