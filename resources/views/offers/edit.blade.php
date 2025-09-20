<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Offer</title>
</head>

<body>
    <h1>Edit you offer.</h1>
    <hr>
    <hr>
    @if ($errors->any())
    <div style="color:red" class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li style="color: red;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{route('offers.update', $offer->id)}}" method="post">
        @CSRF
        <lablel for="name">Name of offer:</lablel>
        <input type="text" id="name" name="name" value="{{old('name', $offer->name)}}" required>
        <br>
        <label for="value">value:</label>
        <input type="number" id="value" name="value" min="0" step="0.01" value="{{old('name', $offer->value)}}">
        <br>
        <label for="base_price">Base Price:</label>
        <input type="number" id="base_price" name="base_price" min="0" step="0.01" value="{{old('name', $offer->base_price)}}">
        <br>
        <label for="start_at">Start at:</label>
        <input type="datetime-local" id="start_at" name="start_at" value="{{old('name', $offer->start_at)}}">
        <br>
        <label for="end_at">End at:</label>
        <input type="datetime-local" id="end_at" name="end_at" value="{{old('name', $offer->end_at)}}">
        <br>
        <label for="percent">Percent:</label>
        <input type="number" id="percent" name="percent" min="0" max="50" value="{{old('name', $offer->percent)}}">
        <br>
        <label for="count">Count:</label>
        <input type="number" id="count" name="count" value="{{old('name', $offer->count)}}">
        <br>

        <button type="submit">Update</butto>
    </form>


</body>
</body>

</html>