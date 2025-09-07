<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class post extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('index', compact('products'));
    }

    public function store(Request $request)
    {
        //store the user input
        // $value = request()->product;
        $array =  request()->all();
        // var_dump($array);
        
        echo "<br>";
        echo "name :".$array["product"]."<br>";
        echo "price :".$array["price"]."<br>";
        echo "date :".$array["date"]."<br>";
        echo "producer :".$array["producer"]."<br>";

        Product::create([
        'name'=>$array['product'],
        'price'=>$array['price'],
        'created_at'=>$array['date'],
        'producer'=>$array['producer'],
        ]);
    }
}
