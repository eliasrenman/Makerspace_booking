@csrf
@component('components.box.box')
    @slot('title', $title ?? 'LÄGG TILL UTRUSTNING')

    @component('components.inputfield.inputfield')
        @slot('row_class', 'm-0')
        @slot('type', '')
        @slot('title', 'Namn')
        @slot('submit_name', 'name')
        @slot('value', $equipment['name'] ?? '')
    @endcomponent
    <div class="row m-0">
        <div class="col-md  mt-3 ">
            <label for="availability"
                   class="d-block">Tillgänglighet</label>

            <select id="availability" onchange="changeSubmitButton()"
                    class="w-75 d-block soleto-regular form-input @error('password') is-invalid @enderror"
                    name="restricted"
                    required>
                @if (isset($equipment['restricted']))
                    <option value="0" {{$equipment['restricted'] == 0 ? 'selected' : ''}}>
                        Bokningsbar för alla
                    </option>
                    <option value="1" {{$equipment['restricted'] == 1 ? 'selected' : ''}}>
                        Lärare endast
                    </option>
                @else
                    <option value="0">
                        Bokningsbar för alla
                    </option>
                    <option value="1">
                        Lärare endast
                    </option>
                @endif
            </select>

            @error('restricted')
            <span class="" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="row m-0 mt-3 mb-2">
        <div class="col-md-6">
            @component('components.buttons.submitbutton')
                @slot('onclick', 'submitForm()')
                @slot('title', $send_title ?? 'LÄGG TILL')
                @slot('class', 'm-0')
            @endcomponent
        </div>
    </div>
@endcomponent