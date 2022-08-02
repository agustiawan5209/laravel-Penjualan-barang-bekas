{{-- Table Barang --}}

<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
        <div
            class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex">
                <button type="button" class="bg-blue-400 px-4 text-white py-2 rounded-md" wire:click='addingItem()'>Tambah
                    Data</button>
               @if(session()->has('message'))
               <div class="bg-red-100 border border-blue-400 text-white px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Message</strong>
                <span class="block sm:inline">{{session('message')}}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
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
                    <table
                        class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                        <thead class="align-bottom">
                            <tr>
                                <th
                                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-size-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Foto Produk</th>
                                <th
                                    class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-size-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Nama Produk</th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-size-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Harga</th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-size-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Deskripsi</th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-size-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Kategori</th>
                                <th
                                    class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-collapse border-solid shadow-none dark:border-white/40 dark:text-white tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barang as $item)
                                <tr>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <div class="flex px-2 py-1">
                                            <div>
                                                <img src="{{asset('upload/'. $item->foto_produk)}}"
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
                                    </td>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <p
                                            class="mb-0 font-semibold leading-tight dark:text-white dark:opacity-80 text-size-xs">
                                            {{$item->nama_produk}}</p>
                                    </td>

                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <span
                                            class="font-semibold leading-tight text-size-xs dark:text-white dark:opacity-80 text-slate-400"> Rp. {{number_format($item->harga,0,2)}}</span>
                                    </td>
                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <span
                                            class="font-semibold leading-tight text-size-xs dark:text-white dark:opacity-80 text-slate-400">{{$item->deskripsi}}</span>
                                    </td>
                                    <td
                                        class="p-2 leading-normal text-center align-middle bg-transparent border-b dark:border-white/40 text-size-sm whitespace-nowrap shadow-transparent">
                                        <span
                                            class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-3.6-em text-size-xs-em rounded-1.8 py-2.2-em inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">{{$item->categories}}</span>
                                    </td>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <a href="javascript:;" wire:click='editModal({{$item->id}})'
                                            class="font-semibold leading-tight text-size-xs dark:text-white dark:opacity-80 text-slate-400">
                                            Edit </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    {{-- Modal Tambah Data --}}
    @if ($addItem)
        <div
            class="w-full md:w-1/3 bg-red-500 absolute right-0 top-10 rounded-l-lg shadow-lg shadow-white transition-all ">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" x-data="{ isUploading: false, progress: 0 }"
                x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false"
                x-on:livewire-upload-error="isUploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        Foto Produk
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        wire:model="foto" type="file">
                    <div x-show="isUploading">
                        <progress max="100" x-bind:value="progress"></progress>
                    </div>
                    @error('foto')
                        <p class="text-red-500 text-xs italic">Please choose a password.</p>
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
                        <p class="text-red-500 text-xs italic">Please choose a password.</p>
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
                        <p class="text-red-500 text-xs italic">Please choose a password.</p>
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
                        <p class="text-red-500 text-xs italic">Please choose a password.</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Kategori Produk
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        wire:model="kategori_produk" type="text" placeholder="******************">
                    @error('kategori_produk')
                        <p class="text-red-500 text-xs italic">Please choose a password.</p>
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
        </div>
    @endif
    @if ($editItem)
        <div
            class="w-full md:w-1/3 h-[85vh] bg-red-500 absolute right-0 top-10 rounded-l-lg shadow-lg shadow-white transition-all ">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" x-data="{ isUploading: false, progress: 0 }"
                x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false"
                x-on:livewire-upload-error="isUploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        Foto Produk
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        wire:model="foto" type="file">
                    <div x-show="isUploading">
                        <progress max="100" x-bind:value="progress"></progress>
                    </div>
                    @error('foto')
                        <p class="text-red-500 text-xs italic">Please choose a password.</p>
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
                        <p class="text-red-500 text-xs italic">Please choose a password.</p>
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
                        <p class="text-red-500 text-xs italic">Please choose a password.</p>
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
                        <p class="text-red-500 text-xs italic">Please choose a password.</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Kategori Produk
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        wire:model="kategori_produk" type="text" placeholder="******************">
                    @error('kategori_produk')
                        <p class="text-red-500 text-xs italic">Please choose a password.</p>
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
        </div>
    @endif
    {{-- end modal --}}
</div>
