@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-6 max-w-lg">
    <h2 class="text-2xl font-bold mb-4">Crear nuevo producto</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <label for="name" class="block font-semibold mb-1">Nombre</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required
            class="w-full border border-gray-300 rounded p-2 mb-4">

        <label for="price" class="block font-semibold mb-1">Precio</label>
        <input type="number" name="price" id="price" value="{{ old('price') }}" step="0.01" required
            class="w-full border border-gray-300 rounded p-2 mb-4">

        <label for="category_id" class="block font-semibold mb-1">Categoría</label>
<select name="category_id" id="category_id" required class="w-full border border-gray-300 rounded p-2 mb-4">
    <option value="" disabled selected>Selecciona una categoría</option>
    @foreach($categories as $category)
        <option value="{{ $category->id }}" {{ old('category_id') == $category->id }}>
    {{ $category->name }}
</option>


    @endforeach
</select>


            
            
            <div class="mb-4">
            <label for="stock" class="block text-sm font-medium">Stock</label>
            <input type="number" name="stock" id="stock" required min="0" class="w-full mt-1 p-2 border rounded" value="{{ old('stock') }}">
        </div>


        <label for="description" class="block font-semibold mb-1">Descripción</label>
        <textarea name="description" id="description" rows="4" 
            class="w-full border border-gray-300 rounded p-2 mb-4">{{ old('description') }}</textarea>

        <div class="flex justify-between items-center"> 
         <a href="{{ route('products.index') }}" class="text-sm text-blue-600 hover:underline">← Volver</a>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Guardar
        </button>
</div>
    </form>
</div>
@endsection
