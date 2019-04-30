<div class="form-box p-2 {{$class ?? ''}}" id="{{$id ?? ''}}">
    <h2 class="soleto-regular magenta">{{$title}}</h2>
    <div class="header-line"></div>
    <div class="inner-content {{$div_class ?? ''}}" id="{{$div_id ?? ''}}">
        {{$slot}}
    </div>
</div>