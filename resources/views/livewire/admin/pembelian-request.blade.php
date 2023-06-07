<div>
    <div class="flex flex-col md:flex-row items-start justify-center gap-4 overflow-x-auto ">
        <form class="bg-white shadow-md rounded px-4 pt-6 pb-8 mb-4 overflow-y-auto col-span-1 max-w-md" x-data="{ isUploading: false, progress: 0 }"
            x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false"
            x-on:livewire-upload-error="isUploading = false"
            x-on:livewire-upload-progress="progress = $event.detail.progress">
            @csrf
            <div class="mb-4">
                <label for="dropzone-file"
                    class="mx-auto cursor-pointer flex w-full max-w-lg flex-col items-center rounded-xl border-2 border-dashed border-blue-400 bg-white p-6 text-center">

                    <img src="{{ asset('upload/' . $foto) }}" class="w-full h-auto object-cover">

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
                    wire:model="stok" type="text" placeholder="******************">
                @error('stok')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Kategori Produk
                </label>
                <select id="countries" wire:model='kategori_produk'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">------</option>
                    @foreach ($kategory as $item)
                        <option value="{{ $item->id }}" class="text-black">{{ $item->kategory }}</option>
                    @endforeach
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
        </form>
        <div class="w-full">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 overflow-y-auto" x-data="{ isUploading: false, progress: 0 }"
                x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false"
                x-on:livewire-upload-error="isUploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress"
                wire:submit.prevent='create'>
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

                        <p class="mt-2 text-gray-500 tracking-wide">Upload Foto Barang </p>

                        <input id="dropzone-file" wire:model='bukti_transaksi' type="file" class="hidden" />
                        </section>
                        @if ($bukti_transaksi)
                            foto produk Preview:
                            <img src="{{ $bukti_transaksi->temporaryUrl() }}">
                        @endif
                        @error('bukti_transaksi')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Jumlah Produk
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        wire:model='jumlah' wire:input='hitungTotal' id="jumlah" type="text" placeholder="******************">
                    @error('jumlah')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6 flex flex-row items-center gap-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2 whitespace-nowrap" for="password">
                        Total Pembelian
                    </label>
                    <input
                        class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline border-none"
                        wire:model='sub_total' id="password" type="text" placeholder="******************" disabled>
                    @error('sub_total')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-row justify-between">
                    <x-jet-button type='submit'>Kirim</x-jet-button>
                    <x-jet-button type='reset' class="bg-red-500 hover:bg-red-600 text-white">batal</x-jet-button>
                </div>
            </form>
        </div>
    </div>

</div>
