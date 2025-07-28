@extends('layouts.app')

@section('title', 'Mis Pedidos')

@section('content')
<div class="container mx-auto py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Productos</h1>
        <a href="{{ route('orders.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Nuevo Pedido
        </a>
        
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($orders->isEmpty())
        <p>No tienes pedidos todavía.</p>
    @else
        <table class="min-w-full bg-white shadow rounded overflow-hidden">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-3 px-5 text-left">ID Pedido</th>
                    <th class="py-3 px-5 text-left">Estado</th>
                    <th class="py-3 px-5 text-left">Total</th>
                    <th class="py-3 px-5 text-left">Fecha</th>
                    <th class="py-3 px-5 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="py-3 px-5">{{ $order->id }}</td>
                        <td class="py-3 px-5 capitalize">{{ $order->status }}</td>
                        <td class="py-3 px-5">${{ number_format($order->total, 2) }}</td>
                        <td class="py-3 px-5">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                        <td class="py-3 px-5">
                            <a href="{{ route('orders.show', $order->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded">
                                Ver detalles
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
