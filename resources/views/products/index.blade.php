<!DOCTYPE html>
<html>

<head>
    <title>Products</title>
</head>

<body>
    <h1>All Products</h1>

    @if ($errors->any())
    <div style="color:red" class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Brand</th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{$product->brand->name}}</td>
            <td>
                @if($product->image)
                <img src="{{asset('storage/'.$product->image)}}" width="100">
                @endif
            </td>
            <form action="{{route('orders.store', $product->id)}}" method='post'>
                @CSRF
                <td>
                    <label for="quantity">quantity</label>
                    <input type="number" id="quantity" name="quantity" min="1" value="1">
                </td>
                <td>
                    <button type="submit">Buy</button>
                </td>
            </form>
        </tr>
        @endforeach
    </table>
    <p><a href="{{route('products.create')}}">Submit new product.</a></p>
    {{ $products->links() }}
</body>

</html>