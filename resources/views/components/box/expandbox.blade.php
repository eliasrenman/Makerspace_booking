@component('components.box.box')
    @slot('title',$title)
    {{$slot}}

    <div>
        <div class="form-margin">
            <h5 class="soleto-bold m-0">
                <img src="https://via.placeholder.com/20.png/" id="">
                {{$expans ?? 'Visa alla'}}
            </h5>
        </div>

        <a href="{{$add_button_route}}">
            <h5 class="soleto-bold m-0">
                <img src="https://via.placeholder.com/20.png/" id="">
                {{$add_button}}
            </h5>
        </a>
    </div>
@endcomponent
