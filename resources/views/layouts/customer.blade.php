<body class="font-body antialiased text-[#41454c] bg-[#FFFFFF] dark:text-[#b3c3d9] dark:bg-[#000000]">
    <div class="min-h-full">
        <div x-data="{open: false}" class="bg-gray-800">
            <div class="bg-gray-800 max-w-7xl mx-auto px-4 flex items-center justify-between h-16 sm:px-6 lg:px-8">
                <div class="flex items-center">
                    <div class="flex-shrink-0"><span class="text-3xl text-white">
                            <div style="font-size:inherit;color:inherit;padding:2px"><svg stroke="currentColor"
                                    fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M427.84 380.67l-196.5 97.82a18.6 18.6 0 0 1-14.67 0L20.16 380.67c-4-2-4-5.28 0-7.29L67.22 350a18.65 18.65 0 0 1 14.69 0l134.76 67a18.51 18.51 0 0 0 14.67 0l134.76-67a18.62 18.62 0 0 1 14.68 0l47.06 23.43c4.05 1.96 4.05 5.24 0 7.24zm0-136.53l-47.06-23.43a18.62 18.62 0 0 0-14.68 0l-134.76 67.08a18.68 18.68 0 0 1-14.67 0L81.91 220.71a18.65 18.65 0 0 0-14.69 0l-47.06 23.43c-4 2-4 5.29 0 7.31l196.51 97.8a18.6 18.6 0 0 0 14.67 0l196.5-97.8c4.05-2.02 4.05-5.3 0-7.31zM20.16 130.42l196.5 90.29a20.08 20.08 0 0 0 14.67 0l196.51-90.29c4-1.86 4-4.89 0-6.74L231.33 33.4a19.88 19.88 0 0 0-14.67 0l-196.5 90.28c-4.05 1.85-4.05 4.88 0 6.74z">
                                    </path>
                                </svg></div>
                        </span></div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4"><a href="#"
                                class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">Home</a><a
                                href="#"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Pesanan</a><a
                                href="#"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Request</a><a
                                href="#"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Setting</a><a
                                href="#"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Reports</a>
                        </div>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6"><button
                            class="bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"><span
                                class="h-6 w-6 md:text-xl">
                                <div style="font-size:inherit;color:inherit;padding:2px"><svg stroke="currentColor"
                                        fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em"
                                        width="1em" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M439.39 362.29c-19.32-20.76-55.47-51.99-55.47-154.29 0-77.7-54.48-139.9-127.94-155.16V32c0-17.67-14.32-32-31.98-32s-31.98 14.33-31.98 32v20.84C118.56 68.1 64.08 130.3 64.08 208c0 102.3-36.15 133.53-55.47 154.29-6 6.45-8.66 14.16-8.61 21.71.11 16.4 12.98 32 32.1 32h383.8c19.12 0 32-15.6 32.1-32 .05-7.55-2.61-15.27-8.61-21.71zM67.53 368c21.22-27.97 44.42-74.33 44.53-159.42 0-.2-.06-.38-.06-.58 0-61.86 50.14-112 112-112s112 50.14 112 112c0 .2-.06.38-.06.58.11 85.1 23.31 131.46 44.53 159.42H67.53zM224 512c35.32 0 63.97-28.65 63.97-64H160.03c0 35.35 28.65 64 63.97 64z">
                                        </path>
                                    </svg></div>
                            </span></button>
                        <div class="ml-3 relative">
                            <div x-data="{open: false}" class="relative">
                                <div x-on:click="open = !open" class=""><img alt="No alt"
                                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                        class="h-8 w-8 rounded-full" /></div>
                                <ul x-show="open"
                                    class="absolute right-0 text-gray-900 w-56 mt-2 origin-top-right bg-white divide-y divide-gray-100 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                    <li x-on:click="open = false"><a
                                            class="group flex rounded-md items-center w-full px-2 py-2 text-sm"
                                            href="#">Your Settings</a></li>
                                    <li x-on:click="open = false"><a
                                            class="group flex rounded-md items-center w-full px-2 py-2 text-sm"
                                            href="#">Profile</a></li>
                                    <li x-on:click="open = false"><a
                                            class="group flex rounded-md items-center w-full px-2 py-2 text-sm"
                                            href="#">Sign Out</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div x-on:click="open = !open" class="-mr-2 flex md:hidden">
                    <div class="flex w-full justify-between items-center"><button
                            class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"><span
                                class="block h-9 w-9 text-3xl">
                                <div style="font-size:inherit;color:inherit;padding:2px"><svg stroke="currentColor"
                                        fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em"
                                        width="1em" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z">
                                        </path>
                                    </svg></div>
                            </span></button></div>
                </div>
            </div>
            <div x-show="open" class="px-4 pt-4 pb-2 text-sm text-gray-500 md:hidden">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3"><a href="#"
                        class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium">Dashboard</a><a
                        href="#"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Team</a><a
                        href="#"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Projects</a><a
                        href="#"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Calendar</a><a
                        href="#"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Reports</a>
                </div>
                <div class="pt-4 pb-3 border-t border-gray-700">
                    <div class="flex items-center px-5">
                        <div class="flex-shrink-0"><img alt="No alt"
                                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                class="h-10 w-10 rounded-full" /></div>
                        <div class="ml-3">
                            <div class="text-base font-medium leading-none text-white">
                                <p class="">Tom Cook</p>
                            </div>
                            <div class="text-sm font-medium leading-none text-gray-400">
                                <p class="">tom@example.com</p>
                            </div>
                        </div><button
                            class="ml-auto bg-gray-800 flex-shrink-0 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"><span
                                class="sr-only">
                                <p class="">View notifications</p>
                            </span><span class="h-6 w-6 text-xl">
                                <div style="font-size:inherit;color:inherit;padding:2px"><svg stroke="currentColor"
                                        fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em"
                                        width="1em" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M439.39 362.29c-19.32-20.76-55.47-51.99-55.47-154.29 0-77.7-54.48-139.9-127.94-155.16V32c0-17.67-14.32-32-31.98-32s-31.98 14.33-31.98 32v20.84C118.56 68.1 64.08 130.3 64.08 208c0 102.3-36.15 133.53-55.47 154.29-6 6.45-8.66 14.16-8.61 21.71.11 16.4 12.98 32 32.1 32h383.8c19.12 0 32-15.6 32.1-32 .05-7.55-2.61-15.27-8.61-21.71zM67.53 368c21.22-27.97 44.42-74.33 44.53-159.42 0-.2-.06-.38-.06-.58 0-61.86 50.14-112 112-112s112 50.14 112 112c0 .2-.06.38-.06.58.11 85.1 23.31 131.46 44.53 159.42H67.53zM224 512c35.32 0 63.97-28.65 63.97-64H160.03c0 35.35 28.65 64 63.97 64z">
                                        </path>
                                    </svg></div>
                            </span></button>
                    </div>
                    <div class="mt-3 px-2 space-y-1"><a href="#"
                            class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Your
                            Profile</a><a href="#"
                            class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Settings</a><a
                            href="#"
                            class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Sign
                            out</a></div>
                </div>
            </div>
        </div>
        <header class="bg-white shadow">
            <h1 class="text-3xl font-bold text-gray-900 max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">Dashboard</h1>
        </header>
        <main class="">
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                <div class="px-4 py-6 sm:px-0">
                    <div class="border-4 border-dashed border-gray-200 rounded-global h-96"></div>
                </div>
            </div>
        </main>
    </div>
    @stack('modals')

    @livewireScripts
    <script defer src="{{asset('build/assets/app.ab93cf8a.js')}}"></script>

</body>
