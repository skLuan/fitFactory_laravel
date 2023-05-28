<div {{$attributes->merge(['class' => 'input_container'])}}>
    <label for="{{ $nameId }}">
        <h3 class="text-ffGray opacity-70 font-square mr-4 text-5xl pt-6">{{$slot}}</h3>
    </label>
    <input {{$attributes->merge(['placeholder' => ''])}} type="{{ $typeInput }}" name="{{ $nameId }}" id="{{ $nameId }}">
</div>
