<div>
    <livewire:filtrar-ofertas />
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-800 mb-12 text-center dark:text-gray-300">Nuestras Ofertas Disponibles</h3>
            <div class="bg-white shadow-sm rounded-lg p-6 divide-y divide-gray-200">
                @forelse ($ofertas as $oferta)
                <div class="md:flex md:justify-between md:items-center py-5">
                    <div class="md:flex-1">
                        <a href="{{route('ofertas.show',$oferta->id)}}" class="text-3xl font-extrabold text-gray-600">{{$oferta->titulo}}</a>
                        <p class="text-base text-gray-600 mb-1 font-bold">Empresa: <span class="font-normal">{{$oferta->empresa}}</span></p>
                        <p class="text-base text-gray-600 mb-1 font-bold">Modalidad: <span class="font-normal">{{$oferta->modalida->modalida}}</span></p>
                        <p class="text-base text-gray-600 mb-3 font-bold">Horario: <span class="font-normal">{{$oferta->horario->horario}}</span></p>
                    </div>
                    <div>
                        <a href="{{route('ofertas.show',$oferta->id)}}" class="p-2 text-sm uppercase text-white font-bold rounded-lg bg-indigo-600 block text-center">Ver oferta</a>
                    </div>
                </div>
                @empty
                <p class="p-3 text-center text-sm text-gray-600">No hay ofertas publicadas en este momento</p>
                @endforelse
            </div>
        </div>
    </div>
    <div class="pb-4">
        <p class="text-sm font-bold text-center dark:text-gray-300">
            S.I Nova Gestión <?php echo date('Y'); ?> © Todos los derechos reservados
        </p>
    </div>

</div>