<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offers</title>
</head>

<body>
    <h1 style="color: blue;">List of offers</h1>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>value</th>
            <th>Base Price</th>
            <th>Start at</th>
            <th>End at</th>
            <th>Percent</th>
            <th>Count</th>
            <th>Token</th>
            <th colspan="2">Action</th>
        </tr>
        @foreach($offers as $offer)
        <tr>
            <td>{{ $offer->id }}</td>
            <td>{{ $offer->name }}</td>
            <td>{{ $offer->config['value'] ?? '-' }}</td>
            <td>{{$offer->config['base_price']?? '-'}}</td>
            <td>{{$offer->config['start_at']?? '-'}}</td>
            <td>{{$offer->config['end_at']?? '-'}}</td>
            <td>{{$offer->config['percent']?? '-'}}</td>
            <td>{{$offer->count ?? '-'}}</td>
            <td>{{$offer->token}}</td>
            <td><a href="{{route('offers.destroy', $offer->id)}}">Delete</a></td>
            <td><a href="{{route('offers.edit', $offer->id)}}">Update</a></td>
        </tr>
        @endforeach
    </table>
    <hr><hr>
    <p1>If you want to set new offer click <a href="{{route('offers.create')}}">here</a>.</p1>
</body>

</html>