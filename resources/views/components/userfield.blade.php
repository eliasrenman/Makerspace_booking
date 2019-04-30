<div class="grid-parent">
    <p class="soleto-light">{{$title}}</p>
    <div class="grid-row row">
        <div class="col-sm-8 column">
            {{$user}}
        </div>
        <div class="col column"></div>
        <div class="col column log-out-column">
            <div class="log-out-container">
                <div class="log-out">
                    <a href="{{$logout_route}}">
                        <img src="/images/Ikon%20logga-ut.svg">
                        <span class="soleto-regular">Logga ut</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>