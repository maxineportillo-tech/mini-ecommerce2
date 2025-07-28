@extends('layouts.app')

@section('title', 'Configuración de Usuario')

@section('content')
<div class="flex flex-col md:flex-row gap-6">

    <!-- Menú lateral -->
    <aside class="md:w-1/4 bg-white p-4 rounded shadow h-max">
        <h2 class="text-lg font-semibold mb-4 text-blue-700">Opciones</h2>
        <ul class="space-y-2">
            <li>
                <a href="{{ route('settings.index') }}"
                   class="block px-3 py-2 rounded bg-blue-100 text-blue-800 hover:bg-blue-200">
                    Configuración de Usuario
                </a>
            </li>
            <li>
                <a href="{{ route('site-settings.edit') }}"
                   class="block px-3 py-2 rounded bg-green-100 text-green-800 hover:bg-green-200">
                    Configuración del Sitio
                </a>
            </li>
        </ul>
    </aside>

    <!-- Formulario principal -->
    <div class="md:w-3/4 bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Configuración de Usuario</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('settings.user.update') }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="name">Nombre</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name', $user->name) }}"
                    class="w-full border border-gray-300 rounded px-4 py-2"
                    required
                >
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="email">Correo electrónico (no editable)</label>
                <input
                    type="email"
                    id="email"
                    value="{{ $user->email }}"
                    disabled
                    class="w-full bg-gray-200 border border-gray-300 rounded px-4 py-2"
                >
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="password">Nueva Contraseña</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="w-full border border-gray-300 rounded px-4 py-2"
                    placeholder="Deja vacío para no cambiar"
                >
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="password_confirmation">Confirmar Contraseña</label>
                <input
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    class="w-full border border-gray-300 rounded px-4 py-2"
                    placeholder="Deja vacío para no cambiar"
                >
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Actualizar Usuario
            </button>
        </form>
    </div>
</div>
@endsection
