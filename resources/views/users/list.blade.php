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
                    <h2 class="text-4xl font-extrabold dark:text-white mb-4">User List</h2>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full bg-white dark:bg-gray-800 shadow-md rounded my-6">
                            <thead
                                class="bg-gray-200 dark:bg-gray-700">
                                <tr>
                                    <th scope="col" class="text-left py-3 px-4 uppercase font-semibold text-sm text-gray-700 dark:text-gray-100 border-b border-gray-300 dark:border-gray-600">
                                        <div class="flex items-center">
                                            Name <a href="#"><svg xmlns="http://www.w3.org/2000/svg"
                                                    class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 320 512">
                                                    <path
                                                        d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                                </svg></a>
                                        </div>
                                    </th>
                                    <th scope="col" class="text-left py-3 px-4 uppercase font-semibold text-sm text-gray-700 dark:text-gray-100 border-b border-gray-300 dark:border-gray-600">
                                        <div class="flex items-center">
                                            Phone <a href="#"><svg xmlns="http://www.w3.org/2000/svg"
                                                    class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 320 512">
                                                    <path
                                                        d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                                </svg></a>
                                        </div>
                                    </th>
                                    <th scope="col" class="text-left py-3 px-4 uppercase font-semibold text-sm text-gray-700 dark:text-gray-100 border-b border-gray-300 dark:border-gray-600">
                                        <div class="flex items-center">
                                            Email <a href="#"><svg xmlns="http://www.w3.org/2000/svg"
                                                    class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 320 512">
                                                    <path
                                                        d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                                </svg></a>
                                        </div>
                                    </th>
                                    <th scope="col" class="text-left py-3 px-4 uppercase font-semibold text-sm text-gray-700 dark:text-gray-100 border-b border-gray-300 dark:border-gray-600">
                                        <div class="flex items-center">
                                            Type <a href="#"><svg xmlns="http://www.w3.org/2000/svg"
                                                    class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 320 512">
                                                    <path
                                                        d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                                </svg></a>
                                        </div>
                                    </th>
                                    <th scope="col" class="text-left py-3 px-4 uppercase font-semibold text-sm text-gray-700 dark:text-gray-100 border-b border-gray-300 dark:border-gray-600">
                                        <div class="flex items-center">
                                            Credit <a href="#"><svg xmlns="http://www.w3.org/2000/svg"
                                                    class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 320 512">
                                                    <path
                                                        d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                                </svg></a>
                                        </div>
                                    </th>
                                    <th scope="col" class="text-left py-3 px-4 uppercase font-semibold text-sm text-gray-700 dark:text-gray-100 border-b border-gray-300 dark:border-gray-600">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700 dark:text-gray-100">
                                @foreach ($users as $user)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-gray-900">
                                        <td scope="row"
                                            class="py-3 px-4 border-b border-gray-300 dark:border-gray-600">
                                            {{ $user->name }}
                                            <span
                                                class="inline-flex items-center p-1 mr-2 text-sm font-semibold text-blue-800 bg-blue-100 rounded-full dark:bg-gray-700 dark:text-blue-400">
                                                <svg aria-hidden="true" class="w-3 h-3" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <span class="sr-only">Verified</span>
                                            </span>
                                        </td>
                                        <td class="py-3 px-4 border-b border-gray-300 dark:border-gray-600">
                                            {{ $user->phone }}
                                        </td>
                                        <td class="py-3 px-4 border-b border-gray-300 dark:border-gray-600">
                                            {{ $user->email }}
                                        </td>
                                        <td class="py-3 px-4 border-b border-gray-300 dark:border-gray-600">
                                            {{ $user->type }}
                                        </td>
                                        <td class="py-3 px-4 border-b border-gray-300 dark:border-gray-600">
                                            $ {{ number_format($user->credit, 2) }}
                                        </td>
                                        <td class="py-3 px-4 border-b border-gray-300 dark:border-gray-600">
                                            <a href="{{ route('users.credit', $user->id) }}"
                                                class="inline-block bg-blue-500 hover:bg-blue-700 dark:bg-orange-500 darkhover:bg-orange-700 text-white dark:text-gray-900 font-bold py-2 px-4 rounded">
                                                Credit
                                            </a>
                                            <a href="{{ route('users.edit', $user->id) }}"
                                                class="inline-block bg-orange-500 hover:bg-orange-700 dark:bg-orange-500 darkhover:bg-orange-700 text-white dark:text-gray-900 font-bold py-2 px-4 rounded">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Table -->

                    <div class="flex justify-center items-center mt-3">{{ $users->links() }}
                        <nav aria-label="Page navigation example">
                            <ul class="inline-flex items-center -space-x-px">
                                <li>
                                    <a href="#"
                                        class="block px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                        <span class="sr-only">Previous</span>
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                                </li>
                                <li>
                                    <a href="#" aria-current="page"
                                        class="z-10 px-3 py-2 leading-tight text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                        <span class="sr-only">Next</span>
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
