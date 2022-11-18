<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="./assets/img/favicon.png" />
    <title>Dashboard</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/argon-dashboard-tailwind.css?v=1.0.0') }}" rel="stylesheet" />
    <!-- Popper -->
    <!-- Main Styling -->
    <link rel="stylesheet" href="{{ asset('build/assets/app.35f4d675.css') }}">
    @vite(['resources/js/app.js'])
    <script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>

    <!-- Styles -->
    @livewireStyles


    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
    {{-- <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css"> --}}
    <!-- JavaScript -->

</head>

<body
    class="m-0 font-sans antialiased font-normal dark:bg-slate-900 text-size-base leading-default bg-gray-50 text-slate-500">
    @can('Manage-Admin')
        <div class="absolute w-full bg-blue-500  dark:hidden min-h-75"></div>
    @endcan
    @can('Manage-Customer')
        <div class="absolute w-full bg-slate-500  dark:hidden min-h-75"></div>
    @endcan
    <!-- sidenav  -->
    @include('layouts.dekstop')
    @include('layouts.mobile')

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
        <div class="w-full px-3 mx-auto">
            <!-- row 1 -->
            {{ $slot }}

        </div>

        <!-- end cards -->
        <footer class="py-5 pb-0 relative bg-blue-500 mt-[100px] md:mt-[200px]">
            <div class="flex justify-end">
                <p class="pb-5 pt-5 text-xs text-white border-t max-w-7xl mx-auto px-5 sm:px-8">Copyright @ 2022,
                    chaibuilder.com</p>
            </div>
        </footer>
    </main>




    @stack('modals')

    @livewireScripts
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- plugin for charts  -->
    <script src="{{ asset('js/plugins/chartjs.min.js') }}" async></script>
    <!-- plugin for scrollbar  -->
    <script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}" async></script>
    <!-- main script file  -->
    <script src="{{ asset('js/argon-dashboard-tailwind.js?v=1.0.0') }}" async></script>

</body>

</html>
