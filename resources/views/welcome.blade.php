<form action="/" method="post">
    @csrf
    <input type="text" name="equipment" value="[1]">
    <input type="text" name="start" value="08:00">
    <input type="text" name="end" value="13:0">
    <input type="text" name="date" value="2019-04-11" >

    <input type="submit" value="Submit">
</form>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
