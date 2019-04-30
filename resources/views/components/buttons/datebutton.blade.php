<div class="column col-sm-5">
    <div class="date">
        <a class="button" onclick="select(this, '.date>.button')" href="{{isset($dayname) ? '#tomorrow': '#today'}}">
            <div class="button-filler magenta-fill"></div>
            <span class="soleto-regular"
                  data-day="{{isset($day_name) ? '1': '0'}}"
                  data-value="{{$datetime['date']}}">{{$dayname ?? 'Idag'}} ({{$datetime['readable']}})</span>
        </a>
    </div>
</div>