<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brands</title>
</head>

<body>
    <h1>Insert  a new brand.</h1>

    <form action="/brand-submit" method="post">
        @CSRF
        <lablel for="name">Name of brand:</lablel>
        <input type="text" id="name" name="name" placeholder="Type your product name">
       <br>
        <button type="submit">Submit</butto>
    </form>
</body>

</html>