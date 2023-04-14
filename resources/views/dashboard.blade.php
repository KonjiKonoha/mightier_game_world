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
                    <p>Welcome <a href="{{ route('profile.edit') }}"><strong>{{ Auth()->user()->name }}</strong></a> from
                        {{ config('app.name') }}. Please enjoy the games.</p>
                    <p class="text-xl font-bold text-gray-700 dark:text-gray-100 mt-8">My information</p>
                    <p class="mt-8">Credit: <strong
                            class="border p-4 bg-blue-200 rounded-lg shadow dark:bg-blue-800 dark:shadow-xl">$
                            {{ number_format(Auth()->user()->credit, 2) }}</strong> <span
                            class="text-gray-400 dark:text-green-400">(If you want to fill the credit,
                            please feel free to contact to Game Master.)</span></p>
                    <p class="mt-8">Contact: {{ Auth::user()->phone }}</p>
                </div>

                <!-- Jackpot: Slot Machine -->
                <div
                    class="flex item-center p-6 text-gray-900 dark:text-gray-100 text-center">
                    <div class="hover:bg-yellow-200 p-8 dark:hover:text-gray-700">
                        <a href="{{ route('games.slot') }}">
                            <img src="{{ asset('assets/logo.png') }}" alt="Game 1" class="object-cover" width="300px">
                            Jackpot - Slot Machine
                        </a>
                        @if (Auth()->user()->type == 'admin')
                            <a href="{{ route('games.control', 1) }}"
                                class="mb-4 border p-4 bg-blue-700 text-white hover:bg-green-500 rounded-lg dark:bg-gray-100 dark:text-gray-700 dark:hover:shadow-lg">
                               Control
                            </a>
                        @endif
                    </div>

                    <div class="hover:bg-yellow-200 p-8 dark:hover:text-gray-700">
                        <a href="{{ route('games.slot.classic') }}">
                            <img src="{{ asset('assets/logo_classic.png') }}" alt="Game 1" class="object-cover" width="300px">
                            Classic - Slot Machine
                        </a>
                        @if (Auth()->user()->type == 'admin')
                            <a href="{{ route('games.control', 2) }}"
                                class="mb-4 border p-4 bg-blue-700 text-white hover:bg-green-500 rounded-lg dark:bg-gray-100 dark:hover:shadow-lg  dark:text-gray-700">
                                Control
                            </a>
                        @endif
                    </div>
                </div>
                <!-- /. End of Jackpot: Slot Machine -->

                <!-- Classic: Slot Machine -->
                <div
                    class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    <div>
                        <h2 class="text-3xl lg:text-4xl">Contact us</h2>
                        <p>
                            <ul>
                                <li><a href="#" class="hover:text-blue-600"><i class="fab fa-facebook-square"></i> Mighty Fighter</a></li>
                                <li><a href="#" class="hover:text-blue-600"><i class="fab fa-viber"></i> +95 99 77 88 66 55</a></li>
                            </ul>
                        </p>
                    </div>
                </div>
                <!-- /. End of Classic: Slot Machine -->
            </div>
        </div>
    </div>
</x-app-layout>
