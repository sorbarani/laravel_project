<!DOCTYPE html>
<html>

<head>
    <title>Brands</title>
</head>

<body>
    <h1>Brands</h1>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th colspan="2">action</th>
        </tr>
        @foreach($brands as $brand)
        <tr>
            <td>{{ $brand->id }}</td>
            <td>{{ $brand->name }}</td>
            <td>
                <form action="{{route('brands.destroy', $brand->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
            <td>
                <form action="{{route('brands.edit', $brand->id)}}" method="GET">
                    <input type='hidden' name="name">
                    <button type="submit">Update</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <p><a href="{{route('brands.create')}}">Create New Brand</a></p>
</body>

</html>