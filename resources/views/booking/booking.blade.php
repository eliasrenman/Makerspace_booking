@extends('layout')

@section('title','Bokning')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/jsmodal.css">
@endsection

@section('content')
    <div class="form-container">
        <div class="main-row row">
            <div class="col-md-2 col-xl-3"></div>
            <div class="main-column col-lg-8 col-xl-7">
                @component('components.fields.userfield')
                    @slot('title', 'Bokar tid för')
                    @slot('image', $user['icon'])
                    @slot('name', $user['name'])
                    @slot('logout_route', route('booking.logout'))
                @endcomponent

                @csrf
                @component('components.box.box')
                    @slot('title','UTRUSTNING')
                    @slot('div_class', 'buttons equipment')
                    @foreach($equipment as $index)
                        @component('components.buttons.equipmentbutton')
                            @slot('index', $index)
                        @endcomponent
                    @endforeach
                @endcomponent

                @component('components.box.box')
                    @slot('title','TID OCH DATUM')
                    @slot('class', 'time')
                    <div class="row">
                        <div class="col-sm-6 m-0">
                            @component('components.timeinput')
                                @slot('title', 'Från klockan')
                                @slot('name', 'from')
                            @endcomponent
                        </div>
                        <div class="col-sm-6">
                            @component('components.timeinput')
                                @slot('title', 'Till klockan')
                                @slot('name', 'to')
                            @endcomponent
                        </div>
                    </div>
                    <p class="soleto-light date-title">Datum</p>
                    <div class="row">
                        @component('components.buttons.datebutton')
                            @slot('datetime', $datetime['today'])
                        @endcomponent
                        @component('components.buttons.datebutton')
                            @slot('datetime', $datetime['tomorrow'])
                            @slot('day_name', 'Imorgon')
                        @endcomponent
                        <div class="col-sm-2"></div>
                    </div>
                @endcomponent

                @component('components.box.box')
                    @slot('title', 'REDAN BOKADE TIDER')
                    @slot('class','time p-2')
                    @slot('id', 'alreadyBooked')
                    <div id="booked-times"></div>
                @endcomponent

                <div class="header-line"></div>

                <div class="confirmation">
                    @component('components.buttons.radiobutton')
                        @slot('onclick', 'select(this)')
                    @endcomponent
                    <span>Jag har läst och accepterar <a href="#terms-modal" onclick="openModal('#terms-modal')">villkoren för bokning i Makerspace</a> samt <a
                                href="#privacy-modal"
                                onclick="openModal('#privacy-modal')">vår privacy policy</a></span>
                </div>

                <p class="soleto-light magenta error-message"></p>
                @component('components.buttons.submitbutton')
                    @slot('onclick', 'submitData()')
                    @slot('title', 'BOKA')
                @endcomponent
            </div>
            <div class="col-md-2 col-xl-2"></div>
        </div>
    </div>
    @component('components.modal')
        @slot('id','terms-modal')
        @slot('title', 'terms title')
        <p>Terms Testing</p>
    @endcomponent

    @component('components.modal')
        @slot('id','privacy-modal')
        @slot('title', 'policy title')
        <p>Testing</p>
    @endcomponent
@endsection

@section('scripts')
    <script src="/js/jsmodal.js"></script>
    <script src="/js/scripts.js"></script>
@endsection
