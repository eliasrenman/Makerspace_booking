@extends('layout')

@section('title','Admin Login')

@section('header-title','LÄGG-TILL-UTRUSTNING')

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

                <form id="login-form" method="POST" action="{{ route('equipment.store') }}">


                    <div class="form-box time p-2 open">
                        <h2 class="soleto-regular magenta">UTRUSTNING</h2>
                        <div class="row">
                            <div class="col">
                                <div class="header-line m-0"></div>
                            </div>
                        </div>

                        @csrf
                        <div class="row">
                            <div class="col-md mt-3">
                                <label for="equipment" class="d-block">
                                    namn
                                </label>
                                <input id="name" onchange="changeSubmitButton()"
                                       class="w-75  d-block soleto-regular form-input @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}" required autofocus>

                                @error('name')
                                <span class="" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md mt-3 ">
                                <label for="availability"
                                       class="d-block">Tillgänglighet</label>

                                <select id="availability" onchange="changeSubmitButton()"
                                       class="w-75 d-block soleto-regular form-input @error('password') is-invalid @enderror"
                                       name="restricted"
                                       required>
                                    <option value="0">Bokningsbar för alla</option>
                                    <option value="1">Lärare endast</option>
                                </select>

                                @error('restricted')
                                <span class="" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3 mb-2">
                            <div class="col-md-6">
                                <div class="submit-button" onclick="submitForm()">
                                    <div>
                                        <span class="soleto-regular magenta">SKICKA</span>
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
