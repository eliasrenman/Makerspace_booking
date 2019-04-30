@extends('layout')

@section('title','Admin Login')

@section('header-title','ADMIN-PANEL')

@section('header-description')
    Detta är inloggningsidan för administratörer av makerspace-bookningsystemet. Om
    du är en vanlig användare och hamnat här av misstag <a href="../">klicka här</a> för att komma
    tillbaka till startsidan.
@endsection
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="/css/index.css">

@endsection

@section('content')

    <div class="form-container">
        <div class="main-row row">
            <div class="col-md-2 col-xl-3"></div>
            <div class="main-column col-lg-8 col-xl-7">

                <form id="login-form" method="POST" action="{{ route('login') }}">
                    @csrf

                    @component('components.box.box')
                        @slot('title', 'INLOGGNING')

                        @component('components.inputfield.inputfield')
                            @slot('row_class', 'm-0')
                            @slot('type', 'email')
                            @slot('submit_name', 'email')
                            @slot('title', 'E-mail')
                        @endcomponent

                        @component('components.inputfield.inputfield')
                            @slot('row_class', 'm-0')
                            @slot('type', 'password')
                            @slot('submit_name', 'password')
                            @slot('title', 'Lösenord')
                        @endcomponent

                        <div class="row m-0 mt-3">
                            <div class="col">
                                @if (Route::has('password.request'))
                                    <a class="p-0 btn btn-link" href="{{ route('password.request') }}">
                                        <p class="m-0 soleto-bold">Glömt ditt lösenord?</p>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-3 m-0 mb-2">
                            <div class="col-md-6 order-md-last mb-3 mb-md-0">
                                <div class="confirmation position-relative" style="top: 23%">
                                    <div onclick="select(this)" class="radio {{ old('remember') ? 'selected' : '' }}">
                                        <div class="radio-filler"></div>
                                    </div>
                                    <span class="">Håll mig inloggad</span>

                                    <input style="display: none" type="checkbox" name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-6">
                                @component('components.buttons.submitbutton')
                                    @slot('onclick', 'submitForm()')
                                    @slot('title', 'LOGGA IN')
                                @endcomponent
                            </div>
                        </div>

                    @endcomponent
                </form>
                <div class="col-md-2 col-xl-2"></div>
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
