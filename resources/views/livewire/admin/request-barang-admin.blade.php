<div class="flex justify-center w-full py-3">
    @if (session()->has('message'))
    <x-Alert :message="session('message')" />
@endif
    <div class="bg-white rounded-md shadow-md w-full">
        <div class="flex-auto px-0 pt-0 md:py-2 w-full">
            <div class="p-0 overflow-x-auto">
                <div class="md:px-4 md:py-2 block sm:flex sm:justify-between">
                    <div class=" md:px-3 flex justify-between flex-wrap md:flex-nowrap md:w-md">
                        <select name="row" wire:model='row'
                            class=" w-20 px-2 border-none ring-black active:ring-0 shadow-md rounded-md text-gray-400 text-base">
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
                                Pengguna</x-forms.th>
                            <x-forms.th>
                                Foto Produk</x-forms.th>
                            <x-forms.th>
                                Nama Produk</x-forms.th>
                            <x-forms.th>
                                Harga</x-forms.th>
                            <x-forms.th>
                                Kategori</x-forms.th>

                            <x-forms.th>
                                Chat</x-forms.th>
                            <x-forms.th>Konfirmasi</x-forms.th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($barang->count() > 0)
                            @foreach ($barang as $item)
                                <tr>
                                    <x-forms.td>
                                        <p
                                            class="mb-0 font-semibold leading-tight dark:text-black dark:opacity-80 text-size-xs">
                                            {{ $item->user->name }}</p>
                                    </x-forms.td>
                                    <x-forms.td>
                                        <div class="flex px-2 py-1">
                                            <div>
                                                <img src="{{ asset('upload/' . $item->foto_produk) }}"
                                                    class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-in-out text-size-sm h-9 w-9 rounded-xl"
                                                    alt="user1" />
                                            </div>
                                            {{-- <div class="flex flex-col justify-center">
                                      <h6 class="mb-0 leading-normal dark:text-black text-size-sm">John
                                          Michael</h6>
                                      <p
                                          class="mb-0 leading-tight dark:text-black dark:opacity-80 text-size-xs text-slate-400">
                                          john@creative-tim.com</p>
                                  </div> --}}
                                        </div>
                                    </x-forms.td>
                                    <x-forms.td>
                                        <p
                                            class="mb-0 font-semibold leading-tight dark:text-black dark:opacity-80 text-size-xs">
                                            {{ $item->nama_produk }}</p>
                                    </x-forms.td>

                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <span
                                            class="font-semibold leading-tight text-size-xs dark:text-black dark:opacity-80 text-slate-400">
                                            Rp. {{ number_format($item->harga, 0, 2) }}</span>
                                    </td>

                                    <td>
                                        <a href="#_" wire:click='chatUser({{ $item->id }})'
                                            class="inline-block px-2 py-1 text-sm mx-auto text-white bg-blue-500 rounded-full hover:bg-red-600 md:mx-0">
                                           Hubungi Penjual
                                        </a>
                                    </td>
                                    <td
                                        class="p-2 leading-normal text-center align-middle bg-transparent border-b dark:border-white/40 text-size-sm whitespace-nowrap shadow-transparent">
                                        <span
                                            class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-3.6-em text-size-xs-em rounded-1.8 py-2.2-em inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">{{ $item->categories }}</span>
                                    </td>
                                    <x-forms.td>
                                        <a href="#_" wire:click='konfirModal({{ $item->id }})'
                                            class="inline-block px-2 py-1 text-sm mx-auto text-white bg-blue-500 rounded-full hover:bg-red-600 md:mx-0">
                                            Konfirmasi
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
    {{-- Modal Detail Produk Pengguna --}}
    <x-jet-dialog-modal wire:model="statusItem">
        <x-slot name='title'>
            {{ __('Detail Barang') }}
        </x-slot>
        <x-slot name='content'>
            <div
                class="relative flex flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl dark:bg-gray-950 border-black-125 rounded-2xl bg-clip-border">
                <div class="overflow-x-auto ps">
                    <table
                        class="items-center w-full mb-4 align-top border-collapse border-gray-200 dark:border-white/40">
                        <tbody>
                            <tr>
                                <td
                                    class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40">
                                    <div class="flex items-center px-2 py-1">
                                        <div>
                                            <img src="{{ asset('upload/' . $foto_produk) }}" alt="Country flag">
                                        </div>
                                        <div class="ml-6">
                                            <p
                                                class="mb-0 font-semibold leading-tight dark:text-black text-xs dark:opacity-60">
                                                Nama:</p>
                                            <h6 class="mb-0 leading-normal text-sm dark:text-black">{{ $nama_produk }}
                                            </h6>
                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                    <div class="text-center">
                                        <p
                                            class="mb-0 font-semibold leading-tight dark:text-black text-xs dark:opacity-60">
                                            Deskripsi:</p>
                                        <h6 class="mb-0 leading-normal text-sm dark:text-black">{{ $deskripsi }}</h6>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td
                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                    <div class="text-center">
                                        <p
                                            class="mb-0 font-semibold leading-tight dark:text-black text-xs dark:opacity-60">
                                            Harga:</p>
                                        <h6 class="mb-0 leading-normal text-sm dark:text-black">
                                            {{ number_format($harga, 0, 2) }}</h6>
                                    </div>
                                </td>
                                <td
                                    class="p-2 leading-normal align-middle bg-transparent border-b text-sm whitespace-nowrap dark:border-white/40">
                                    <div class="flex-1 text-center">
                                        <p
                                            class="mb-0 font-semibold leading-tight dark:text-black text-xs dark:opacity-60">
                                            Alamat:</p>
                                        <h6 class="mb-0 leading-normal text-sm dark:text-black">{{ $Alamat }}
                                        </h6>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="border-black/12.5 rounded-t-2xl p-6 text-center pt-0 pb-6 lg:pt-2 lg:pb-4"
                    x-data="{ request: 0, }">
                    <div class="flex justify-between">
                        <button type="button" x-on:click="request = 1"
                            class="hidden px-8 py-2 font-bold leading-normal text-center text-white align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer text-xs bg-red-500 lg:block tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Tolak
                            Request Barang</button>

                        <button type="button" x-on:click="request =2"
                            class="hidden px-8 py-2 font-bold leading-normal text-center text-white align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer text-xs bg-slate-700 lg:block tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Terima
                            Request barang</button>

                    </div>
                    <form action="" x-show="request == 1">
                        <div class="flex flex-wrap -mx-3">
                            <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                                <div class="mb-4">
                                    <label for="about me"
                                        class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-black/80">Tolak
                                        Barang</label>
                                    <input type="text" wire:model='alasan'
                                        value="A beautiful Dashboard for Bootstrap 5. It is Free and Open Source."
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-black text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" placeholder="Alasan....">
                                </div>
                                <x-jet-button wire:click='konfirmasiStatus({{$itemID}}, 3)'>Simpan</x-jet-button>
                            </div>
                        </div>
                    </form>
                    <form action="" x-show="request == 2">
                        <div class="flex flex-wrap -mx-3">
                            <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                                <div class="mb-4">
                                    <label for="about me"
                                        class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-black/80">Terima Request</label>
                                    <input type="text"  wire:model='alasan'
                                        value="A beautiful Dashboard for Bootstrap 5. It is Free and Open Source."
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-black text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" placeholder="Masukkan Detail">

                                </div>
                                <x-jet-button wire:click='konfirmasiStatus({{$itemID}} , 2)'>Simpan</x-jet-button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </x-slot>
        <x-slot name='footer'>

        </x-slot>
    </x-jet-dialog-modal>
</div>
