@extends('layouts.app')

@section('title', 'Show user')

@section('content')
    <x-back-button :href="route('dashboard')">
        {{ __('Back to dashboard') }}
    </x-back-button>

    <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]"
        aria-hidden="true">
        <div class="relative left-1/2 -z-10 aspect-[1155/678] w-[36.125rem] max-w-none -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem]"
            style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
        </div>
    </div>

    <div class="flex justify-center items-center w-screen min-h-screen">
        <section class="relative max-w-2xl mx-auto bg-white w-max px-10 py-5 shadow-lg rounded-lg">
            <div>
                <div class="text-center">
                    <img class="mx-auto h-44 w-44 rounded-full" src="{{ $person->image }}" alt="{{ $person->name }}">
                    <h3 class="mt-6 text-xl font-semibold leading-8 tracking-tight text-gray-900 capitalize md:text-2xl">
                        {{ $person->name }}</h3>
                    <p class="text-base leading-7 text-gray-600">{{ $person->email }}</p>
                    <div class="text-start my-5">
                        <h3 class="text-sm font-semibold text-gray-600 mt-6 mb-2">USER DETAIL</h3>
                        <ul
                            class="flex flex-col gap-x-6 rounded-md bg-gray-50 p-3 font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">
                            <li class="grid grid-cols-2">
                                <div>Title:</div>
                                <div>{{ $person->title }}</div>
                            </li>
                            <li class="grid grid-cols-2">
                                <div>Department:</div>
                                <div>{{ $person->department }}</div>
                            </li>
                            <li class="grid grid-cols-2">
                                <div>Status:</div>
                                <div>{{ ucfirst($person->status) }}</div>
                            </li>
                            <li class="grid grid-cols-2">
                                <div>Role:</div>
                                <div>{{ ucfirst($person->role) }}</div>
                            </li>
                        </ul>
                        <x-secondary-button :href="route('persons.edit', $person->id)" class="w-full mt-5">
                            {{ __('Edit user') }}
                        </x-secondary-button>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
