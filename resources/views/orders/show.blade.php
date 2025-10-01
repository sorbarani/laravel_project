<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Card</title>
</head>

<body>
    <h1 style="color:dodgerblue">Order and Products.</h1>
    <hr>
    <h2 style="color: red;">Order</h2>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>User_Id</th>
            <th>Status</th>
            <th>Total_Amount</th>
            <th>Delivery_Amount</th>
            <th>Delivery_Option_Id</th>
            <th>Offer_Amount</th>
            <th>Paying_Amount</th>
            <th>Payment_Status</th>
            <th>Address_Id</Th>
            <th>Shipment_Code</th>
            <th>Order_Type</th>
        </tr>
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->user_id}}</td>
            <td>{{$order->status}}</td>
            <td>{{$order->total_amount}}</td>
            <td>{{$order->delivery_amount}}</td>
            <td>{{$order->delivery_option_id}}</td>
            <td>{{$order->offer_amount}}</td>
            <td>{{$order->paying_amount}}</td>
            <td>{{$order->payment_status}}</td>
            <td>{{$order->address_id}}</td>
            <td>{{$order->shipment_code}}</td>
            <td>{{$order->order_type}}</td>
        </tr>
    </table>
    <hr>


    <h2 style="color:green">Products</h2>
    <table border="1" cellpadding="5">
        <tr>
            <th>Name</th>
            <th>order_id</th>
            <th>sub_product</th>
            <th>offer_id</th>
            <th>offer_id_value</th>
            <th>offer_on_product</th>
            <th>price</th>
            <th>quantity</th>
            <th>subtotal</th>
        </tr>
        @foreach ($order->items as $item)
        <tr>
            <td>{{$item -> product -> name}}</td>
            <td>{{$item -> order_id}}</td>
            <td>{{$item -> sub_product}}</td>
            <td>{{$item -> offer_id}}</td>
            <td>{{$item -> offer_id_value}}</td>
            <td>{{$item -> offer_on_product}}</td>
            <td>{{$item -> price}}</td>
            <td>{{$item -> quantity}}</td>
            <td>{{$item -> subtotal}}</td>
        </tr>
        @endforeach
    </table>

</body>

</html>