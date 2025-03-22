<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10); // Better for large datasets
        return view('product', compact('products')); // Match your blade file name
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'status' => 'required|in:active,inactive', // More specific validation
            'description' => 'nullable|string',
        ]);

        Product::create($validated);

        return redirect()->route('products')->with('success', 'Product added successfully');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'status' => 'required|in:active,inactive',
            'description' => 'nullable|string',
        ]);

        $product = Product::findOrFail($id);
        $product->update($validated);

        return redirect()->route('products')->with('success', 'Product updated successfully');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products')->with('success', 'Product deleted successfully');
    }
}