@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <!-- Botón para regresar a la página de productos -->
    <div class="mb-6">
        <a href="{{ route('products.index') }}" class="inline-block py-2 px-4 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition-all duration-300 ease-in-out">
            ← Volver a la Tienda
        </a>
    </div>

    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Mis Favoritos</h2>

    @if ($favorites->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($favorites as $product)
                <div class="bg-white shadow-xl rounded-lg p-6 hover:shadow-2xl transition-all duration-300 ease-in-out">
                    <!-- Imagen del producto -->
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-md mb-4 transition-transform duration-300 ease-in-out hover:scale-105">

                    <!-- Nombre y precio del producto -->
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $product->name }}</h3>
                    <p class="text-lg text-teal-500 mb-4">${{ number_format($product->price, 2) }}</p>

                    <!-- Descripción corta del producto -->
                    <p class="text-gray-600 text-sm mb-4">{{ Str::limit($product->description, 100) }}</p>
                    
                    <!-- Botón para eliminar de favoritos -->
                    <form action="{{ route('favorites.destroy', $product->id) }}" method="POST" class="mt-4">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition-all duration-300 ease-in-out flex items-center justify-center">
                            <!-- Icono de eliminar -->
                            <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Eliminar de Favoritos
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-600 text-lg">No tienes productos en tus favoritos.</p>
    @endif
</div>
@endsection


