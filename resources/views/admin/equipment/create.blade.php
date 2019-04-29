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


                    <div class="form-box time p-2 open">
                        <h2 class="soleto-regular magenta">INLOGGNING</h2>
                        <div class="row">
                            <div class="col">
                                <div class="header-line m-0"></div>
                            </div>
                        </div>

                        @csrf
                        <div class="row">
                            <div class="col-md mt-3">
                                <label for="email" class="d-block">
                                    E-post
                                </label>
                                <input id="email" type="email" onchange="changeSubmitButton()"
                                       class="w-75  d-block soleto-regular form-input @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md mt-3 ">
                                <label for="password"
                                       class="d-block">Lösenord</label>

                                <input id="password" type="password" onchange="changeSubmitButton()"
                                       class="w-75 d-block soleto-regular form-input @error('password') is-invalid @enderror"
                                       name="password"
                                       required autocomplete="current-password">

                                @error('password')
                                <span class="" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col">
                                @if (Route::has('password.request'))
                                    <a class="p-0 btn btn-link" href="{{ route('password.request') }}">
                                        <p class="m-0 soleto-bold">Glömt ditt lösenord?</p>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-3 mb-2">
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
                                <div class="submit-button" onclick="submitForm()">
                                    <div>
                                        <span class="soleto-regular magenta">LOGGA IN</span>
                                        <img src="/images/Ikon%20Nästa.svg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
