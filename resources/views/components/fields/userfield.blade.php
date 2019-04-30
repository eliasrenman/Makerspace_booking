@component('components.fields.logoutfield')
    @slot('title', $title)
    @slot('img')
        <img src="{{$image}}" class="user-image">
    @endslot
    @slot('name', $name)
    @slot('logout_route', $logout_route)
@endcomponent