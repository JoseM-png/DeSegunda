<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil | DeSegunda</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-teal-50 min-h-screen">
@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-12">

    <!-- Botón para volver al inicio -->
    <div class="mb-6 text-center">
        <a href="{{ route('products.index') }}" class="inline-block py-3 px-6 bg-teal-500 text-white font-semibold rounded-md hover:bg-teal-600 shadow-lg transform hover:scale-105 transition duration-300 ease-in-out">
            Volver al Inicio
        </a>
    </div>

    <!-- Encabezado de perfil -->
    <div class="bg-white shadow-lg rounded-lg p-8 mb-12">
        <h2 class="text-4xl font-bold text-teal-600 mb-6 text-center">Mi Perfil</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <!-- Información del usuario -->
            <div class="text-gray-800 space-y-4">
                <p class="text-lg"><span class="font-semibold">Nombre:</span> {{ Auth::user()->name }}</p>
                <p class="text-lg"><span class="font-semibold">Correo:</span> {{ Auth::user()->email }}</p>
            </div>

            <!-- Botón para editar perfil -->
            <div class="flex justify-center md:justify-end">
                <a href="{{ route('profile.edit') }}" class="py-3 px-6 bg-teal-500 text-white font-semibold text-sm rounded-md hover:bg-teal-600 shadow-lg transform hover:scale-105 transition duration-300 ease-in-out">
                    Editar Perfil
                </a>
            </div>
        </div>
    </div>

    <!-- Sección de productos -->
    <div class="bg-white shadow-lg rounded-lg p-8">
        <h3 class="text-3xl font-bold text-gray-700 mb-6 text-center">Mis Productos</h3>

        @if($products->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($products as $product)
                    <div class="bg-teal-100 p-6 rounded-lg shadow-md transform hover:scale-105 transition duration-300 ease-in-out">
                        <h4 class="text-xl font-semibold text-gray-800">{{ $product->name }}</h4>
                        <p class="text-gray-600 mt-2">{{ Str::limit($product->description, 60, '...') }}</p>
                        <p class="text-lg font-medium text-gray-800 mt-4">${{ number_format($product->price, 2) }}</p>
                        <a href="{{ route('product.show', $product->id) }}" class="mt-4 inline-block py-2 px-4 bg-teal-500 text-white rounded-md hover:bg-teal-600 shadow transform hover:scale-105 transition duration-300 ease-in-out">
                            Ver Producto
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-600 text-center text-lg">No tienes productos listados aún.</p>
        @endif

        <!-- Botón para agregar un producto -->
        <div class="mt-8 text-center">
            <a href="{{ route('product.create') }}" class="inline-block py-3 px-6 bg-green-500 text-white font-semibold rounded-md hover:bg-green-600 shadow-lg transform hover:scale-105 transition duration-300 ease-in-out">
                Agregar Producto
            </a>
        </div>
    </div>
</div>
@endsection


</body>
</html>

