@extends('layout')

@section('title','Makerspace Bokning')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/jsmodal.css">
@endsection

@section('content')
    <div class="form-container">
        <div class="main-row row">
            <div class="col-md-2 col-xl-3"></div>
            <div class="main-column col-lg-8 col-xl-7">
                <div class="grid-parent">
                    <p class="soleto-light">Bokar tid för</p>
                    <div class="grid-row row">
                        <div class="col-sm-8 column">
                            <div class="user-info">
                                <img src=" {{ $user['icon'] }}" class="user-image">
                                <span class="user-name soleto-regular magenta">{{ $user['name']}}</span>
                            </div>
                        </div>

                        <div class="col column"></div>
                        <div class="col column log-out-column">
                            <div class="log-out-container">
                                <div class="log-out">
                                    <a href="/logout">
                                        <img src="images/Ikon%20logga-ut.svg">
                                        <span class="soleto-regular">Logga ut</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @csrf

                <div class="form-box equipment">
                    <h2 class="soleto-regular magenta">UTRUSTNING</h2>
                    <div class="header-line"></div>
                    <div class="buttons">
                        @foreach($equipment as $index)
    <a class="button" onclick="select(this, '.buttons>.button')" href="#button">
                                <div class="button-filler magenta-fill"></div>
                                <span class="soleto-regular" value="{{$index['id']}}">{{$index['name']}}</span>
                            </a>
                        @endforeach
</div>
                </div>
                <div class="form-box time">
                    <h2 class="soleto-regular magenta">TID OCH DATUM</h2>
                    <div class="header-line"></div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="field from">
                                <p class="soleto-light">Från klockan</p>
                                <div class="hider">
                                    <input class="soleto-regular" value="00:00" type="time" name="from" min="00:00"
                                           max="24:00">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="field to">
                                <p class="soleto-light">Till klockan</p>
                                <div class="hider">
                                    <input class="soleto-regular" value="00:00" type="time" name="to" min="00:00"
                                           max="24:00">
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="soleto-light date-title">Datum</p>
                    <div class="row">
                        <div class="column col-sm-5">
                            <div class="date date-today">
                                <?php
                                setlocale(LC_ALL, array('sv_SE.UTF-8', 'sv_SE@euro', 'sv_SE', 'swedish'));
                                $today = strftime("%e %B", strtotime("today"));
                                $today_datetime = strftime("%Y-%m-%d", strtotime("today"));
                                ?>
                                <a class="button" onclick="select(this, '.date>.button')" href="#today">
                                    <div class="button-filler magenta-fill"></div>
                                    <span class="soleto-regular"
                                          data-day="0" data-value="<?php echo $today_datetime ?>">Idag (<?php echo $today ?> )</span>
                                </a>
                            </div>
                        </div>
                        <div class="column col-sm-5">
                            <div class="date date-tomorrow">
                                <?php
                                $tomorrow = strftime("%e %B", strtotime("tomorrow"));
                                $tomorrow_datetime = strftime("%Y-%m-%d", strtotime("today"));
                                ?>
                                <a class="button" onclick="select(this, '.date>.button')" href="#tomorrow">
                                    <div class="button-filler magenta-fill"></div>
                                    <span class="soleto-regular"
                                          data-day="1" data-value="<?php echo $tomorrow_datetime ?>">Imorgon (<?php echo $tomorrow ?>)</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-2">
                        </div>
                    </div>
                </div>

                <div class="form-box time p-2" id="alreadyBooked">
                    <h2 class="soleto-regular magenta">REDAN BOKADE TIDER</h2>
                    <div class="header-line"></div>
                    <div id="booked-times"></div>
                </div>

                <div class="header-line"></div>

                <div class="confirmation">
                    <div onclick="select(this)" class="radio">
                        <div class="radio-filler"></div>
                    </div>
                    <span>Jag har läst och accepterar <a href="#terms-modal" onclick="openModal('#terms-modal')">villkoren för bokning i Makerspace</a> samt <a
                                href="#privacy-modal"
                                onclick="openModal('#privacy-modal')">vår privacy policy</a></span>
                </div>

                <p class="soleto-light magenta error-message"></p>
                <a class="submit-button" onclick="submitData()">
                    <div>
                        <span class="soleto-regular magenta">BOKA</span>
                        <img src="images/Ikon%20Nästa.svg">
                    </div>
                </a>
            </div>
            <div class="col-md-2 col-xl-2"></div>
        </div>
    </div>

    @include('modal', [
    'modal_title' => 'terms title',
    'modal_id' => 'terms-modal',
    'modal_content' => '<p>Terms Testing</p>'
    ])

    @include('modal', [
    'modal_title' => 'policy title',
    'modal_id' => 'privacy-modal',
    'modal_content' => '<p>Testing</p>'
    ])

@endsection

@section('scripts')
    <script src="js/jsmodal.js"></script>
    <script src="js/scripts.js"></script>
@endsection
