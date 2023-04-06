<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Welcome from {{ config('app.name') }}. Please enjoy the games.
                </div>

                <div class="p-6 text-gray-900 dark:text-gray-100 text-center w-64">
                    <a href="{{ route('games.slot') }}">
                        <img src="{{ asset('assets/logo.png') }}" alt="Game 1" class="object-cover" width="300px">
                        Jackpot - Slot Machine
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
