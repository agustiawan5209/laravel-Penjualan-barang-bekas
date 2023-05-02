<div class="w-full px-6 py-6 mx-auto" x-data="{active: 0,}">
    <!-- content -->
    @include('sweetalert::alert')

    <div
        class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 overflow-hidden break-words bg-white border-0 dark:bg-slate-850 dark:shadow-dark-xl shadow-3xl rounded-2xl bg-clip-border">
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 mt-4 sm:my-auto sm:mr-0 md:w-1/2 md:flex-none lg:w-4/12">
                <div class="relative ">
                    <ul class="relative flex flex-wrap p-1 list-none bg-gray-50 rounded-xl" nav-pills="" role="tablist">
                        <li class="z-30 flex-auto text-center" @click="active = 0"
                            :class="active === 0 ? 'bg-white' : ''">
                            <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg bg-inherit text-slate-700"
                                nav-link="" href="javascript:;" role="tab" aria-selected="true" active="">
                                <i class="ni ni-app"></i>
                                <span class="ml-2">Penjualan</span>
                            </a>
                        </li>
                        <li class="z-30 flex-auto text-center">
                            <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg bg-inherit text-slate-700"
                                @click="active = 1" :class="active === 1 ? 'bg-white' : ''" nav-link=""
                                href="javascript:;" role="tab" aria-selected="false">
                                <i class="ni ni-email-83"></i>
                                <span class="ml-2">Belum Di Konfirmasi</span>
                            </a>
                        </li>
                        {{-- <li class="z-30 flex-auto text-center">
                            <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg bg-inherit text-slate-700"
                                @click="active = 1" :class="active === 1 ? 'bg-white' : ''" nav-link=""
                                href="javascript:;" role="tab" aria-selected="false">
                                <i class="ni ni-email-83"></i>
                                <span class="ml-2">Di Batalkan</span>
                            </a>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    {{-- Transfer --}}
    <section class="mt-5 w-full relative z-0" x-show="active === 1">


        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 mt-6 md:w-7/12 md:flex-none">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="p-6 px-4 pb-0 mb-0 border-b-0 rounded-t-2xl">
                        <h6 class="mb-0 dark:text-black">Pesanan Belum Di Konfirmasi</h6>
                    </div>
                    <div class="flex-auto p-4 pt-6">
                        <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                            @foreach ($belum_konfirmasi as $item)
                            <li
                                class="relative flex p-6 mb-2 border-0 rounded-t-inherit rounded-xl bg-gray-50 dark:bg-slate-850">
                                <div class="flex flex-col">
                                    <h6 class="mb-4 leading-normal dark:text-black text-size-sm">{{$item->user->name}}
                                    </h6>
                                    <span class="mb-2 leading-tight text-size-xs dark:text-black/80">Nomor Telepon:
                                        <span
                                            class="font-semibold text-slate-700 dark:text-black sm:ml-2">{{$item->user->phone_number}}</span></span>
                                    <span class="mb-2 leading-tight text-size-xs dark:text-black/80">ID Transaksi:
                                        <span
                                            class="font-semibold text-slate-700 dark:text-black sm:ml-2">{{$item->transaksi_id}}</span></span>
                                    <span class="leading-tight text-size-xs dark:text-black/80">Detail Pesanan: <span
                                            class="font-semibold text-slate-700 dark:text-black sm:ml-2">{{$item->item_details}}</span></span>
                                </div>
                                <div class="ml-auto text-right">
                                    <x-jet-secondary-button wire:click='konfirmasi_pesanan({{$item->id}})'>
                                        Konfirmasi Pesanan
                                    </x-jet-secondary-button>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="w-full max-w-full px-3 mt-6 md:w-5/12 md:flex-none">
                <div
                    class="relative flex flex-col h-full min-w-0 mb-6 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="p-6 px-4 pb-0 mb-0 border-b-0 rounded-t-2xl">
                        <div class="flex flex-wrap -mx-3">
                            <div class="max-w-full px-3 md:w-1/2 md:flex-none">
                                <h6 class="mb-0 dark:text-black">Transaksi Terbaru</h6>
                            </div>
                            <div
                                class="flex items-center justify-end max-w-full px-3 dark:text-black/80 md:w-1/2 md:flex-none">
                                <i class="mr-2 far fa-calendar-alt" aria-hidden="true"></i>
                                <small>{{date('Y-m-d')}}</small>
                            </div>
                        </div>
                    </div>
                    <div class="flex-auto p-4 pt-6">
                        <h6 class="mb-4 font-bold leading-tight uppercase dark:text-black text-size-xs text-slate-500">
                            Newest</h6>
                        <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                            @foreach ($transaksi_terbaru as $item)
                            <li
                                class="relative flex justify-between px-4 py-2 pl-0 mb-2 border-0 rounded-t-inherit text-size-inherit rounded-xl">
                                <div class="flex items-center">
                                    <button
                                        class="leading-pro ease-in text-size-xs bg-150 w-6.5 h-6.5 p-1.2 rounded-3.5xl tracking-tight-rem bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-red-600 border-transparent bg-transparent text-center align-middle font-bold uppercase text-red-600 transition-all hover:opacity-75"><i
                                            class="fas fa-arrow-down text-size-3xs" aria-hidden="true"></i></button>
                                    <div class="flex flex-col">
                                        <h6 class="mb-1 leading-normal dark:text-black text-size-sm text-slate-700">
                                            {{$item->user->name}}
                                        </h6>
                                        <span
                                            class="leading-tight text-size-xs dark:text-black/80">{{$item->user->email}}
                                        </span>
                                    </div>
                                </div>
                                <div class="flex flex-col items-center justify-center">
                                    <p
                                        class="relative z-10 inline-block m-0 font-semibold leading-normal text-transparent bg-gradient-to-tl from-red-600 to-orange-600 text-size-sm bg-clip-text">
                                        {{$item->created_at}}</p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- COD --}}


    {{-- Tabel Penjualan --}}
    <div class="max-w-full px-3 bg-white rounded-lg shadow-md mt-5" x-show="active ===0">
        <div class="flex-auto px-0 pt-0 py-2">
            <h2 class="font-bold tracking-widest pt-2 text-center text-slate-800 ">
                Tabel Penjualan
            </h2>
            <div class="w-full max-w-full py-4 px-3 flex border-b border-gray-500 rounded-t-md">
                <ul class="w-full list-none grid grid-cols-2 md:grid-cols-4 justify-between gap-4">
                    <li class=" col-span-1">
                        <select name="row" id="row" wire:model='row'
                        class="">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <x-jet-input type="search" wire:model='search' placeholder="Cari...."></x-jet-input>
                    </li>
                    <li class=" md:col-start-3 col-span-1 md:col-span-2 grid grid-cols-2 gap-1">
                        <div><label for="min_date">Min Date:</label>
                            <x-jet-input type='date' wire:model='min_date'></x-jet-input></div>
                        <div>
                            <label for="max_date">Max Date:</label>
                        <x-jet-input type='date' wire:model='max_date'></x-jet-input>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="p-0 overflow-x-auto">
                <x-forms.table>
                    <thead class="align-bottom">
                        <tr>
                            <x-forms.th>
                                Pengguna</x-forms.th>
                            <x-forms.th>
                                Produk</x-forms.th>
                            <x-forms.th>
                                Status Pembayaran</x-forms.th>
                            <x-forms.th>
                                Detail</x-forms.th>
                            <x-forms.th>
                                Kirim</x-forms.th>
                        </tr>
                    </thead>
                    <tbody>
                       @if ($transaksi->count() > 0)
                         @foreach ($transaksi as $item)
                         <tr>
                             <x-forms.td>
                                 <div class="flex px-2 py-1">
                                     <div>
                                         <img src="{{ Auth::user()->profile_photo_url }}"
                                             class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-in-out text-size-sm h-9 w-9 rounded-xl"
                                             alt="user1">
                                     </div>
                                     <div class="flex flex-col justify-center">
                                         <h6 class="mb-0 leading-normal dark:text-black text-size-sm">
                                             {{ $item->user->name }}</h6>
                                         <p
                                             class="mb-0 leading-tight dark:text-black dark:opacity-80 text-size-xs text-slate-400">
                                             {{ $item->user->email }}</p>
                                     </div>
                                 </div>
                             </x-forms.td>
                             <x-forms.td>
                                 <p
                                     class="mb-0 font-semibold leading-tight dark:text-black dark:opacity-80 text-size-xs">
                                     Produk</p>
                             </x-forms.td>
                             <x-forms.td>
                                 <span
                                     class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-3.6-em text-size-xs-em rounded-1.8 py-2.2-em inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                                     @if ($item->payment_status == 1)
                                     Pembayaran Belum Dilakukan
                                     @elseif ($item->payment_status == 2)
                                     Pembayaran Selesai
                                     @elseif ($item->payment_status == 3)
                                     Pembayaran Di Konfirmasi
                                     @endif
                                 </span>
                                 <p class="mb-0 font-semibold leading-tight dark:text-black dark:opacity-80 text-xs">
                                     {{ $item->payment_type }}</p>
                             </x-forms.td>
                             <x-forms.td class="text-center px-0 ">
                                 <a href="{{ asset('bukti/'.$item->pdf_url) }}" target="_blank" class="px-0 flex justify-center">
                                     <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                         xmlns="http://www.w3.org/2000/svg">
                                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                             d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                             d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                         </path>
                                     </svg>
                                 </a>
                             </x-forms.td>
                             <x-forms.td>
                                 @if ($item->ongkir->tgl_pengiriman == null)
                                 <x-jet-button wire:click='createOngkir({{$item->id}})'>
                                     Buat Pengiriman
                                 </x-jet-button>
                                 @else
                                 <x-jet-button class="bg-green-500 hover:bg-green-500 active:bg-green-500"
                                     wire:click='detailOngkir({{$item->ongkir->id}})'>
                                     Detail
                                 </x-jet-button>
                                 @endif

                             </x-forms.td>
                         </tr>
                         @endforeach
                         @else
                         <tr>
                            <x-forms.td colspan='5' class="text-2xl font-bold">Maaf Penjualan Kosong</x-forms.td>
                         </tr>
                       @endif
                    </tbody>
                </x-forms.table>

            </div>
        </div>
    </div>

    @if ($itemDetail)
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
    @endif
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
                    <textarea id="" cols="30" rows="10"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">{{$detail_alamat}} ,{{$kode_pos}} ,{{$kabupaten}} ,
             </textarea>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Status
                    </label>
                    <select id="countries" wire:model='status'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                <button wire:click='create'
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="button">
                    Tambah
                </button>
                <button wire:click='$toggle("ongkirItem")'
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="button">
                    Close
                </button>
            </div>
        </x-slot>
    </x-jet-dialog-modal>
    <x-jet-confirmation-modal wire:model='konfirmasiItem'>
        <x-slot name="title">Konfirmasi Pesanan</x-slot>
        <x-slot name="content">
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500"> Pengguna </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{$user_name}} </dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500"> ID TRANSAKSI </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{$transaksi_id}} </dd>
            </div>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500"> Detail Pesanan </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$item_details}}</dd>
            </div>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500"> Bukti Pembayaran </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <a href="{{ asset('bukti/'.$bukti_bayar) }}" target="_blank" class="px-0 text-blue-600 flex justify-center">
                        Detail Pembayaran
                    </a>
                </dd>
            </div>
        </x-slot>
        <x-slot name="footer">
            <div class="w-full flex justify-around items-center relative px-3 ">
                <x-jet-secondary-button wire:click='konfirmasi({{$ItemID}})'
                    class="m-0 w-1/2 uppercase bg-green-500 hover:g-green-600">
                    Konfirmasi
                </x-jet-secondary-button>
                <x-jet-danger-button class="w-1/2 m-0" wire:click="$toggle('konfirmasiItem')"
                    wire:loading.attr='disabled'>
                    Batalkan
                </x-jet-danger-button>
            </div>
        </x-slot>
    </x-jet-confirmation-modal>

</div>
