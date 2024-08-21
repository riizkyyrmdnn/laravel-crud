@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="min-h-full">
        <div class="bg-indigo-600 pb-32">
            <header>
                <div class="py-10">
                    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                        <h1 class="text-4xl font-bold tracking-tight text-white">
                            {{ __('Dashboard') }}
                        </h1>
                    </div>
                </div>
            </header>
        </div>

        <main class="-mt-32">
            <div class="mx-auto max-w-7xl pb-12 sm:px-6 lg:px-8">
                <div class="rounded-lg bg-white px-5 py-6 shadow sm:px-6">

                    @include('persons.table')

                    <div class="px-4 mt-5 sm:px-6 lg:px-8">
                        {{ $persons->links() }}
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
