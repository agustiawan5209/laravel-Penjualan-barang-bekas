<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" /> --}}
    <title>{{ config('APP_NAME', 'Jual') }}</title>

    <!-- Styles -->
    @livewireStyles
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>

    <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <!-- JavaScript -->
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

    <script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('build/assets/app.b856226e.css') }}">
    @vite(['resources/js/app.js'])
    <style>
        .flickity-viewport {
            height: 500px !important;
        }
    </style>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script>
        new WOW().init();
    </script>
</head>

<body class="font-body antialiased text-[#000000] bg-[#fcfcfc] dark:text-[#ffffff] dark:bg-[#031022]"
    x-data="{ Dropdown: false, ChatPopUp: false }">
    <div class="bg-gray-900">
        <div class="px-4 py-5 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
            <div class="relative flex items-center justify-between">
                <div class="flex items-center"><a href="{{ route('home') }}" class="inline-flex items-center mr-8"><span
                            class="text-2xl text-white">
                            <div style="font-size:inherit;color:inherit;padding:2px"><svg stroke="currentColor"
                                    fill="currentColor" stroke-width="0" viewBox="0 0 640 512" height="1em"
                                    width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M192 384h192c53 0 96-43 96-96h32c70.6 0 128-57.4 128-128S582.6 32 512 32H120c-13.3 0-24 10.7-24 24v232c0 53 43 96 96 96zM512 96c35.3 0 64 28.7 64 64s-28.7 64-64 64h-32V96h32zm47.7 384H48.3c-47.6 0-61-64-36-64h583.3c25 0 11.8 64-35.9 64z">
                                    </path>
                                </svg></div>
                        </span><span class="ml-2 text-base font-bold tracking-wide text-gray-100 uppercase">Jual Beli
                            Barang Bekas.</span></a>

                    <ul class=" items-center hidden space-x-8 lg:flex">
                        <li class="">
                            <div class=" items-center hidden space-x-8 lg:flex w-96 relative">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute left-10 text-gray-600"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                <input type="search" name="search" id="search" placeholder="Masukkan Pencarian"
                                    class="w-full rounded-md placeholder:text-gray-600 font-sans pl-8">
                            </div>
                        </li>
                        @if (Route::has('login'))
                            @auth
                                <li class="">
                                    <a href="{{ route('User.pesanan') }}"
                                        class="font-normal text-xs tracking-wide text-gray-100 transition-colors duration-200 hover:text-teal-accent-400 flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                                        </svg>
                                        <span>Pesanan Barang</span>
                                    </a>
                                </li>
                            @endauth
                        @endif
                        <li class=""><a href="{{ route('page.keranjang') }}"
                                class="font-normal text-xs tracking-wide text-gray-100 transition-colors duration-200 hover:text-teal-accent-400 flex">
                                {{-- <svg version="1.1" class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16"
                                    viewBox="0 0 16 16">
                                    <path fill="#ffff"
                                        d="M14 13.1v-1.1h-9.4l0.6-1.1 9.2-0.9 1.6-6h-12.3l-0.7-3h-3v1h2.2l2.1 8.4-1.3 2.6v1.5c0 0.8 0.7 1.5 1.5 1.5s1.5-0.7 1.5-1.5-0.7-1.5-1.5-1.5h7.5v1.5c0 0.8 0.7 1.5 1.5 1.5s1.5-0.7 1.5-1.5c0-0.7-0.4-1.2-1-1.4zM4 5h10.7l-1.1 4-8.4 0.9-1.2-4.9z">
                                    </path>
                                </svg> --}}
                                <span>Keranjang</span></a>
                        </li>
                        <li class=""><a href="{{ route('promo-index') }}"
                                class="font-normal text-xs tracking-wide text-gray-100 transition-colors duration-200 hover:text-teal-accent-400 flex">
                                {{-- <svg version="1.1" class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16"
                                    viewBox="0 0 16 16">
                                    <path fill="#ffff"
                                        d="M14 13.1v-1.1h-9.4l0.6-1.1 9.2-0.9 1.6-6h-12.3l-0.7-3h-3v1h2.2l2.1 8.4-1.3 2.6v1.5c0 0.8 0.7 1.5 1.5 1.5s1.5-0.7 1.5-1.5-0.7-1.5-1.5-1.5h7.5v1.5c0 0.8 0.7 1.5 1.5 1.5s1.5-0.7 1.5-1.5c0-0.7-0.4-1.2-1-1.4zM4 5h10.7l-1.1 4-8.4 0.9-1.2-4.9z">
                                    </path>
                                </svg> --}}
                                <span>Promo/Diskon</span>
                            </a>
                        </li>
                    </ul>

                </div>
                <ul class=" items-center hidden space-x-8 lg:flex">
                    @if (Route::has('login'))
                        @auth
                            <li class="">
                                <div class="ml-3 relative">
                                    <x-jet-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                                <button
                                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                                    <img class="h-8 w-8 rounded-full object-cover"
                                                        src="{{ Auth::user()->profile_photo_url }}"
                                                        alt="{{ Auth::user()->name }}" />
                                                </button>
                                            @else
                                                <span class="inline-flex rounded-md">
                                                    <button type="button"
                                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                                        {{ Auth::user()->name }}

                                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                </span>
                                            @endif
                                        </x-slot>

                                        <x-slot name="content">
                                            <!-- Account Management -->
                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                {{ __('Manage Account') }}
                                            </div>

                                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                                {{ __('Profile') }}
                                            </x-jet-dropdown-link>

                                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                                    {{ __('API Tokens') }}
                                                </x-jet-dropdown-link>
                                            @endif

                                            <div class="border-t border-gray-100"></div>

                                            <!-- Authentication -->
                                            <form method="POST" action="{{ route('logout') }}" x-data>
                                                @csrf

                                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                                    @click.prevent="$root.submit();">
                                                    {{ __('Log Out') }}
                                                </x-jet-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-jet-dropdown>
                                </div>
                            </li>
                            {{-- <li class=""><a href="{{ route('dashboard') }}"
                                    class="font-medium tracking-wide text-gray-100 transition-colors duration-200 hover:text-primary">Masuk</a>
                            </li> --}}
                        @else
                            <li class=""><a href="{{ route('login') }}"
                                    class="font-medium tracking-wide text-gray-100 transition-colors duration-200 hover:text-primary">Masuk</a>
                            </li>
                            <li class=""><a href="{{ route('register') }}"
                                    class="font-medium tracking-wide text-gray-100 transition-colors duration-200 hover:text-primary">Daftar</a>
                            </li>

                        @endauth
                    @endif
                </ul>

                <div class="lg:hidden" x-on:click="Dropdown = ! Dropdown">
                    <button id="ddDopw"
                        class="p-2 -mr-1 transition duration-200 rounded focus:outline-none focus:shadow-outline  "><span><svg
                                class="w-5 text-white " class="w-5 text-gray-600" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M23,13H1c-0.6,0-1-0.4-1-1s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,13,23,13z"></path>
                                <path fill="currentColor"
                                    d="M23,6H1C0.4,6,0,5.6,0,5s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,6,23,6z"></path>
                                <path fill="currentColor"
                                    d="M23,20H1c-0.6,0-1-0.4-1-1s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,20,23,20z"></path>
                            </svg></span></button>
                </div>

            </div>
            <div x-show="Dropdown" class="flex items-center w-full" x-transition>
                <ul class="items-center block space-x-1 lg:hidden w-full">
                    <li class="">
                        <div class="items-center block lg:hidden w-full relative">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 absolute left-2 top-2 text-gray-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            <input type="search" name="search" id="search" placeholder="Masukkan Pencarian"
                                class="w-full rounded-md placeholder:text-gray-600 font-sans pl-8">
                        </div>
                    </li>
                    <li class="mt-2">
                        <a href="#"
                            class="font-medium tracking-wide text-gray-100 transition-colors duration-200 hover:text-teal-accent-400 flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                            </svg>
                            <span class="ml-2">jual/Titip</span>
                        </a>
                    </li>
                    <li class="mt-2"><a href="#"
                            class="font-medium tracking-wide text-gray-100 transition-colors duration-200 hover:text-teal-accent-400 flex">
                            <svg version="1.1" class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16"
                                viewBox="0 0 16 16">
                                <path fill="#ffff"
                                    d="M14 13.1v-1.1h-9.4l0.6-1.1 9.2-0.9 1.6-6h-12.3l-0.7-3h-3v1h2.2l2.1 8.4-1.3 2.6v1.5c0 0.8 0.7 1.5 1.5 1.5s1.5-0.7 1.5-1.5-0.7-1.5-1.5-1.5h7.5v1.5c0 0.8 0.7 1.5 1.5 1.5s1.5-0.7 1.5-1.5c0-0.7-0.4-1.2-1-1.4zM4 5h10.7l-1.1 4-8.4 0.9-1.2-4.9z">
                                </path>
                            </svg>
                            <span class="ml-2">Keranjang</span></a></li>
                </ul>
            </div>
        </div>
    </div>
    </div>

    {{-- Content --}}
    <main>
        {{ $slot }}
    </main>

    <footer class="py-5 pb-0 bg-gradient-to-t bg-gray-800 text-white wow fadeIn">
        <div
            class="max-w-7xl mx-auto flex flex-col gap-y-8 py-5 px-5 sm:flex-row sm:justify-around sm:px-0 lg:gap-x-10">
            <div class="sm:basis-1/5">
                <h1 class="font-black text-3xl text-white ">GRIBS</h1>
            </div>
            <div class="w-96">
                <h4 class="font-bold text-lg text-white ">Profile</h4><a class="block mt-3 text-sm " href="#">
                    Galeri Barang Bekas (Gribs) merupakan bisnis jasa titip, dan jual beli barang bekas, Yang Menjual
                    Barang Barang bekas Seperti Alat Elektronik, Alat Musik, Mebel dan lain lain, Gribs terletak dijalan
                    Meranti No.208, Paropo, Kota Makassar. Usaha ini dirintis sejak 2004.
                </a>
            </div>
            <div class="">
                <h4 class="font-bold text-lg text-white ">Akun Sosmed</h4>
                <a class="block mt-3 text-sm "
                    href="#">wa : 081242788789
                </a>
                <a class="block mt-3 text-sm "
                    href="#">fb : https://www.facebook.com/bank.joe.963 </a>
            </div>
        </div>

        <div class="">
            <p class="pb-5 pt-5 text-xs text-gray-400 border-t max-w-7xl mx-auto px-5 sm:px-8">Copyright @ 2022,
                gribs</p>
        </div>
    </footer>
    @if (Auth::check())
        <div x-on:click="ChatPopUp = ! ChatPopUp"
            class="w-16 h-16 bg-blue-400 rounded-full flex justify-center items-center cursor-pointer fixed right-5 bottom-10 border-2  border-white z-50">
            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                </path>
            </svg>
        </div>
        <div x-show="ChatPopUp"
            class="fixed right-20 bottom-8 flex flex-row-reverse items-end justify-between md:w-1/2 "
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 -right-80"
            x-transition:enter-end="opacity-100 right-0" x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 right-0" x-transition:leave-end="opacity-0 -right-80">
            <div class="z-50 bg-blue-400 rounded-md w-full h-max">
                <livewire:item.page-chat>
            </div>
        </div>
    @endif
    @stack('modals')

    @livewireScripts

    <!-- AlpineJS Library -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script defer src="{{ asset('build/assets/app.ab93cf8a.js') }}"></script>

</body>

</html>
