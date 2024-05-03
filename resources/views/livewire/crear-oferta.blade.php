<form action="" class="md:w-1/2 space-y-5" wire:submit.prevent='crearOferta'>
    <!-- Email Address -->
    <div>
        <x-input-label for="titulo" :value="__('Nombre de la Oferta')" />
        <x-text-input id="titulo" class="block mt-1 w-full" type="text" wire:model="titulo" :value="old('titulo')" placeholder="Qué estás buscando?" />
        <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="empresa" :value="__('Nombre de tu empresa')" />
        <x-text-input id="empresa" class="block mt-1 w-full" type="text" wire:model="empresa" :value="old('empresa')" placeholder="Quién esta buscando?" />
        <x-input-error :messages="$errors->get('empresa')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="ubicacion" :value="__('Locación')" />
        <x-text-input id="ubicacion" class="block mt-1 w-full" type="text" wire:model="ubicacion" :value="old('ubicacion')" placeholder="Dónde está ubicada la empresa?" />
        <x-input-error :messages="$errors->get('ubicacion')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="descripcion" :value="__('Descripción de la oferta')" />
        <textarea wire:model="descripcion" id="descripcion" placeholder="Describe brevemente tu oferta para los posibles interesados" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm h-72"></textarea>
        <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="salario" :value="__('Salario mensual')" />
        <select wire:model="salario" id="salario" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" wire:model="salario">
            <option value=""> Selecciona un rango de salarios para tu oferta </option>
            @foreach ($salarios as $salario)
            <option value="{{ $salario->id }}">{{ $salario->salario}}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('salario')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="modalidad" :value="__('Modalidad de trabajo')" />
        <select wire:model="modalidad" id="modalidad" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" wire:model="modalidad">
            <option value=""> Selecciona una modalidad de trabajo </option>
            @foreach ($modalidas as $modalida)
            <option value="{{ $modalida->id }}">{{ $modalida->modalida}}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('modalidad')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="requerimientos" :value="__('Requerimientos')" />
        <textarea wire:model="requerimientos" id="requerimientos" placeholder="Digite aquí si su oferta tiene requerimientos específicos (opcional)" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm h-52"></textarea>
        <x-input-error :messages="$errors->get('requerimientos')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="horario" :value="__('Horario')" />
        <select wire:model="horario" id="horario" name="horario" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option value=""> Selecciona un horario de trabajo </option>
            @foreach ($horarios as $horario)
            <option value="{{ $horario->id }}">{{ $horario->horario}}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('horario')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="imagen" :value="__('Promoción gráfica de la oferta (opcional)')" />
        <x-text-input id="imagen" class="block mt-1 w-full" type="file" wire:model="imagen" accept='image/*' />
        <div class="my-5 w-96">
            @if($imagen)
            Imagen:
            <img src="{{ $imagen->temporaryUrl() }}" alt="">
            @endif
        </div>
        <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
    </div>

    <x-primary-button>
        {{ __('Registrar oferta') }}
    </x-primary-button>
</form>