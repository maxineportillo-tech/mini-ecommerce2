@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4 text-center">Editar Producto</h2>
@if(!isset($categories))
    <div style="color:red;">Categorías no disponibles.</div>
@endif

    @if($errors->any())
        <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('products.update', $product->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium">Nombre</label>
            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required class="w-full mt-1 p-2 border rounded">
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium">Descripción</label>
            <textarea name="description" id="description" required class="w-full mt-1 p-2 border rounded">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="price" class="block text-sm font-medium">Precio</label>
            <input type="number" name="price" id="price" step="0.01" min="0" value="{{ old('price', $product->price) }}" required class="w-full mt-1 p-2 border rounded">
        </div>

        <div class="mb-4">
            <label for="stock" class="block text-sm font-medium">Stock</label>
            <input type="number" name="stock" id="stock" min="0" value="{{ old('stock', $product->stock) }}" required class="w-full mt-1 p-2 border rounded">
        </div>

        <div class="mb-4">
    <label for="category_id" class="block text-sm font-medium text-gray-700">Categoría</label>
    <select name="category_id" id="category_id" required
        class="w-full mt-1 p-2 border rounded">
        <option value="">Seleccione una categoría</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>


        <div class="flex justify-between items-center">
            <a href="{{ route('products.index') }}" class="text-sm text-blue-600 hover:underline">← Volver</a>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Guardar Cambios
            </button>
        </div>
    </form>
</div>
@endsection
