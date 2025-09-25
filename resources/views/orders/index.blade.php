<!DOCTYPE html>
<html>

<head>
    <title>Products</title>
</head>

<body>
    <h1 style="color:blueviolet;">All Orders</h1>
    <hr>
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
            <th colspan="2">Set Offer On Order</th>
        </tr>
        @foreach($orders as $order)
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
            <form action="{{route('orders.setoffer', $order->id)}}" method="post">
                @CSRF
                <td>
                    <select name='offer' required>
                        <option>-- Select Offer ---</option>
                        @foreach ($offers as $offer)
                        <option value="{{$offer->id}}">{{$offer->name}}</option>
                        @endforeach
                    </select>
                </td>

                <td>
                    <button type="submit">Set Offer </button>
                </td>
            </form>
        </tr>
        @endforeach
    </table>
    <hr>
    <h2 style="color:brown;"><a href="{{route('products.index')}}">List of Products</a></h2>
</body>

</html>