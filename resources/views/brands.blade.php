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
            <th>action</th>
        </tr>
        @foreach($brands as $brand)
        <tr>
            <td>{{ $brand->id }}</td>
            <td>{{ $brand->name }}</td>
            <td>
                    <form action='/brand-delete/{{ $brand->id}}' methode='post'>
                    <input type='hidden' name="name">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>

</html>