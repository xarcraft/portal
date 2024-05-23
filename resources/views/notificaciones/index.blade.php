<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold text-center my-10">Mis notificaciones</h1>
                    @forelse ($notificaciones as $notificacion)
                    <div class="p-5 border border-gray-200 lg:flex lg:justify-between lg:items-center">
                        <div>
                            <p>Tienes un nuevo candidato en: <span class="font-bold">{{$notificacion->data['nombre_oferta']}}</span></p>
                            <p><span class="font-bold">{{$notificacion->created_at->diffForHumans()}}</span></p>
                        </div>
                        <div class="p-2">
                            <a href="#" class="p-2 text-sm uppercase text-white font-bold rounded-lg bg-indigo-600">Ver Perfil</a>
                        </div>
                    </div>
                    @empty
                    <p class="text-center text-gray-600">No hay Notificaciones Nuevas</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>