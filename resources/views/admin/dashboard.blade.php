@extends('layout')

@section('title','Admin Dashboard')

@section('header-title','ADMIN-PANEL')

@section('header-description')
    Välkommen! Här kan du ändra vilken utrustning som finns tillgänglig för bokning, visa och exportera bokningshistoriken samt hantera systemets administratörer.
@endsection
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="/css/index.css">

@endsection

@section('content')
    <div class="form-container">
        <div class="main-row row">
            <div class="col-md-2 col-xl-3"></div>
            <div class="main-column col-lg-8 col-xl-7">
                <div class="grid-parent">
                    <div class="grid-row row">
                        <div class="col-sm-8 column">
                            <div class="user-info">
                                <span class="user-name soleto-regular magenta">{{ "Inloggad som " . $activeUser['email']}}</span>
                            </div>
                        </div>


                        <div class="col column log-out-column">
                            <div class="log-out-container">
                                <div class="log-out">
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <img src="images/Ikon%20logga-ut.svg">
                                        <span class="soleto-regular">Logga ut</span>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>


                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-box time p-2 open">
                    <h2 class="soleto-regular magenta">UTRUSTNING</h2>
                    <div class="header-line"></div>
                    <div id="small-preview-equipment">

                        @foreach($equipments as $equipment)
                            <div class="form-box px-3 py-1 form-margin">
                                <div class="m-1 header-line-left-pink">
                                    <div class="m-2">
                                        <h5 class="soleto-bold m-0">{{$equipment['name']}}</h5>
                                        <p class="m-0 soleto-regular" style="">
                                            @if($equipment['restricted'])
                                                Lärare endast
                                            @else
                                                Bokningsbar för alla
                                            @endif
                                            <a href="{{route('equipment.edit', $equipment['id'])}}"><img src="images/Ikon%20logga-ut.svg"></a>
                                            <a href="{{route('equipment.destroy', $equipment['id'])}}"><img src="images/Ikon%20logga-ut.svg"></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div>
                        <div class="form-margin">
                            <h5 class="soleto-bold m-0">
                                <img src="https://via.placeholder.com/20.png/" id="">
                                Visa alla
                            </h5>
                        </div>

                        <a href="{{route('equipment.index')}}">
                            <h5 class="soleto-bold m-0">
                                <img src="https://via.placeholder.com/20.png/" id="">
                                Lägg till utrustning
                            </h5>
                        </a>
                    </div>
                </div>

                <div class="form-box time p-2 open">
                    <h2 class="soleto-regular magenta">BOKNINGSHISTORIK</h2>
                    <div class="header-line"></div>
                    <div id="small-preview-bookings">
                        @foreach($latestBookings as $booking)
                            <div class="form-box px-3 py-1 form-margin">
                                <div class="m-1 header-line-left-pink">
                                    <div class="m-2">
                                        <h5 class="soleto-bold m-0">
                                            {{$booking['date']}} {{$booking['start']}}
                                            - {{$booking['end']}}
                                        </h5>
                                        <p class="m-0 soleto-regular" style="">
                                            {{$booking['name']}}
                                            , {{$booking['equipment']}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div id="expand-div-bookings"></div>

                    <div>
                        <div class="form-margin">
                            <h5 class="soleto-bold m-0">
                                <img src="https://via.placeholder.com/20.png/" id="">
                                Visa alla
                            </h5>
                        </div>
                        <div>
                            <h5 class="soleto-bold m-0">
                                <img src="https://via.placeholder.com/20.png/" id="">
                                Exportera bokningar
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="form-box time p-2 open">
                    <h2 class="soleto-regular magenta">ADMINISTRATÖR</h2>
                    <div class="header-line"></div>
                    <div id="small-preview-bookings">
                        @foreach($adminUsers as $user)
                            <div class="form-box px-3 py-1 form-margin">
                                <div class="m-1 header-line-left-pink">
                                    <div class="m-2">
                                        <h5 class="soleto-bold m-0">
                                            {{$user['email']}}
                                            @if($user['id'] == $activeUser['id'])
                                                (du)
                                            @endif
                                        </h5>
                                        <p class="m-0 soleto-regular">Administratör
                                            <img src="images/Ikon%20logga-ut.svg">
                                            <a href="#"><img src="images/Ikon%20logga-ut.svg"></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="form-box px-3 py-1 form-margin">
                            <div class="m-1 header-line-left-pink">
                                <div class="m-2">
                                    <h5 class="soleto-bold m-0">Admin användare</h5>
                                    <p class="m-0 soleto-regular">Administratör
                                        <img src="images/Ikon%20logga-ut.svg">
                                        <img src="images/Ikon%20logga-ut.svg">
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="form-box px-3 py-1 form-margin">
                            <div class="m-1 header-line-left-pink">
                                <div class="m-2">
                                    <h5 class="soleto-bold m-0">Admin användare</h5>
                                    <p class="m-0 soleto-regular">Administratör
                                        <img src="images/Ikon%20logga-ut.svg">
                                        <img src="images/Ikon%20logga-ut.svg">
                                    </p>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div>
                        <div class="form-margin">
                            <h5 class="soleto-bold m-0">
                                <img src="https://via.placeholder.com/20.png/" id="">
                                Visa alla
                            </h5>
                        </div>
                        <div>
                            <h5 class="soleto-bold m-0">
                                <img src="https://via.placeholder.com/20.png/" id="">
                                Exportera bokningar
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-2 col-xl-2"></div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
