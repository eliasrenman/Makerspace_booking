@component('components.box.box')
    @slot('title',$title)
    <div class="expand-box" id="{{$id}}" >
        {{$slot}}
    </div>


    <div class="row m-0">
        <div class="col-md form-margin mx-0">
            <h5 class="soleto-bold m-0">
                <img src="/images/Ikon%20Pil-ner.svg" alt="expandera/ kollapsa box">
                {{$expans ?? 'Visa alla'}}
            </h5>
        </div>
        <div class="col-md form-margin mx-0">
            <a href="{{$add_button_route}}">
                <h5 class="soleto-bold black text-nowrap m-0">
                    <img src="{{$add_button_img ?? '/images/Ikon%20Plus.svg'}}" alt="lägg till knapp">
                    {{$add_button}}
                </h5>
            </a>
        </div>
    </div>
@endcomponent
