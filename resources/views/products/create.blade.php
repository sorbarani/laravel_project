<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Add a product.</h1>
    <hr style="color: red;">

    @if ($errors->any())
    <div style="color:red" class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
        @CSRF
        <lablel for="name">Name of product:</lablel>
        <input type="text" id="name" name="name" placeholder="Type your product name">
        <br>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" min="0" step="0.01" placeholder="Enter price">
        <br>
        <label for="date">Date:</label>
        <input type="date" id="created_at" name="created_at" placeholder="Enter date">
        <br>
        <label for="brand_id">Brand:</lablel>
        <select name='brand_id' required>
            <option>-- Select Brand ---</option>
            @foreach ($brands as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>
        <br>
        <label for="image" >Choose a image.</label>
        <input type="file" id="image" name="image" accept="image/*" >
        <br>
        <button type="submit">Submit</butto>
    </form>
</body>

</html>