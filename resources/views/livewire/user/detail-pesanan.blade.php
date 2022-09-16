<div>
    <div class="w-full md:py-3 mt-5 overflow-x-auto bg-white">
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
                                <x-forms.td>{{$loop->iteration}}</x-forms.td>
                                <x-forms.td>{{$transaksi->tgl_transaksi}}</x-forms.td>

                                @php
                                    $item = $transaksi->item_details;
                                    $exp = explode(',', $item);
                                    $total_transaksi[] = $transaksi->total - $transaksi->potongan;
                                    $total_diskon[] =$transaksi->potongan;
                                    $total_harga[] = $transaksi->total;
                                @endphp
                                <x-forms.td>{{$exp[1]}}</x-forms.td>
                                <x-forms.td>{{$exp[3]}}</x-forms.td>
                                <x-forms.td>Rp .{{number_format($transaksi->potongan,0,2)}}</x-forms.td>
                                <x-forms.td>Rp. {{number_format($exp[2],0,2)}}</x-forms.td>
                                <x-forms.td>
                                        <x-jet-danger-button wire:click='ModalReturn({{$transaksi->id}})' class="text-sm px-2 py-1 font-normal">Lakukan Pengembalian</x-jet-danger-button>
                                </x-forms.td>

                            </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <x-forms.td colspan="4" class=" text-right font-bold"></x-forms.td>
                            <x-forms.td colspan="1" class=" text-center font-bold border-x">Rp. {{number_format(array_sum($total_diskon),0,2)}}</x-forms.td>
                            <x-forms.td colspan="1" class=" border-r">Rp. {{number_format(array_sum($total_harga),0,2)}}</x-forms.td>
                        </tr>
                        <tr>
                            <x-forms.td colspan="4" class=" text-right font-bold">Total</x-forms.td>
                            <x-forms.td colspan="2" class="border-x">Rp. {{number_format(array_sum($total_transaksi),0,2)}}</x-forms.td>
                        </tr>
                    </tfoot>
                </x-forms.table>
                {{-- {{$transaksi->links()}} --}}
                <x-jet-dialog-modal wire:model="modalItem">
                    <x-slot name="title" class="font-bold">
                        Isi Form Berikut Untuk Melakukan Pengembalian Barang!
                    </x-slot>
                    <x-slot name="content">

                    </x-slot>
                    <x-slot name='footer'>
                        <x-jet-danger-button wire:click="$toggle('modalItem')" wire:loading.attr='disabled'>Tutup</x-jet-danger-button>
                    </x-slot>
                </x-jet-dialog-modal>
            </div>
        </div>
    </div>
</div>
