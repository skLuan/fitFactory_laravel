<x-layouts.general class="grid grid-cols-12 auto-rows-max gap-x-5 px-5">
    {{-- <x-application-logo></x-application-logo> --}}

    <x-navigation.topbar class="col-span-full h-16 bg-gray-900"></x-navigation.topbar>
    <x-navigation.sidebar class="col-span-2"></x-navigation.sidebar>
    <div class="col-start-4 col-span-9">
        <nav id="semana_Controller">
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
            <h3 class="text-ffGray opacity-70 font-square text-5xl pt-6">Calentamiento</h3>
        </section>
        <section id="wodCore" class="pt-10">
            <x-input class="flex flex-row" nameId="WodName" placeholder="Nombre del Wod">Wod</x-input>
            <div class="mt-10 flex flex-row text-ffGreen">
                @foreach ($trainingTypes as $type)
                    <div class="border border-ffGreen mx-2 py-1 px-3">{{ $type->name }}</div>
                @endforeach
            </div>
            <x-input class="flex flex-row" nameId="reps" typeInput="number">Duración</x-input>

            <div>
                <x-table-edit></x-table-edit>
            </div>
        </section>
    </div>

</x-layouts.general>
