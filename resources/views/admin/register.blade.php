@extends('layout')

@section('title','Admin registrering')

@section('header-title','REGISTRERA')

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
                <form id="login-form" method="POST" action="{{ route('register') }}">
                    @csrf
                    @component('components.box.box')
                        @slot('title', 'REGISTRERA DIG')

                        @component('components.inputfield.inputfield')
                            @slot('row_class', 'm-0')
                            @slot('type', 'email')
                            @slot('title', 'E-mail')
                            @slot('submit_name', 'email')
                        @endcomponent

                        @component('components.inputfield.inputfield')
                            @slot('row_class', 'm-0')
                            @slot('type', 'password')
                            @slot('title', 'Lösenord')
                            @slot('submit_name', 'password')
                        @endcomponent

                        @component('components.inputfield.inputfield')
                            @slot('row_class', 'm-0')
                            @slot('type', 'password')
                            @slot('title', 'Bekräfta ditt nya lösenord')
                            @slot('submit_name', 'password_confirmation')
                        @endcomponent
                        <div class="row m-0 mt-3 mb-2">
                            <div class="col-md-6">
                                @component('components.buttons.submitbutton')
                                    @slot('onclick', 'submitForm()')
                                    @slot('title', 'Registrera dig')
                                    @slot('class', 'm-0')
                                @endcomponent
                            </div>
                        </div>
                    @endcomponent
                    <div class="col-md-2 col-xl-2"></div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        var fields = ["#email", "#password"];
    </script>
    <script src="/js/admin.js"></script>
@endsection
