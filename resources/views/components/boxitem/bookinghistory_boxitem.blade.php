@component('components.boxitem.boxitem')
    @slot('title')
        {{$booking['date']}} {{$booking['start']}}
        - {{$booking['end']}}
    @endslot
        {{$booking['name']}}, {{$booking['equipment']}}

@endcomponent