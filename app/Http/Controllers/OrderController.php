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
    //User Defined Functions
    public function get_price($quantity, $price)
    {
        return $quantity * $price;
    }

    public function create_order($user_id)
    {
        //This function create an order when user hasn't got an order in table.
        $order = Order::create([
            'user_id' =>  $user_id,
            'status' => 0,
            'total_amount' => 0,
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

        //return the order object to the store function.
        return $order;
    }

    public function create_order_product($order, $request, $product)
    {
        //Add a product to order_product table.This for products that hasn't been inserted in the table.
        $order_product = OrderProduct::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'sub_product' => null,
            'offer_id' => null,
            'offer_id_value'=> 0,
            'offer_on_product'=>0,
            'price' => $product->price,
            'quantity'=> $request->quantity,
            'subtotal'=> $this->get_price($request->quantity, $product->price),
        ]);

        //After add we have to update the total amount of orders table.
        $order->update([
            'total_amount' => $order->total_amount + $order_product->subtotal,
        ]);
    }


    public function update_order($order, $request, $product)
    {
        //Get an order_product value from its table base on order_id and product_id.
        //We use theese two keys for more accurate and safe retrieve.
        $order_product = OrderProduct::where('order_id', $order->id)
                                        ->where('product_id', $product->id)
                                        ->first();
        
        //If the specific order_product find we update elsewhere we creat it.
        if($order_product)
        {
            //Yes.
            //newQuantity-> use for update the quantity of product and get price base on it.
            $newQuantity = $order_product->quantity + $request->quantity;
            $order_product->update([
                'quantity' => $newQuantity,
                'subtotal' => $this->get_price($newQuantity, $product->price),
            ]);

            //update total amount.
            $order->update([
                'total_amount' => $order->total_amount + $this->get_price($request->quantity, $product->price),
            ]);

        }
        else
        {            
            //No
            $this->create_order_product($order, $request, $product);
        }
        
        
    }

    //CRUD Functions
    public function index()
    {
        $orders = Order::all();
        $offers = Offer::all(); 
        return view('orders.index', compact('orders', 'offers'));  
    }

    public function store(Request $request, Product $product)
    {
        //This function acts like an entry point for user orders.
        //When a user register an product we create an order and add product to order_product table.
        //If the order already created we just update it and their products in the related order.

        $user_id = 2;
        //check the specific user has already had an order in the table.
        //status must to be check in real scenario.
        $order = Order::where('user_id', $user_id)->first();
        
        $request->validate([
            'quantity' => 'required|integer|min:1|max:10'
        ]);
        
        //If order exist we just update it otherwise we create a new order.
        if($order)
        {
            //Yes
            $this->update_order($order, $request, $product);
            return  redirect()->route('orders.index')->with('success', 'Order updated successfully.');
        }
        else
        {
            //No
            $order = $this->create_order($user_id);
            $this->create_order_product($order, $request, $product);
            return redirect()->route('orders.index')->with('success', 'Order create successfully.');
        }
    }
}