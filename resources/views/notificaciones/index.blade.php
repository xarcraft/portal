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

                    <div class="divide-y divide-gray-200">
                        @forelse ($notificaciones as $notificacion)
                        <div class="p-5 lg:flex lg:justify-between lg:items-center">
                            <div>
                                <p>Tienes una novedad en: <span class="font-bold">{{$notificacion->data['nombre_oferta']}}</span></p>
                                <p><span class="font-bold">{{$notificacion->created_at->diffForHumans()}}</span></p>
                            </div>
                            <div class="p-2">
                                <a href="{{route('candidatos.index', $notificacion->data['id_oferta'])}}" class="p-2 text-sm uppercase text-white font-bold rounded-lg bg-indigo-600">Ver Postulados</a>
                            </div>
                        </div>
                        @empty
                        <p class="text-center text-gray-600">No hay Notificaciones Nuevas</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>