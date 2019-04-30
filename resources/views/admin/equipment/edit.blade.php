@extends('layout')

@section('title','Redigera utrustning')

@section('header-title','REDIGERA-UTRUSTNING')

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
                <form id="login-form" method="POST" action="{{ route('equipment.update', $equipment['id'])}}">
                    @method('patch')
                    @component('components.box.equipmentbox')
                        @slot('equipment', $equipment)
                        @slot('title', 'REDIGERA UTRUSTNING')
                        @slot('send_title', 'UPPDATERA')
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
