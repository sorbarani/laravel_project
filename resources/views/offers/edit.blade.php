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

    <form action="{{route('offers.update', $offer->id)}}" method="POST">
        @CSRF
        @method('PATCH')
        <lablel for="name">Name of offer:</lablel>
        <input type="text" id="name" name="name" value="{{old('name', $offer->name)}}" required>
        <br>
        <label for="config[value]">value:</label>
        <input type="number" id="value" name="config[value]" min="0" step="0.01" value="{{old('config.value', $offer->config['value'])}}">
        <br>
        <label for="config[base_price]">Base Price</label>
        <input type="number" id="base_price" name="config[base_price]" min="0.1" step="0.01" value="{{old('config.value', $offer->config['base_price'])}}">
        <br>
        <label for="config[start_at]">Start at:</label>
        <input type="datetime-local" id="start_at" name="config[start_at]" value="{{old('config.start_at', $offer->config['start_at'])}}">
        <br>
        <label for="config[end_at]">End at:</label>
        <input type="datetime-local" id="end_at" name="config[end_at]" value="{{old('config.end_at', $offer->config['end_at'])}}">
        <br>
        <label for="config[percent]">Percent:</label>
        <input type="number" id="percent" name="config[percent]" min="0" max="50" value="{{old('config.percent', $offer->config['percent'])}}">
        <br>
        <label for="count">Count:</label>
        <input type="number" id="count" name="count" value="{{old('name', $offer->count)}}">
        <br>
        <label for="token">Token:</label>
        <input type="string" id="token" name="token" value="{{old('token', $offer->token)}}">
        <br>
        <button type="submit">Update</butto>
    </form>


</body>
</body>

</html>