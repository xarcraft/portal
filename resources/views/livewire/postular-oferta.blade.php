<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">Postularme</h3>

    @if(session()->has('mensaje'))
    <p class="font-bold text-sm text-green-500 my-3 uppercase rounded-lg text-center">
        {{session('mensaje')}}
    </p>
    @else
    <form wire:submit.prevent='postularme' class="w-96 mt-5">
        <div class="mb-4">
            <x-input-label for="cv" :value="__('Hoja de vida formato PDF')" />
            <x-text-input id="cv" type="file" wire:model="cv" accept=".pdf" class="block mt-1 w-full" />
        </div>
        <x-input-error :messages="$errors->get('cv')" class="mt-2" />
        <x-primary-button class="ms-3">
            {{ __('Postularme') }}
        </x-primary-button>
    </form>
    @endif
</div>