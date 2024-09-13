<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 my-3 uppercase">
            {{$oferta->titulo}}
        </h3>
    </div>

    <!-- estilos para dividir en columnas class="md:grid md:grid-cols-2" -->
    <div class="bg-indigo-50 p-4 my-10">
        <p class="font-bold text-sm uppercase text-gray-800 my-3">
            Empresa: <span class="normal-case font-normal">{{$oferta->empresa}}</span></p>
        <p class="font-bold text-sm uppercase text-gray-800 my-3">
            Ubicación: <span class="normal-case font-normal">{{$oferta->ubicacion}}</span></p>
        <p class="font-bold text-sm uppercase text-gray-800 my-3">
            Salario: <span class="normal-case font-normal">{{$oferta->salario->salario}}</span></p>
        <p class="font-bold text-sm uppercase text-gray-800 my-3">
            Modalidad: <span class="normal-case font-normal">{{$oferta->modalida->modalida}}</span></p>
        <p class="font-bold text-sm uppercase text-gray-800 my-3">
            Horario: <span class="normal-case font-normal">{{$oferta->horario->horario}}</span></p>
        <p class="font-bold text-sm uppercase text-gray-800 my-3">
            Fecha de publicación de la oferta: <span class="normal-case font-normal">{{$oferta->created_at->toFormattedDateString()}}</span></p>
        <p class="font-bold text-sm uppercase text-gray-800 my-3">
            Última actualización de la oferta: <span class="normal-case font-normal">{{$oferta->updated_at->toFormattedDateString()}}</span></p>
    </div>

    <div class="md:grid md:grid-cols-6">
        <div class="md:col-span-4">
            <div>
                <h2 class="text-2xl font-bold mb-2 dark:text-gray-300">Descripción de la oferta</h2>
                <p class="dark:text-gray-300">{{$oferta->descripcion}}</p>
            </div>
            <div class="mt-5">
                <h2 class="text-2xl font-bold mb-2 dark:text-gray-300">Requerimientos específicos</h2>
                <p class="dark:text-gray-300">{{$oferta->requerimientos}}</p>
            </div>
        </div>
        <div class="md:col-span-2 mt-5">
            @if ($oferta->imagen!='')
            <img src="{{ asset('storage/ofertas/'. $oferta->imagen )}}" alt="{{'Imagen oferta' . $oferta->titulo}}">
            @endif
        </div>
    </div>

    @guest
    <div class="mt-5 bg-indigo-50 border-dashed p-5 text-center">
        <p>
            ¿Quieres aplicar a esta oferta? <a class="font-bold text-indigo-600" href="{{ route('register')}}">Crea una cuenta totalmente gratis y accede a esta y muchas otras ofertas</a>
        </p>
    </div>
    @endguest

    @auth
    @if (auth()->user()->rol === 3)
    <livewire:validar-oferta :oferta="$oferta"/>
    @else
    @cannot('create', App\Models\Oferta::class)
    <livewire:postular-oferta :oferta="$oferta" />
    @endcannot
    @endif

    @endauth

</div>