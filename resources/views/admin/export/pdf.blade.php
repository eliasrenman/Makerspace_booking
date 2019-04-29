<h1>Customer List</h1>
<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $index)
        <tr>
            <td>{{ $index->name }}</td>
            <td>{{ $index->name }}</td>
            <td>{{ $index->email }}</td>
            <td>{{ $index->phone }}</td>
        </tr>
    @endforeach
    </tbody>
</table>