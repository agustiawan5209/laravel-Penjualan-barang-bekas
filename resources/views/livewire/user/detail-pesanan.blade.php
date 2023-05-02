<div>
    <div class="w-full md:py-3 mt-5 overflow-x-auto bg-white">
        @include('sweetalert::alert')
        <div class="overflow-auto flex justify-center w-full">
            <div class=" w-full rounded-md shadow-sm ">
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
                    <thead>
                        <tr class=" capitalize bg-gray-100 rounded-t-md">
                            <x-forms.th>#</x-forms.th>
                            <x-forms.th>Tanggal Transaksi</x-forms.th>
                            <x-forms.th>Produk</x-forms.th>
                            <x-forms.th>Jumlah</x-forms.th>
                            <x-forms.td>potongan</x-forms.td>
                            <x-forms.th>Harga</x-forms.th>
                            <x-forms.th>Aksi</x-forms.th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total_transaksi = [];
                            $total_diskon = [];
                            $total_harga = [];
                        @endphp
                        @foreach ($transaksi as $transaksi)
                            <tr class="">
                                <x-forms.td>{{ $loop->iteration }}</x-forms.td>
                                <x-forms.td>{{ $transaksi->tgl_transaksi }}</x-forms.td>

                                @php
                                    $item = $transaksi->item_details;
                                    $exp = explode(',', $item);
                                    $total_diskon[] = $transaksi->potongan;
                                    $total_harga[] = $exp[2];
                                    $total_transaksi[] = $transaksi->total;
                                @endphp
                                <x-forms.td>{{ $exp[1] }}</x-forms.td>
                                <x-forms.td>{{ $exp[3] }}</x-forms.td>
                                <x-forms.td>Rp .{{ number_format($transaksi->potongan, 0, 2) }}</x-forms.td>
                                <x-forms.td>Rp. {{ number_format($exp[2], 0, 2) }}</x-forms.td>
                                <x-forms.td>
                                    <x-jet-danger-button wire:click='ModalReturn({{ $transaksi->id }})'
                                        class="text-sm px-2 py-1 font-normal">Lakukan Pengembalian</x-jet-danger-button>
                                </x-forms.td>

                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <x-forms.td colspan="4" class=" text-right font-bold"></x-forms.td>
                            <x-forms.td colspan="1" class=" text-center font-bold border-x">Rp.
                                {{ number_format(array_sum($total_diskon), 0, 2) }}</x-forms.td>
                            <x-forms.td colspan="1" class=" border-r">Rp.
                                {{ number_format(array_sum($total_harga), 0, 2) }}</x-forms.td>
                        </tr>
                        <tr>
                            <x-forms.td colspan="4" class=" text-right font-bold">Total</x-forms.td>
                            <x-forms.td colspan="2" class="border-x">Rp.
                                {{ number_format(array_sum($total_transaksi), 0, 2) }}</x-forms.td>
                        </tr>
                    </tfoot>
                </x-forms.table>
                {{-- {{$transaksi->links()}} --}}
                <x-jet-dialog-modal wire:model="modalItem">
                    <x-slot name="title" class="font-bold">
                        Isi Form Berikut Untuk Melakukan Pengembalian Barang!
                    </x-slot>
                        <x-slot name="content">
                            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 overflow-y-auto"
                                x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                                x-on:livewire-upload-finish="isUploading = false"
                                x-on:livewire-upload-error="isUploading = false"
                                x-on:livewire-upload-progress="progress = $event.detail.progress">
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

                                        <p class="mt-2 text-gray-500 tracking-wide">Masukkan Bukti Foto Paket</p>

                                        <input id="dropzone-file" wire:model='updatefoto' type="file" class="hidden" />
                                        </section>
                                        @if ($updatefoto != null)
                                            @if ($updatefoto)
                                                foto produk Preview:
                                                <img src="{{ $updatefoto->temporaryUrl() }}">
                                            @endif
                                            @error('updateFoto')
                                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                            @enderror
                                        @else
                                            <img src="{{ asset('upload/' . $updatefoto) }}" width="100" alt="">
                                        @endif
                                </div>
                                <div class="mb-6" x-data="{kondisi : 0}">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                                        Kondisi Barang
                                    </label>
                                    <select wire:model='kondisi' x-model="kondisi"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="1">Barang Tidak Sama</option>
                                        <option value="2">Barang Rusak/Pecah</option>
                                        <option value="3">Pembungkus Paket Sobek/Rusak</option>
                                        <option value="4">Paket Salah Kirim</option>
                                        <option value="5">Kondisi Lain</option>
                                    </select>
                                    <input x-show="kondisi == 5" x-transition class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                    wire:model='kondisi_lain'  type="text"
                                    placeholder=".................."/>
                                    @error('kondisi')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-6">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                                        Masukkan Keterangan
                                    </label>
                                    <textarea id="myeditorinstance"
                                        class=" ckeditor shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                        wire:model="alasan" name="editor1" id="editor1" rows="10" cols="80"></textarea>
                                    @error('alasan')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="flex items-center justify-between">

                                    <button wire:click="create({{$itemID}})"
                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                        type="button">
                                        Simpan
                                    </button>
                                </div>
                            </form>
                        </x-slot>
                    <x-slot name='footer'>
                        <x-jet-danger-button wire:click="$toggle('modalItem')" wire:loading.attr='disabled'>Tutup
                        </x-jet-danger-button>
                    </x-slot>
                </x-jet-dialog-modal>
            </div>
        </div>
    </div>
</div>
