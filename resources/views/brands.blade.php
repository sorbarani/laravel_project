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
        </tr>
        @foreach($brands as $brand)
        <tr>
            <td>{{ $brand->id }}</td>
            <td>{{ $brand->name }}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>