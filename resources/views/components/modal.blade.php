<div class="jsmodal jsmodal-{{$size ?? 'large' }}" id="{{$id}}">
    <h1>{{$title}}</h1>
    <a class="jsmodal-close" href="#closemodal" onclick="closeParentModal(this)">X</a>
    <hr>
    {{$slot}}
</div>
