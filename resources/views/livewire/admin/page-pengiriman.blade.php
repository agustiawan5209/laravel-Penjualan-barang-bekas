<div class="bg-white" x-data="{active: 0,}">
    <div
        class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 overflow-hidden break-words bg-white border-0 dark:bg-slate-850 dark:shadow-dark-xl shadow-3xl rounded-2xl bg-clip-border">
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 mt-4 sm:my-auto sm:mr-0 ">
                <div class="relative ">
                    <ul class="relative flex flex-wrap p-1 md:list-none bg-gray-50 rounded-xl">
                        <li class="z-30 flex-auto text-center" @click="active = 0"
                            :class="active === 0 ? 'bg-white shadow-md rounded-md' : ''">
                            <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg bg-inherit text-slate-700"
                                href="javascript:;" :class="active === 0 ? 'bg-white shadow-md rounded-md' : ''">
                                <i class="ni ni-app"></i>
                                <span class="ml-2">Belum Terkirim</span>
                            </a>
                        </li>
                        <li class="z-30 flex-auto text-center"
                            :class="active === 1 ? 'bg-white shadow-md rounded-md' : ''">
                            <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg bg-inherit text-slate-700"
                                @click="active = 1" href="javascript:;">
                                <i class="ni ni-email-83"></i>
                                <span class="ml-2">Terkirim</span>
                            </a>
                        </li>
                        <li class="z-30 flex-auto text-center"
                            :class="active === 2 ? 'bg-white shadow-md rounded-md' : ''">
                            <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg bg-inherit text-slate-700"
                                @click="active = 2" href="javascript:;">
                                <i class="ni ni-email-83"></i>
                                <span class="ml-2">Pesanan Diterima</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full md:py-3 mt-5 overflow-x-auto" x-show="active == 0">
        <div class="overflow-auto flex justify-center w-full">
            <div class=" w-full rounded-md shadow-sm ">
                <x-forms.table>
                    <thead>
                        <tr class=" capitalize bg-gray-100 rounded-t-md">
                            <x-forms.td>
                                kode Pesanan
                            </x-forms.td>
                            <x-forms.td>
                                Status Pengiriman
                            </x-forms.td>
                            <x-forms.td>
                                Harga Pengiriman
                            </x-forms.td>
                            <x-forms.td>
                                Tanggal Pengiriman
                            </x-forms.td>
                            <x-forms.td>
                                Detail
                            </x-forms.td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($belum_terkirim as $item)
                        <tr>
                            <x-forms.td>{{$item->transaksi_id}}</x-forms.td>
                            <x-forms.td class="flex justify-center items-center">
                                @if ($item->status == 3)
                                <span class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-3.6-em text-size-xs-em rounded-1.8 py-2.2-em inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                                    @if ($item->status == 1)
                                    Belum Terkirim
                                    @elseif ($item->status == 2)
                                    Dalam Pengiriman
                                    @elseif ($item->status == 3)
                                    Pembayaran Di Konfirmasi
                                    @endif
                                </span>
                                @else
                                <x-jet-secondary-button wire:click='gantiStatus({{$item->id}})'
                                    class="bg-gradient-to-tl cursor-pointer from-emerald-500 to-teal-400 px-3.6-em text-size-xs-em rounded-1.8 py-2.2-em inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                                    @if ($item->status == 1)
                                    Belum Terkirim
                                    @elseif ($item->status == 2)
                                    Dalam Pengiriman
                                    @elseif ($item->status == 3)
                                    Pembayaran Di Konfirmasi
                                    @endif
                                </x-jet-secondary-button>
                                @endif
                            </x-forms.td>
                            <x-forms.td>{{$item->harga}}</x-forms.td>
                            <x-forms.td>{{$item->tgl_pengiriman}}</x-forms.td>
                            <x-forms.td class=" flex justify-center items-center">
                                <a href="#" wire:click='detailOngkir({{$item->id}})'
                                    class=" p-1 rounded-full shadow shadow-black box-border relative flex bg-transparent">
                                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                </a>
                                <a href="#" wire:click='deleteModal({{$item->id}})'
                                    class=" p-1 rounded-full shadow shadow-black box-border relative flex bg-transparent">
                                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                </a>
                                <a href="#" wire:click='editModal({{$item->id}})'
                                    class=" p-1 rounded-full shadow shadow-black box-border relative flex bg-transparent">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
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
    <div class="w-full md:py-3 mt-5 overflow-x-auto" x-show="active == 1">
        <div class="overflow-auto flex justify-center w-full">
            <div class=" w-full rounded-md shadow-sm ">
                <x-forms.table>
                    <thead>
                        <tr class=" capitalize bg-gray-100 rounded-t-md">
                            <x-forms.td>
                                kode Pesanan
                            </x-forms.td>
                            <x-forms.td>
                                Status Pengiriman
                            </x-forms.td>
                            <x-forms.td>
                                Harga Pengiriman
                            </x-forms.td>
                            <x-forms.td>
                                Tanggal Pengiriman
                            </x-forms.td>
                            <x-forms.td>
                                Detail
                            </x-forms.td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($terkirim as $item)
                        <tr>
                            <x-forms.td>{{$item->transaksi_id}}</x-forms.td>
                            <x-forms.td class="flex justify-center items-center">
                                @if ($item->status == 3)
                                <span class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-3.6-em text-size-xs-em rounded-1.8 py-2.2-em inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                                    @if ($item->status == 1)
                                    Belum Terkirim
                                    @elseif ($item->status == 2)
                                    Dalam Pengiriman
                                    @elseif ($item->status == 3)
                                    Pembayaran Di Konfirmasi
                                    @endif
                                </span>
                                @else
                                <x-jet-secondary-button wire:click='gantiStatus({{$item->id}})'
                                    class="bg-gradient-to-tl cursor-pointer from-emerald-500 to-teal-400 px-3.6-em text-size-xs-em rounded-1.8 py-2.2-em inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                                    @if ($item->status == 1)
                                    Belum Terkirim
                                    @elseif ($item->status == 2)
                                    Dalam Pengiriman
                                    @elseif ($item->status == 3)
                                    Pembayaran Di Konfirmasi
                                    @endif
                                </x-jet-secondary-button>
                                @endif
                            </x-forms.td>
                            <x-forms.td>{{$item->harga}}</x-forms.td>
                            <x-forms.td>{{$item->tgl_pengiriman}}</x-forms.td>
                            <x-forms.td class=" flex justify-center items-center">
                                <a href="#" wire:click='detailOngkir({{$item->id}})'
                                    class=" p-1 rounded-full shadow shadow-black box-border relative flex bg-transparent">
                                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                </a>
                                <a href="#" wire:click='deleteModal({{$item->id}})'
                                    class=" p-1 rounded-full shadow shadow-black box-border relative flex bg-transparent">
                                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                </a>
                                <a href="#" wire:click='editModal({{$item->id}})'
                                    class=" p-1 rounded-full shadow shadow-black box-border relative flex bg-transparent">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
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
    <div class="w-full md:py-3 mt-5 overflow-x-auto" x-show="active == 2">
        <div class="overflow-auto flex justify-center w-full">
            <div class=" w-full rounded-md shadow-sm ">
                <x-forms.table>
                    <thead>
                        <tr class=" capitalize bg-gray-100 rounded-t-md">
                            <x-forms.td>
                                kode Pesanan
                            </x-forms.td>
                            <x-forms.td>
                                Status Pengiriman
                            </x-forms.td>
                            <x-forms.td>
                                Harga Pengiriman
                            </x-forms.td>
                            <x-forms.td>
                                Tanggal Pengiriman
                            </x-forms.td>
                            <x-forms.td>
                                Detail
                            </x-forms.td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($diterima as $item)
                        <tr>
                            <x-forms.td>{{$item->transaksi_id}}</x-forms.td>
                            <x-forms.td class="flex justify-center items-center">
                                @if ($item->status == 3)
                                <span class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-3.6-em text-size-xs-em rounded-1.8 py-2.2-em inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                                    @if ($item->status == 1)
                                    Belum Terkirim
                                    @elseif ($item->status == 2)
                                    Dalam Pengiriman
                                    @elseif ($item->status == 3)
                                    Pembayaran Di Konfirmasi
                                    @endif
                                </span>
                                @else
                                <x-jet-secondary-button wire:click='gantiStatus({{$item->id}})'
                                    class="bg-gradient-to-tl cursor-pointer from-emerald-500 to-teal-400 px-3.6-em text-size-xs-em rounded-1.8 py-2.2-em inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                                    @if ($item->status == 1)
                                    Belum Terkirim
                                    @elseif ($item->status == 2)
                                    Dalam Pengiriman
                                    @elseif ($item->status == 3)
                                    Pembayaran Di Konfirmasi
                                    @endif
                                </x-jet-secondary-button>
                                @endif
                            </x-forms.td>
                            <x-forms.td>{{$item->harga}}</x-forms.td>
                            <x-forms.td>{{$item->tgl_pengiriman}}</x-forms.td>
                            <x-forms.td class=" flex justify-center items-center">
                                <a href="#" wire:click='detailOngkir({{$item->id}})'
                                    class=" p-1 rounded-full shadow shadow-black box-border relative flex bg-transparent">
                                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                </a>
                                <a href="#" wire:click='deleteModal({{$item->id}})'
                                    class=" p-1 rounded-full shadow shadow-black box-border relative flex bg-transparent">
                                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                </a>
                                <a href="#" wire:click='editModal({{$item->id}})'
                                    class=" p-1 rounded-full shadow shadow-black box-border relative flex bg-transparent">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
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
    <x-jet-dialog-modal wire:model='itemDetail'>
        <x-slot name='title'>

        </x-slot>

        <x-slot name='content'>
            <div class="bg-white">
                <div class="border-t border-gray-200">
                    <dl class="">
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500"> Tanggal Pengiriman</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{$tgl_pengiriman}} </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500"> Harga </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{$harga}}</dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500"> Alamat </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{$detail_alamat}}, <br>
                                {{$kabupaten}}, {{$kode_pos}} </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500"> ID TRANSAKSI </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{$transaksi_id}} </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500"> Detail Pesanan </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$item_details}}</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </x-slot>
        <x-slot name='footer'>
            <x-jet-danger-button type='button' wire:click="$toggle('itemDetail')" wire:loading.attr='disabled'>Tutup
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>
    <x-jet-dialog-modal wire:model='ongkirItem'>
        <x-slot name="title">
        </x-slot>

        <x-slot name="content">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 overflow-y-auto">
                @csrf
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Nama Produk
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        wire:model='item_details' id="password" type="text" disabled placeholder="******************">
                    @error('item_details')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        ID Transaksi
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        wire:model='transaksi_id' id="password" type="text" disabled placeholder="******************">
                    @error('transaksi_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Tgl Pengiriman
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        wire:model='tgl_pengiriman' id="password" type="date" placeholder="******************">
                    @error('tgl_pengiriman')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Harga Ongkir
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
                        detail Alamat
                    </label>
                    <textarea id="" cols="30" rows="10" disabled
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">{{$detail_alamat}} ,{{$kode_pos}} ,{{$kabupaten}} ,
             </textarea>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Status
                    </label>
                    <select id="countries" wire:model='status'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">--Pilih Status Pengiriman--</option>
                        <option value="1">Belum Dikirim</option>
                        <option value="2">Terkirim</option>
                    </select>
                    @error('kategori_produk')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </form>
        </x-slot>

        <x-slot name="footer">
            <div class="flex items-center justify-between">
                <button wire:click='edit({{$ItemID}})'
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="button">
                    Simpan
                </button>
                <button wire:click='$toggle("ongkirItem")'
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="button">
                    Close
                </button>
            </div>
        </x-slot>
    </x-jet-dialog-modal>
    <x-jet-confirmation-modal wire:model='hapusItem'>
        <x-slot name="title">
            Apakah Anda Yakin Ingin Menghapus?
        </x-slot>
        <x-slot name="content">
            {{$user}}
            Kode Pesanan : {{$transaksi_id}}
        </x-slot>
        <x-slot name="footer">
            <x-jet-button wire:click='delete({{$ItemID}})'>
                Hapus
            </x-jet-button>
            <x-jet-danger-button wire:click="$toggle('hapusItem')" wire:loading.attr='disabled'>
                Batalkan
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
    <x-jet-confirmation-modal wire:model='statusItem'>
        <x-slot name="title">
            Konfirmasi Status?
        </x-slot>
        <x-slot name="content" class="w-full flex justify-center items-center">
            <div class="w-full h-max px-4 py-2 flex">
                <select wire:model='status'
                    class="">
                    <option value="1">Belum Dikirim</option>
                    <option value="2">Dikirim</option>
                </select>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-button wire:click='status({{$ItemID}})'>
                Simpan
            </x-jet-button>
            <x-jet-danger-button wire:click="$toggle('statusItem')" wire:loading.attr='disabled'>
                Batalkan
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
