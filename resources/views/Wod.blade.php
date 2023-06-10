<x-layouts.general class="grid grid-cols-12 px-5 auto-rows-max gap-x-5">
    @push('head')
        @vite(['resources/js/createWodController.js'])
    @endpush
    {{-- <x-application-logo></x-application-logo> --}}

    <x-navigation.topbar class="h-16 bg-gray-900 col-span-full"></x-navigation.topbar>
    <x-navigation.sidebar class="col-span-2"></x-navigation.sidebar>
    <nav id="semana_Controller" class="col-span-9 col-start-4 my-6">
        <ul id="" class="flex flex-row text-white">
            <li>Lunes</li>
            <li>Martes</li>
            <li>Miercoles</li>
            <li>Jueves</li>
            <li>Viernes</li>
            <li>Sabado</li>
        </ul>
    </nav>
    <section id="calentamiento" class="col-span-9 col-start-4">
        <h3 class="text-5xl text-ffGray opacity-70 font-square">Calentamiento</h3>
    </section>
    <section id="wodCore" class="col-span-5 col-start-4 pt-10">
        <x-input cClass="flex flex-col w-1/2" nameId="WodName" placeholder="Linda">
            <h3 class="pt-6 mr-4 text-3xl text-ffGray opacity-70 font-square">Work Of Day:</h3>
        </x-input>
        <form id="formWodCreator" action="{{ route('newReps') }}" method="post">
            @csrf
            @method('POST')

            <div class="flex flex-row my-6 text-ffGreen">
                @foreach ($trainingTypes as $type)
                    <button name="btn-type" onclick="setActiveButton(event,this)" value="{{ $type->id }}"
                        id="type-{{ $type->name }}"
                        class="border border-ffGreen mx-2 py-1 px-3 @if ($type->id === 3) bg-ffGreen text-ffGreen-black @endif">{{ $type->name }}</button>
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
            <x-input cClass="flex flex-row items-center" class="w-1/6" nameId="RoutineReps" typeInput="number">
                <h3 class="mr-4 text-3xl text-ffGray opacity-70 font-square">Duracion</h3>
            </x-input>

            <div>
                <x-table-edit></x-table-edit>
            </div>
        </form>
    </section>
    <section id="WodISGOing" class="col-span-3 col-start-9">
        @if (count($routines) > 0)
            <div class="w-full">
                <h3 id="renderWodName" class="py-2 text-2xl font-bold text-ffWhite">Nombre Wod</h3>
                @foreach ($routines as $routine)
                    @php
                        $repsOfRoutine = $routine->repetitions;
                    @endphp
                    <h3 class="relative w-full text-2xl text-right text-ffGreen col-span-full">
                        <span class="absolute bottom-0 left-0 text-xl text-ffGray opacity-10">Tipo de
                            entrenamiento:</span> {{ $routine->trainingType->name }}
                            <span class="text-2xl font-bold text-ffWhite">{{ $routine->routine_reps }}</span>
                        </h3>
                    @foreach ($repsOfRoutine as $rep)
                        <div class="flex flex-row">
                            <h4 class="py-3 mr-3 font-bold text-ffGreen">{{ $rep->reps }}</h4>
                            <p class="py-3 capitalize">{{ $rep->name }}</p>
                        </div>
                    @endforeach
                @endforeach
                <form action="{{ route('createWod') }}" method="POST">
                    @csrf
                    @method('POST')

                    <?php
                        $routinesForNewWod = array_map(function($rou){
                            return $rou->id;
                        },$routines->all());
                    ?>
                    <input type="hidden" id="realWodName" name="realWodName">
                    <input type="hidden" id="hiddenRoutines" name="hiddenRoutines" value="{{json_encode($routinesForNewWod)}}">
                    <script>
                        console.log(document.querySelector('#hiddenRoutines').value);
                    </script>
                    <button type="submit" class="flex mx-auto underline">Crear wod</button>
                </form>
            </div>
        @else
            <p>NO HAY NADA</p>
        @endif
    </section>
</x-layouts.general>
