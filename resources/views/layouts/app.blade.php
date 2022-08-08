<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="./assets/img/favicon.png" />
    <title>Admin Penjualan</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/argon-dashboard-tailwind.css?v=1.0.0') }}" rel="stylesheet" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('js/jquery-3.6.0.slim.min.js')}}"></script>
</head>

@can('Manage-Admin')

    <body
        class="m-0 font-sans antialiased font-normal dark:bg-slate-900 text-size-base leading-default bg-gray-50 text-slate-500">
        <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>
        <!-- sidenav  -->
        <aside
            class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0"
            aria-expanded="false">
            <div class="h-19">
                <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden"
                    sidenav-close></i>
                <a class="block px-8 py-6 m-0 text-size-sm whitespace-nowrap dark:text-white text-slate-700"
                    href="https://demos.creative-tim.com/argon-dashboard-tailwind/pages/dashboard.html" target="_blank">
                    <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">Jual Beli Barang
                        Bekas</span>
                </a>
            </div>

            <hr
                class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

            <div class="items-center block w-auto max-h-screen overflow-auto grow basis-full">
                <ul class="flex flex-col pl-0 mb-0">
                    <li class="mt-0.5 w-full">
                        <a class="{{ request()->routeIs('dashboard') ? 'py-2.7 bg-blue-500/13 dark:text-white dark:opacity-80 text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors' : 'dark:text-white dark:opacity-80 py-2.7 text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors' }}"
                            href="{{ route('dashboard') }}">
                            <div
                                class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                <i class="relative top-0 leading-normal text-blue-500 ni ni-tv-2 text-size-sm"></i>
                            </div>
                            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
                        </a>
                    </li>

                    <li class="mt-0.5 w-full">
                        <a class=" {{ request()->routeIs('Admin.Penitipan') ? 'py-2.7 bg-blue-500/13 dark:text-white dark:opacity-80 text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors' : 'dark:text-white dark:opacity-80 py-2.7 text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors' }}"
                            href="{{ route('Admin.Penitipan') }}">
                            <div
                                class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                <i
                                    class="relative top-0 leading-normal text-orange-500 ni ni-calendar-grid-58 text-size-sm"></i>
                            </div>
                            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Penitipan</span>
                        </a>
                    </li>

                    <li class="mt-0.5 w-full">
                        <a class=" {{ request()->routeIs('Admin.Penjualan') ? 'py-2.7 bg-blue-500/13 dark:text-white dark:opacity-80 text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors' : 'dark:text-white dark:opacity-80 py-2.7 text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors' }}"
                            href="{{ route('Admin.Penjualan') }}">
                            <div
                                class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                                <i
                                    class="relative top-0 leading-normal text-emerald-500 text-size-sm ni ni-credit-card"></i>
                            </div>
                            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Penjualan</span>
                        </a>
                    </li>

                    <li class="mt-0.5 w-full">
                        <a class=" {{ request()->routeIs('Admin.Barang') ? 'py-2.7 bg-blue-500/13 dark:text-white dark:opacity-80 text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors' : 'dark:text-white dark:opacity-80 py-2.7 text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors' }}"
                            href="{{ route('Admin.Barang') }}">
                            <div
                                class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                <i class="relative top-0 leading-normal text-cyan-500 text-size-sm ni ni-app"></i>
                            </div>
                            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Pengelolaan data
                                Barang</span>
                        </a>
                    </li>
                    <li class="mt-0.5 w-full">
                        <a class=" {{ request()->routeIs('Admin.Promo') ? 'py-2.7 bg-blue-500/13 dark:text-white dark:opacity-80 text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors' : 'dark:text-white dark:opacity-80 py-2.7 text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors' }}"
                            href="{{ route('Admin.Promo') }}">
                            <div
                                class="mr-2 flex h-10 w-10  items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                <svg class="w-12 h-12 text-green-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                            </div>
                            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Promo</span>
                        </a>
                    </li>
                    <li class="w-full mt-4">
                        <h6 class="pl-6 ml-2 font-bold leading-tight uppercase dark:text-white text-size-xs opacity-60">
                            Account pages</h6>
                    </li>

                    <li class="mt-0.5 w-full">
                        <form
                            class=" py-2.7 bg-blue-500/13 dark:text-white dark:opacity-80 text-size-sm  my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors"
                            action="{{ route('logout') }}" method="POST">
                            @csrf
                            <div
                                class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                <i class="relative top-0 leading-normal text-slate-700 text-size-sm ni ni-single-02"></i>
                            </div>
                            <button type="submit" class="ml-1 duration-300 opacity-100 cursor-pointer ease">Logout</button>
                        </form>
                    </li>

                </ul>
            </div>
        </aside>

        <!-- end sidenav -->

        <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
            <!-- Navbar -->
            <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start"
                navbar-main navbar-scroll="false">
                <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
                    <nav>
                        <!-- breadcrumb -->
                        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                            <li class="leading-normal text-size-sm">
                                <a class="text-white opacity-50" href="javascript:;">Pages</a>
                            </li>
                            <li class="text-size-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']"
                                aria-current="page">Page</li>
                        </ol>
                        <h6 class="mb-0 font-bold text-white capitalize">Dashboard</h6>
                    </nav>

                    @livewire('item.notifchat')

                </div>
            </nav>


            <!-- end Navbar -->

            <!-- cards -->
            <div class="w-full px-6 py-6 mx-auto">
                <!-- row 1 -->
                {{ $slot }}


                {{-- <footer class="pt-4">
            <div class="w-full px-6 mx-auto">
                <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
                    <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                        <div class="leading-normal text-center text-size-sm text-slate-500 lg:text-left">
                            ©
                            <script>
                                document.write(new Date().getFullYear() + ",");
                            </script>
                            made with <i class="fa fa-heart"></i> by
                            <a href="https://www.creative-tim.com"
                                class="font-semibold text-slate-700 dark:text-white" target="_blank">Creative
                                Tim</a>
                            for a better web.
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 mt-0 shrink-0 lg:w-1/2 lg:flex-none">
                        <ul class="flex flex-wrap justify-center pl-0 mb-0 list-none lg:justify-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com"
                                    class="block px-4 pt-0 pb-1 font-normal transition-colors ease-in-out text-size-sm text-slate-500"
                                    target="_blank">Creative Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation"
                                    class="block px-4 pt-0 pb-1 font-normal transition-colors ease-in-out text-size-sm text-slate-500"
                                    target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://creative-tim.com/blog"
                                    class="block px-4 pt-0 pb-1 font-normal transition-colors ease-in-out text-size-sm text-slate-500"
                                    target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/license"
                                    class="block px-4 pt-0 pb-1 pr-0 font-normal transition-colors ease-in-out text-size-sm text-slate-500"
                                    target="_blank">License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer> --}}
            </div>
            <!-- end cards -->
        </main>
        @stack('modals')

        @livewireScripts
    </body>
