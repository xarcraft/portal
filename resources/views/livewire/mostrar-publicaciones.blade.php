<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900 dark:text-gray-100 md:justify-between md:items-center">
        @forelse ($postulaciones as $postulacion)
        <div class="space-y-0 p-2">
            <p class="uppercase text-gray-600 font-bold">Oferta: {{$postulacion->oferta_id}}</p>
            <p class="text-sm text-gray-500 font-bold">Fecha de postulacion: {{$postulacion->created_at->format('d/m/Y')}}</p>
        </div>
        @empty
        <p class='p-3 text-center text-sm text-gray-600'>Aún no te has postulado a ninguna oferta</p>
        @endforelse

        <div class="p-3">
            {{ $postulaciones->links() }}
        </div>
    </div>
</div>