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
            'date' => 'required|date',
            'brand_id' => 'required|exists:brand,id',
        ]);

        echo "<br>";
        echo "name :".$array["name"]."<br>";
        echo "price :".$array["price"]."<br>";
        echo "date :".$array["date"]."<br>";
        echo "brand_id:".$array["brand_id"]."<br>";

        Product::create($validated);
    }
}
