<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        // $products = Product::all();
        $products = Product::with('brand')->get();
        return view('products', compact('products'));
    }

    public function store(Request $request)
    {
        //store the user input
        // $value = request()->product;
        $array =  request()->all();
        // var_dump($array);
        
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

        echo "<br>";
        echo "name :".$array["name"]."<br>";
        echo "price :".$array["price"]."<br>";
        echo "date :".$array["created_at"]."<br>";
        echo "brand_id:".$array["brand_id"]."<br>";
        echo "brand_id:".$array["image"]."<br>";

        Product::create($validated);
    }
}
