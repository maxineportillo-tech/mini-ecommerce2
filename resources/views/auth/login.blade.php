@extends('layouts.app')

@section('content')

<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4 text-center">Iniciar Sesión</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-3">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 text-red-800 p-2 rounded mb-3">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium">Correo electrónico</label>
            <input type="email" name="email" id="email" required class="w-full mt-1 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium">Contraseña</label>
            <input type="password" name="password" id="password" required class="w-full mt-1 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition">
            Iniciar sesión
        </button>
    </form>

    <p class="mt-4 text-sm text-center">
        ¿No tienes cuenta? 
        <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Regístrate</a>
    </p>
</div>

@endsection
