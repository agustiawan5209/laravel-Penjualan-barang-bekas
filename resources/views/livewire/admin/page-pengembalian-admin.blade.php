<div>
    @include('sweetalert::alert')
    <div class="flex-auto px-0 pt-0 pb-2 bg-white">
        <div class="p-0 overflow-x-auto">
            <div class="px-3 block sm:flex sm:justify-between">

            <x-forms.table>
                <thead class="align-bottom">
                    <tr>
                        <x-forms.th>Pengguna</x-forms.th>
                        <x-forms.th>
                            Foto Produk</x-forms.th>
                        <x-forms.th>
                            Alasan Pengembalian</x-forms.th>
                        <x-forms.th>
                            Harga</x-forms.th>
                        <x-forms.th>
                            Kondisi</x-forms.th>
                        @can ('Manage-Admin', Model::class)
                            <x-forms.th>Update</x-forms.th>
                        @endcan
                        <x-forms.th>Detail</x-forms.th>
                    </tr>
                </thead>
                <tbody>
                    @can ('Manage-Admin', User::class)
                        @foreach ($pengembalian as $item)
                            <tr>
                                <x-forms.td>{{$item->user->name}}</x-forms.td>
                                <x-forms.td>
                                    <div class="flex justify-center px-2 py-1">
                                        <img src="{{ asset('upload/' . $item->gambar) }}"
                                            class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-in-out text-size-sm h-12 w-12 rounded-xl"
                                            alt="user1" />
                                    </div>
                                </x-forms.td>
                                <x-forms.td>
                                    <p
                                        class="mb-0 font-semibold leading-tight dark:text-white dark:opacity-80 text-size-xs">
                                        {{ $item->alasan }}</p>
                                </x-forms.td>

                                <td
                                    class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                    <span
                                        class="font-semibold leading-tight text-size-xs dark:text-white dark:opacity-80 text-slate-400">
                                        Rp. {{ number_format($item->transaksi->total, 0, 2) }}</span>
                                </td>
                                <td
                                    class="p-2 leading-normal text-center align-middle bg-transparent border-b dark:border-white/40 text-size-sm whitespace-nowrap shadow-transparent">
                                    <span
                                        class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-3.6-em text-size-xs-em rounded-1.8 py-2.2-em inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                                        @if ($item->kondisi == 1)
                                            <option value="1">Barang Tidak Sama</option>
                                        @elseif ($item->kondisi == 2)
                                            <option value="2">Barang Rusak/Pecah</option>
                                        @elseif ($item->kondisi == 3)
                                            <option value="3">Pembungkus Paket Sobek/Rusak</option>
                                        @elseif ($item->kondisi == 4)
                                            <option value="4">Paket Salah Kirim</option>
                                        @elseif ($item->kondisi == 5)
                                            <option value="5">{{ $item->kondisi_lain }}</option>
                                        @endif
                                    </span>
                                </td>
                                <x-forms.td>
                                    @if ($item->status == 0)
                                        <a href="#_" wire:click='StatusModal({{ $item->id }})'
                                            class="inline-block px-2 py-1 text-sm mx-auto text-white bg-green-500 rounded-full hover:bg-green-600 md:mx-0">
                                            Update Status
                                        </a>
                                    @else
                                    <a href="#_"
                                        class="inline-block px-2 py-1 text-sm mx-auto text-white bg-green-500 rounded-full hover:bg-green-600 md:mx-0">
                                        @if ($item->status == 1)
                                            Ditolak
                                        @elseif ($item->status == 2)
                                            Diterima
                                        @elseif ($item->status == 3)
                                            Selesai
                                        @endif
                                    @endif
                                    </a>
                                </x-forms.td>
                                <x-forms.td>
                                    <a href="#_" wire:click='detail({{ $item->id }})'
                                        class="inline-block px-2 py-1 text-sm mx-auto text-white bg-blue-500 rounded-full hover:bg-blue-600 md:mx-0">
                                        Detail
                                    </a>
                                </x-forms.td>
                            </tr>
                        @endforeach
                    @endcan
                    @can ('Manage-Customer')
                        @foreach ($pengembalian_user as $item)
                            <tr>
                                <x-forms.td>{{$item->user->name}}</x-forms.td>
                                <x-forms.td>
                                    <div class="flex justify-center px-2 py-1">
                                        <img src="{{ asset('upload/' . $item->gambar) }}"
                                            class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-in-out text-size-sm h-12 w-12 rounded-xl"
                                            alt="user1" />
                                    </div>
                                </x-forms.td>
                                <x-forms.td>
                                    <p
                                        class="mb-0 font-semibold leading-tight dark:text-white dark:opacity-80 text-size-xs">
                                        {{ $item->alasan }}</p>
                                </x-forms.td>

                                <td
                                    class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                    <span
                                        class="font-semibold leading-tight text-size-xs dark:text-white dark:opacity-80 text-slate-400">
                                        Rp. {{ number_format($item->transaksi->total, 0, 2) }}</span>
                                </td>
                                <td
                                    class="p-2 leading-normal text-center align-middle bg-transparent border-b dark:border-white/40 text-size-sm whitespace-nowrap shadow-transparent">
                                    <span
                                        class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-3.6-em text-size-xs-em rounded-1.8 py-2.2-em inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                                        @if ($item->kondisi == 1)
                                            <option value="1">Barang Tidak Sama</option>
                                        @elseif ($item->kondisi == 2)
                                            <option value="2">Barang Rusak/Pecah</option>
                                        @elseif ($item->kondisi == 3)
                                            <option value="3">Pembungkus Paket Sobek/Rusak</option>
                                        @elseif ($item->kondisi == 4)
                                            <option value="4">Paket Salah Kirim</option>
                                        @elseif ($item->kondisi == 5)
                                            <option value="5">{{ $item->kondisi_lain }}</option>
                                        @endif
                                    </span>
                                </td>
                                <x-forms.td>
                                    @if ($item->status != 0)
                                    <a href="#_"
                                        class="inline-block px-2 py-1 text-sm mx-auto text-white bg-red-500 rounded-full hover:bg-red-600 md:mx-0">
                                        @if ($item->status == 1)
                                            Ditolak
                                        @elseif ($item->status == 2)
                                            Diterima
                                        @elseif ($item->status == 3)
                                            Selesai
                                        @endif
                                    @endif
                                    </a>
                                </x-forms.td>
                                <x-forms.td>
                                    <a href="#_" wire:click='detail({{ $item->id }})'
                                        class="inline-block px-2 py-1 text-sm mx-auto text-white bg-blue-500 rounded-full hover:bg-blue-600 md:mx-0">
                                        Detail
                                    </a>
                                </x-forms.td>
                            </tr>
                        @endforeach
                    @endcan
                </tbody>
            </x-forms.table>
            {{-- {{$pengembalian->links('pagination::tailwind')}} --}}
            <x-jet-dialog-modal wire:model='detailItem'>
                <x-slot name='title'>
                    Detail Pengembalian barang
                </x-slot>

                <x-slot name='content'>
                    <div class="bg-white">
                        <div class="border-t border-gray-200">
                            <dl class="">
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500"> Gambar</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <img src="{{ asset('upload/' . $gambar) }}" width='100' alt=""
                                            srcset="">
                                    </dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500"> Alasan </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ $alasan }}
                                    </dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500"> Kondisi </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($kondisi == 1)
                                            <option value="1">Barang Tidak Sama</option>
                                        @elseif ($kondisi == 2)
                                            <option value="2">Barang Rusak/Pecah</option>
                                        @elseif ($kondisi == 3)
                                            <option value="3">Pembungkus Paket Sobek/Rusak</option>
                                        @elseif ($kondisi == 4)
                                            <option value="4">Paket Salah Kirim</option>
                                        @elseif ($kondisi == 5)
                                            <option value="5">{{ $kondisi_lain }}</option>
                                        @endif
                                    </dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500"> Status Pengembalian </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($kondisi == 1)
                                            Barang Tidak Sama
                                        @elseif ($kondisi == 2)
                                            Barang Rusak/Pecah
                                        @elseif ($kondisi == 3)
                                            Pembungkus Paket Sobek/Rusak
                                        @elseif ($kondisi == 4)
                                            Paket Salah Kirim
                                        @elseif ($kondisi == 5)
                                            {{ $kondisi_lain }}
                                        @endif
                                    </dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">Keterangan Pemilik </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$admin_ket}}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </x-slot>
                <x-slot name='footer'>
                    <x-jet-danger-button type='button' wire:click="$toggle('detailItem')" wire:loading.attr='disabled'>
                        Tutup
                    </x-jet-danger-button>
                </x-slot>

            </x-jet-dialog-modal>
            @can ('Manage-Admin', User::class)
                <x-jet-confirmation-modal wire:model='StatusItem'>
                    <x-slot name='title'>
                        Konfirmasi Pengembalian Barang
                    </x-slot>

                    <x-slot name='content'>
                        <div class="bg-white">
                            <div class="border-t border-gray-200">
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500"> Status Pengembalian </dt>
                                    <select wire:model="status" class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <option value="2">Diterima</option>
                                        <option value="1">Di Tolak</option>
                                    </select>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500"> Keterangan </dt>
                                    <textarea wire:model="ket" id="ket" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                    </x-slot>
                    <x-slot name='footer'>
                        <x-jet-button type='button' wire:click="gantiStatus({{ $itemID }})"
                            wire:loading.attr='disabled'>Simpan
                        </x-jet-button>
                        <x-jet-danger-button type='button' wire:click="$toggle('StatusItem')" wire:loading.attr='disabled'>
                            Tutup
                        </x-jet-danger-button>
                    </x-slot>

                </x-jet-confirmation-modal>
            @endcan

        </div>
    </div>
</div>
