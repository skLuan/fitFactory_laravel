<tr >
    <td>
        <x-input class="bg-transparent" :$nameId typeInput="number"></x-input>
    </td>
    <td class="relative">
        <x-input class="bg-transparent" :$nameId typeInput="text"></x-input>
        <div class="absolute flex flex-col">
            {{-- @foreach ($exercises as $ex)
                        <button>{{ $ex->name }}</button>
                    @endforeach --}}
        </div>
    </td>
</tr>
