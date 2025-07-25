@extends('layouts.app')

@section('title', 'Productos')

@section('content')
<div class="container mx-auto py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Productos</h1>
        <a href="{{ route('products.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Nuevo Producto
        </a>
        <a href="{{ route('orders.index') }}" type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Pedidos</a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
     
    
    <table class="min-w-full bg-white shadow rounded overflow-hidden">
        <thead class="bg-gray-200">
            <tr>
                <th class="py-3 px-5 text-left">Nombre</th>
                <th class="py-3 px-5 text-left">Precio</th>
                <th class="py-3 px-5 text-left">Categoría</th>
                <th class="py-3 px-5 text-left">Stock</th>
                <th class="py-3 px-5 text-left">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr class="border-t hover:bg-gray-50">
                    <td class="py-3 px-5">{{ $product->name }}</td>
                    <td class="py-3 px-5">${{ number_format($product->price, 2) }}</td>
                    <td class="py-3 px-5">
                        {{ $product->category ? $product->category->name : 'Sin categoría' }}
                    </td>
                    <td class="py-3 px-5">{{ $product->stock }}</td>
                    <td class="py-3 px-5 space-x-2">
                        <a href="{{ route('products.edit', $product->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">
                            Editar
                        </a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline" onsubmit="return confirm('¿Seguro que quieres eliminar este producto?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
