<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offer Form</title>
</head>

<body>
    <h1>Add a Offer.</h1>
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

    <form action="{{route('offers.store')}}" method="post">
        @CSRF
        <lablel for="name">Name of offer:</lablel>
        <input type="text" id="name" name="name" placeholder="Type your offer name">
        <br>
        <label for="value">value:</label>
        <input type="number" id="value" name="value" min="0" step="0.01" placeholder="Enter value">
        <br>
        <label for="base_price">Base Price:</label>
        <input type="number" id="base_price" name="base_price" min="0" step="0.01" placeholder="Price">
        <br>
        <label for="start_at">Start at:</label>
        <input type="datetime-local" id="start_at" name="start_at">
        <br>
        <label for="end_at">End at:</label>
        <input type="datetime-local" id="end_at" name="end_at">
        <br>
        <label for="percent">Percent:</label>
        <input type="number" id="percent" name="percent" min="0" max="50" placeholder="Percent">
        <br>
        <label for="count">Count:</label>
        <input type="number" id="count" name="count" placeholder="count">
        <br>

        <button type="submit">Submit</butto>
    </form>
</body>

</html>