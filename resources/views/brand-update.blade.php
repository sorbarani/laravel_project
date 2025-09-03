<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brands</title>
</head>

<body>
    <h1>Insert a new brand.</h1>

    <form action="/brand-update" method="post">
        @CSRF
        <lablel for="name">Name of brand you want to change it:</lablel>
        <input type="text" id="name" name="name" placeholder="Type your product name">
        <br>
        <label for="new_name">New brand Name</label>
        <input type="text" id="new_name" name="new_name" placeholder="New name">
        <br>
        <button type="submit">Submit</butto>
    </form>
</body>

</html>