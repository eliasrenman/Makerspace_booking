<a class="button btn-equipment" onclick="select(this, '.buttons>.button')" href="#button">
    <div class="button-filler magenta-fill"></div>
    <span class="soleto-regular" value="{{$index['id']}}">{{$index['name']}}</span>
    {{$slot ?? ''}}
</a>