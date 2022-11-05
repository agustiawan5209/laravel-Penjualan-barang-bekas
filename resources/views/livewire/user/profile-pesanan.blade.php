<div class="bg-white" x-data="{active: 1,}">
   @include('sweetalert::alert')
    <div
        class="relative flex flex-col flex-auto min-w-0 md:p-4 md:mx-6 overflow-hidden break-words bg-white border-0 dark:bg-slate-850 dark:shadow-dark-xl shadow-3xl rounded-2xl bg-clip-border">
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 mt-4 sm:my-auto sm:mr-0 ">
                <div class="relative">
                    <ul class="relative flex flex-nowrap md:flex-wrap p-1 md:list-none bg-gray-50 rounded-xl">
                        {{-- <li class="z-30 flex-auto text-center" @click="active = 0"
                            :class="active === 0 ? 'bg-white shadow-md rounded-md' : ''">
                            <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg bg-inherit text-slate-700 text-xs md:text-base"
                                href="javascript:;" :class="active === 0 ? 'bg-white shadow-md rounded-md' : ''">
                                <i class="ni hidden md:block ni-app"></i>
                                <span class="ml-2">Pesanan</span>
                            </a>
                        </li> --}}
                        <li class="z-30 flex-auto text-center"
                            :class="active === 2 ? 'bg-white shadow-md rounded-md' : ''">
                            <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg bg-inherit text-slate-700 text-xs md:text-base "
                                @click="active = 2" href="javascript:;">
                                <i class="ni hidden md:block ni-email-83"></i>
                                <span class="ml-2">Dikirim</span>
                            </a>
                        </li>
                        <li class="z-30 flex-auto text-center"
                            :class="active === 3 ? 'bg-white shadow-md rounded-md' : ''">
                            <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg bg-inherit text-slate-700 text-xs md:text-base"
                                @click="active = 3" href="javascript:;">
                                <i class="ni hidden md:block ni-email-83"></i>
                                <span class="ml-2">Belum Di Kirim</span>
                            </a>
                        </li>
                        <li class="z-30 flex-auto text-center"
                            :class="active === 4 ? 'bg-white shadow-md rounded-md' : ''">
                            <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg bg-inherit text-slate-700 text-xs md:text-base"
                                @click="active = 4" href="javascript:;">
                                <i class="ni hidden md:block ni-email-83"></i>
                                <span class="ml-2">Pesanan Diterima</span>
                            </a>
                        </li>
                        <li class="z-30 flex-auto text-center"
                            :class="active === 5 ? 'bg-white shadow-md rounded-md' : ''">
                            <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg bg-inherit text-slate-700 text-xs md:text-base"
                                @click="active = 5" href="javascript:;">
                                <i class="ni hidden md:block ni-email-83"></i>
                                <span class="ml-2">Pesanan Belum Di Konfirmasi</span>
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
                        <tr class=" capitalize bg-gray-100 rounded-t-md" x-show="active == 5">
                            <x-forms.td>
                                kode Pesanan
                            </x-forms.td>
                            {{-- <x-forms.td>
                                Status Pembayaran
                            </x-forms.td> --}}
                            <x-forms.td>
                                Type Pembayaran
                            </x-forms.td>
                            <x-forms.td>
                                Detail Pesanan
                            </x-forms.td>
                            <x-forms.td>
                                Total
                            </x-forms.td>
                            <x-forms.td>
                                Aksi
                            </x-forms.td>
                        </tr>
                        <tr class=" capitalize bg-gray-100 rounded-t-md" x-show=" active == 3 || active == 4">
                            <x-forms.td>
                                kode Pesanan
                            </x-forms.td>
                            <x-forms.td>
                                Status Pengiriman
                            </x-forms.td>
                            <x-forms.td>
                                Detail
                            </x-forms.td>
                            <x-forms.td>
                                Tanggal Pengiriman
                            </x-forms.td>
                            <x-forms.td>
                                Detail
                            </x-forms.td>
                        </tr>
                    </thead>
                    <tbody x-show="active == 0">
                        @if ($produk != null)
                        @foreach ($produk as $item)
                        <tr>
                            <x-forms.td>
                                {{ $item->transaksi_id }}
                            </x-forms.td>
                            {{-- <x-forms.td>
                                {{ $item->payment_status }}
                            </x-forms.td> --}}
                            <x-forms.td>
                                {{ $item->payment_type }}
                            </x-forms.td>
                            <x-forms.td>
                                {{ $item->item_details }}
                            </x-forms.td>
                            <x-forms.td>
                                Rp. {{number_format( $item->total_price,0,2) }}
                            </x-forms.td>
                            <x-forms.td class="flex justify-around items-center">
                                <a href="{{ asset('bukti/'. $item->pdf_url) }}" target="_blank">
                                    <x-jet-button>Detail</x-jet-button>
                                </a>
                                <x-jet-button wire:click='statusongkir({{$item->id}})'>Status</x-jet-button>

                            </x-forms.td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    <tbody x-show="active == 3">
                        @if ($belum_terkirim)
                        @foreach ($belum_terkirim as $item)
                        <tr>
                            <x-forms.td>{{$item->transaksi_id}}</x-forms.td>
                            <x-forms.td class="flex justify-center items-center">
                                @if ($item->status == 3)
                                <span wire:click='statusongkir({{$item->id}})'
                                    class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-3.6-em text-size-xs-em rounded-1.8 py-2.2-em inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                                    @if ($item->status == 1)
                                    Belum Terkirim
                                    @elseif ($item->status == 2)
                                    Dalam Pengiriman
                                    @elseif ($item->status == 3)
                                    Pembayaran Di Konfirmasi
                                    @elseif ($item->status == 4)
                                    Pesanan Diterima
                                    @endif
                                </span>
                                @else
                                <x-jet-secondary-button  wire:click='statusongkir({{$item->id}})'
                                    class="bg-gradient-to-tl cursor-pointer from-emerald-500 to-teal-400 px-3.6-em text-size-xs-em rounded-1.8 py-2.2-em inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                                    @if ($item->status == 1)
                                    Belum Terkirim
                                    @elseif ($item->status == 2)
                                    Dalam Pengiriman
                                    @elseif ($item->status == 3)
                                    Pembayaran Di Konfirmasi
                                    @elseif ($item->status == 4)
                                    Pesanan Diterima
                                    @endif
                                </x-jet-secondary-button>
                                @endif
                            </x-forms.td>
                            <x-forms.td>{{$item->harga}}</x-forms.td>
                            <x-forms.td>{{$item->tgl_pengiriman}}</x-forms.td>
                            {{-- <x-forms.td class=" flex justify-center items-center">
                                <x-jet-danger-button>
                                    Batalkan
                                </x-jet-danger-button>
                            </x-forms.td> --}}
                            <x-forms.td class="flex justify-around items-center">
                                <a href="{{ asset('bukti/'. $item->pdf_url) }}" target="_blank">
                                    <x-jet-button>Detail</x-jet-button>
                                </a>

                            </x-forms.td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    <tbody x-show="active == 4">
                        @if ($diterima != null)
                        @foreach ($diterima as $item)
                        <tr>
                            <x-forms.td>{{$item->transaksi_id}}</x-forms.td>
                            <x-forms.td class="flex justify-center items-center" wire:click='statusongkir({{$item->id}})'>
                                @if ($item->status == 3)
                                <span
                                    class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-3.6-em text-size-xs-em rounded-1.8 py-2.2-em inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                                    @if ($item->status == 1)
                                    Belum Terkirim
                                    @elseif ($item->status == 2)
                                    Dalam Pengiriman
                                    @elseif ($item->status == 3)
                                    Pembayaran Di Konfirmasi
                                    @elseif ($item->status == 4)
                                    Pesanan Diterima
                                    @endif
                                </span>
                                @else
                                <x-jet-secondary-button
                                    class="bg-gradient-to-tl cursor-pointer from-emerald-500 to-teal-400 px-3.6-em text-size-xs-em rounded-1.8 py-2.2-em inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                                    @if ($item->status == 1)
                                    Belum Terkirim
                                    @elseif ($item->status == 2)
                                    Dalam Pengiriman
                                    @elseif ($item->status == 3)
                                    Pembayaran Di Konfirmasi
                                    @elseif ($item->status == 4)
                                    Pesanan Diterima
                                    @endif
                                </x-jet-secondary-button>
                                @endif
                            </x-forms.td>
                            <x-forms.td class="text-center">
                                <a href="{{route('User.Detail-Pesanan', ['item'=> $item->transaksi_id])}}">
                                    <x-jet-secondary-button class="px-1 py-2 bg-green-500 hover:bg-green-600 ">Detail Pesanan</x-jet-secondary-button>
                                </a>
                            </x-forms.td>
                            <x-forms.td>{{$item->tgl_pengiriman}}</x-forms.td>
                            <x-forms.td class=" flex justify-center items-center">
                                {{-- <a href="#" wire:click='detailOngkir({{$item->id}})'
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
                                </a> --}}
                                Pesanan Telah Diterima
                            </x-forms.td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    <tbody x-show="active == 5">
                        @if ($belum_konfirmasi != null)
                        @foreach ($belum_konfirmasi as $item)
                        <tr>
                            <x-forms.td>
                                {{ $item->transaksi_id }}
                            </x-forms.td>
                            {{-- <x-forms.td>
                                {{ $item->payment_status }}
                            </x-forms.td> --}}
                            <x-forms.td>
                                {{ $item->payment_type }}
                            </x-forms.td>
                            <x-forms.td>
                                {{ $item->item_details }}
                            </x-forms.td>
                            <x-forms.td>
                                {{"Rp. ". number_format( $item->total_price,0,2) }}
                            </x-forms.td>
                            <x-forms.td class="flex justify-around items-center">
                                <a href="{{ asset('bukti/'. $item->pdf_url) }}" target="_blank">
                                    <x-jet-button>Detail</x-jet-button>
                                </a>

                            </x-forms.td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    <div class="w-full max-w-full px-3 mt-6 md:flex-none" x-show="active ==2">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                            <table class="flex-auto flex-wrap md:flex-col p-4 pt-6">
                                <tr class="flex flex-col  pl-0 mb-0 rounded-lg">
                                    @if ($terkirim != null)
                                    @foreach ($terkirim as $item)
                                    <tr
                                        class="relative flex flex-wrap md:flex-col p-6 mb-2 border-0 rounded-t-inherit rounded-xl bg-gray-50 dark:bg-slate-850">
                                        <td class="flex flex-col">
                                            <h6 class="mb-4 leading-normal dark:text-white text-size-sm">Pengguna :
                                                {{$item->payment->user->name}}
                                            </h6>
                                            <span class="mb-2 leading-tight text-size-xs dark:text-white/80">No Resi:
                                                <span
                                                    class="font-semibold text-slate-700 dark:text-white sm:ml-2">{{$item->transaksi_id}}</span></span>
                                            <span class="mb-2 leading-tight text-size-xs dark:text-white/80">Detail
                                                Pesanan: <span
                                                    class="font-semibold text-slate-700 dark:text-white sm:ml-2">{{$item->payment->item_details}}</span></span>
                                            <span class="leading-tight text-size-xs dark:text-white/80">Tanggal
                                                Pengiriman:
                                                <span
                                                    class="font-semibold text-slate-700 dark:text-white sm:ml-2">{{$item->tgl_pengiriman}}</span></span>
                                            <span class="leading-tight text-size-xs dark:text-white/80">Harga Ongkir
                                                <span
                                                    class="font-semibold text-slate-700 dark:text-white sm:ml-2">{{$item->harga}}</span></span>
                                        </td>
                                        <td class="ml-auto text-right" x-data="{tooltip: false,}">
                                            <a class="relative z-10 inline-block px-4 py-2.5 mb-0 font-bold text-center text-transparent align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-normal text-size-sm ease-in bg-150 bg-gradient-to-tl from-red-600 to-orange-600 hover:-translate-y-px active:opacity-85 bg-x-25 bg-clip-text"
                                                href="javascript:;">Konfirmasi</a>
                                            @if ( $item->status == 2 )
                                            <x-jet-button @mouseover="tooltip = true" @mouseout="tooltip = false"
                                                class="md:text-lg tracking-wider !bg-gray-500 hover:bg-gray-500 hover:shadow-none hover:-translate-y-0  text-gray-300 relative">
                                                <span x-show='tooltip'
                                                    x-transition:enter="transition ease-out duration-300"
                                                    x-transition:enter-start="opacity-0 scale-90"
                                                    x-transition:enter-end="opacity-100 scale-100"
                                                    x-transition:leave="transition ease-in duration-300"
                                                    x-transition:leave-start="opacity-100 scale-100"
                                                    x-transition:leave-end="opacity-0 scale-90"
                                                    class="absolute translate-x-8 -translate-y-10 text-white bg-gray-700 shadow-md px-4 py-2 rounded-md text-sm">Konfirmasi
                                                    Pemesanan Dengan Pemilik</span>
                                                Pesanan Diterima
                                            </x-jet-button>
                                            @elseif($item->status == 3)
                                            <x-jet-button wire:click='konfirmasi({{$item->id}})'
                                                class="md:text-lg tracking-wider !bg-blue-500 hover:bg-blue-700 hover:shadow-none relative">
                                                Pesanan Diterima
                                            </x-jet-button>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tr>
                            </table>
                        </div>
                    </div>
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
    <x-jet-dialog-modal wire:model="statusItem">
        <x-slot name="title"></x-slot>
        <x-slot name="content">
           @include('livewire.item.status-ongkir-form' , ['status'=> $post])
        </x-slot>
        <x-slot name="footer">
            <x-jet-danger-button wire:click="$toggle('statusItem')" wire:loading.attr='disabled'>Tutup</x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
