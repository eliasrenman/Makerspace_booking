@component('components.boxitem.boxitem')
    @slot('title', $equipment['name'])

    @if($equipment['restricted'])
        Lärare endast
    @else
        Bokningsbar för alla
    @endif
    <a href="{{route('equipment.edit', $equipment['id'])}}"><img
                src="/images/Ikon%20logga-ut.svg"></a>
    <a href="{{route('equipment.destroy', $equipment['id'])}}"><img
                src="/images/Ikon%20logga-ut.svg"></a>
@endcomponent