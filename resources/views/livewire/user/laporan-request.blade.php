<div>
    @include('sweetalert::alert')


    <div class="items-center w-full py-2 px-1  mx-auto my-10 bg-white rounded-lg shadow-md ">
        <div class="container mx-auto">

            <div class="mt-6 overflow-x-auto">
                <x-forms.table class="w-full table-auto">
                    <thead class="">
                        <tr class="text-xs p-1">
                            <x-forms.th>No.</x-forms.th>
                            <x-forms.th>Produk</x-forms.th>
                            <x-forms.th>Jumlah</x-forms.th>
                            <x-forms.th>Komisi</x-forms.th>
                            <x-forms.th>Total</x-forms.th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($transaksi->count() > 0)
                            @foreach ($transaksi as $transaksi)
                                @php
                                    $exp = explode(',', $transaksi->item_details);
                                @endphp
                                <x-forms.tr>
                                    <x-forms.td>{{ $loop->iteration }}</x-forms.td>
                                    <x-forms.td>{{ $exp[1] }}</x-forms.td>
                                    <x-forms.td>{{ $exp[0] }}</x-forms.td>
                                    <x-forms.td>{{ $transaksi->barang->komisi }}</x-forms.td>

                                    <x-forms.td>Rp. {{ number_format(($transaksi->barang->komisi * $exp[0]), 0, 2) }}</x-forms.td>
                                    @php
                                        $total_price[] = ($transaksi->barang->komisi * $exp[0]);
                                    @endphp
                                </x-forms.tr>
                            @endforeach
                            <x-forms.tr>
                                <x-forms.td colspan="3">Total Penjualan</x-forms.td>
                                <x-forms.td colspan="2">Rp. {{ number_format(array_sum($total_price), 0, 2) }}
                                </x-forms.td>
                            </x-forms.tr>
                        @else
                            <x-forms.tr>
                                <x-forms.td colspan="5">
                                    Kosong
                                </x-forms.td>
                            </x-forms.tr>
                        @endif
                    </tbody>
                </x-forms.table>
            </div>
        </div>
    </div>
</div>
