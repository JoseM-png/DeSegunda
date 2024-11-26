@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Tus Notificaciones</h1>

    @if($notifications->isEmpty())
        <p class="text-gray-500">No tienes notificaciones.</p>
    @else
        <div class="space-y-4">
            @foreach($notifications as $notification)
                <div class="p-4 bg-white rounded-lg shadow border">
                    <p class="text-gray-800">{{ $notification->data['message'] ?? 'Nueva notificación' }}</p>
                    <small class="text-gray-500">{{ $notification->created_at->diffForHumans() }}</small>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
