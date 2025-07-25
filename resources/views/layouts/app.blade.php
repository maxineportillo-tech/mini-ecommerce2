<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Ecommerce</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">

    {{-- Barra de navegación superior --}}
    <nav class="bg-white p-4 shadow flex justify-between items-center">
        <a href="{{ url('/') }}" class="font-bold text-xl text-blue-600">Mini Ecommerce</a>
        <div>
            @auth
                <span class="mr-4">Hola, {{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-red-600 hover:underline">Cerrar sesión</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="mr-4 text-blue-600 hover:underline">Iniciar sesión</a>
                <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Registrarse</a>
            @endauth
        </div>
    </nav>

    {{-- Contenido de la vista --}}
    <main class="p-6 max-w-6xl mx-auto">
        @yield('content')
    </main>

</body>
</html>
