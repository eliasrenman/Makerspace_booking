<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Makerspace')</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-grid.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/util.css">
@yield('stylesheets')


<!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:800|Titillium+Web:300,400,600" rel="stylesheet">
</head>
<body>
<div class="header granitegray-fill">
    <div class="row">
        <div class="col-lg-3">
            <a href="/"><img src="/images/NTI-Gymnasiet-Logotyp.svg"/></a>
        </div>
        <div class="col-lg-6"></div>
        <div class="col-lg-3"></div>
    </div>
    <div class="main-row row">
        <div class="col-md-2 col-xl-3"></div>
        <div class="main-column col-lg-8 col-xl-6">
            <div class="header-container">
                <div class="header-line"></div>
                <h1 class="soleto-xbold coalgray">@yield('header-title','BOKA TID I MAKERSPACE')</h1>
                <p class="soleto-light media-small-hide">@yield('header-description',
                'Makerspace är ett rum för kreativt skapande och skolarbete. Du kan skriva uppgifter, redigera bilder eller göra spel - vad som helst som utvecklar dina förmågor. Till din hjälp finns det datorer, 3D-skrivare och en massa annan utrustning att låna. Det är bara att boka tid och köra!'
                )</p>
            </div>
        </div>
        <div class="col-md-2 col-xl-3"></div>
    </div>
</div>
@yield('content')

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
        integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
@yield('scripts')
</body>
</html>