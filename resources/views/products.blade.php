<!DOCTYPE html>
<html>

<head>
    <title>Products</title>
</head>

<body>
    <h1>All Products</h1>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Creator</th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{$product->producer}}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>