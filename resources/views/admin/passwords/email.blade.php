@extends('layout')

@section('title','Glömt lösenord')

@section('header-title','GLÖMT-LÖSENORD')

@section('header-description')
    <a href="{{route('home')}}">klicka här för att återvända </a> till admin-panelen.
@endsection
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="/css/index.css">

@endsection

@section('content')

    <div class="form-container">
        <div class="main-row row">
            <div class="col-md-2 col-xl-3"></div>
            <div class="main-column col-lg-8 col-xl-7">

                <form id="login-form" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    @component('components.box.box')
                        @slot('title', 'GLÖMT LÖSENORD')

                        @component('components.inputfield.inputfield')
                            @slot('row_class', 'm-0')
                            @slot('type', 'email')
                            @slot('submit_name', 'email')
                            @slot('title', 'E-mail')
                        @endcomponent
                        <div class="row m-0 mt-3 mb-2">
                            <div class="col-md-6">
                                @component('components.buttons.submitbutton')
                                    @slot('onclick', 'submitForm()')
                                    @slot('title', 'SKICKA')
                                    @slot('class', 'm-0')
                                @endcomponent
                            </div>
                        </div>
                    @endcomponent
                </form>
                @if (session('status'))
                    <div class="form-box alert alert-success mt-4" role="alert">
                        {{ session('status') }}
                        <br>
                        <p class="soleto-regular"><a href="{{route("login")}}">Klicka här för att ta dig till inloggninsidan</a></p>
                    </div>
                @endif
                <div class="col-md-2 col-xl-2"></div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        var fields = ["#email"];
    </script>
    <script src="/js/admin.js"></script>
@endsection
