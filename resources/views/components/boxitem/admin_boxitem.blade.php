@component('components.boxitem.boxitem')
    @slot('title')
        {{$user['email']}}
        @if($user['id'] == $active_user_id)
            (du)
        @endif
    @endslot
    <p class="m-0 soleto-regular">Administratör
        <img src="/images/Ikon%20logga-ut.svg"
             onclick="deleteAdmin({{$user['id']}})">
    </p>
@endcomponent