@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-6">Registrarse</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <label class="block mb-2 font-semibold" for="name">Nombre</label>
        <input
            id="name"
            type="text"
            name="name"
            value="{{ old('name') }}"
            required
            class="w-full px-3 py-2 border rounded mb-4 focus:outline-none focus:ring-2 focus:ring-blue-600"
        >

        <label class="block mb-2 font-semibold" for="email">Correo electrónico</label>
        <input
            id="email"
            type="email"
            name="email"
            value="{{ old('email') }}"
            required
            class="w-full px-3 py-2 border rounded mb-4 focus:outline-none focus:ring-2 focus:ring-blue-600"
        >

        <label class="block mb-2 font-semibold" for="password">Contraseña</label>
        <input
            id="password"
            type="password"
            name="password"
            required
            class="w-full px-3 py-2 border rounded mb-4 focus:outline-none focus:ring-2 focus:ring-blue-600"
        >

        <label class="block mb-2 font-semibold" for="password_confirmation">Confirmar contraseña</label>
        <input
            id="password_confirmation"
            type="password"
            name="password_confirmation"
            required
            class="w-full px-3 py-2 border rounded mb-6 focus:outline-none focus:ring-2 focus:ring-blue-600"
        >

        <button
            type="submit"
            class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition"
        >
            Registrarse
        </button>
    </form>
</div>
@endsection
