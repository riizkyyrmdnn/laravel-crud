<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Users</h1>
            <p class="mt-2 text-sm text-gray-700">A list of all the users in your account including their name, title,
                email and role.</p>
        </div>
        <div class="flex space-x-3 mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            <x-secondary-button :href="route('persons.create')" title="Add new person">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 mr-1">
                    <path fill-rule="evenodd"
                        d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z"
                        clip-rule="evenodd" />
                </svg>
                {{ __('Add user') }}
            </x-secondary-button>
            <form acthon="{{ route('persons.destroyAll') }}" method="POST">
                @csrf
                @method('DELETE')

                <x-danger-button x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'confirm-reset-table')" title="Clear all person">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>
                    {{ __('Clear') }}
                </x-danger-button>
            </form>

            <x-modal name="confirm-reset-table" :show="$errors->userDeletion->isNotEmpty()" focusable>
                <form method="POST" action="{{ route('persons.destroyAll') }}" class="p-6">
                    @csrf
                    @method('DELETE')

                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Are you sure you want to clear all person?') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                    </p>

                    <div class="mt-6">
                        <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                        <x-text-input id="password" name="password" type="password" class="mt-1 block w-3/4"
                            placeholder="{{ __('Password') }}" />

                        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                    </div>

                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('Cancel') }}
                        </x-secondary-button>

                        <x-danger-button class="ms-3">
                            {{ __('Reset all') }}
                        </x-danger-button>
                    </div>
                </form>
            </x-modal>

        </div>
    </div>
    <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                        <tr>
                            <th scope="col"
                                class="py-3.5 pl-4 pr-5 text-left text-sm font-semibold text-gray-900 sm:pl-0">Name</th>
                            <th scope="col" class="py-3.5 px-7 text-left text-sm font-semibold text-gray-900">Title
                            </th>
                            <th scope="col" class="py-3.5 px-5 text-left text-sm font-semibold text-gray-900">Status
                            </th>
                            <th scope="col" class="py-3.5 px-5 text-left text-sm font-semibold text-gray-900">Role
                            </th>
                            <th scope="col" class="py-3.5 pl-4 text-left pr-4 sm:pr-0">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @foreach ($persons as $person)
                            <tr>
                                <td class="whitespace-nowrap py-5 pl-4 pr-5 text-sm sm:pl-0">
                                    <div class="flex items-center">
                                        <div class="h-11 w-11 flex-shrink-0">
                                            <img class="h-11 w-11 rounded-full" src="{{ $person->image }}"
                                            alt="{{ $person->name }}">
                                        </div>
                                        <div class="ml-4">
                                            <div class="font-medium text-gray-900 capitalize">{{ $person->name }}</div>
                                            <div class="mt-1 text-gray-500">{{ $person->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="whitespace-nowrap px-7 py-5 text-sm text-gray-500">
                                    <div class="text-gray-900 capitalize">{{ $person->title }}</div>
                                    <div class="mt-1 text-gray-500 capitalize">{{ $person->department }}</div>
                                </td>
                                <td class="whitespace-nowrap px-5 py-5 text-sm text-gray-500">
                                    <span
                                        class="{{ $person->status === 'active' ? 'bg-green-50 text-green-700 ring-green-600/20' : 'bg-red-50 text-red-700 ring-red-600/20' }} inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset ring-green-600/20 capitalize">{{ $person->status }}</span>
                                </td>
                                <td class="whitespace-nowrap px-5 py-5 text-sm text-gray-500 capitalize">
                                    {{ $person->role }}</td>
                                <td class="whitespace-nowrap py-5 pl-3 pr-4 text-sm font-medium sm:pr-0">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('persons.show', $person->id) }}"
                                            class="flex justify-center items-center w-8 h-8 text-white bg-blue-600 hover:bg-blue-500 rounded"
                                            title="Show person">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="size-5">
                                                <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                <path fill-rule="evenodd"
                                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                        <a href="{{ route('persons.edit', $person->id) }}"
                                            class="flex justify-center items-center w-8 h-8 text-white bg-blue-600 hover:bg-blue-500 rounded"
                                            title="Edit person">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="size-5">
                                                <path
                                                    d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                                <path
                                                    d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('persons.destroy', $person->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="flex justify-center items-center w-8 h-8 text-white bg-red-600 hover:bg-red-500 rounded"
                                                title="Delete person">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-5">
                                                    <path fill-rule="evenodd"
                                                        d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
