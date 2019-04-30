<div class="row {{$row_class ?? ''}}">
    <div class="col-md mt-3">
        <label for="{{$type}}" class="d-block">
            {{$title}}
        </label>
        <input id="{{$type}}" type="{{$type}}" onchange="changeSubmitButton()"
               class="w-75  d-block soleto-regular form-input @error('{{$type}}') is-invalid @enderror"
               name="{{$submit_name}}" @if((old('name')) == true)
               value="{{old('name')}}"
               @else
               value="{{$value ?? ''}}"
               @endif
               required autocomplete="{{$submit_name}}" autofocus>

        @error($type)
        <span class="" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>