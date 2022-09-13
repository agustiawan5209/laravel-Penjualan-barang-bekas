<div class="flex justify-center w-full py-3">
    @if (session()->has('message'))
        <x-Alert :message="session('message')" />
    @endif
    <div class="bg-white rounded-md shadow-md w-full">
        <div class="flex-auto px-0 pt-0 md:py-2 w-full">
            <div class="p-0 overflow-x-auto">
                <div class="md:px-4 md:py-2 block sm:flex sm:justify-between">
                    <div class=" md:px-3 flex justify-between flex-wrap md:flex-nowrap md:w-md">
                        <select name="row" wire:model='row'
                            class=" w-20 px-2 border-none ring-black active:ring-0 shadow-md rounded-md text-gray-400 text-base">
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
                                Kategori</x-forms.th>
                                <x-forms.th>Konfirmasi</x-forms.th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($barang->count() > 0)
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
                                        class="p-2 leading-normal text-center align-middle bg-transparent border-b dark:border-white/40 text-size-sm whitespace-nowrap shadow-transparent">
                                        <span
                                            class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-3.6-em text-size-xs-em rounded-1.8 py-2.2-em inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">{{ $item->categories }}</span>
                                    </td>
                                    <x-forms.td>
                                        <a href="#_" wire:click='deleteModal({{ $item->id }})'
                                            class="inline-block px-2 py-1 text-sm mx-auto text-white bg-blue-500 rounded-full hover:bg-red-600 md:mx-0">
                                            Konfirmasi
                                        </a>
                                    </x-forms.td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </x-forms.table>

            </div>
        </div>
    </div>
    {{-- Modal Detail Produk Pengguna --}}
</div>
