<div class="jsmodal jsmodal-{{ isset($modal_size) ? $modal_size : 'large' }}" id="{{$modal_id}}">
    <h1>{{$modal_title}}</h1>
    <a class="jsmodal-close" href="#closemodal" onclick="closeParentModal(this)">X</a>
    <hr>
    {!! $modal_content !!}
</div>

@section('childscripts')
<script src="js/jsmodal.js"></script>
@endsection