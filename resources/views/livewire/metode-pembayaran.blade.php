<div class="flex flex-wrap -mx-3">
    <div class="w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-0">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border"
            x-data="{ openBan: false }">
            <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                <div class="flex items-center">
                    <p class="mb-0 dark:text-white/80">Tambahkan Metode Pembayaran</p>
                    <button type="button"
                        class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-size-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85"
                        wire:click='addModal()'>Tambah</button>
                </div>
            </div>
            <div class="flex-auto p-6">
                @if ($addItem || $editItem)
                    <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-size-sm">Form Metode
                        Pembayaran </p>
                    <form class="flex flex-wrap -mx-3">
                        <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                            <div class="mb-4">
                                <label for="username"
                                    class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">Bank</label>
                                <input type="text" wire:model="bank" placeholder="BRI/BCA/BNI/BTN"
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-size-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                            <div class="mb-4">
                                <label for="email"
                                    class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">Nomor
                                    Rekening</label>
                                <input type="email" wire:model="no_rekening" placeholder="302901020910299"
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-size-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                            <div class="mb-4">
                                <label for="first name"
                                    class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">Nama
                                    Pemilik</label>
                                <input type="text" wire:model="pemilik" placeholder="Jesse"
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-size-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                            <div class="mb-4">
                                <label for="last name"
                                    class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">Cek
                                    Terlebih Dalhulu</label>
                                <x-jet-button type="button" wire:click='AddBank()'
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-size-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                    Simpan</x-jet-button>
                            </div>
                        </div>
                        </fo>
                @endif
            </div>
            <div class="w-full px-6 py-6 mx-auto">
                <div class="flex flex-wrap -mx-3">
                    <div class="flex-none w-full max-w-full px-3">
                        <div
                            class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                            <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                <h6 class="dark:text-white">Metode Pembayaran table</h6>
                            </div>
                            <div class="flex-auto px-0 pt-0 pb-2">
                                <div class="p-0 overflow-x-auto ps">
                                    <table
                                        class="items-center justify-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                                        <thead class="align-bottom">
                                            <tr>
                                                <th
                                                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-size-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                    Bank</th>
                                                <th
                                                    class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-size-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                    Nomor Rekening</th>
                                                <th
                                                    class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-size-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                    Nama Pemilik</th>
                                            </tr>
                                        </thead>
                                        <tbody class="border-t">
                                            @foreach ($metodeBayar as $item)
                                            <tr>
                                                <td
                                                    class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                    <div class="flex px-2">
                                                        <div class="my-auto">
                                                            <h6
                                                                class="mb-0 leading-normal dark:text-white text-size-sm">
                                                                {{$item->bank}}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td
                                                    class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                    <p
                                                        class="mb-0 font-semibold leading-normal dark:text-white dark:opacity-60 text-size-sm">
                                                        {{$item->no_rekening}}</p>
                                                </td>
                                                <td
                                                    class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                    <span
                                                        class="font-semibold leading-tight dark:text-white dark:opacity-60 text-size-xs">{{$item->pemilik}}</span>
                                                </td>
                                                <td
                                                    class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent flex">
                                                    <x-jet-secondary-button class="px-2 py-0 text-xs bg-red-500" wire:click='EditModal({{$item->id}})'>
                                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                                    </x-jet-secondary-button>
                                                    <x-jet-secondary-button class="px-2 py-0 text-xs" wire:click='hapus'>
                                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                    </x-jet-secondary-button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                    </div>
                                    <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full max-w-full px-3 mt-6 shrink-0 md:w-4/12 md:flex-0 md:mt-0">
        <div
            class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <img class="w-full rounded-t-2xl" src="{{ Auth::user()->profile_photo_url }}" alt="profile cover image">
            <div class="flex flex-wrap justify-center -mx-3">
                <div class="w-4/12 max-w-full px-3 flex-0 ">
                    <div class="mb-6 -mt-6 lg:mb-0 lg:-mt-16">
                        <a href="javascript:;">
                            <img class="h-auto max-w-full border-2 border-white border-solid rounded-circle"
                                src="{{ Auth::user()->profile_photo_url }}" alt="profile image">
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
                                <span class="leading-normal dark:text-white text-size-sm opacity-80">Friends</span>
                            </div>
                            <div class="grid mx-6 text-center">
                                <span class="font-bold dark:text-white text-size-lg">10</span>
                                <span class="leading-normal dark:text-white text-size-sm opacity-80">Photos</span>
                            </div>
                            <div class="grid text-center">
                                <span class="font-bold dark:text-white text-size-lg">89</span>
                                <span class="leading-normal dark:text-white text-size-sm opacity-80">Comments</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-6 text-center">
                    <h5 class="dark:text-white ">
                        Mark Davis
                        <span class="font-light">, 35</span>
                    </h5>
                    <div class="mb-2 font-semibold leading-relaxed text-size-base dark:text-white/80 text-slate-700">
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
</div>
