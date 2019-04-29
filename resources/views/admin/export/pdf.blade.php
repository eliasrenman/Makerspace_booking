<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<img src="{{public_path('images/NTI-Gymnasiet-Logotyp.png')}}">

<h2 class="">Export av makerspace bokningar</h2>

<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">Namn</th>
        <th scope="col">Utrustning</th>
        <th scope="col">Datum</th>
        <th scope="col">Start</th>
        <th scope="col">Slut</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $index)
        <tr>
            <td scope="row">{{ $index->name }}</td>
            <td>{{ $index->equipment }}</td>
            <td>{{ $index->date }}</td>
            <td>{{ $index->start }}</td>
            <td>{{ $index->end }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<p class="soleto-light media-small-hide">Exporterad den: {{$time}}</p>