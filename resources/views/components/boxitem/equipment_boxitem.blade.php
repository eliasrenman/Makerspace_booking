@component('components.boxitem.boxitem')
    @slot('title', $equipment['name'])

    @if($equipment['restricted'])
        Lärare endast
    @else
        Bokningsbar för alla
    @endif
    <span class="position-relative float-right item-buttons">
        <a class="item-buttons" href="{{route('equipment.edit', $equipment['id'])}}"><img
            src="/images/Ikon%20Redigera.svg" alt="Redigera utrustning"></a>
        <a href="{{route('equipment.destroy', $equipment['id'])}}"><img
                    src="/images/Ikon%20Delete.svg" alt="Ta bort utrustning"></a>
    </span>

@endcomponent