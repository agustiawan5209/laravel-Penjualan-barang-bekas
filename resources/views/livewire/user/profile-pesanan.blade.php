<div class="bg-white" x-data="{active: 0,}">
    <div
        class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 overflow-hidden break-words bg-white border-0 dark:bg-slate-850 dark:shadow-dark-xl shadow-3xl rounded-2xl bg-clip-border">
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 mt-4 sm:my-auto sm:mr-0 ">
                <div class="relative ">
                    <ul class="relative flex flex-wrap p-1 md:list-none bg-gray-50 rounded-xl" >
                        <li class="z-30 flex-auto text-center" @click="active = 0"
                            :class="active === 0 ? 'bg-white shadow-md rounded-md' : ''">
                            <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg bg-inherit text-slate-700"
                                href="javascript:;"  :class="active === 0 ? 'bg-white shadow-md rounded-md' : ''">
                                <i class="ni ni-app"></i>
                                <span class="ml-2">Pesanan</span>
                            </a>
                        </li>
                        <li class="z-30 flex-auto text-center" :class="active === 2 ? 'bg-white shadow-md rounded-md' : ''">
                            <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg bg-inherit text-slate-700"
                                @click="active = 2"
                                href="javascript:;" >
                                <i class="ni ni-email-83"></i>
                                <span class="ml-2">Diterima</span>
                            </a>
                        </li>
                        <li class="z-30 flex-auto text-center"  :class="active === 3 ? 'bg-white shadow-md rounded-md' : ''">
                            <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg bg-inherit text-slate-700"
                                @click="active = 3"
                                href="javascript:;"  >
                                <i class="ni ni-email-83"></i>
                                <span class="ml-2">Belum Di Bayar</span>
                            </a>
                        </li>
                        <li class="z-30 flex-auto text-center"  :class="active === 4 ? 'bg-white shadow-md rounded-md' : ''">
                            <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg bg-inherit text-slate-700"
                                @click="active = 4"
                                href="javascript:;"  >
                                <i class="ni ni-email-83"></i>
                                <span class="ml-2">Pengembalian</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full md:py-3 mt-5 overflow-x-auto">
        <div class="overflow-auto flex justify-center w-full">
            <div class=" w-full rounded-md shadow-sm ">
                <x-forms.table>
                    <thead>
                        <tr class=" capitalize bg-gray-100 rounded-t-md">
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
                                {{ $item->transaksi_id }}
                            </x-forms.td>
                            <x-forms.td>
                                {{ $item->payment_status }}
                            </x-forms.td>
                            <x-forms.td>
                                {{ $item->payment_type }}
                            </x-forms.td>
                            <x-forms.td>
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
</div>
