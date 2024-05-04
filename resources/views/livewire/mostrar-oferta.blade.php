<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    @forelse ($ofertas as $oferta)
    <div class="p-6 text-gray-900 dark:text-gray-100 md:flex md:justify-between md:items-center">
        <div class="space-y-2">
            <a href="#" class="text-xl font-bold uppercase">{{ $oferta->titulo }}</a>
            <p class="text-sm text-gray-600 font-bold">{{ $oferta->empresa }}</p>
            <p class="text-sm text-red-600 font-bold">aqui va la modalidad del empleo *</p>
            <p class="text-sm text-gray-500">publicada el: {{ $oferta->updated_at->format('d/m/Y') }}</p>
        </div>
        <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">

            <a href="#" class="bg-indigo-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Postulados</a>
            <a href="#" class="bg-green-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Editar</a>
            <a href="#" class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Eliminar</a>

            @if($oferta->publicado==1)
            <a href="#" class="bg-gray-500 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">pausar</a>
            @else
            <a href="#" class="bg-blue-300 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">reanudar</a>
            @endif

        </div>
    </div>
    @empty
    <p class='p-3 text-center text-sm text-gray-600'>Aún no has publicado ninguna oferta</p>
    @endforelse

    <div class="p-3">
        {{ $ofertas->links() }}
    </div>
</div>