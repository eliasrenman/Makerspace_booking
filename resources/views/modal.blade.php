<div class="jsmodal jsmodal-@stack('modal-size','large')" id="@stack('modal_id')">
    <h1>@yield('modal-title')</h1>
    <a class="jsmodal-close" href="#closemodal" onclick="closeParentModal(this)">X</a>
    <hr>
    @yield('modal-content')
</div>