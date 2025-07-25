<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->orders()->latest()->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $products = Product::where('stock', '>', 0)->get();
        return view('orders.create', compact('products'));
    }

    public function store(Request $request)
{
    $user = auth()->user();

    $filtered = collect($request->products)->filter(function ($item) {
        return isset($item['quantity']) && intval($item['quantity']) > 0;
    });

    if ($filtered->isEmpty()) {
        return back()->with('error', 'Debes seleccionar al menos un producto con cantidad mayor a 0.');
    }

    DB::beginTransaction();

    try {
        $total = 0;

        foreach ($filtered as $item) {
            $product = Product::findOrFail($item['product_id']);

            if ($product->stock < $item['quantity']) {
                throw new \Exception("Stock insuficiente para el producto: {$product->name}");
            }

            $total += $product->price * $item['quantity'];
        }

        $order = Order::create([
            'user_id' => $user->id,
            'status' => 'pending',
            'total' => $total,
        ]);

        foreach ($filtered as $item) {
            $product = Product::findOrFail($item['product_id']);

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $item['quantity'],
                'price' => $product->price,
            ]);

            // ✅ Descontar el stock
            $product->stock -= $item['quantity'];
            $product->save();
        }

        DB::commit();

        return redirect()->route('orders.index')->with('success', 'Pedido creado con éxito.');

    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', $e->getMessage());
    }
}


    public function show(Order $order)
    {
        $this->authorize('view', $order); // Opcional: puedes quitar esta línea si no usas políticas
        $order->load('items.product');
        return view('orders.show', compact('order'));
    }
}
