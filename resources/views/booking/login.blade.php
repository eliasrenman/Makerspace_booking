@extends('layout')

@section('title','Login')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="/css/login.css">
@endsection

@section('content')
    <div class="mt-50px">
        <div class="main-row row">
            <div class="col-md-2 col-xl-3"></div>
            <div class="main-column col-lg-8 col-xl-6">
                <div class="header-container">
                    <p class="soleto-light">Endast personer på NTI Gymnasiet Umeå kan boka tid i Makerspace. För att fortsätta, logga in med Google-kontot du fått av NTI Gymnasiet.</p>
                    <a class="button" href="/redirect">
                        <img src="images/Google%20G%20Logo.svg" alt="Logga in med Google">
                        <span class="soleto-regular">Logga in med Google</span>
                    </a>
                </div>
            </div>
            <div class="col-md-2 col-xl-3"></div>
        </div>
    </div>


@endsection
