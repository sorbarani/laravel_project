<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function get_price($quantity, $price)
    {
        return $quantity * $price;
    }
    public function show(Product $product , Request $request)
    {
        // return "hello";  
        // dd($product);
        return $request->quantity;    
    }
    public function create(Product $product, Request $request)
    {
        $validate = $request->validate([
            'quantity' => 'required|integer|min:1|max:10'
        ]);

        Order::create([
            'user_id' => 1,
            'status' => 1,
            'total_amount' => $this->get_price($request->quantity, $product->price),
            'delivery_amount' => 0,
            'delivery_option_id' => null,
            'offer_amount' => 0,
            'paying_amount' => 0,
            'payment_status' => 0,
            'address_id' => null,
            'shipment_code' => null,
            'order_type' => 0,
            'description' => "",
            'slug' => Str::random(16)
        ]);

        echo "Total amount is: ".$this->get_price($request->quantity, $product->price );

        echo "Created";
    }

}
