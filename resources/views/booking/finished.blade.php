@extends('layout')

@section('title','Färdigt')

@section('header-title','')

@section('header-description','')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="/css/finished.css">
@endsection
@section('content')
    <div class="mt-50px">
        <div class="main-row row">
            <div class="col-md-2 col-xl-3"></div>
            <div class="main-column col-lg-8 col-xl-6">
                <div class="form-box finished">
                    <div class="title-container">
                        <img src="/images/Ikon%20Klart.svg" alt="klart ikon">
                        <h2 class="soleto-bold magenta">{{$text['header']}}</h2>
                    </div>
                    <div class="header-line"></div>
                    <div class="info-container">
                        <h3 class="soleto-bold">{{$start}}-{{$end}}, den {{$date}}</h3>
                        <p class="soleto-light">{{$text['text']}}</p>
                    </div>
                    <div class="col-md-2 col-xl-3"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
