<div class="flex justify-center mx-auto w-full py-3">
    <div class="bg-white rounded-md shadow-sm">
        <div class="flex-auto px-0 pt-0 py-2">
            <div class="p-0 overflow-x-auto">
                <div class="px-3 py-2 block sm:flex sm:justify-between">
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
                    <thead class="align-bottom">
                        <tr>
                            <x-forms.th>
                                Pengguna</x-forms.th>
                            <x-forms.th>
                                Foto Produk</x-forms.th>
                            <x-forms.th>
                                Nama Produk</x-forms.th>
                            <x-forms.th>
                                Harga</x-forms.th>
                            <x-forms.th>
                                Deskripsi</x-forms.th>
                            <x-forms.th>
                                Kategori</x-forms.th>
                            <x-forms.th>Diskon</x-forms.th>
                            <x-forms.th>Detail</x-forms.th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barang as $item)
                            <tr>
                                <x-forms.td>
                                    <p
                                        class="mb-0 font-semibold leading-tight dark:text-white dark:opacity-80 text-size-xs">
                                        {{ $item->user->name }}</p>
                                </x-forms.td>
                                <x-forms.td>
                                    <div class="flex px-2 py-1">
                                        <div>
                                            <img src="{{ asset('upload/' . $item->foto_produk) }}"
                                                class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-in-out text-size-sm h-9 w-9 rounded-xl"
                                                alt="user1" />
                                        </div>
                                        {{-- <div class="flex flex-col justify-center">
                                            <h6 class="mb-0 leading-normal dark:text-white text-size-sm">John
                                                Michael</h6>
                                            <p
                                                class="mb-0 leading-tight dark:text-white dark:opacity-80 text-size-xs text-slate-400">
                                                john@creative-tim.com</p>
                                        </div> --}}
                                    </div>
                                </x-forms.td>
                                <x-forms.td>
                                    <p
                                        class="mb-0 font-semibold leading-tight dark:text-white dark:opacity-80 text-size-xs">
                                        {{ $item->nama_produk }}</p>
                                </x-forms.td>

                                <td
                                    class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                    <span
                                        class="font-semibold leading-tight text-size-xs dark:text-white dark:opacity-80 text-slate-400">
                                        Rp. {{ number_format($item->harga, 0, 2) }}</span>
                                </td>
                                <td
                                    class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                    <span
                                        class="font-semibold leading-tight text-size-xs dark:text-white dark:opacity-80 text-slate-400">{{ $item->deskripsi }}</span>
                                </td>
                                <td
                                    class="p-2 leading-normal text-center align-middle bg-transparent border-b dark:border-white/40 text-size-sm whitespace-nowrap shadow-transparent">
                                    <span
                                        class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-3.6-em text-size-xs-em rounded-1.8 py-2.2-em inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">{{ $item->category->kategory }}</span>
                                </td>
                                <x-forms.td>
                                    <button type="button" class="ml-5 bg-orange-400 px-4 text-white py-2 rounded-md"
                                        wire:click='Diskon({{ $item->id }})'>Diskon</button>
                                </x-forms.td>
                                <x-forms.td>
                                    <a href="#_" wire:click='DetailModal({{ $item->id }})'
                                        class="inline-block px-2 py-1 text-sm mx-auto text-white bg-blue-500 rounded-full hover:bg-blue-600 md:mx-0">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    </a>
                                </x-forms.td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-forms.table>

            </div>
        </div>
    </div>
    {{-- Modal Detail Produk Pengguna --}}
    <x-jet-dialog-modal wire:model="detailItem" maxWidth='2xl'>
        <x-slot name="title">
            <h3>Detail Produk</h3>
        </x-slot>

        <x-slot name="content">
            <div class="flex flex-wrap -mx-3">
                <div class="w-full max-w-full px-3 mt-6  md:flex-none">
                  <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4 pt-6">
                      <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                        <li class="relative flex p-6 mb-2 border-0 rounded-t-inherit rounded-xl bg-gray-50 dark:bg-slate-850">
                          <div class="flex flex-col">
                            <h6 class="mt-4 leading-normal dark:text-white text-size-sm">{{$user_name}}</h6>
                            <span class="mb-2 leading-tight text-size-xs dark:text-white/80">Toko Name: <span class="font-semibold text-slate-700 dark:text-white sm:ml-2">Viking Burrito</span></span>
                            <span class="mb-2 leading-tight text-size-xs dark:text-white/80">Email Address:  <span class="font-semibold text-slate-700 dark:text-white sm:ml-2">{{$user_email}}</span></span>
                            <span class="leading-tight text-size-xs dark:text-white/80">Kode Toko: <span class="font-semibold text-slate-700 dark:text-white sm:ml-2">FRB1235476</span></span>
                            <h6 class="mt-4 leading-normal dark:text-white text-size-sm">Detail Produk</h6>
                            <span class="leading-tight text-size-xs dark:text-white/80"> Nama Produk: <span class="font-semibold text-slate-700 dark:text-white sm:ml-2">{{$nama_produk}}</span></span>
                            <span class="leading-tight text-size-xs dark:text-white/80"> Harga Produk: <span class="font-semibold text-slate-700 dark:text-white sm:ml-2">{{$harga_produk}}</span></span>
                            <span class="leading-tight text-size-xs dark:text-white/80"> Deskripsi Produk: <span class="font-semibold text-slate-700 dark:text-white sm:ml-2">{{$deskripsi_produk}}</span></span>
                            <span class="leading-tight text-size-xs dark:text-white/80"> Kategori Produk: <span class="font-semibold text-slate-700 dark:text-white sm:ml-2">{{$kategori_produk}}</span></span>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button wire:click="$toggle('detailItem')" wire:loading.attr="disabled">
                Tutup
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
