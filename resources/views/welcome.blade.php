@extends('layouts.app')

@section('content')
        <header>
            <nav class=" relative flex items-center justify-between p-6 lg:px-8 z-10" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a href="{{ route('home') }}" class="-m-1.5 p-1.5">
                        <span class="sr-only">Your Company</span>
                        <img class="w-9 h-9" src="{{ asset('logo.svg') }}"
                            alt="logo">
                    </a>
                </div>
                <button type="button" onclick="share()"
                    class="flex items-center space-x-2 font-semibold leading-6 text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                        <path fill-rule="evenodd"
                            d="M15.75 4.5a3 3 0 1 1 .825 2.066l-8.421 4.679a3.002 3.002 0 0 1 0 1.51l8.421 4.679a3 3 0 1 1-.729 1.31l-8.421-4.678a3 3 0 1 1 0-4.132l8.421-4.679a3 3 0 0 1-.096-.755Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span>Share to social</span>
                </button>
            </nav>
        </header>

        <div class="relative isolate pt-14">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
                aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
            <div class="py-24 sm:py-32 lg:pb-40">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <div class="mx-auto max-w-2xl text-center">
                        <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Exciting CRUD: Limitless Table Creation!</h1>
                        <p class="mt-6 leading-7 text-gray-600">Tired of the same application? Want to try to create something unique and personal? The Fun CRUD Web is the answer! With this website, you can easily create your own tables, as you like and as creatively as possible!</p>
                        <div class="mt-10 flex items-center justify-center gap-x-6">
                            @if (Route::has('login'))
                                @auth
                                    <x-secondary-button :href="url('/dashboard')">
                                        {{ __('Go to Dashboard') }}
                                    </x-secondary-button>
                                @else
                                    @if (Route::has('register'))
                                        <x-secondary-button :href="route('register')">
                                            {{ __('Sign up') }}
                                        </x-secondary-button>
                                    @endif
                                    <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-gray-900">
                                        Log in <span aria-hidden="true">→</span>
                                    </a>
                                @endauth
                            @endif
                        </div>
                    </div>
                    <div class="mt-16 flow-root sm:mt-24">
                        <div
                            class="-m-2 rounded-xl bg-gray-900/5 p-2 ring-1 ring-inset ring-gray-900/10 lg:-m-4 lg:rounded-2xl lg:p-4">
                            <img src="{{ asset('welcome.jpg') }}"
                                alt="App screenshot" width="2432" height="1442"
                                class="rounded-md shadow-2xl ring-1 ring-gray-900/10">
                        </div>
                    </div>
                </div>
            </div>
            <div class="absolute inset-x-0 top-2/3 -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                aria-hidden="true">
                <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
        </div>
@endsection

<script lang="js">
    const share = async () => {
        const content = {
            title: "CRUD For Fun",
            text: "Tired of the same application? Want to try to create something unique and personal? The Fun CRUD Web is the answer! With this website, you can easily create your own tables, as you like and as creatively as possible!",
            url: encodeURIComponent(window.location.href),
        };

        try {
            if (navigator.share) {
                navigator.share(content);
                console.log("Shared successfully.");
            } else {
                alert("The Web Share API is not supported in this browser.");
            }
        } catch (error) {
            alert(`Error sharing: ${error}`);
            console.error("Error sharing: ", error);
        }
    }
</script>
