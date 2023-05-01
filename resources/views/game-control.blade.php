<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Game Control') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <header>
                        <h2 class="text-4xl font-extrabold dark:text-white mb-4">Game Control</h2>
                    </header>

                    <form method="post" action="{{ route('games.control.store', $game->id) }}" class="mt-6 space-y-6">
                        @csrf
                        <div class="w-3/4 mx-auto flex">
                            <div class="w-1/2 p-4">
                                <x-input-label for="game_id" :value="__('Game')" />
                                <x-text-input id="game_id" class="block mt-1 w-full" type="text"
                                        name="game_id" :value="old('game_id', $game->game_id)" required readonly />
                                <x-input-error class="mt-2" :messages="$errors->get('game_id')" />

                            </div>

                            <div class="w-1/2 p-4">
                                <!-- Phone Address -->
                                <div>
                                    <x-input-label for="win_rate" :value="__('Win Rate')" />
                                    <x-text-input id="win_rate" class="block mt-1 w-full" type="text"
                                        name="win_rate" :value="old('win_rate', number_format($game->win_rate, 2))" required min="-99.99" max="99.99" />
                                    <x-input-error :messages="$errors->get('win_rate')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>

                            @if (session('status') === 'profile-updated')
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
