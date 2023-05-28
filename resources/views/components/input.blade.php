<div class="input_container {{$cClass}}">
    <label for="{{ $nameId }}">
        {{ $slot }}
    </label>
    <input {{ $attributes->merge(
        ['class' => 'focus:outline-offset-0 focus:outline-ffGreen bg-transparent',
        'placeholder' => '']) }}
        type="{{$typeInput}}" name="{{$nameId}}"
        id="{{$nameId}}">
</div>
