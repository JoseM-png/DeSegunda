<nav class="bg-white shadow-lg">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <!-- Nombre del sitio -->
        <h1 class="text-2xl font-bold text-gray-800">
            <a href="{{ url('/') }}">Tienda</a>
        </h1>

        <!-- Menú desplegable -->
        <div class="relative">
            <button id="menu-btn" class="text-gray-800 hover:text-gray-600 focus:outline-none focus:text-gray-600">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
            <div id="menu" class="absolute right-0 mt-2 bg-white rounded-md shadow-lg w-48 hidden">
                <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Perfil</a>
                <a href="{{ route('product.create') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Vender Producto</a>
                <a href="{{ route('favorites.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Favoritos</a>
                <a href="{{ route('notifications.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Notificaciones</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 text-red-500 hover:bg-gray-100">Cerrar Sesión</button>
                </form>
            </div>
        </div>
    </div>
</nav>

<script>
    document.getElementById('menu-btn').addEventListener('click', () => {
        const menu = document.getElementById('menu');
        menu.classList.toggle('hidden');
    });
</script>
