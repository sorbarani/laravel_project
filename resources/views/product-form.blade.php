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

    <form action="/form-submit" method="post">
        @CSRF
        <lablel for="product">Name of product</lablel>
        <input type="text" id="product" name="product" placeholder="Type your product name">
        <br>
        <label for="price">Price</label>
        <input type="number" id="price" name="price" min="0" step="0.01" placeholder="Enter price">
        <br>
        <label for="date">Date</label>
        <input type="date" id="date" name="date" placeholder="Enter date">
        <br>
        <lablel for="producer">Name of product</lablel>
        <input type="text" id="producer" name="producer" placeholder="Company">
        <br>
        <button type="submit">Submit</butto>
    </form>
</body>

</html>