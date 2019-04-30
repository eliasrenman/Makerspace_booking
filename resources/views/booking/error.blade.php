@extends('layout')

@section('title','Error')

@section('header-title','NÅGOT GICK FEL')

@section('header-description')
<h1 class="soleto-light ">💩😢💩</h1>
@endsection

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="/css/jsmodal.css">
    <link rel="stylesheet" type="text/css" href="/css/error.css">

@endsection
<!-- //TODO port error class from old project -->
@section('content')
    <div class="login-container">
        <div class="main-row row">
            <div class="col-md-2 col-xl-3"></div>
            <div class="main-column col-lg-8 col-xl-6">
                <div class="form-box finished">
                    <div class="title-container">
                        <img class="magenta" src="/images/Ikon%20Error.svg">
                        <h2 class="soleto-bold magenta">{{$text['header']}}</h2>
                    </div>
                    <div class="header-line"></div>
                    <div class="info-container">
                        <p class="soleto-light"><br></p>
                        <h3 class="soleto-bold pt-4 pb-0 m-0">{{$text['header']}}</h3>
                        <p class="soleto-light">{{$error['description']}}<br>
                            <a href="#modal" class="soleto-light" onclick="openModal('#error-modal')">Mer info om
                                error {{$error['name']}}</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-xl-3"></div>
        </div>
    </div>

    @include('components.modal', [
    'modal_title' => $error['title'],
    'modal_id' => 'error-modal',
    'modal_content' => $error['modal-content']
    ])

@endsection
@section('scripts')
    <script src="/js/jsmodal.js"></script>
@endsection