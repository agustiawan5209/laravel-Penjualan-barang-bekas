
<div class="w-full p-6 mx-auto">
    <div class="flex {{ request()->routeIs('profile.show')  ? 'flex-wrap' : '' }} -mx-3">
        <div
            class="w-full max-w-full px-3 shrink-0 {{ request()->routeIs('profile.show') ? 'md:w-8/12' : '' }}  md:flex-0">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                {{ $setting }}
            </div>
        </div>
        @if (request()->routeIs('profile.show') || request()->routeIs('Metode_pembayaran') )
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
                                        <span class="font-bold dark:text-black text-size-lg">22</span>
                                        <span
                                            class="leading-normal dark:text-black text-size-sm opacity-80">Friends</span>
                                    </div>
                                    <div class="grid mx-6 text-center">
                                        <span class="font-bold dark:text-black text-size-lg">10</span>
                                        <span
                                            class="leading-normal dark:text-black text-size-sm opacity-80">Photos</span>
                                    </div>
                                    <div class="grid text-center">
                                        <span class="font-bold dark:text-black text-size-lg">89</span>
                                        <span
                                            class="leading-normal dark:text-black text-size-sm opacity-80">Comments</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6 text-center">
                            <h5 class="dark:text-black ">
                                Mark Davis
                                <span class="font-light">, 35</span>
                            </h5>
                            <div
                                class="mb-2 font-semibold leading-relaxed text-size-base dark:text-black/80 text-slate-700">
                                <i class="mr-2 dark:text-black ni ni-pin-3"></i>
                                Bucharest, Romania
                            </div>
                            <div
                                class="mt-6 mb-2 font-semibold leading-relaxed text-size-base dark:text-black/80 text-slate-700">
                                <i class="mr-2 dark:text-black ni ni-briefcase-24"></i>
                                Solution Manager - Creative Tim Officer
                            </div>
                            <div class="dark:text-black/80">
                                <i class="mr-2 dark:text-black ni ni-hat-3"></i>
                                University of Computer Science
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
