<div class="mt-5 bg-indigo-50 border-dashed p-5 text-center rounded dark:bg-gray-400">
    <div class="flex flex-row justify-center">
        <form wire:submit.prevent='aprobar'>
            <x-primary-button class="ms-3 bg-green-600 dark:hover:bg-green-900 dark:bg-green-600 dark:text-white dark:font-bold">
                {{ __('Aprobar') }}
            </x-primary-button>
        </form>
        <form wire:submit.prevent='denegar'>
            <x-primary-button class="ms-3 bg-red-600 dark:bg-red-600 dark:hover:bg-red-900 dark:text-white dark:font-bold">
                {{ __('Denegar') }}
            </x-primary-button>
        </form>
    </div>
</div>