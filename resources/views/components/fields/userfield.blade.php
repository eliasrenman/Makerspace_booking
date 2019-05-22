@component('components.fields.logoutfield')
    @slot('title', $title)
    @slot('img')
        <img src="{{$image}}" class="user-image" alt="Använderns google icon">
    @endslot
    @slot('name', $name)
    @slot('logout_route', $logout_route)
@endcomponent