<div class="flex flex-wrap -mx-3">
    @include('sweetalert::alert')
    <div class="max-w-full px-3 lg:w-2/3 lg:flex-none">
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 xl:w-1/2 xl:flex-none">
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full max-w-full px-3 md:w-1/2 md:flex-none">
                        <div wire:click='Promo_kadaluarsa_page()'
                            class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                            <div
                                class="p-4 mx-6 mb-0 text-center border-b-0 border-b-solid rounded-t-2xl border-b-transparent">

                                <div
                                    class="w-16 h-16 text-center bg-center shadow-sm icon bg-gradient-to-tl from-blue-500 to-violet-500 rounded-xl">
                                    <i
                                        class="relative text-white opacity-100 fas fa-landmark text-size-xl top-31/100"></i>
                                </div>
                            </div>
                            {{-- Halaman Tambahan --}}
                            {{-- End Halaman --}}
                            <div class="flex-auto p-4 pt-0 text-center cursor-pointer">
                                <h6 class="mb-0 text-center dark:text-white">Promo Yang Telah Maksimal Pengguna</h6>
                                <span class="leading-tight dark:text-white dark:opacity-80 text-size-xs">Belong
                                    Interactive</span>
                                <hr
                                    class="h-px my-4 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
                                <h5 class="mb-0 dark:text-white">{{ $promo_max }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 mt-6 md:mt-0 md:w-1/2 md:flex-none">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                            <div
                                class="p-4 mx-6 mb-0 text-center border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                <div
                                    class="w-16 h-16 text-center bg-center shadow-sm icon bg-gradient-to-tl from-blue-500 to-violet-500 rounded-xl">
                                    <i
                                        class="relative text-white opacity-100 fab fa-paypal text-size-xl top-31/100"></i>
                                </div>
                            </div>
                            <div class="flex-auto p-4 pt-0 text-center">
                                <h6 class="mb-0 text-center dark:text-white">Promo Terlaris</h6>
                                <span class="leading-tight dark:text-white dark:opacity-80 text-size-xs">Freelance
                                    Payment</span>
                                <hr
                                    class="h-px my-4 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
                                <h5 class="mb-0 dark:text-white">{{ $cek_promo_terlaris }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full max-w-full px-3 xl:w-1/2 xl:flex-none">
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full max-w-full px-3 md:w-1/2 md:flex-none">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                            <div
                                class="p-4 mx-6 mb-0 text-center border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                <div
                                    class="w-16 h-16 text-center bg-center shadow-sm icon bg-gradient-to-tl from-blue-500 to-violet-500 rounded-xl">
                                    <i
                                        class="relative text-white opacity-100 fas fa-landmark text-size-xl top-31/100"></i>
                                </div>
                            </div>
                            <div class="flex-auto p-4 pt-0 text-center">
                                <h6 class="mb-0 text-center dark:text-white">Promo Belum Terpakai</h6>
                                <span class="leading-tight dark:text-white dark:opacity-80 text-size-xs">Belong
                                    Interactive</span>
                                <hr
                                    class="h-px my-4 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
                                <h5 class="mb-0 dark:text-white">{{ $cek_jumlah_pengguna_promo }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 mt-6 md:mt-0 md:w-1/2 md:flex-none">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                            <div
                                class="p-4 mx-6 mb-0 text-center border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                <div
                                    class="w-16 h-16 text-center bg-center shadow-sm icon bg-gradient-to-tl from-blue-500 to-violet-500 rounded-xl">
                                    <i
                                        class="relative text-white opacity-100 fab fa-paypal text-size-xl top-31/100"></i>
                                </div>
                            </div>
                            <div class="flex-auto p-4 pt-0 text-center">
                                <h6 class="mb-0 text-center dark:text-white">Promo Terlaris</h6>
                                <span class="leading-tight dark:text-white dark:opacity-80 text-size-xs">Freelance
                                    Payment</span>
                                <hr
                                    class="h-px my-4 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
                                <h5 class="mb-0 dark:text-white">{{ $cek_promo_terlaris }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="max-w-full px-3 mb-6 lg:mb-0 lg:w-full lg:flex-none">
                <div
                    class="relative flex flex-col min-w-0 mt-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="p-4 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex flex-wrap -mx-3">
                            <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                                <h6 class="mb-0 dark:text-white">Tabel Promo</h6>
                            </div>
                            <div class="flex-none w-1/2 max-w-full px-3 text-right">
                                <a class="inline-block px-5 py-2.5 font-bold leading-normal text-center text-white align-middle transition-all bg-transparent rounded-lg cursor-pointer text-size-sm ease-in shadow-md bg-150 bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 hover:shadow-xs active:opacity-85 hover:-translate-y-px tracking-tight-rem bg-x-25"
                                    href="javascript:;" wire:click='createModal()'> <i class="fas fa-plus">
                                    </i>&nbsp;&nbsp;Tambah Promo</a>
                            </div>
                        </div>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <div class="px-3 block sm:flex sm:justify-between">
                                <div class=" p-3">
                                    <select name="row" wire:model='row'
                                        class=" w-20 px-2 border-none ring-none active:ring-0 rounded-md text-gray-400 text-base">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                                <div class="">
                                    <input type="search" wire:model='search'
                                        class="rounded-lg bg-transparent ring-blue-400 border-blue-400 active:border-blue-500 active:border-spacing-1"
                                        placeholder="Pencarian">
                                </div>
                            </div>
                            <x-forms.table>
                                <thead class="align-bottom">
                                    <tr>
                                        <x-forms.th>
                                            Kode Promo</x-forms.th>
                                        <x-forms.th>
                                            Jenis
                                            Promo</x-forms.th>
                                        <x-forms.th>
                                            Tanggal Promo</x-forms.th>
                                        <x-forms.th>
                                            Tanggal Kadaluarsa</x-forms.th>
                                        <x-forms.th></x-forms.th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($Datapromo->count() > 0)
                                    @foreach ($Datapromo as $item)
                                    <tr>
                                        <x-.forms.td>{{ $item->kode_promo }}</x-.forms.td>
                                        <x-.forms.td>
                                            @if ($item->promo_persen == null)
                                            {{ $item->promo_nominal }}
                                            @elseif($item->promo_nominal == null)
                                            {{ $item->promo_persen }}
                                            @endif
                                        </x-.forms.td>
                                        <x-.forms.td>{{ $item->tgl_mulai }}</x-.forms.td>
                                        <x-.forms.td>{{ $item->tgl_kadaluarsa }}</x-.forms.td>
                                        <x-forms.td>
                                            <a href="#_" wire:click='editModal({{ $item->id }})'
                                                class="inline-block px-2 py-1 text-sm mx-auto text-white bg-green-500 rounded-full hover:bg-green-600 md:mx-0">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                    </path>
                                                </svg>
                                            </a>
                                            <a href="#_" wire:click='hapusModal({{ $item->id }})'
                                                class="inline-block px-2 py-1 text-sm mx-auto text-white bg-red-600 rounded-full hover:bg-red-700 md:mx-0">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                    </path>
                                                </svg>
                                            </a>
                                        </x-forms.td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </x-forms.table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full max-w-full px-3 lg:w-1/3 lg:flex-none">
        <div
            class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="p-4 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <div class="flex flex-wrap -mx-3">
                    <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                        <h6 class="mb-0 dark:text-white">Promo Yang Hampir Habis</h6>
                    </div>
                    <div class="flex-none w-1/2 max-w-full px-3 text-right">
                        <button
                            class="inline-block px-8 py-2 mb-0 font-bold leading-normal text-center text-blue-500 align-middle transition-all ease-in bg-transparent border border-blue-500 border-solid rounded-lg shadow-none cursor-pointer text-size-xs bg-150 active:opacity-85 hover:-translate-y-px tracking-tight-rem bg-x-25 hover:opacity-75">View
                            All</button>
                    </div>
                </div>
            </div>
            <div class="flex-auto p-4 pb-0">
                <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                    @foreach ($Promo_hampir_kadaluarsa as $item)
                    <li
                        class="relative flex justify-between px-4 py-2 pl-0 mb-2 border-0 rounded-t-inherit text-size-inherit rounded-xl">
                        <div class="flex flex-col">
                            <h6 class="mb-1 font-semibold leading-normal dark:text-white text-size-sm text-slate-700">
                                {{ $item->tgl_kadaluarsa }}</h6>
                            <span class="leading-tight dark:text-white dark:opacity-80 text-size-xs">{{
                                $item->kode_promo }}</span>
                        </div>
                        <div class="flex items-center leading-normal dark:text-white/80 text-size-sm">
                            {{ $item->promo }}
                            <button
                                class="dark:text-white inline-block px-0 py-2.5 mb-0 ml-6 font-bold leading-normal text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer ease-in bg-150 text-size-sm active:opacity-85 hover:-translate-y-px tracking-tight-rem bg-x-25 text-slate-700"><i
                                    class="mr-1 fas fa-file-pdf text-size-lg"></i>
                                @if ($item->category_id == null)
                                {{ $item->barang_id }}
                                @elseif($item->barang_id == null)
                                {{ $item->category_id }}
                                @endif
                            </button>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    {{-- modal --}}
    <x-jet-dialog-modal wire:model="tambahItem" maxWidth='2xl'>
        <x-slot name="title">
            @if (session()->has('message'))
            <div class="bg-blue-500 border border-blue-400 text-gray-100 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Message</strong>
                <span class="block sm:inline">{{ session('message') }}</span>
            </div>
            @endif
        </x-slot>

        <x-slot name="content">
            <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                        <div class="flex items-center">
                            <p class="mb-0 dark:text-white/80">Edit Profile</p>
                            <button type="button" wire:click='CloseAllModal'
                                class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-size-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">X</button>
                        </div>
                    </div>
                    <form class="flex-auto p-6">
                        @csrf
                        <div class="mb-4">
                            <label for="dropzone-file"
                                class="mx-auto cursor-pointer flex w-full max-w-lg flex-col items-center rounded-xl border-2 border-dashed border-blue-400 bg-white p-6 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>

                                <h2 class="mt-4 text-xl font-medium text-gray-700 tracking-wide">File</h2>

                                <p class="mt-2 text-gray-500 tracking-wide">Masukkan Thumbnail</p>

                                <input id="dropzone-file" wire:model='updatefoto' type="file" class="hidden" />
                                </section>
                                @if ($updatefoto != null)
                                    @if ($updatefoto)
                                        fPreview:
                                        <img src="{{ $updatefoto->temporaryUrl() }}" width="100">
                                    @endif
                                    @error('updateFoto')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                @else
                                    <img src="{{ asset('upload/' . $updatefoto) }}" width="100" alt="">
                                @endif
                        </div>
                        <div class="w-full max-w-full px-3 flex shrink-0 md:w-6/12 md:flex-0">

                            <div class="mb-4">
                                <label for="kode_promo"
                                    class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">kode_promo</label>
                                <input type="text" wire:model="kode_promo"
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-size-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                @error('kode_promo')
                                <span class="text-sm text-red-500 italic">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3">

                            <div class="w-full max-w-full px-3 flex shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="promo"
                                        class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">Promo
                                        Nominal</label>
                                    <input type="text" wire:model="promo_nominal"
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-size-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                    @error('promo_nominal')
                                    <span class="text-sm text-red-500 italic">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 flex shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="promo"
                                        class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">Promo
                                        Persen</label>
                                    <input type="text" wire:model="promo_persen"
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-size-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                    @error('promo_persen')
                                    <span class="text-sm text-red-500 italic">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="category_id"
                                        class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">Category</label>
                                    <select id="countries" wire:model='category_id'
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @if ($category != null)
                                        <option value="--">--Pilih--</option>
                                        @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->kategory }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    @error('category_id')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="max_user"
                                        class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">Maximal
                                        Pengguna</label>
                                    <input type="text" wire:model="max_user"
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-size-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                    </select>
                                    @error('max_user')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr
                            class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent ">

                        <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-size-sm">Tanggal Muat
                        </p>
                        <div class="flex flex-wrap -mx-3">
                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="tgl_mulai"
                                        class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">tgl_mulai</label>
                                    <input type="date" wire:model="tgl_mulai"
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-size-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="tgl_kadaluarsa"
                                        class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">tgl_kadaluarsa</label>
                                    <input type="date" wire:model="tgl_kadaluarsa"
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-size-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                </div>
                            </div>
                            <div class="flex flex-wrap justify-center items-center mx-auto">
                                <div class="w-full px-3 py-2">
                                    <x-jet-secondary-button wire:click='create()'>Tambah</x-jet-secondary-button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
        </x-slot>
    </x-jet-dialog-modal>
    <x-jet-dialog-modal wire:model="editItem" maxWidth='2xl'>
        <x-slot name="title">
            @if (session()->has('message'))
            <div class="bg-blue-500 border border-blue-400 text-gray-100 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Message</strong>
                <span class="block sm:inline">{{ session('message') }}</span>
            </div>
            @endif
        </x-slot>

        <x-slot name="content">
            <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                        <div class="flex items-center">
                            <p class="mb-0 dark:text-white/80">Edit Profile</p>
                            <button type="button" wire:click='CloseAllModal'
                                class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-size-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">X</button>
                        </div>
                    </div>
                    <form class="flex-auto p-6">
                        @csrf
                        <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-size-sm">User
                            Information
                        </p>
                        <div class="flex flex-wrap -mx-3">
                            <div class="w-full max-w-full px-3 flex shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="kode_promo"
                                        class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">kode_promo</label>
                                    <input type="text" wire:model="kode_promo"
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-size-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                    @error('kode_promo')
                                    <span class="text-sm text-red-500 italic">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 flex shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="promo"
                                        class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">Promo
                                        Nominal</label>
                                    <input type="text" wire:model="promo_nominal"
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-size-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                    @error('promo_nominal')
                                    <span class="text-sm text-red-500 italic">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 flex shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="promo"
                                        class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">Promo
                                        Persen</label>
                                    <input type="text" wire:model="promo_persen"
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-size-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                    @error('promo_persen')
                                    <span class="text-sm text-red-500 italic">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="category_id"
                                        class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">Category</label>
                                    <select id="countries" wire:model='category_id'
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @if ($category != null)
                                        <option value="--">--Pilih--</option>
                                        @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->kategory }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    @error('category_id')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="max_user"
                                        class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">Maximal
                                        Pengguna</label>
                                    <input type="text" wire:model="max_user"
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-size-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                    </select>
                                    @error('max_user')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr
                            class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent ">

                        <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-size-sm">Tanggal Muat
                        </p>
                        <div class="flex flex-wrap -mx-3">
                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="tgl_mulai"
                                        class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">tgl_mulai</label>
                                    <input type="date" wire:model="tgl_mulai"
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-size-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="tgl_kadaluarsa"
                                        class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">tgl_kadaluarsa</label>
                                    <input type="date" wire:model="tgl_kadaluarsa"
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-size-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                </div>
                            </div>
                            <div class="flex flex-wrap justify-center items-center mx-auto">
                                <div class="w-full px-3 py-2">
                                    <x-jet-secondary-button wire:click='edit({{$itemID}})'>Simpan</x-jet-secondary-button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </x-slot>>

        <x-slot name="footer">
        </x-slot>
    </x-jet-dialog-modal>
    <x-jet-dialog-modal wire:model="hapusItem">
        <x-slot name="title">
            Hapus Data Barang {{ $itemID }}
        </x-slot>

        <x-slot name="content">
            Apakah Anda Yakin?
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('hapusItem')" wire:loading.attr="disabled">
                Batalkan
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="hapus({{ $itemID }})" wire:loading.attr="disabled">
                Hapus
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
