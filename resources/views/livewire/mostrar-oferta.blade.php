<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    @forelse ($ofertas as $oferta)
    <div class="p-6 text-gray-900 dark:text-gray-300 md:flex md:justify-between md:items-center">
        <div class="space-y-2">
            <a href="{{route('ofertas.show',$oferta->id)}}" class="text-xl font-bold uppercase">{{ $oferta->titulo }}</a>
            <p class="text-sm text-gray-600 dark:text-gray-400 font-bold">{{ $oferta->empresa }}</p>
            <p class="text-sm text-gray-600 dark:text-gray-400 font-bold">{{$oferta->modalida->modalida}}</p>
            <p class="text-sm text-gray-500 dark:text-gray-400">publicada el: {{ $oferta->updated_at->format('d/m/Y') }}</p>
        </div>
        <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">

            <a href="{{ route('candidatos.index',$oferta)}}" class="bg-indigo-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">{{$oferta->candidatos->count()}} Postulados</a>
            <a href="{{route('ofertas.edit', $oferta->id)}}" class="bg-green-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Editar</a>
            <button wire:click="$dispatch('eliminar', {{$oferta->id}})" class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Eliminar</button>
            <a href="{{route('ofertas.update',$oferta->id)}}" class="{{ $oferta->publicado ? 'bg-gray-500' : 'bg-blue-300'}} py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                {{ $oferta->publicado ? 'Pausar' :'Publicar'}}
            </a>
        </div>
    </div>
    @empty
    <p class='p-3 text-center text-sm text-gray-600'>Aún no has publicado ninguna oferta</p>
    @endforelse

    <div class="p-3">
        {{ $ofertas->links() }}
    </div>
</div>


<!-- alerta de borrado de oferta -->
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Livewire.on('eliminar', (ofertaId) => {
        Swal.fire({
            title: 'Estas seguro?',
            text: "¡No podrás revertir esto!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, Bórralo",
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('eliminarOferta', {
                    oferta: ofertaId
                })
                Swal.fire({
                    title: "Oferta eliminada!",
                    text: "tu oferta se elimino satisfactoriamente.",
                    icon: "success"
                });
            }
        });
    })
</script>
@endpush