<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Welcome to our website.</h1>
    <p>We build great website.</p>

    <form action="/form-submit" method="post">
        @CSRF
        <lablel for="product">Product</lablel>
        <input type="text" id="product" name="product" placeholder="Type your product name">
        <button type="submit">Submit</butto>
    </form>
</body>

</html>