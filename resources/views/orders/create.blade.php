@extends('layouts.app')

@section('title', 'Realizar Pedido')

@section('content')
<div class="container mx-auto py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Realizar pedidos</h1>
        <a href="{{ route('orders.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Regresar
        </a>
    </div>
    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    {{-- Buscador de productos --}}
    <div class="mb-6">
        <input type="text" id="searchInput" placeholder="Buscar producto..." class="w-full p-2 border rounded shadow-sm" onkeyup="filterProducts()">
    </div>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <div class="space-y-6" id="productList">
            @foreach ($products as $product)
                <div class="border p-4 rounded shadow-sm product-card">
                    <div class="flex justify-between items-center">
                        <div>
                            <h2 class="text-xl font-semibold product-name">{{ $product->name }}</h2>
                            <p class="text-sm text-gray-600 mb-1">{{ $product->description }}</p>
                            <p class="text-sm"><strong>Precio:</strong> ${{ number_format($product->price, 2) }}</p>
                            <p class="text-sm"><strong>Stock:</strong> {{ $product->stock }}</p>
                        </div>

                        <div>
                            <label for="product_{{ $product->id }}" class="block mb-1">Cantidad</label>
                            <input type="number" name="products[{{ $product->id }}][quantity]" ...>
<input type="hidden" name="products[{{ $product->id }}][product_id]" value="{{ $product->id }}">

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded">
                Confirmar Pedido
            </button>
        </div>
    </form>
</div>

{{-- Script de filtrado --}}
<script>
    function filterProducts() {
        const searchValue = document.getElementById('searchInput').value.toLowerCase();
        const productCards = document.querySelectorAll('.product-card');

        productCards.forEach(card => {
            const name = card.querySelector('.product-name').textContent.toLowerCase();
            card.style.display = name.includes(searchValue) ? 'block' : 'none';
        });
    }
</script>
@endsection
