<div class="overflow-auto fixed pl-32 inset-0 z-10 flex items-center justify-center w-full h-screen"
    style="background-color: rgba(0,0,0,0.5) ">
    <!--Dialog-->
    <div class="bg-white w-full md:max-w-4xl mx-auto rounded shadow-lg py-4 text-left px-6">

        <!--Title-->
        <div class="flex justify-between items-center pb-3">
            <p class="text-2xl font-bold">Detail Kadaluarsa</p>
            <div class="cursor-pointer z-50">
                <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                    viewBox="0 0 18 18">
                    <path
                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                    </path>
                </svg>
            </div>
        </div>

        <!-- content -->
        <div class=" max-w-full h-max-content">
            <x-forms.table>
                <thead>
                    <tr>
                        <x-forms.th>Kode Promo</x-forms.th>
                        <x-forms.th>Jenis</x-forms.th>
                        <x-forms.th>Jumlah Promo</x-forms.th>
                        <x-forms.th>Pengguna Promo</x-forms.th>
                        <x-forms.th>Tanggal Kadaluarsa</x-forms.th>
                        <x-forms.th>Tools</x-forms.th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataPromo as $item)
                    <tr>
                        <x-forms.td>{{$item->kode_promo}}</x-forms.td>
                        <x-.forms.td>
                            @if ($item->category_id == null)
                            {{ $item->barang_id }}
                            @elseif($item->barang_id == null)
                            {{ $item->category_id }}
                            @endif
                        </x-.forms.td>
                        <x-.forms.td>{{ $item->promo }}</x-.forms.td>
                        <x-.forms.td>{{ $item->use_user }}</x-.forms.td>
                        <x-.forms.td>{{ $item->tgl_kadaluarsa }}</x-.forms.td>
                        <x-forms.td>
                            <a href="#_" wire:click='editModal({{ $item->id }})'
                                class="inline-block px-2 py-1 text-sm mx-auto text-white bg-green-500 rounded-full hover:bg-green-600 md:mx-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>
                            </a>
                            <a href="#_" wire:click='hapusModal({{ $item->id }})'
                                class="inline-block px-2 py-1 text-sm mx-auto text-white bg-red-600 rounded-full hover:bg-red-700 md:mx-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>
                            </a>
                        </x-forms.td>
                    </tr>
                    @endforeach
                </tbody>
            </x-forms.table>
        </div>

        <!--Footer-->
        <div class="flex justify-end pt-2">
            <a href="{{route('Admin.Promo')}}">
            <button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Kembali</button></a>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="editItem" maxWidth='2xl'>
        <x-slot name="title">
            @if (session()->has('message'))
            <div class="bg-blue-500 border border-blue-400 text-gray-100 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Message</strong>
                <span class="block sm:inline">{{ session('message') }}</span>
            </div>
            @endif
        </x-slot>

        <x-slot name="content">
            <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                        <div class="flex items-center">
                            <p class="mb-0 dark:text-white/80">Edit Profile</p>
                            <button type="button" wire:click='CloseAllModal'
                                class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-size-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">X</button>
                        </div>
                    </div>
                    <form class="flex-auto p-6">
                        @csrf
                        <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-size-sm">User
                            Information
                        </p>
                        <div class="flex flex-wrap -mx-3">
                            <div class="w-full max-w-full px-3 flex shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="kode_promo"
                                        class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">kode_promo</label>
                                    <input type="text" wire:model="kode_promo"
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-size-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                    @error('kode_promo')
                                    <span class="text-sm text-red-500 italic">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 flex shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="promo"
                                        class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">promo</label>
                                    <input type="text" wire:model="promo"
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-size-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                    @error('promo')
                                    <span class="text-sm text-red-500 italic">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="category_id"
                                        class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">Category</label>
                                    <select id="countries" wire:model='category_id'
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @if ($category != null)
                                        <option value="">--Pilih--</option>
                                        @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->kategory }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    @error('category_id')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="barang_id"
                                        class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">Barang</label>
                                    <select id="countries" wire:model='barang_id'
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @if ($barang != null)
                                        <option value="">--Pilih--</option>
                                        @foreach ($barang as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_produk }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    @error('barang_id')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="max_user"
                                        class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">Maximal
                                        Pengguna</label>
                                    <input type="text" wire:model="max_user"
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-size-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                    </select>
                                    @error('max_user')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr
                            class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent ">

                        <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-size-sm">Tanggal Muat
                        </p>
                        <div class="flex flex-wrap -mx-3">
                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="tgl_mulai"
                                        class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">tgl_mulai</label>
                                    <input type="date" wire:model="tgl_mulai"
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-size-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="tgl_kadaluarsa"
                                        class="inline-block mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80">tgl_kadaluarsa</label>
                                    <input type="date" wire:model="tgl_kadaluarsa"
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-size-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                </div>
                            </div>
                            <div class="flex flex-wrap justify-center items-center mx-auto">
                                <div class="w-full px-3 py-2">
                                    <x-jet-secondary-button wire:click='edit({{$itemID}})'>Edit</x-jet-secondary-button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
        </x-slot>
    </x-jet-dialog-modal>
    <x-jet-dialog-modal wire:model="hapusItem">
        <x-slot name="title">
            Hapus Data Barang {{ $itemID }}
        </x-slot>

        <x-slot name="content">
            Apakah Anda Yakin?
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('hapusItem')" wire:loading.attr="disabled">
                Batalkan
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="hapus({{ $itemID }})" wire:loading.attr="disabled">
                Hapus
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
