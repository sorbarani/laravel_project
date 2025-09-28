<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Brand</title>
</head>

<body>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul style="color:red;">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <h1>Edit brand.</h1>

    <form action="{{route('brands.update', $brand->id)}}" method="post">
        @CSRF
        @method('patch')
        <label for="name">New brand Name:</label>
        <input type="text" id="name" name="name" value="{{old('name', $brand->name)}}">
        <br>
        <button type="submit">Submit</button>
    </form>
</body>

</html>