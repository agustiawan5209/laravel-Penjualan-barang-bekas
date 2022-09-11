{{-- Table Barang --}}

<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
        <div
            class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex">
                <button type="button" class="bg-blue-400 px-4 text-white py-2 rounded-md" wire:click='addingItem()'>Tambah
                    Data Barang</button>
                <button type="button" class="ml-5 bg-blue-400 px-4 text-white py-2 rounded-md"
                    wire:click='ShowKategori()'>
                    Kategori</button>
                <button type="button" class="ml-5 bg-blue-400 px-4 text-white py-2 rounded-md"
                    wire:click='Promo()'>
                    Promo</button>


                @if (session()->has('message'))
                    <div class="bg-blue-500 border border-blue-400 text-gray-100 px-4 py-3 rounded relative"
                        role="alert">
                        <strong class="font-bold">Message</strong>
                        <span class="block sm:inline">{{ session('message') }}</span>
                    </div>
                @endif
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
                                    Foto Produk</x-forms.th>
                                <x-forms.th>
                                    Nama Produk</x-forms.th>
                                <x-forms.th>
                                    Harga</x-forms.th>
                                <x-forms.th>
                                    Kategori</x-forms.th>
                                <x-forms.th>Diskon</x-forms.th>
                                <x-forms.th></x-forms.th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barang as $item)
                                <tr>
                                    <x-forms.td>
                                        <div class="flex justify-center px-2 py-1">
                                                <img src="{{ asset('upload/' . $item->foto_produk) }}"
                                                    class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-in-out text-size-sm h-12 w-12 rounded-xl"
                                                    alt="user1" />
                                        </div>
                                    </x-forms.td>
                                    <x-forms.td>
                                        <p
                                            class="mb-0 font-semibold leading-tight dark:text-white dark:opacity-80 text-size-xs">
                                            {{ $item->nama_produk }}</p>
                                    </x-forms.td>

                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <span
                                            class="font-semibold leading-tight text-size-xs dark:text-white dark:opacity-80 text-slate-400">
                                            Rp. {{ number_format($item->harga, 0, 2) }}</span>
                                    </td>
                                    <td
                                        class="p-2 leading-normal text-center align-middle bg-transparent border-b dark:border-white/40 text-size-sm whitespace-nowrap shadow-transparent">
                                        <span
                                            class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-3.6-em text-size-xs-em rounded-1.8 py-2.2-em inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">{{ $item->category->kategory }}</span>
                                    </td>
                                    <x-forms.td>
                                        <button type="button"
                                            class="ml-5 bg-orange-400 px-4 text-white py-2 rounded-md"
                                            wire:click='Diskon({{ $item->id }})'>Diskon</button>
                                    </x-forms.td>
                                    <x-forms.td>
                                        <a href="#_" wire:click='editModal({{ $item->id }})'
                                            class="inline-block px-2 py-1 text-sm mx-auto text-white bg-green-500 rounded-full hover:bg-green-600 md:mx-0">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                </path>
                                            </svg>
                                        </a>
                                        <a href="#_" wire:click='hapusModal({{ $item->id }})'
                                            class="inline-block px-2 py-1 text-sm mx-auto text-white bg-red-600 rounded-full hover:bg-red-700 md:mx-0">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
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
            </div>
        </div>
    </div>


    {{-- Modal Tambah Data --}}
    @if ($addItem)
       <x-jet-dialog-modal wire:model='addItem'>
        <x-slot name="title">
        </x-slot>

        <x-slot name="content">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 overflow-y-auto" x-data="{ isUploading: false, progress: 0 }"
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
                    Stock Produk
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    wire:model="stock" type="text" placeholder="******************">
                @error('stock')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Kategori Produk
                </label>
                <select id="countries" wire:model='kategori_produk'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @if ($kategory->count() > 0)
                        @foreach ($kategory as $item)
                            <option value="{{ $item->id }}">{{ $item->kategory }}</option>
                        @endforeach
                    @endif
                </select>
                @error('kategori_produk')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Deskripsi Produk
                </label>
                <textarea id="myeditorinstance"
                class=" ckeditor shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                wire:model="deskripsi_produk" name="editor1" id="editor1" rows="10" cols="80"></textarea>
                @error('deskripsi_produk')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button wire:click='create'
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="button">
                    Tambah
                </button>
                <button wire:click='closeModal'
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
    {{-- modal edit data --}}
    @if ($editItem)
    <x-jet-dialog-modal wire:model='editItem'>
        <x-slot name="title">
        </x-slot>

        <x-slot name="content">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 overflow-y-auto" x-data="{ isUploading: false, progress: 0 }"
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
                    @if ($updateFoto != null)
                    @if ($updateFoto)
                    foto produk Preview:
                    <img src="{{ $updateFoto->temporaryUrl() }}">
                    @endif
                    @error('updateFoto')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                    @else
                    <img src="{{asset('upload/'. $foto)}}" width="100" alt="">
                    @endif
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
                    Stock Produk
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    wire:model="stock" type="text" placeholder="******************">
                @error('stock')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Kategori Produk
                </label>
                <select id="countries" wire:model='kategori_produk'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @if ($kategory->count() > 0)
                        @foreach ($kategory as $item)
                            <option value="{{ $item->id }}">{{ $item->kategory }}</option>
                        @endforeach
                    @endif
                </select>
                @error('kategori_produk')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Deskripsi Produk
                </label>
                <textarea id="myeditorinstance"
                class=" ckeditor shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                wire:model="deskripsi_produk" name="editor1" id="editor1" rows="10" cols="80"></textarea>
                @error('deskripsi_produk')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button wire:click='EditBarang({{$itemID}})'
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="button">
                    Simpan
                </button>
                <button wire:click='closeModal'
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
    {{-- end modal --}}
    {{-- Kategory Modal --}}
    <x-jet-dialog-modal wire:model="kategoriItem" maxWidth='2xl'>
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
            <form class="w-full max-w-sm">
                @csrf
                <div class="flex items-center border-b border-teal-500 py-2">
                    <input wire:model='nama_kategory'
                        class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                        type="text" placeholder="Masukkan kategori">
                    <button wire:click='TambahKategori'
                        class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded"
                        type="button">
                        Tambah
                    </button>
                </div>
            </form>
            <div class="w-full max-w-full px-3 mt-0  lg:flex-none">
                <div
                    class="border-black/12.5 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                    <div class="p-4 pb-0 rounded-t-4">
                        <h6 class="mb-0 dark:text-white">Categories</h6>
                    </div>
                    <div class="flex-auto p-4">
                        <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                            @foreach ($categoryAll as $item)
                                <li
                                    class="relative flex justify-between py-2 pr-4 mb-2 border-0 rounded-t-lg rounded-xl text-inherit">
                                    <div class="flex items-center">
                                        <div
                                            class="inline-block w-8 h-8 mr-4 text-center text-black bg-center shadow-sm fill-current stroke-none bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 rounded-xl">
                                        </div>
                                        <div class="flex flex-col">
                                            <h6
                                                class="mb-1 leading-normal text-size-sm text-slate-700 dark:text-white">
                                                {{ $item->kategory }}</h6>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <button
                                            class="group ease-in leading-pro text-size-xs rounded-3.5xl p-1.2 h-6.5 w-6.5 mx-0 my-auto inline-block cursor-pointer border-0 bg-transparent text-center align-middle font-bold text-slate-700 shadow-none transition-all dark:text-white"
                                            wire:click='HapusKategori({{ $item->id }})'>
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z">
                                                </path>
                                            </svg></button>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('kategoriItem')" wire:loading.attr="disabled">
                Tutup
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
    {{-- Diskon Modal --}}
    <x-jet-dialog-modal wire:model="diskonItem" maxWidth='2xl'>
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
            @if ($diskonCek == false)
                <div class="py-11 dark:bg-gray-900 ">
                    <div class="grid gap-2 gap-y-8 px-6 sm:grid-cols-2 lg:grid-cols-4 xl:max-w-7xl 2xl:mx-auto">
                        <div class="border-primary-500 border-l-4 pl-3">
                            <h1 class="font-black text-gray-700 dark:text-gray-100">{{ $nama_produk }}</h1>
                            <p class="font-semibold text-gray-500 dark:text-gray-200">Nama Produk</p>
                        </div>
                        <div class="border-primary-500 border-l-4 pl-3">
                            <h1 class="font-black text-gray-700 dark:text-gray-200">{{ $jumlah_diskon }}%</h1>
                            <p class="font-semibold text-gray-500 dark:text-gray-200">Jumlah Diskon</p>
                        </div>
                        <div class="border-primary-500 border-l-4 pl-3">
                            <h1 class="font-black text-gray-700 dark:text-gray-200">{{ $tgl_mulai }}</h1>
                            <p class="font-semibold text-gray-500 dark:text-gray-200">Tanggal Mulai</p>
                        </div>
                        <div class="border-primary-500 border-l-4 pl-3">
                            <h1 class="font-black text-gray-700 dark:text-gray-200">{{ $tgl_kadaluarsa }}</h1>
                            <p class="font-semibold text-gray-500 dark:text-gray-200">Tanggal Kadaluarsa</p>
                        </div>
                    </div>
                </div>
            @else
                <form class="w-full max-w-sm">
                    @csrf
                    <div class="flex flex-wrap -mx-3 justify-center items-center">
                        <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                            <div class="mb-4">
                                <label for="username"
                                    class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">Nama
                                    Produk</label>
                                <input type="text" name="username" wire:model='nama_produk'
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-size-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                            <div class="mb-4">
                                <label for="email"
                                    class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">Jumlah
                                    Diskon</label>
                                <input type="text" wire:model="jumlah_diskon"
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-size-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                            <div class="mb-4">
                                <label for="Tanggal Mulai"
                                    class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">Tanggal
                                    Mulai</label>
                                <input type="date" wire:model="tgl_mulai"
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-size-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                            <div class="mb-4">
                                <label for="Tanggal Kadaluarsa"
                                    class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">Tanggal
                                    Kadaluarsa</label>
                                <input type="date" wire:model="tgl_kadaluarsa"
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-size-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                            </div>
                        </div>
                    </div>
                </form>
            @endif
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button wire:click="TambahDiskon" wire:loading.attr="disabled">
                Tambah
            </x-jet-danger-button>
            <x-jet-danger-button wire:click="$toggle('diskonItem')" wire:loading.attr="disabled">
                Tutup
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>
