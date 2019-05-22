<div class="form-box p-2 {{$class ?? ''}}" {{isset($id) ? "id=$id" : ''}}>
    <h2 class="soleto-regular magenta">{{$title}}</h2>
    <div class="header-line"></div>
<<<<<<< HEAD
    <div class="inner-content {{$div_class ?? ''}}" >
=======
    <div class="{{$div_class ?? ''}}" id="{{$div_id ?? ''}}">
>>>>>>> a9fe4109f3210acc52f677fa6ccf62cd6a7e6b9c
        {{$slot}}
    </div>
</div>