@extends('layout')

@section('title','Exportera pdf')
@section('header-title','EXPORTERA-PDF')
@section('header-description')
    <a href="{{route('home')}}">klicka här för att återvända </a> till admin-panelen.

@endsection

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="/css/index.css">
    <link rel="stylesheet" type="text/css" href="/css/jsmodal.css">
@endsection

@section('content')
    <div class="form-container">
        <div class="main-row row">
            <div class="col-md-2 col-xl-3"></div>
            <div class="main-column col-lg-8 col-xl-7">
                <div class="grid-parent">
                    <h4 class="soleto-light">klicka ladda ner om inga specifika parametrar efterfrågas</h4>
                </div>
                <form id="form" method="post">
                    @csrf
                    @component('components.box.box')
                        @slot('title','UTRUSTNING')
                        @slot('div_class', 'buttons equipment')
                        @foreach($equipment as $index)
                            @component('components.buttons.equipmentbutton')
                                @slot('index', $index)
                                <input id="equipment" name="equipment" class="d-none">
                            @endcomponent
                        @endforeach

                        @component('components.boxitem.boxitem')
                            @slot('class', 'm-0 mt-3 mb-2')
                            @slot('title', 'Specifik person')
                            <input id="name" onchange="changeSubmitButton()"
                                   class="w-75  d-block soleto-regular form-input"
                                   name="name" value="" required autofocus>
                        @endcomponent
                    @endcomponent

                    <div class="header-line my-30px"></div>
                    @component('components.buttons.submitbutton')
                        @slot('class', 'enabled')
                        @slot('onclick', 'submitForm()')
                        @slot('title', 'LADDA NER')
                    @endcomponent
                </form>
            </div>

            <div class="col-md-2 col-xl-2"></div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/js/pdf_form.js"></script>
@endsection
