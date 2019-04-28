@extends('layout')

@section('title','Byt lösenord')

@section('header-title','BYT LÖSENORD')

@section('header-description')

@endsection
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="/css/index.css">

@endsection

@section('content')
    <div class="form-container">
        <div class="main-row row">
            <div class="col-md-2 col-xl-3"></div>
            <div class="main-column col-lg-8 col-xl-7">

                <form id="login-form" method="POST" action="{{ route('password.update') }}">


                    <div class="form-box time p-2 open">
                        <h2 class="soleto-regular magenta">BYT LÖSENORD</h2>
                        <div class="row">
                            <div class="col">
                                <div class="header-line m-0"></div>
                            </div>
                        </div>

                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">
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
                                       class="d-block">Nytt lösenord</label>

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
                        <div class="row">

                            <div class="col-md mt-3 ">
                                <label for="password-confirm"
                                       class="d-block">Bekräfta ditt nya lösenord</label>

                                <input id="password-confirm" type="password" onchange="changeSubmitButton()"
                                       class="w-75 d-block soleto-regular form-input @error('password') is-invalid @enderror"
                                       name="password_confirmation"
                                       required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="row mt-3 mb-2">
                            <div class="col-md-6">
                                <div class="submit-button" onclick="submitForm()">
                                    <div>
                                        <span class="soleto-regular magenta">BYT LÖSENORD</span>
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
