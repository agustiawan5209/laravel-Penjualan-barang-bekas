<div>
    @include('sweetalert::alert')
    <div class="" x-data="{ jenisVoucher: {{ $jenis_voucher }}, }">
        <div class="max-w-full px-3  lg:flex-none">
            <div class="flex flex-wrap -mx-3">
                <div class="max-w-full px-3 mb-6 lg:mb-0 lg:w-full lg:flex-none">
                    <div
                        class="relative flex flex-col min-w-0 mt-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        <div class="p-4 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <div class="flex flex-wrap -mx-3">
                                <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                                    <h6 class="mb-0 dark:text-white">Tabel Voucher</h6>
                                </div>
                                <div class="flex-none w-1/2 max-w-full px-3 text-right">
                                    <a class="inline-block px-5 py-2.5 font-bold leading-normal text-center text-white align-middle transition-all bg-transparent rounded-lg cursor-pointer text-size-sm ease-in shadow-md bg-150 bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 hover:shadow-xs active:opacity-85 hover:-translate-y-px tracking-tight-rem bg-x-25"
                                        href="javascript:;" wire:click='createModal()'> <i class="fas fa-plus">
                                        </i>&nbsp;&nbsp;Tambah Voucher</a>
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
                                                Kode Voucher</x-forms.th>
                                            <x-forms.th>
                                                Jenis
                                                Voucher</x-forms.th>
                                            <x-forms.th>
                                                Jumlah Diskon</x-forms.th>
                                            <x-forms.th> Jumlah
                                                Pengguna </x-forms.th>
                                            <x-forms.th>Deskripsi</x-forms.th>
                                            <x-forms.th></x-forms.th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($DataVoucher->count() > 0)
                                            @foreach ($DataVoucher as $item)
                                                <tr>
                                                    <x-.forms.td>{{ $item->kode_voucher }}</x-.forms.td>
                                                    <x-.forms.td>
                                                        @if ($item->jenis_voucher == 0)
                                                        Umum
                                                        @elseif ($item->jenis_voucher == 1)
                                                            Pengguna Baru
                                                        @elseif ($item->jenis_voucher == 2)
                                                            Jumlah Pembelian
                                                        @elseif ($item->jenis_voucher == 3)
                                                            Pembelian Produk
                                                        @endif
                                                    </x-.forms.td>
                                                    <x-.forms.td>{{ $item->diskon }}</x-.forms.td>
                                                    <x-.forms.td>{{ $item->use_user }}</x-.forms.td>
                                                    <x-.forms.td>{{ $item->deskripsi }}</x-.forms.td>
                                                    <x-forms.td>
                                                        <a href="#_" wire:click='detailModal({{ $item->id }})'
                                                            class="inline-block px-2 py-1 text-sm mx-auto text-white bg-blue-500 rounded-full hover:bg-blue-600 md:mx-0">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                              </svg>

                                                        </a>
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
        {{-- modal --}}
       @if ($tambahItem)
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
                            <p class="mb-0 dark:text-white/80">Tambah Voucher</p>
                            <button type="button" wire:click='CloseAllModal'
                                class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-size-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">X</button>
                        </div>
                    </div>
                    <form class="flex-auto p-6">
                        @csrf
                        <div class="flex flex-wrap -mx-3">
                            <div class="w-full max-w-full px-3 flex shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="kode_voucher"
                                        class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">Kode
                                        Voucher</label>
                                    <input type="text" wire:model="kode_voucher"
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-size-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                    @error('kode_voucher')
                                        <span class="text-sm text-red-500 italic">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 flex shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="Voucher"
                                        class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">Diskon
                                        Voucher
                                    </label>
                                    <input type="text" wire:model="diskon"
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-size-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                    @error('diskon')
                                        <span class="text-sm text-red-500 italic">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 flex shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4 w-full">
                                    <label for="Voucher"
                                        class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">Jenis
                                        Voucher

                                    </label>
                                    <select id="countries" wire:model='jenis_voucher' x-model="jenisVoucher"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="5">--Masukkan Jenis Voucher--</option>
                                        <option value="0">Umum</option>
                                        <option value="1">Pengguna Baru</option>
                                        <option value="2">Jumlah Pembelian</option>
                                        <option value="3">Pembelian Produk</option>
                                    </select>
                                    @error('jenis_voucher')
                                        <span class="text-sm text-red-500 italic">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 flex shrink-0 md:w-6/12 md:flex-0"
                                x-show="jenisVoucher == 2">
                                <div class="mb-4">
                                    <label for="Voucher"
                                        class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">Masukkan
                                        Jumlah Pembelian Produk
                                    </label>
                                    <input type="text" wire:model="jumlah_pembelian"
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-size-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                    @error('diskon')
                                        <span class="text-sm text-red-500 italic">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 flex shrink-0 md:w-6/12 md:flex-0"
                                x-show="jenisVoucher == 3">
                                <div class="mb-4">
                                    <label for="Voucher"
                                        class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">Pilih
                                        Produk
                                    </label>
                                    <select id="countries" wire:model='barang_id'
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="0">--Pilih Produk--</option>
                                        @foreach ($barang as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_produk }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr
                            class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent ">

                        <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-size-sm">Masukkan
                            Deskripsi Voucher
                        </p>
                        <div class="flex flex-wrap -mx-3">
                            <div class="w-full max-w-full px-3 shrink-0  md:flex-0">
                                <div class="mb-4">
                                    <label for="tgl_mulai"
                                        class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">Deskripsi</label>
                                    <textarea type="text" wire:model="deskripsi"
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-size-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"></textarea>
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
       @endif
        <x-jet-dialog-modal wire:model="editItem" maxWidth='2xl'>
            <x-slot name="title">
                @if (session()->has('message'))
                    <div class="bg-blue-500 border border-blue-400 text-gray-100 px-4 py-3 rounded relative"
                        role="alert">
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
                                <p class="mb-0 dark:text-white/80">Edit Voucher</p>
                                <button type="button" wire:click='CloseAllModal'
                                    class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-size-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">X</button>
                            </div>
                        </div>
                        <form class="flex-auto p-6">
                            @csrf
                            <div class="flex flex-wrap -mx-3">
                                <div class="w-full max-w-full px-3 flex shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <label for="kode_voucher"
                                            class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">Kode
                                            Voucher</label>
                                        <input type="text" wire:model="kode_voucher"
                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-size-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                        @error('kode_voucher')
                                            <span class="text-sm text-red-500 italic">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full max-w-full px-3 flex shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <label for="Voucher"
                                            class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">Diskon
                                            Voucher
                                        </label>
                                        <input type="text" wire:model="diskon"
                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-size-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                        @error('diskon')
                                            <span class="text-sm text-red-500 italic">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full max-w-full px-3 flex shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4 w-full">
                                        <label for="Voucher"
                                            class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">Jenis
                                            Voucher

                                        </label>
                                        <select id="countries" wire:model='jenis_voucher' x-model="jenisVoucher"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="">--Masukkan Jenis Voucher--</option>
                                            <option value="0" {{$jenis_voucher == 0 ? 'selected' : ''}}>Umum</option>
                                            <option value="1" {{$jenis_voucher == 1 ? 'selected' : ''}}>Pengguna Baru</option>
                                            <option value="2" {{$jenis_voucher == 2 ? 'selected' : ''}}>Jumlah Pembelian</option>
                                            <option value="3" {{$jenis_voucher == 3 ? 'selected' : ''}}>Pembelian Produk</option>
                                        </select>
                                        @error('jenis_voucher')
                                            <span class="text-sm text-red-500 italic">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full max-w-full px-3 flex shrink-0 md:w-6/12 md:flex-0"
                                    x-show="jenisVoucher == 2">
                                    <div class="mb-4">
                                        <label for="Voucher"
                                            class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">Masukkan
                                            Jumlah Pembelian Produk
                                        </label>
                                        <input type="text" wire:model="jumlah_pembelian"
                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-size-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                        @error('jumlah_pembelian')
                                            <span class="text-sm text-red-500 italic">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full max-w-full px-3 flex shrink-0 md:w-6/12 md:flex-0"
                                    x-show="jenisVoucher == 3">
                                    <div class="mb-4">
                                        <label for="Voucher"
                                            class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">Pilih
                                            Produk
                                        </label>
                                        <select id="countries" wire:model='barang_id'
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="0">--Pilih Produk--</option>
                                            @foreach ($barang as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_produk }}</option>
                                            @endforeach
                                        </select>
                                        @error('barang_id')
                                            <span class="text-sm text-red-500 italic">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr
                                class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent ">

                            <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-size-sm">Masukkan
                                Deskripsi Voucher
                            </p>
                            <div class="flex flex-wrap -mx-3">
                                <div class="w-full max-w-full px-3 shrink-0  md:flex-0">
                                    <div class="mb-4">
                                        <label for="tgl_mulai"
                                            class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">Deskripsi</label>
                                        <textarea type="text" wire:model="deskripsi"
                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-size-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"></textarea>
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
            </x-slot>

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

                <x-jet-danger-button class="ml-2" wire:click="hapus({{ $itemID }})"
                    wire:loading.attr="disabled">
                    Hapus
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
        <x-jet-dialog-modal wire:model=detailItem>
            <x-slot name="title"></x-slot>
            <x-slot name="content">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="p-6 px-4 pb-0 mb-0 border-b-0 rounded-t-2xl">
                        <h6 class="mb-0 dark:text-white">Detail Voucher</h6>
                    </div>
                    <div class="flex-auto p-4 pt-6">
                        <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                            <li
                                class="relative flex p-6 mb-2 border-0 rounded-t-inherit rounded-xl bg-gray-50 dark:bg-slate-850">
                                <div class="flex flex-col">
                                    <h6 class="mb-4 text-sm leading-normal dark:text-white">Kode : {{$kode_voucher}}</h6>
                                    <span class="mb-2 text-xs leading-tight dark:text-white/80">Jenis Vocuher: <span
                                            class="font-semibold text-slate-700 dark:text-white sm:ml-2">
                                            @if ($jenis_voucher == 1)
                                            Umum
                                            @elseif ($jenis_voucher == 1)
                                            Pengguna Baru
                                        @elseif ($jenis_voucher == 2)
                                            Jumlah Pembelian
                                        @elseif ($jenis_voucher == 3)
                                            Pembelian Produk
                                        @endif</span></span>

                                    <span class="mb-2 text-xs leading-tight dark:text-white/80">Jumlah Pengguna: <span
                                            class="font-semibold text-slate-700 dark:text-white sm:ml-2">{{$use_user}}</span></span>
                                            @if ($jenis_voucher == 1)
                                        @elseif ($jenis_voucher == 2)
                                        <span class="text-xs leading-tight dark:text-white/80">Jumlah Pembelian: <span
                                            class="font-semibold text-slate-700 dark:text-white sm:ml-2">{{$jumlah_pembelian}}</span></span>
                                        @elseif ($jenis_voucher == 3)
                                        <span class="text-xs leading-tight dark:text-white/80">Produk: <span
                                            class="font-semibold text-slate-700 dark:text-white sm:ml-2">{{$barang_id}}</span></span>
                                        @endif
                                        <span class="text-xs leading-tight dark:text-white/80">Deskripsi: <span
                                            class="font-semibold text-slate-700 dark:text-white sm:ml-2">{{$deskripsi}}</span></span>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('detailItem')" wire:loading.attr='disabled'>Tutup</x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>

</div>
