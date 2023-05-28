<x-layouts.general class="grid grid-cols-12 auto-rows-max gap-x-5 px-5">
    {{-- <x-application-logo></x-application-logo> --}}

    <x-navigation.topbar class="col-span-full h-16 bg-gray-900"></x-navigation.topbar>
    <x-navigation.sidebar class="col-span-2"></x-navigation.sidebar>
    <div class="col-start-4 col-span-9">
        <nav id="semana_Controller" class="my-6">
            <ul id="" class="flex flex-row text-white">
                <li>Lunes</li>
                <li>Martes</li>
                <li>Miercoles</li>
                <li>Jueves</li>
                <li>Viernes</li>
                <li>Sabado</li>
            </ul>
        </nav>
        <section id="calentamiento">
            <h3 class="text-ffGray opacity-70 font-square text-5xl">Calentamiento</h3>
        </section>

        <section id="wodCore" class="pt-10">
            <form action="{{ route('newReps') }}" method="post">
                @csrf
                @method('POST')
                <x-input cClass="flex flex-row" nameId="WodName" placeholder="Nombre del Wod">
                    <h3 class="text-ffGray opacity-70 font-square mr-4 text-5xl pt-6">Wod</h3>
                </x-input>
                <div class="my-6 flex flex-row text-ffGreen">
                    @foreach ($trainingTypes as $type)
                        <button name="btn-type" onclick="setActiveButton(event,this)" value="{{ $type->id }}"
                            id="type-{{ $type->name }}"
                            class="border border-ffGreen mx-2 py-1 px-3 @if ($type->id === 3)
                                bg-ffGreen text-ffGreen-black
                            @endif">{{ $type->name }}</button>
                    @endforeach
                    <input name="trainingType" type="hidden" value="3" id="typeEntreno">
                </div>
                <script>
                    function setActiveButton(e, button) {
                        e.preventDefault();

                        buttons = document.querySelectorAll('button[name="btn-type"]');
                        buttons.forEach(btn => {
                            if (!btn.classList.contains('bg-ffGreen') && !btn.classList.contains('text-ffGreen-black')) return;

                            btn.classList.remove('bg-ffGreen', 'text-ffGreen-black');
                        });
                        // buttons.classlist.add('bg-ffGreen', 'text-ffGreen-black');
                        button.classList.add('bg-ffGreen', 'text-ffGreen-black');
                        var requestField = document.querySelector(`#typeEntreno`);
                        requestField.value = button.value;
                    }
                </script>
                <x-input cClass="flex flex-row" nameId="reps" typeInput="number">
                    <h3 class="text-ffGray opacity-70 font-square mr-4 text-3xl pt-6">Duracion</h3>
                </x-input>

                <div>
                    <x-table-edit></x-table-edit>
                </div>
            </form>
        </section>

        <section id="WodISGOing">
            @if (count($routines) > 0)
                <div class="grid grid-cols-2">
                    @foreach ($routines as $routine)
                    @php
                        $repsOfRoutine = $routine->repetitions;
                    @endphp

                        <h3 class="text-ffGreen text-2xl col-span-full" ><span class="text-ffGray">Tipo de entrenamiento:</span> {{$routine->trainingType->name}}</h3>
                        @foreach ($repsOfRoutine as $rep)
                        <h4 class="py-3" >{{ $rep->reps }}</h4>
                        <p  class="py-3" >{{ $rep->name }}</p>
                        @endforeach
                    @endforeach
                </div>
            @else
                <p>NO HAY NADA</p>
            @endif
        </section>
    </div>

</x-layouts.general>
