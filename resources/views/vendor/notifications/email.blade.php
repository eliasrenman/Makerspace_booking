<link href="https://fonts.googleapis.com/css?family=Open+Sans:800|Titillium+Web:300,400,600" rel="stylesheet">
<style>
    .magenta {
        color: #DD0890;
    }
    .black {
        color: black;
    }
    .titillium-regular {
        font-family: 'Titillium Web', sans-serif;
        font-weight: 400;
    }
    .titillium-bold {
        font-family: 'Titillium Web', sans-serif;
        font-weight: 700;
    }
    .titillium-xbold {
        text-transform: uppercase;
        font-size: 50px;
        font-family: 'Open Sans', sans-serif;
        font-weight: 800;
    }
    .submit-button.enabled {
        box-shadow: 0px 3px 20px rgba(0, 0, 0, 0.2);
        cursor: pointer;
        opacity: 1;
    }
    .submit-button {
        width: 250px;
        height: 60px;
        display: flex;
        justify-content: center;
        flex-direction: column;
        opacity: 0.2;
    }
    .submit-button span {
        font-weight: 700;
        margin-left: 20px;
        font-size: 20px;
    }
    .submit-button img {
        height: 20px;
        width: 12.5px;
        float: right;
        margin-right: 20px;
        top: 4px;
        position: relative;
    }
    .header-line {
        margin-top: 30px;
        margin-bottom: 30px;
        width: 20px;
        border-top: #000 dotted 2px;
    }
    .m {
        margin-top: 50px;
        margin-left: 50px;
    }
    .mx {
        margin-top: 30px;
        margin-bottom: 30px;
    }
    .mb-0 {
        margin-bottom: 0;
    }
    a {
        text-decoration: none;
    }
</style>
<div class="m">

    <img src="{{$app->make('url')->to('/').'/images/NTI-Gymnasiet-logotyp.svg'}}">
    <div class="header-line"></div>
    {{-- Greeting --}}
    @isset($actionText)
        <h1 class="titillium-xbold black">{{$actionText}}</h1>
    @endif
    @if ($level === 'error')
        <p class="titillium-bold black">Woops!</p>
    @else
        <p class="titillium-bold black">Hej!</p>
    @endif


    {{-- Intro Lines --}}
    @foreach ($introLines as $line)
        <p class="titillium-regular">{{ $line }}</p>

    @endforeach

    {{-- Action Button --}}
    @isset($actionText)
        <?php
        switch ($level) {
            case 'success':
            case 'error':
                $color = $level;
                break;
            default:
                $color = 'primary';
        }
        ?>
        @component('components.buttons.submitbutton')
            @slot('title', $actionText)
            @slot('href', $actionUrl)
            @slot('img', $app->make('url')->to('/').'/images/Ikon%20Nästa.svg')
            @slot('class', ' enabled mx')
        @endcomponent
    @endisset

    {{-- Outro Lines --}}
    @foreach ($outroLines as $line)
        <p class="titillium-regular">{{ $line }}</p>

    @endforeach
    <br>
    <p class="titillium-regular mb-0">Med vänliga hälsningar</p>
    <i class="titillium-regular">Makerspace-teamet</i>

    {{-- Subcopy --}}
    @isset($actionUrl)
        <div class="header-line"></div>
        Om knappen inte fungerar, kopiera den här länken till webbläsarens<br>
        addressfält: <a class="magenta" href="{{$actionUrl}}">{{$actionUrl}}</a>
    @endisset
</div>