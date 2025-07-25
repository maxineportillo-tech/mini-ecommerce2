<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }


    

public function create()
{
    $categories = Category::all();
    return view('products.create', compact('categories'));
}


public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'stock' => 'required|integer|min:0',
        'category_id' => 'required|exists:categories,id',
        'description' => 'nullable|string',
    ]);

    Product::create($validated);

    return redirect()->route('products.index')->with('success', 'Producto creado exitosamente');
}

    public function edit($id)
{
    $product = Product::findOrFail($id);
    $categories = Category::all(); 

    return view('products.edit', compact('product', 'categories'));
}

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
        ]);

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Producto actualizado');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('products.index')->with('success', 'Producto eliminado');
    }
}
