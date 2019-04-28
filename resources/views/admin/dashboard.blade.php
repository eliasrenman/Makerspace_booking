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
                                <span class="user-name soleto-regular magenta">{{ "Logged in admin user"}}</span>
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

                        <div class="form-box px-3 py-1 form-margin">
                            <div class="m-1 header-line-left-pink">
                                <div class="m-2">
                                    <p class="m-0 soleto-regular" style="">Dator 1
                                        <img src="images/Ikon%20logga-ut.svg">
                                        <img src="images/Ikon%20logga-ut.svg">
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="form-box px-3 py-1 form-margin">
                            <div class="m-1 header-line-left-pink">
                                <div class="m-2">
                                    <p class="m-0 soleto-regular" style="">Dator 1
                                        <img src="images/Ikon%20logga-ut.svg">
                                        <img src="images/Ikon%20logga-ut.svg">
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="form-box px-3 py-1 form-margin">
                            <div class="m-1 header-line-left-pink">
                                <div class="m-2">
                                    <p class="m-0 soleto-regular" style="">Dator 1
                                        <img src="images/Ikon%20logga-ut.svg">
                                        <img src="images/Ikon%20logga-ut.svg">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="expand-div-equipment"></div>

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
                                Lägg till utrustning
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="form-box time p-2 open">
                    <h2 class="soleto-regular magenta">BOKNINGSHISTORIK</h2>
                    <div class="header-line"></div>
                    <div id="small-preview-bookings">

                        <div class="form-box px-3 py-1 form-margin">
                            <div class="m-1 header-line-left-pink">
                                <div class="m-2">
                                    <h5 class="soleto-bold m-0">08:00 - 11:20</h5>

                                    <p class="m-0 soleto-regular" style="">Person, Dator 1</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-box px-3 py-1 form-margin">
                            <div class="m-1 header-line-left-pink">
                                <div class="m-2">
                                    <h5 class="soleto-bold m-0">08:00 - 11:20</h5>

                                    <p class="m-0 soleto-regular" style="">Person, Dator 3</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-box px-3 py-1 form-margin">
                            <div class="m-1 header-line-left-pink">
                                <div class="m-2">
                                    <h5 class="soleto-bold m-0">08:00 - 11:20</h5>

                                    <p class="m-0 soleto-regular" style="">Person, HTC VIVE</p>
                                </div>
                            </div>
                        </div>

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

                        <div class="form-box px-3 py-1 form-margin">
                            <div class="m-1 header-line-left-pink">
                                <div class="m-2">
                                    <h5 class="soleto-bold m-0">Admin användare (du)</h5>
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

                <div class="col-md-2 col-xl-2"></div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
