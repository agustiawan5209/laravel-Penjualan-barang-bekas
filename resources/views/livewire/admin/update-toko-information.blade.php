<div>
    @can('Manage-Customer')
        @if (session()->has('message'))
            <x-alert :message="session('message')" />
        @endif

        @if ($tokoItem)
            <x-jet-button type='button' wire:click="$toggle('tokoItem')" wire:loading.attr='disabled'> Tutup Informasi Toko
            </x-jet-button>
        @else
            <x-jet-button type='button' wire:click='cekToko'> Update Informasi Toko</x-jet-button>
        @endif
        @if ($tokoItem)
            <div class="relative box-border">

                <form
                    class="relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
                    <div
                        class="p-6 mb-0 text-center  bg-white border-b-0 rounded-t-2xl flex justify-center items-center flex-nowrap">
                        @csrf
                        <svg class="w-20 h-20 text-green-400 p-3 rounded-full shadow-md" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z">
                            </path>
                        </svg>

                        <h5> Update Informasi Toko </h5>
                    </div>
                    <div class="flex-auto p-6">
                        <form role="form text-left">
                            <div class="mb-4">
                                <input type="text" wire:model.defer='nama_toko'
                                    class="placeholder:text-gray-500 text-size-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                    placeholder="Nama Toko" aria-label="NamaToko" aria-describedby="email-addon">
                                @error('nama_toko')
                                    <span class="font-medium text-sm ml-3 text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <input type="text" wire:model.defer='alamat'
                                    class="placeholder:text-gray-500 text-size-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                    placeholder="Alamat" aria-label="alamat" aria-describedby="alamat-addon">
                                @error('alamat')
                                    <span class="font-medium text-sm ml-3 text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <input type="text" wire:model.defer='no_telpon'
                                    class="placeholder:text-gray-500 text-size-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                    placeholder="Nomor Telpon" aria-label="no_telpon" aria-describedby="password-addon">
                                @error('no_telpon')
                                    <span class="font-medium text-sm ml-3 text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="text-center">
                                <x-jet-button type="button" wire:click='UpdateToko' class="i">Simpan
                                </x-jet-button>
                            </div>
                        </form>
                    </div>
                </form>
            </div>
        @endif
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 mt-6 md:w-7/12 md:flex-none">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="p-6 px-4 pb-0 mb-0 border-b-0 rounded-t-2xl">
                        <h6 class="mb-0 dark:text-white">Billing Information</h6>
                    </div>
                    <div class="flex-auto p-4 pt-6">
                        <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                            <li
                                class="relative flex p-6 mb-2 border-0 rounded-t-inherit rounded-xl bg-gray-50 dark:bg-slate-850">
                                <div class="flex flex-col">
                                    <h6 class="mb-4 leading-normal dark:text-white text-size-sm">Oliver Liam</h6>
                                    <span class="mb-2 leading-tight text-size-xs dark:text-white/80">Company Name:
                                        <span class="font-semibold text-slate-700 dark:text-white sm:ml-2">Viking
                                            Burrito</span></span>
                                    <span class="mb-2 leading-tight text-size-xs dark:text-white/80">Email Address:
                                        <span
                                            class="font-semibold text-slate-700 dark:text-white sm:ml-2">oliver@burrito.com</span></span>
                                    <span class="leading-tight text-size-xs dark:text-white/80">VAT Number: <span
                                            class="font-semibold text-slate-700 dark:text-white sm:ml-2">FRB1235476</span></span>
                                </div>
                                <div class="ml-auto text-right">
                                    <a class="relative z-10 inline-block px-4 py-2.5 mb-0 font-bold text-center text-transparent align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-normal text-size-sm ease-in bg-150 bg-gradient-to-tl from-red-600 to-orange-600 hover:-translate-y-px active:opacity-85 bg-x-25 bg-clip-text"
                                        href="javascript:;"><i
                                            class="mr-2 far fa-trash-alt bg-150 bg-gradient-to-tl from-red-600 to-orange-600 bg-x-25 bg-clip-text"
                                            aria-hidden="true"></i>Delete</a>
                                    <a class="inline-block dark:text-white px-4 py-2.5 mb-0 font-bold text-center align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-normal text-size-sm ease-in bg-150 hover:-translate-y-px active:opacity-85 bg-x-25 text-slate-700"
                                        href="javascript:;"><i class="mr-2 fas fa-pencil-alt text-slate-700"
                                            aria-hidden="true"></i>Edit</a>
                                </div>
                            </li>
                            <li class="relative flex p-6 mt-4 mb-2 border-0 rounded-xl bg-gray-50 dark:bg-slate-850">
                                <div class="flex flex-col">
                                    <h6 class="mb-4 leading-normal dark:text-white text-size-sm">Lucas Harper</h6>
                                    <span class="mb-2 leading-tight text-size-xs dark:text-white/80">Company Name:
                                        <span class="font-semibold text-slate-700 dark:text-white sm:ml-2">Stone
                                            Tech Zone</span></span>
                                    <span class="mb-2 leading-tight text-size-xs dark:text-white/80">Email Address:
                                        <span
                                            class="font-semibold text-slate-700 dark:text-white sm:ml-2">lucas@stone-tech.com</span></span>
                                    <span class="leading-tight text-size-xs dark:text-white/80">VAT Number: <span
                                            class="font-semibold text-slate-700 dark:text-white sm:ml-2">FRB1235476</span></span>
                                </div>
                                <div class="ml-auto text-right">
                                    <a class="relative z-10 inline-block px-4 py-2.5 mb-0 font-bold text-center text-transparent align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-normal text-size-sm ease-in bg-150 bg-gradient-to-tl from-red-600 to-orange-600 hover:-translate-y-px active:opacity-85 bg-x-25 bg-clip-text"
                                        href="javascript:;"><i
                                            class="mr-2 far fa-trash-alt bg-150 bg-gradient-to-tl from-red-600 to-orange-600 bg-x-25 bg-clip-text"
                                            aria-hidden="true"></i>Delete</a>
                                    <a class="inline-block dark:text-white px-4 py-2.5 mb-0 font-bold text-center align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-normal text-size-sm ease-in bg-150 hover:-translate-y-px active:opacity-85 bg-x-25 text-slate-700"
                                        href="javascript:;"><i class="mr-2 fas fa-pencil-alt text-slate-700"
                                            aria-hidden="true"></i>Edit</a>
                                </div>
                            </li>
                            <li
                                class="relative flex p-6 mt-4 mb-2 border-0 rounded-b-inherit rounded-xl bg-gray-50 dark:bg-slate-850">
                                <div class="flex flex-col">
                                    <h6 class="mb-4 leading-normal dark:text-white text-size-sm">Ethan James</h6>
                                    <span class="mb-2 leading-tight text-size-xs dark:text-white/80">Company Name:
                                        <span class="font-semibold text-slate-700 dark:text-white sm:ml-2">Fiber
                                            Notion</span></span>
                                    <span class="mb-2 leading-tight text-size-xs dark:text-white/80">Email Address:
                                        <span
                                            class="font-semibold text-slate-700 dark:text-white sm:ml-2">ethan@fiber.com</span></span>
                                    <span class="leading-tight text-size-xs dark:text-white/80">VAT Number: <span
                                            class="font-semibold text-slate-700 dark:text-white sm:ml-2">FRB1235476</span></span>
                                </div>
                                <div class="ml-auto text-right">
                                    <a class="relative z-10 inline-block px-4 py-2.5 mb-0 font-bold text-center text-transparent align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-normal text-size-sm ease-in bg-150 bg-gradient-to-tl from-red-600 to-orange-600 hover:-translate-y-px active:opacity-85 bg-x-25 bg-clip-text"
                                        href="javascript:;"><i
                                            class="mr-2 far fa-trash-alt bg-150 bg-gradient-to-tl from-red-600 to-orange-600 bg-x-25 bg-clip-text"
                                            aria-hidden="true"></i>Delete</a>
                                    <a class="inline-block dark:text-white px-4 py-2.5 mb-0 font-bold text-center align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-normal text-size-sm ease-in bg-150 hover:-translate-y-px active:opacity-85 bg-x-25 text-slate-700"
                                        href="javascript:;"><i class="mr-2 fas fa-pencil-alt text-slate-700"
                                            aria-hidden="true"></i>Edit</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="w-full max-w-full px-3 mt-6 md:w-5/12 md:flex-none">
                <div
                    class="relative flex flex-col h-full min-w-0 mb-6 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="p-6 px-4 pb-0 mb-0 border-b-0 rounded-t-2xl">
                        <div class="flex flex-wrap -mx-3">
                            <div class="max-w-full px-3 md:w-1/2 md:flex-none">
                                <h6 class="mb-0 dark:text-white">Your Transactions</h6>
                            </div>
                            <div
                                class="flex items-center justify-end max-w-full px-3 dark:text-white/80 md:w-1/2 md:flex-none">
                                <i class="mr-2 far fa-calendar-alt" aria-hidden="true"></i>
                                <small>23 - 30 March 2020</small>
                            </div>
                        </div>
                    </div>
                    <div class="flex-auto p-4 pt-6">
                        <h6 class="mb-4 font-bold leading-tight uppercase dark:text-white text-size-xs text-slate-500">
                            Newest</h6>
                        <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                            <li
                                class="relative flex justify-between px-4 py-2 pl-0 mb-2 border-0 rounded-t-inherit text-size-inherit rounded-xl">
                                <div class="flex items-center">
                                    <button
                                        class="leading-pro ease-in text-size-xs bg-150 w-6.5 h-6.5 p-1.2 rounded-3.5xl tracking-tight-rem bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-red-600 border-transparent bg-transparent text-center align-middle font-bold uppercase text-red-600 transition-all hover:opacity-75"><i
                                            class="fas fa-arrow-down text-size-3xs" aria-hidden="true"></i></button>
                                    <div class="flex flex-col">
                                        <h6 class="mb-1 leading-normal dark:text-white text-size-sm text-slate-700">
                                            Netflix</h6>
                                        <span class="leading-tight text-size-xs dark:text-white/80">27 March 2020,
                                            at 12:30 PM</span>
                                    </div>
                                </div>
                                <div class="flex flex-col items-center justify-center">
                                    <p
                                        class="relative z-10 inline-block m-0 font-semibold leading-normal text-transparent bg-gradient-to-tl from-red-600 to-orange-600 text-size-sm bg-clip-text">
                                        - $ 2,500</p>
                                </div>
                            </li>
                            <li
                                class="relative flex justify-between px-4 py-2 pl-0 mb-2 border-0 border-t-0 rounded-b-inherit text-size-inherit rounded-xl">
                                <div class="flex items-center">
                                    <button
                                        class="leading-pro ease-in text-size-xs bg-150 w-6.5 h-6.5 p-1.2 rounded-3.5xl tracking-tight-rem bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-emerald-500 border-transparent bg-transparent text-center align-middle font-bold uppercase text-emerald-500 transition-all hover:opacity-75"><i
                                            class="fas fa-arrow-up text-size-3xs" aria-hidden="true"></i></button>
                                    <div class="flex flex-col">
                                        <h6 class="mb-1 leading-normal dark:text-white text-size-sm text-slate-700">
                                            Apple</h6>
                                        <span class="leading-tight text-size-xs dark:text-white/80">27 March 2020,
                                            at 04:30 AM</span>
                                    </div>
                                </div>
                                <div class="flex flex-col items-center justify-center">
                                    <p
                                        class="relative z-10 inline-block m-0 font-semibold leading-normal text-transparent bg-gradient-to-tl from-green-600 to-lime-400 text-size-sm bg-clip-text">
                                        + $ 2,000</p>
                                </div>
                            </li>
                        </ul>
                        <h6 class="my-4 font-bold leading-tight uppercase dark:text-white text-size-xs text-slate-500">
                            Yesterday</h6>
                        <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                            <li
                                class="relative flex justify-between px-4 py-2 pl-0 mb-2 border-0 rounded-t-inherit text-size-inherit rounded-xl">
                                <div class="flex items-center">
                                    <button
                                        class="leading-pro ease-in text-size-xs bg-150 w-6.5 h-6.5 p-1.2 rounded-3.5xl tracking-tight-rem bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-emerald-500 border-transparent bg-transparent text-center align-middle font-bold uppercase text-emerald-500 transition-all hover:opacity-75"><i
                                            class="fas fa-arrow-up text-size-3xs" aria-hidden="true"></i></button>
                                    <div class="flex flex-col">
                                        <h6 class="mb-1 leading-normal dark:text-white text-size-sm text-slate-700">
                                            Stripe</h6>
                                        <span class="leading-tight text-size-xs dark:text-white/80">26 March 2020,
                                            at 13:45 PM</span>
                                    </div>
                                </div>
                                <div class="flex flex-col items-center justify-center">
                                    <p
                                        class="relative z-10 inline-block m-0 font-semibold leading-normal text-transparent bg-gradient-to-tl from-green-600 to-lime-400 text-size-sm bg-clip-text">
                                        + $ 750</p>
                                </div>
                            </li>
                            <li
                                class="relative flex justify-between px-4 py-2 pl-0 mb-2 border-0 border-t-0 text-size-inherit rounded-xl">
                                <div class="flex items-center">
                                    <button
                                        class="leading-pro ease-in text-size-xs bg-150 w-6.5 h-6.5 p-1.2 rounded-3.5xl tracking-tight-rem bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-emerald-500 border-transparent bg-transparent text-center align-middle font-bold uppercase text-emerald-500 transition-all hover:opacity-75"><i
                                            class="fas fa-arrow-up text-size-3xs" aria-hidden="true"></i></button>
                                    <div class="flex flex-col">
                                        <h6 class="mb-1 leading-normal dark:text-white text-size-sm text-slate-700">
                                            HubSpot</h6>
                                        <span class="leading-tight text-size-xs dark:text-white/80">26 March 2020,
                                            at 12:30 PM</span>
                                    </div>
                                </div>
                                <div class="flex flex-col items-center justify-center">
                                    <p
                                        class="relative z-10 inline-block m-0 font-semibold leading-normal text-transparent bg-gradient-to-tl from-green-600 to-lime-400 text-size-sm bg-clip-text">
                                        + $ 1,000</p>
                                </div>
                            </li>
                            <li
                                class="relative flex justify-between px-4 py-2 pl-0 mb-2 border-0 border-t-0 text-size-inherit rounded-xl">
                                <div class="flex items-center">
                                    <button
                                        class="leading-pro ease-in text-size-xs bg-150 w-6.5 h-6.5 p-1.2 rounded-3.5xl tracking-tight-rem bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-emerald-500 border-transparent bg-transparent text-center align-middle font-bold uppercase text-emerald-500 transition-all hover:opacity-75"><i
                                            class="fas fa-arrow-up text-size-3xs" aria-hidden="true"></i></button>
                                    <div class="flex flex-col">
                                        <h6 class="mb-1 leading-normal dark:text-white text-size-sm text-slate-700">
                                            Creative Tim</h6>
                                        <span class="leading-tight text-size-xs dark:text-white/80">26 March 2020,
                                            at 08:30 AM</span>
                                    </div>
                                </div>
                                <div class="flex flex-col items-center justify-center">
                                    <p
                                        class="relative z-10 items-center inline-block m-0 font-semibold leading-normal text-transparent bg-gradient-to-tl from-green-600 to-lime-400 text-size-sm bg-clip-text">
                                        + $ 2,500</p>
                                </div>
                            </li>
                            <li
                                class="relative flex justify-between px-4 py-2 pl-0 mb-2 border-0 border-t-0 rounded-b-inherit text-size-inherit rounded-xl">
                                <div class="flex items-center">
                                    <button
                                        class="leading-pro ease-in text-size-xs bg-150 w-6.5 h-6.5 p-1.2 rounded-3.5xl tracking-tight-rem bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-slate-700 border-transparent bg-transparent text-center align-middle font-bold uppercase text-slate-700 transition-all hover:opacity-75"><i
                                            class="fas fa-exclamation text-size-3xs" aria-hidden="true"></i></button>
                                    <div class="flex flex-col">
                                        <h6 class="mb-1 leading-normal dark:text-white text-size-sm text-slate-700">
                                            Webflow</h6>
                                        <span class="leading-tight text-size-xs dark:text-white/80">26 March 2020,
                                            at 05:00 AM</span>
                                    </div>
                                </div>
                                <div class="flex flex-col items-center justify-center">
                                    <p
                                        class="flex items-center m-0 font-semibold leading-normal text-size-sm text-slate-700">
                                        Pending</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endcan
</div>
