<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ get_setting('site_name', 'Mini Ecommerce') }} - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100 text-gray-800">

<nav class="bg-white p-4 shadow flex justify-between items-center">
    <a href="{{ url('/') }}" class="font-bold text-xl text-blue-600">
        {{ get_setting('site_name', 'Mini Ecommerce') }}
    </a>

    <div class="flex items-center gap-6">
        @auth
            <span class="text-gray-700">Hola, {{ auth()->user()->name }}</span>
            <a href="{{ route('orders.index') }}" class="text-black hover:text-blue-600">Pedidos</a>
            <a href="{{ route('products.index') }}" class="text-black hover:text-blue-600">Productos</a>
            <a href="{{ route('settings.index') }}" class="text-black hover:text-blue-600">Configuración</a>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="text-red-600 hover:underline">Cerrar sesión</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Iniciar sesión</a>
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Registrarse</a>
        @endauth
    </div>
</nav>

<main class="p-6 max-w-6xl mx-auto">
    @yield('content')
</main>

</body>
</html>
