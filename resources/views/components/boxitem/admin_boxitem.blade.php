@component('components.boxitem.boxitem')
    @slot('title')
        {{$user['email']}}
        @if($user['id'] == $active_user_id)
            (du)
        @endif
    @endslot
    Administratör
    <img class="float-right position-relative item-buttons" src="/images/Ikon%20Delete.svg"
         onclick="deleteAdmin({{$user['id']}})">
@endcomponent