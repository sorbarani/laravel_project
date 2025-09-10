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

    <form action="/product-submit" method="post">
        @CSRF
        <lablel for="product">Name of product:</lablel>
        <input type="text" id="product" name="product" placeholder="Type your product name">
        <br>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" min="0" step="0.01" placeholder="Enter price">
        <br>
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" placeholder="Enter date">
        <br>
        <lablel for="brand_id">Brand:</lablel>
        <select name='brand_id' required>
            <option >-- Select Brand ---</option>
            @foreach ($brand as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Submit</butto>
    </form>
</body>

</html>