@endcan
@can('Manage-Customer')

    <body class="font-body antialiased text-[#000000] bg-[#fcfcfc] dark:text-[#ffffff] dark:bg-[#031022]"
        x-data="{ Dropdown: false, ChatPopUp: false }">
        <div class="bg-gray-900">
            <div class="px-4 py-5 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
                <div class="relative flex items-center justify-between">
                    <div class="flex items-center"><a href="{{ route('home') }}"
                            class="inline-flex items-center mr-8"><span class="text-2xl text-white">
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
                            <li class="">
                                <a href="{{ route('Jual-Titip.index') }}"
                                    class="font-medium tracking-wide text-gray-100 transition-colors duration-200 hover:text-teal-accent-400 flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                                    </svg>
                                    <span>jual/Titip</span>
                                </a>
                            </li>
                            <li class=""><a href="{{ route('page.keranjang') }}"
                                    class="font-medium tracking-wide text-gray-100 transition-colors duration-200 hover:text-teal-accent-400 flex">
                                    <svg version="1.1" class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16"
                                        viewBox="0 0 16 16">
                                        <path fill="#ffff"
                                            d="M14 13.1v-1.1h-9.4l0.6-1.1 9.2-0.9 1.6-6h-12.3l-0.7-3h-3v1h2.2l2.1 8.4-1.3 2.6v1.5c0 0.8 0.7 1.5 1.5 1.5s1.5-0.7 1.5-1.5-0.7-1.5-1.5-1.5h7.5v1.5c0 0.8 0.7 1.5 1.5 1.5s1.5-0.7 1.5-1.5c0-0.7-0.4-1.2-1-1.4zM4 5h10.7l-1.1 4-8.4 0.9-1.2-4.9z">
                                        </path>
                                    </svg>
                                    <span>Keranjang</span></a></li>
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

                                                            <svg class="ml-2 -mr-0.5 h-4 w-4"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                                fill="currentColor">
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
        {{-- <div class=" dark:bg-gray-900">
    <div class="px-2 py-1 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
        <div class="relative flex items-center justify-center">
            <ul
                class="grid grid-cols-2 lg:grid-cols-none lg:items-center lg:justify-center w-full lg:space-x-8 lg:flex">
                <li class=""><a href="#"
                        class="font-medium tracking-wide transition-colors duration-200 hover:text-teal-accent-400 dark:text-gray-100 text-gray-900">Elektronik</a>
                </li>
                <li class=""><a href="#"
                        class="font-medium tracking-wide transition-colors duration-200 hover:text-teal-accent-400 dark:text-gray-100 text-gray-900">Otomotif</a>
                </li>
                <li class=""><a href="#"
                        class="font-medium tracking-wide transition-colors duration-200 hover:text-teal-accent-400 dark:text-gray-100 text-gray-900">Alat
                        Kantor</a></li>
                <li class=""><a href="{{ route('profile.show') }}"
                        class="font-medium tracking-wide transition-colors duration-200 hover:text-teal-accent-400 dark:text-gray-100 text-gray-900">Perlengkapan
                        Rumah</a></li>
            </ul>
        </div>
    </div> --}}
        </div>

        {{-- Content --}}
        <main>
            {{ $slot }}
        </main>

        <footer class="shadow-lg">
            <div class="pt-12 lg:pt-16">
                <div class="px-4 mx-auto max-w-7xl md:px-8">
                    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-12 lg:gap-8 mb-16">
                        <div class="col-span-full lg:col-span-2">
                            <div class="lg:-mt-2 mb-4"><a href="#"
                                    class="inline-flex items-center text-black-800 text-xl md:text-2xl font-bold gap-2"><span
                                        class="w-5 h-auto text-indigo-500">
                                        <div style="font-size:inherit;color:inherit;padding:2px"><svg
                                                stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 512 512" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M179.2 230.4l102.4 102.4-102.4 102.4L0 256 179.2 76.8l44.8 44.8-25.6 25.6-19.2-19.2-128 128 128 128 51.5-51.5-77.1-76.5 25.6-25.6zM332.8 76.8L230.4 179.2l102.4 102.4 25.6-25.6-77.1-76.5 51.5-51.5 128 128-128 128-19.2-19.2-25.6 25.6 44.8 44.8L512 256 332.8 76.8z">
                                                </path>
                                            </svg></div>
                                    </span><span> Chai Builder</span></a></div>
                            <p class="text-gray-500 sm:pr-8 mb-6">Filler text is dummy text which has no meaning however
                                looks very similar to real text</p>
                            <div class="flex gap-4"><a href="#"
                                    class="text-gray-400 hover:text-gray-500 active:text-gray-600 transition duration-100"><span
                                        class="w-5 h-5">
                                        <div style="font-size:inherit;color:inherit;padding:2px"><svg
                                                stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 496 512" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M248 8C111.1 8 0 119.1 0 256s111.1 248 248 248 248-111.1 248-248S384.9 8 248 8zm-70.7 372c-68.8 0-124-55.5-124-124s55.2-124 124-124c31.3 0 60.1 11 83 32.3l-33.6 32.6c-13.2-12.9-31.3-19.1-49.4-19.1-42.9 0-77.2 35.5-77.2 78.1s34.2 78.1 77.2 78.1c32.6 0 64.9-19.1 70.1-53.3h-70.1v-42.6h116.9c1.3 6.8 1.9 13.6 1.9 20.7 0 70.8-47.5 121.2-118.8 121.2zm230.2-106.2v35.5H372v-35.5h-35.5v-35.5H372v-35.5h35.5v35.5h35.2v35.5h-35.2z">
                                                </path>
                                            </svg></div>
                                    </span></a><a href="#"
                                    class="text-gray-400 hover:text-gray-500 active:text-gray-600 transition duration-100"><span><svg
                                            class="w-5 h-5" class="w-5 h-5" width="24" height="24"
                                            viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                                        </svg></span></a><a href="#"
                                    class="text-gray-400 hover:text-gray-500 active:text-gray-600 transition duration-100"><span><svg
                                            class="w-5 h-5" class="w-5 h-5" width="24" height="24"
                                            viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                        </svg></span></a><a href="#"
                                    class="text-gray-400 hover:text-gray-500 active:text-gray-600 transition duration-100"><span
                                        class="w-5 h-5">
                                        <div style="font-size:inherit;color:inherit;padding:2px"><svg
                                                stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 448 512" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z">
                                                </path>
                                            </svg></div>
                                    </span></a></div>
                        </div>
                        <div class="">
                            <div class="text-gray-800 font-bold tracking-widest uppercase mb-4">Products</div>
                            <nav class="flex flex-col gap-4">
                                <div class=""><a href="#"
                                        class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">Overview</a>
                                </div>
                                <div class=""><a href="#"
                                        class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">Solutions</a>
                                </div>
                                <div class=""><a href="#"
                                        class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">Pricing</a>
                                </div>
                                <div class=""><a href="#"
                                        class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">Customers</a>
                                </div>
                            </nav>
                        </div>
                        <div class="">
                            <div class="text-gray-800 font-bold tracking-widest uppercase mb-4">Company</div>
                            <nav class="flex flex-col gap-4">
                                <div class=""><a href="#"
                                        class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">About</a>
                                </div>
                                <div class=""><a href="#"
                                        class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">Investor
                                        Relations</a></div>
                                <div class=""><a href="#"
                                        class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">Jobs</a>
                                </div>
                                <div class=""><a href="#"
                                        class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">Press</a>
                                </div>
                                <div class=""><a href="#"
                                        class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">Blog</a>
                                </div>
                            </nav>
                        </div>
                        <div class="">
                            <div class="text-gray-800 font-bold tracking-widest uppercase mb-4">Support</div>
                            <nav class="flex flex-col gap-4">
                                <div class=""><a href="#"
                                        class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">Contact</a>
                                </div>
                                <div class=""><a href="#"
                                        class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">Documentation</a>
                                </div>
                                <div class=""><a href="#"
                                        class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">Chat</a>
                                </div>
                                <div class=""><a href="#"
                                        class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">FAQ</a>
                                </div>
                            </nav>
                        </div>
                        <div class="">
                            <div class="text-gray-800 font-bold tracking-widest uppercase mb-4">Legal</div>
                            <nav class="flex flex-col gap-4">
                                <div class=""><a href="#"
                                        class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">Terms
                                        of Service</a></div>
                                <div class=""><a href="#"
                                        class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">Privacy
                                        Policy</a></div>
                                <div class=""><a href="#"
                                        class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">Cookie
                                        settings</a></div>
                            </nav>
                        </div>
                    </div>
                    <div class="text-gray-400 text-sm text-center border-t py-8">© 2021 - Present Chai Builder. All rights
                        reserved.</div>
                </div>
            </div>
        </footer>
        <div x-on:click="ChatPopUp = ! ChatPopUp"
            class="w-16 h-16 bg-blue-400 rounded-full flex justify-center items-center cursor-pointer fixed right-5 bottom-10 border-2  border-white z-50">
            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                </path>
            </svg>
        </div>
        <div x-show="ChatPopUp" class="fixed right-0 bottom-8 flex flex-row-reverse items-end justify-between md:w-1/2 "
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 -right-80"
            x-transition:enter-end="opacity-100 right-0" x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 right-0" x-transition:leave-end="opacity-0 -right-80">
            <div class="z-50 bg-blue-400 rounded-md w-full h-max">
                @include('page.chat')
            </div>
        </div>
        @stack('modals')

        @livewireScripts
        <!-- AlpineJS Library -->
        {{-- <script defer src="https://unpkg.com/alpinejs@3.9.0/dist/cdn.min.js"></script> --}}
    </body>
@endcan
<!-- plugin for charts  -->
<script src="{{ asset('js/plugins/chartjs.min.js') }}" async></script>
<!-- plugin for scrollbar  -->
<script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}" async></script>
<!-- main script file  -->
<script src="{{ asset('js/argon-dashboard-tailwind.js?v=1.0.0') }}" async></script>

</html>
