@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4 text-center">Tus Notificaciones</h1>

    @if($notifications->isEmpty())
        <p class="text-gray-500 text-center">No tienes notificaciones.</p>
    @else
        <div class="space-y-4">
            @foreach($notifications as $notification)
                <div class="p-4 bg-white rounded-lg shadow border">
                    <!-- Aquí puedes agregar un color para diferenciarlas -->
                    <div class="flex items-center space-x-2">
                        <svg class="w-6 h-6 text-teal-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19l7-7-7-7" />
                        </svg>
                        <p class="text-gray-800">{{ $notification->data['message'] ?? 'Nueva notificación' }}</p>
                    </div>
                    <small class="text-gray-500">{{ $notification->created_at->diffForHumans() }}</small>
                </div>
            @endforeach
        </div>
    @endif

    <!-- Botón para volver al inicio -->
    <div class="mt-6 text-center">
        <a href="{{ route('products.index') }}" class="bg-teal-500 text-white px-4 py-2 rounded-md hover:bg-teal-600 transition duration-300 ease-in-out">
            Volver al inicio
        </a>
    </div>
</div>
@endsection

