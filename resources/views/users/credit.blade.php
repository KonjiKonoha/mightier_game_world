<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <header>
                        <h2 class="text-4xl font-extrabold dark:text-white mb-4">Add credit to user</h2>
                    </header>

                    <form method="post" action="{{ route('users.add.credit', $user->id) }}" class="mt-6 space-y-6">
                        @csrf
                        <div class="w-3/4 mx-auto flex">
                            <div class="w-1/2 p-4">
                                <div>
                                    <strong>Name:</strong> {{ $user->name }}
                                </div>

                                <div class="mt-4">
                                    <strong>Email:</strong> {{ $user->email }}
                                </div>

                                <div class="mt-4">
                                    <strong>Current Credit:</strong> $ {{ number_format($user->credit, 2) }}
                                </div>
                            </div>
                            <div class="w-1/2 p-4">
                                <!-- Phone Address -->
                                <div>
                                    <strong>Phone:</strong> {{ $user->phone }}
                                </div>


                                <!-- User Type -->
                                <div class="mt-4">
                                    <strong>Type:</strong> {{ $user->type }}
                                </div>
                            </div>
                        </div>

                        <div class="w-3/4 mx-auto flex">
                            <div class="w-1/2 p-4">
                                <div>
                                    <x-input-label for="amount" :value="__('Amount')" />
                                    <x-text-input id="amount" class="block mt-1 w-full" type="number" name="amount"
                                        :value="old('amount')" required autocomplete="amount" />
                                    <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                                </div>
                            </div>
                            <div class="w-1/2 p-4">
                                <div>
                                    <x-input-label for="action_by" :value="__('Action for')" />
                                    <select id="action_by" name="action_by" required
                                        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full">
                                        <option value="null" disabled>Please select the transaction's action here.
                                        </option>
                                        <option value="deposit">Deposit</option>
                                        <option value="withdrawal">Withdrawal</option>
                                    </select>
                                    <x-input-error class="mt-2" :messages="$errors->get('action_by')" />
                                </div>
                            </div>
                        </div>

                        <div class="w-3/4 mx-auto flex">
                            <div class="w-full m-4">
                                <div>
                                    <x-input-label for="reason" :value="__('Reason')" />
                                    <textarea rows="4" id="reason" name="reason" required placeholder="Please enter the reason"
                                        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full"></textarea>
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
