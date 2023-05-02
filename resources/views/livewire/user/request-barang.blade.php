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
                        <div class="md:px-2 ">
                            <x-jet-danger-button type="submit" wire:click='TambahModal()'>Tambah</x-jet-danger-button>
                        </div>
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
                                Jenis Request Produk</x-forms.th>
                            <x-forms.th>
                                Status</x-forms.th>
                            <x-forms.th></x-forms.th>
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
                                                    class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-in-out text-sm h-9 w-9 rounded-xl"
                                                    alt="user1" />
                                            </div>
                                        </div>
                                    </x-forms.td>
                                    <x-forms.td>
                                        <p
                                            class="mb-0 font-semibold leading-tight dark:text-black dark:opacity-80 text-size-xs">
                                            {{ $item->nama_produk }}</p>
                                    </x-forms.td>

                                    <x-forms.td
                                        class="p-2 text-center align-middle bg-transparent whitespace-nowrap shadow-transparent">
                                        <span
                                            class="font-semibold leading-tight text-size-xs dark:text-black dark:opacity-80 text-slate-800">
                                            Rp. {{ number_format($item->harga, 0, 2) }}</span>
                                    </x-forms.td>
                                    <x-forms.td
                                        class="p-2 leading-normal text-center align-middle bg-transparent text-sm whitespace-nowrap shadow-transparent">
                                        <span
                                            class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-3.6-em text-size-xs-em rounded-1.8 py-2.2-em inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">{{ $item->categories }}</span>
                                    </x-forms.td>
                                    <x-forms.td
                                        class="p-2 leading-normal text-center align-middle bg-transparent text-sm whitespace-nowrap shadow-transparent">

                                        @if ($item->status == 1)
                                            <span
                                                class="bg-gradient-to-tl from-blue-500 to-blue-400 px-3.6-em text-xs rounded-1.8 py-2.2-em inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                                                Belum Di Konfirmasi
                                            </span>
                                        @elseif($item->status == 2)
                                            <span
                                                class="bg-gradient-to-tl from-green-500 to-green-400 px-3.6-em text-xs rounded-1.8 py-2.2-em inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                                                Diterima
                                            </span>
                                        @elseif($item->status == 3)
                                            <span
                                                class="bg-gradient-to-tl from-red-500 to-red-400 px-3.6-em text-xs rounded-1.8 py-2.2-em inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                                                Ditolak
                                            </span>
                                        @endif
                                    </x-forms.td>
                                    <x-forms.td>
                                        <a href="#_" wire:click='deleteModal({{ $item->id }})'
                                            class="inline-block px-2 py-1 text-sm mx-auto text-white bg-blue-500 rounded-full hover:bg-red-600 md:mx-0">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                        </a>
                                        <a href="#_" wire:click='editModal({{ $item->id }})'
                                            class="inline-block px-2 py-1 text-sm mx-auto text-white bg-blue-500 rounded-full hover:bg-green-600 md:mx-0">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
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
        @if ($addItem)
            <x-jet-dialog-modal wire:model="addItem" maxWidth='2xl'>
                <x-slot name="title">
                    <h3>Tambah Produk</h3>
                </x-slot>

                <x-slot name="content">
                    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" x-data="{ isUploading: false, progress: 0 }"
                        x-on:livewire-upload-start="isUploading = true"
                        x-on:livewire-upload-finish="isUploading = false"
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

                                <p class="mt-2 text-gray-500 tracking-wide">Upload or darg & drop your file SVG, PNG,
                                    JPG or
                                    GIF. </p>

                                <input id="dropzone-file" wire:model='updatefoto' type="file" class="hidden" />
                                </section>
                                @if ($updatefoto != null)
                                    @if ($updatefoto)
                                        foto produk Preview:
                                        <img src="{{ $updatefoto->temporaryUrl() }}">
                                    @endif
                                    @error('updatefoto')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                @else
                                    <img src="{{ asset('upload/' . $foto_produk) }}" alt="">
                                    @error('foto_produk')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                @endif

                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                                Nama Produk
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                wire:model='nama_produk' id="password" type="text"
                                placeholder="******************">
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
                                wire:model="harga" type="text" placeholder="******************">
                            @error('harga')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                                Deskripsi Produk
                            </label>
                            <textarea id="myeditorinstance"
                                class=" ckeditor shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                wire:model="deskripsi" name="editor1" id="editor1" rows="10" cols="80"></textarea>
                            @error('deskripsi')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                                Jenis Request Produk
                            </label>
                            <select name="categories" wire:model='categories'
                                class=" w-full px-2 border-none ring-black active:ring-0 shadow-md rounded-md text-gray-700 capitalize">
                                <option value="">---------</option>
                                <option value="Titip">Titip</option>
                                <option value="Jual">Jual</option>
                            </select>
                            @error('categories')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                                Alamat Lengkap
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                wire:model="Alamat" type="text" placeholder="******************"
                                value="{{ old('Alamat') }}">
                            @error('Alamat')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex items-center justify-between">
                            @if ($itemID == null)
                                <button wire:click='Tambah()'
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                    type="button">
                                    Tambah
                                </button>
                            @else
                                <button wire:click='edit({{ $itemID }})'
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                    type="button">
                                    Simpan
                                </button>
                            @endif
                    </form>
                </x-slot>

                <x-slot name="footer">
                    <x-jet-danger-button wire:click="$toggle('addItem')" wire:loading.attr="disabled">
                        Tutup
                    </x-jet-danger-button>
                </x-slot>
            </x-jet-dialog-modal>
        @endif

        @if ($hapus)
            <x-jet-confirmation-modal wire:model="hapus">
                <x-slot name="title">
                    Hapus Data Barang {{ $itemID }}
                </x-slot>

                <x-slot name="content">
                    Apakah Anda Yakin?
                </x-slot>

                <x-slot name="footer">
                    <x-jet-secondary-button wire:click="$toggle('hapus')" wire:loading.attr="disabled">
                        Batalkan
                    </x-jet-secondary-button>

                    <x-jet-danger-button class="ml-2" wire:click="delete({{ $itemID }})"
                        wire:loading.attr="disabled">
                        Hapus
                    </x-jet-danger-button>
                </x-slot>
            </x-jet-confirmation-modal>
        @endif
    </div>

</div>
