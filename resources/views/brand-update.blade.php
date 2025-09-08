<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brands</title>
</head>

<body>
    <h1>Insert a new brand.</h1>

    <form action="/update/{{$brand->id}}" method="post">
        @CSRF
        <label for="name">New brand Name:</label>
        <input type="text" id="name" name="name"  placeholder="New name">
        <br>
        <button type="submit">Submit</button>
    </form>
</body>

</html>