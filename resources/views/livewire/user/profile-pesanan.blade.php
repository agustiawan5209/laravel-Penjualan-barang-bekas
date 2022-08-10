<x-profilepage>
    <x-slot name='setting'>
        <div class="w-full px-4 py-3 overflow-x-auto">
            <div class="overflow-auto flex justify-center w-full px-10">
                <div class=" w-full rounded-md shadow-sm ">
                    <x-forms.table>
                        <thead>
                            <tr class=" capitalize bg-gray-300 rounded-t-md" >
                                <x-forms.td>
                                    kode Pesanan
                                </x-forms.td>
                                <x-forms.td>
                                    Status Pembayaran
                                </x-forms.td>
                                <x-forms.td>
                                    Tipe Pembayaran
                                </x-forms.td>
                                <x-forms.td>
                                    Barang
                                </x-forms.td>
                                <x-forms.td>
                                    Total Pembayaran
                                </x-forms.td>
                                <x-forms.td>
                                    Detail
                                </x-forms.td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produk as $item)
                                <tr>
                                    <x-forms.td>
                                        {{ $item->number }}
                                    </x-forms.td>
                                    <x-forms.td>
                                        {{ $item->payment_status }}
                                    </x-forms.td>
                                    <x-forms.td>
                                        {{ $item->payment_type }}
                                    </x-forms.td>
                                    <x-forms.td class=" whitespace-pre-wrap">
                                        {{ $item->item_details }}
                                    </x-forms.td>
                                    <x-forms.td>
                                        {{ $item->total_price }}
                                    </x-forms.td>
                                    <x-forms.td>
                                        <a href="{{ $item->pdf_url }}">
                                            Detail</a>
                                    </x-forms.td>
                                </tr>
                            @endforeach
                        </tbody>
                    </x-forms.table>
                </div>
            </div>
        </div>

    </x-slot>
</x-profilepage>
