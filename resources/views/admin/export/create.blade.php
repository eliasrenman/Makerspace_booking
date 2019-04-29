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

                    <div class="form-box equipment pb-2">
                        <h2 class="soleto-regular magenta">UTRUSTNING</h2>
                        <div class="header-line"></div>
                        <div class="buttons">
                            @foreach($equipment as $index)
                                <a class="button btn-equipment" onclick="select(this, '.buttons>.button')"
                                   href="#button">
                                    <div class="button-filler magenta-fill"></div>
                                    <span class="soleto-regular" value="{{$index['id']}}">{{$index['name']}}</span>
                                </a>
                            @endforeach
                            <input id="equipment" name="equipment" class="d-none" value="">
                        </div>
                        <div class="form-box px-3 py-1 form-margin">
                            <div class="m-1 header-line-left-pink">
                                <div class="m-2">
                                    <label for="name" class="d-block">
                                        Efterfrågad person
                                    </label>
                                    <input id="name" onchange="changeSubmitButton()"
                                           class="w-75  d-block soleto-regular form-input @error('name') is-invalid @enderror"
                                           name="name" value="{{ old('email') }}" required autofocus>

                                    @error('name')
                                    <span class="" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-line"></div>
                    <p class="soleto-light magenta error-message"></p>
                    <a class="submit-button enabled" onclick="submitForm()">
                        <div>
                            <span class="soleto-regular magenta ">LADDA NER</span>
                            <img src="/images/Ikon%20Nästa.svg">
                        </div>
                    </a>
                </form>
            </div>

            <div class="col-md-2 col-xl-2"></div>
        </div>
    </div>
@endsection

@section('scripts')

    <script src="/js/pdf_form.js"></script>
@endsection
