<div class="relative w-full mx-auto bg-blue-200">
    <div
        class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 overflow-hidden break-words bg-white border-0 dark:bg-slate-850 dark:shadow-dark-xl shadow-3xl rounded-2xl bg-clip-border">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-auto max-w-full px-3">
                <div
                    class="relative inline-flex items-center justify-center text-white transition-all duration-200 ease-in-out text-size-base h-16 w-16 rounded-xl">

                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <img src="{{ Auth::user()->profile_photo_url }}" alt="profile_image"
                            class="w-full shadow-2xl rounded-xl" />
                    @else
                        <span class="inline-flex rounded-md">
                            <button type="button"
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                {{ Auth::user()->name }}

                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </span>
                    @endif
                </div>
            </div>
            <div class="flex-none w-auto max-w-full px-3 my-auto">
                <div class="h-full">
                    <h5 class="mb-1 dark:text-white">{{ Auth::user()->name }}</h5>
                </div>
            </div>
            <div class="w-full max-w-full px-3 mx-auto mt-4 sm:my-auto  md:w-1/2 md:flex-none lg:w-4/12">
                <div class="relative right-0">
                    <ul class="relative flex flex-wrap gap-3 p-1 list-none bg-gray-50 rounded-xl" nav-pills role="tablist">
                        <li class="z-30 flex-auto text-center">
                            <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg bg-inherit text-slate-700 {{ request()->routeIs('Jual-Titip.index') ? 'px-1 bg-white shadow-gray-300 shadow-sm' : '' }}"
                                href="{{ route('Jual-Titip.index') }}">
                                <i class="ni ni-app"></i>
                                <span class="ml-2">Jual Produk</span>
                            </a>
                        </li>
                        <li class="z-30 flex-auto text-center">
                            <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg bg-inherit text-slate-700 {{ request()->routeIs('profile.toko') ? 'px-1 bg-white shadow-gray-300 shadow-sm' : '' }}"
                                href="{{route('profile.toko')}}" role="tab" aria-selected="false">
                                <i class="ni ni-email-83"></i>
                                <span class="ml-2">Toko</span>
                            </a>
                        </li>
                        <li class="z-30 flex-auto text-center">
                            <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg bg-inherit text-slate-700"
                                href="javascript:;" role="tab" aria-selected="false">
                                <i class="ni ni-email-83"></i>
                                <span class="ml-2">Whislist</span>
                            </a>
                        </li>
                        <li class="z-30 flex-auto text-center">
                            <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-colors ease-in-out border-0 rounded-lg bg-inherit text-slate-700  {{ request()->routeIs('profile.pesanan') ? 'px-1 bg-white shadow-gray-300  shadow-sm' : '' }}" href="{{ route('profile.pesanan') }}"
                                role="tab" aria-selected="false">
                                <i class="ni ni-settings-gear-65"></i>
                                <span class="ml-2">Pesanan</span>
                            </a>
                        </li>
                        <li class="z-30 flex-auto text-center">
                            <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-colors ease-in-out border-0 rounded-lg bg-inherit text-slate-700  {{ request()->routeIs('profile.show') ? 'px-1 bg-white shadow-gray-300  shadow-sm' : '' }}" href="{{ route('profile.show') }}"
                                role="tab" aria-selected="false">
                                <i class="ni ni-settings-gear-65"></i>
                                <span class="ml-2">Settings</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="w-full p-6 mx-auto">
    <div class="flex {{ request()->routeIs('profile.show')  ? 'flex-wrap' : '' }} -mx-3">
        <div
            class="w-full max-w-full px-3 shrink-0 {{ request()->routeIs('profile.show') ? 'md:w-8/12' : '' }}  md:flex-0">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                {{ $setting }}
            </div>
        </div>
        @if (request()->routeIs('profile.show') )
            <div class="w-full max-w-full px-3 mt-6 shrink-0 md:w-4/12 md:flex-0 md:mt-0">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-gray-600 text-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="flex flex-wrap justify-center -mx-3">
                        <div class="w-4/12 max-w-full px-3 flex-0 ">
                            <div class="mb-6 -mt-6 lg:mb-0 lg:-mt-16">
                                <a href="javascript:;">
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <img src="{{ Auth::user()->profile_photo_url }}" alt="profile_image"
                                            class="h-auto max-w-full border-2 border-white border-solid rounded-circle" />
                                    @else
                                        <span class="inline-flex rounded-md">
                                            <button type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                                {{ Auth::user()->name }}

                                                <svg class="ml-2 -mr-0.5 h-full w-full"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    @endif
                                    {{-- <img class="h-auto max-w-full border-2 border-white border-solid rounded-circle"
                                    src="{{ asset('img/tim.png') }}" alt="profile image"> --}}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="border-black/12.5 rounded-t-2xl p-6 text-center pt-0 pb-6 lg:pt-2 lg:pb-4">
                        <div class="flex justify-between">
                            <button type="button"
                                class="hidden px-8 py-2 font-bold leading-normal text-center text-white align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer text-size-xs bg-cyan-500 lg:block tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Connect</button>
                            <button type="button"
                                class="block px-8 py-2 font-bold leading-normal text-center text-white align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer text-size-xs bg-cyan-500 lg:hidden tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">
                                <i class="ni ni-collection text-2.8"></i>
                            </button>
                            <button type="button"
                                class="hidden px-8 py-2 font-bold leading-normal text-center text-white align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer text-size-xs bg-slate-700 lg:block tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Message</button>
                            <button type="button"
                                class="block px-8 py-2 font-bold leading-normal text-center text-white align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer text-size-xs bg-slate-700 lg:hidden tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">
                                <i class="ni ni-email-83 text-2.8"></i>
                            </button>
                        </div>
                    </div>

                    <div class="flex-auto p-6 pt-0">
                        <div class="flex flex-wrap -mx-3">
                            <div class="w-full max-w-full px-3 flex-1-0">
                                <div class="flex justify-center">
                                    <div class="grid text-center">
                                        <span class="font-bold dark:text-white text-size-lg">22</span>
                                        <span
                                            class="leading-normal dark:text-white text-size-sm opacity-80">Friends</span>
                                    </div>
                                    <div class="grid mx-6 text-center">
                                        <span class="font-bold dark:text-white text-size-lg">10</span>
                                        <span
                                            class="leading-normal dark:text-white text-size-sm opacity-80">Photos</span>
                                    </div>
                                    <div class="grid text-center">
                                        <span class="font-bold dark:text-white text-size-lg">89</span>
                                        <span
                                            class="leading-normal dark:text-white text-size-sm opacity-80">Comments</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6 text-center">
                            <h5 class="dark:text-white ">
                                Mark Davis
                                <span class="font-light">, 35</span>
                            </h5>
                            <div
                                class="mb-2 font-semibold leading-relaxed text-size-base dark:text-white/80 text-slate-700">
                                <i class="mr-2 dark:text-white ni ni-pin-3"></i>
                                Bucharest, Romania
                            </div>
                            <div
                                class="mt-6 mb-2 font-semibold leading-relaxed text-size-base dark:text-white/80 text-slate-700">
                                <i class="mr-2 dark:text-white ni ni-briefcase-24"></i>
                                Solution Manager - Creative Tim Officer
                            </div>
                            <div class="dark:text-white/80">
                                <i class="mr-2 dark:text-white ni ni-hat-3"></i>
                                University of Computer Science
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
