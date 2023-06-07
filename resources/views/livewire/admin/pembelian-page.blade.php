<div class="flex flex-wrap -mx-3">
    @include('sweetalert::alert')

    <div class="flex-none w-full max-w-full px-3">
        <div
            class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex gap-4">
                <a href="{{ route('Request-Barang-Admin') }}" class="bg-blue-400 px-2 md:px-4 text-white py-2 rounded-md">Request Barang <span class="text-white bg-red-500 rounded-xl text-xs px-2 ">{{ $data['request'] }}</span></a>
                <a href="{{ route('Pembelian-Form') }}" class="bg-blue-400 px-2 md:px-4 text-white py-2 rounded-md">Form Pembelian Barang</a>
            </div>
            <div class="flex-auto px-0 pt-0 pb-2">
                <div class="p-0 overflow-x-auto">
                    <div class="px-3 block sm:flex sm:justify-between">
                        <div class=" p-3">
                            <select name="row" wire:model='row'
                                class=" w-20 px-2 border ring-none active:ring-0 rounded-md text-gray-400 text-base">
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
                                    Bukti Transaksi</x-forms.th>
                                <x-forms.th>
                                    Kode Transaksi</x-forms.th>
                                <x-forms.th>
                                    Nama Produk</x-forms.th>
                                <x-forms.th>
                                    Jumlah Produk</x-forms.th>
                                <x-forms.th>
                                    Sub Total</x-forms.th>
                                <x-forms.th></x-forms.th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pembelian as $item)
                                <tr>
                                    <x-forms.td>
                                       <a href="{{ $item->bukti_transaksi }}">File</a>
                                    </x-forms.td>
                                    <x-forms.td>
                                       {{$item->kode_transaksi}}
                                    </x-forms.td>
                                    <x-forms.td>
                                        <p
                                            class="mb-0 font-semibold leading-tight dark:text-black dark:opacity-80 text-size-xs">
                                            {{ $item->barang->nama_produk }}</p>
                                    </x-forms.td>
                                    <x-forms.td>
                                        <p
                                            class="mb-0 font-semibold leading-tight dark:text-black dark:opacity-80 text-size-xs">
                                            {{ $item->jumlah }}</p>
                                    </x-forms.td>

                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <span
                                            class="font-semibold leading-tight text-size-xs dark:text-black dark:opacity-80 text-slate-400">
                                            Rp. {{ number_format($item->subtotal, 0, 2) }}</span>
                                    </td>
                                    <x-forms.td>
                                        <a href="#_" wire:click='detail({{ $item->id }})'
                                            class="inline-block px-2 py-1 text-sm mx-auto text-white bg-green-500 rounded-full hover:bg-green-600 md:mx-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
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
                        </tbody>
                    </x-forms.table>
                    {{ $pembelian->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>


    @if ($hapusItem)
        <x-jet-dialog-modal wire:model="hapusItem">
            <x-slot name="title">
                Hapus Data Pembelian
            </x-slot>

            <x-slot name="content">
                Apakah Anda Yakin?
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('hapusItem')" wire:loading.attr="disabled">
                    Batalkan
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="Hapus({{ $itemId }})"
                    wire:loading.attr="disabled">
                    Hapus
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    @endif
    {{-- end modal --}}
</div>
