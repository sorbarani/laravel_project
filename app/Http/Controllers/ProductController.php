<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('brand')->paginate(3);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $brands = Brand::all();
        return view('products.create', compact('brands'));
    }

    public function store(Request $request)
    {       
        $validated = $request->validate([
            'name' => 'required|string|min:1|max:255',
            'price' => 'required|numeric|min:0',
            'created_at' => 'required|date',
            'brand_id' => 'required|exists:brand,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:5048'
        ]);

        if($request->hasFile('image')){
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $brands = Brand::all();
        return view('products.edit', compact('product','brands'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:1|max:255',
            'price' => 'required|numeric|min:0',
            'created_at' => 'required|date',
            'brand_id' => 'required|exists:brand,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:5048'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'product Deleted successfully.');
    }
}
