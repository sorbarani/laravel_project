<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Order;
use App\Models\Offer;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\OrderProductController;

class OrderController extends Controller
{
    //
    public function get_price($quantity, $price)
    {
        return $quantity * $price;
    }

    public function index()
    {
        $orders = Order::all();
        $offers = Offer::all(); 
        return view('orders.index', compact('orders', 'offers'));  
    }

    public function store(Request $request, Product $product)
    {
        $validate = $request->validate([
            'quantity' => 'required|integer|min:1|max:10'
        ]);


        $order = Order::create([
            'user_id' =>  2,
            'status' => 0,
            'total_amount' => 1200,
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

        OrderProduct::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'sub_product' => 0,
            'offer_id' => 0,
            'offer_id_value'=> 0,
            'offer_on_product'=>0,
            'price' => $product->price,
            'quantity'=> $request->quantity,
            'subtotal'=> $this->get_price($request->quantity, $product->price),
        ]);

        // echo "Total amount is: ".$this->get_price($request->quantity, $product->price );

        echo "Created";
    }

    public function set_offer(Request $request, Order $order, Offer $offer)
    {
        //
        $offer = Offer::find($request->offer);
        $order_product = OrderProduct::find($order->id);
        
        $order_product->update([
            'offer_id' => $offer->id,
            'offer_id_value' => $offer->value,
            'offer_on_product' => 1,
        ]);

        $order->update([
            'total_amount' => $order_product->subtotal,
            'offer_amount' => $offer->value,
            'paying_amount' => ($order->total_amount - $offer->value) + $order->delivery_amount,
        ]);

        return redirect()->route('orders.index')->with('sccess' , 'Offer set successfully');
    }
}
