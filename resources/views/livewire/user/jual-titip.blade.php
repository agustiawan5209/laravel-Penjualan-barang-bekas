<div class="flex-auto px-0 pt-0 pb-2 bg-white">
    <div class="p-0 overflow-x-auto">
        <div class="px-3 py-2 shadow-sm block sm:flex sm:justify-between">
            <x-jet-button type='button' wire:click='TambahModal'>Tambah Produk</x-jet-button>
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
                        Foto Produk</x-forms.th>
                    <x-forms.th>
                        Nama Produk</x-forms.th>
                    <x-forms.th>
                        Harga</x-forms.th>
                    <x-forms.th>
                        Deskripsi</x-forms.th>
                    <x-forms.th>
                        Kategori</x-forms.th>
                    {{-- <x-forms.th>Diskon</x-forms.th> --}}
                    <x-forms.th></x-forms.th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barang as $item)
                    <tr>
                        <x-forms.td>
                            <div class="flex px-2 py-1">
                                <div>
                                    <img src="{{ asset('upload/' . $item->foto_produk) }}"
                                        class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-in-out text-size-sm h-9 w-9 rounded-xl"
                                        alt="user1" />
                                </div>
                                {{-- <div class="flex flex-col justify-center">
                                    <h6 class="mb-0 leading-normal dark:text-white text-size-sm">John
                                        Michael</h6>
                                    <p
                                        class="mb-0 leading-tight dark:text-white dark:opacity-80 text-size-xs text-slate-400">
                                        john@creative-tim.com</p>
                                </div> --}}
                            </div>
                        </x-forms.td>
                        <x-forms.td>
                            <p class="mb-0 font-semibold leading-tight dark:text-white dark:opacity-80 text-size-xs">
                                {{ $item->nama_produk }}</p>
                        </x-forms.td>

                        <td
                            class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                            <span
                                class="font-semibold leading-tight text-size-xs dark:text-white dark:opacity-80 text-slate-400">
                                Rp. {{ number_format($item->harga, 0, 2) }}</span>
                        </td>
                        <td
                            class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                            <span
                                class="font-semibold leading-tight text-size-xs dark:text-white dark:opacity-80 text-slate-400">{{ $item->deskripsi }}</span>
                        </td>
                        <td
                            class="p-2 leading-normal text-center align-middle bg-transparent border-b dark:border-white/40 text-size-sm whitespace-nowrap shadow-transparent">
                            <span
                                class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-3.6-em text-size-xs-em rounded-1.8 py-2.2-em inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">{{ $item->category->kategory }}</span>
                        </td>
                        {{-- <x-forms.td>
                            <button type="button" class="ml-5 bg-orange-400 px-4 text-white py-2 rounded-md"
                                wire:click='Diskon({{ $item->id }})'>Diskon</button>
                        </x-forms.td> --}}
                        <x-forms.td>
                            <a href="#_" wire:click='editModal({{ $item->id }})'
                                class="inline-block px-2 py-1 text-sm mx-auto text-white bg-green-500 rounded-full hover:bg-green-600 md:mx-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>
                            </a>
                            <a href="#_" wire:click='hapusModal({{ $item->id }})'
                                class="inline-block px-2 py-1 text-sm mx-auto text-white bg-red-600 rounded-full hover:bg-red-700 md:mx-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>
                            </a>
                        </x-forms.td>
                    </tr>
                @endforeach
            </tbody>
        </x-forms.table>

    </div>
    @if ($TambahBarangItem)
    <x-jet-dialog-modal wire:model="TambahBarangItem" maxWidth='2xl'>
        <x-slot name="title">

        </x-slot>

        <x-slot name="content">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" x-data="{ isUploading: false, progress: 0 }"
            x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false"
            x-on:livewire-upload-error="isUploading = false"
            x-on:livewire-upload-progress="progress = $event.detail.progress">
            @csrf
            <div class="mb-4">
                <label for="dropzone-file"
                    class="mx-auto cursor-pointer flex w-full max-w-lg flex-col items-center rounded-xl border-2 border-dashed border-blue-400 bg-white p-6 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                    </svg>

                    <h2 class="mt-4 text-xl font-medium text-gray-700 tracking-wide">Payment File</h2>

                    <p class="mt-2 text-gray-500 tracking-wide">Upload or darg & drop your file SVG, PNG, JPG or
                        GIF. </p>

                    <input id="dropzone-file" wire:model='foto' type="file" class="hidden" />
                    </section>
                    @if ($foto)
                        foto Preview:
                        <img src="{{ $foto->temporaryUrl() }}">
                    @endif
                    @error('foto')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Nama Produk
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    wire:model='nama_produk' id="password" type="text" placeholder="******************">
                @error('nama_produk')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Harga Produk
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    wire:model="harga_produk" type="text" placeholder="******************">
                @error('harga_produk')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Deskripsi Produk
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    wire:model="deskripsi_produk" type="text" placeholder="******************">
                @error('deskripsi_produk')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Stock Produk
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    wire:model="jumlah_stock" type="text" placeholder="******************">
                @error('jumlah_stock')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Kategori Produk
                </label>
                <select id="countries" wire:model='kategori_produk'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @if ($kategory != null)
                        @foreach ($kategory as $item)
                            <option value="{{ $item->id }}">{{ $item->kategory }}</option>
                        @endforeach
                    @endif
                </select>
                @error('kategori_produk')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center justify-between">
                <button wire:click='TambahBarang'
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="button">
                    Tambah
                </button>
                <button wire:click='$toggle("TambahBarangItem")' wire:loading.attr='disabled'
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="button">
                    Close
                </button>
            </div>
        </form>
        </x-slot>

        <x-slot name="footer">
        </x-slot>
    </x-jet-dialog-modal>
    @endif
    @if ($editItem)
    <x-jet-dialog-modal wire:model="editItem" maxWidth='2xl'>
        <x-slot name="title">

        </x-slot>

        <x-slot name="content">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" x-data="{ isUploading: false, progress: 0 }"
            x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false"
            x-on:livewire-upload-error="isUploading = false"
            x-on:livewire-upload-progress="progress = $event.detail.progress">
            @csrf
            <div class="mb-4">
                <label for="dropzone-file"
                    class="mx-auto cursor-pointer flex w-full max-w-lg flex-col items-center rounded-xl border-2 border-dashed border-blue-400 bg-white p-6 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                    </svg>

                    <h2 class="mt-4 text-xl font-medium text-gray-700 tracking-wide">File</h2>

                    <p class="mt-2 text-gray-500 tracking-wide">Upload or darg & drop your file SVG, PNG, JPG or
                        GIF. </p>

                    <input id="dropzone-file" wire:model='foto' type="file" class="hidden" />
                    </section>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Nama Produk
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    wire:model='nama_produk' id="password" type="text" placeholder="******************">
                @error('nama_produk')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Harga Produk
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    wire:model="harga_produk" type="text" placeholder="******************">
                @error('harga_produk')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Deskripsi Produk
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    wire:model="deskripsi_produk" type="text" placeholder="******************">
                @error('deskripsi_produk')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Stock Produk
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    wire:model="jumlah_stock" type="text" placeholder="******************">
                @error('jumlah_stock')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Kategori Produk
                </label>
                <select id="countries" wire:model='kategori_produk'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @if ($kategory != null)
                        @foreach ($kategory as $item)
                            <option value="{{ $item->id }}">{{ $item->kategory }}</option>
                        @endforeach
                    @endif
                </select>
                @error('kategori_produk')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center justify-between">
                <button wire:click='EditBarang({{$itemID}})'
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="button">
                    Tambah
                </button>
                <button wire:click='$toggle("editItem")' wire:loading.attr='disabled'
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="button">
                    Close
                </button>
            </div>
        </form>
        </x-slot>

        <x-slot name="footer">
        </x-slot>
    </x-jet-dialog-modal>
    @endif
    @if ($hapusItem)
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

                <x-jet-danger-button class="ml-2" wire:click="HapusBarang({{ $itemID }})"
                    wire:loading.attr="disabled">
                    Hapus
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    @endif
</div>
{{-- FOrm Input Barang --}}

