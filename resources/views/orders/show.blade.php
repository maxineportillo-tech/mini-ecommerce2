@extends('layouts.app')

@section('title', 'Detalles del Pedido')

@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-3xl font-bold mb-4">Pedido #{{ $order->id }}</h1>

    <p><strong>Estado:</strong> {{ ucfirst($order->status) }}</p>
    <p><strong>Fecha:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
    <p><strong>Total:</strong> ${{ number_format($order->total, 2) }}</p>

    <h2 class="text-2xl font-semibold mt-6 mb-2">Productos</h2>
    <table class="min-w-full bg-white shadow rounded">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 text-left">Producto</th>
                <th class="px-4 py-2 text-left">Cantidad</th>
                <th class="px-4 py-2 text-left">Precio</th>
                <th class="px-4 py-2 text-left">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $item->product->name }}</td>
                    <td class="px-4 py-2">{{ $item->quantity }}</td>
                    <td class="px-4 py-2">${{ number_format($item->price, 2) }}</td>
                    <td class="px-4 py-2">${{ number_format($item->quantity * $item->price, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
