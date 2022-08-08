<div>
    @can('Manage-Customer')
        <x-profilepage>
            <x-slot name="setting">'
                @if (session()->has('message'))
                    <x-alert :message="session('message')" />
                @endif'
                <div class="relative box-border">

                    <form w
                        class="relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
                        <div
                            class="p-6 mb-0 text-center  bg-white border-b-0 rounded-t-2xl flex justify-center items-center flex-nowrap">
                            @csrf
                            <svg class="w-20 h-20 text-green-400 p-3 rounded-full shadow-md" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z">
                                </path>
                            </svg>

                            <h5> Update Informasi Toko </h5>
                        </div>
                        <div class="flex-auto p-6">
                            <form role="form text-left">
                                <div class="mb-4">
                                    <input type="text" wire:model.defer='nama_toko'
                                        class="placeholder:text-gray-500 text-size-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                        placeholder="Nama Toko" aria-label="NamaToko" aria-describedby="email-addon">
                                    @error('nama_toko')
                                        <span class="font-medium text-sm ml-3 text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <input type="text" wire:model.defer='alamat'
                                        class="placeholder:text-gray-500 text-size-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                        placeholder="Alamat" aria-label="alamat" aria-describedby="alamat-addon">
                                    @error('alamat')
                                        <span class="font-medium text-sm ml-3 text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <input type="text" wire:model.defer='no_telpon'
                                        class="placeholder:text-gray-500 text-size-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                        placeholder="Nomor Telpon" aria-label="no_telpon" aria-describedby="password-addon">
                                    @error('no_telpon')
                                        <span class="font-medium text-sm ml-3 text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="text-center">
                                    <x-jet-button type="button" wire:click='UpdateToko' class="i">Simpan
                                    </x-jet-button>
                                </div>
                            </form>
                        </div>
                    </form>
                </div>
            </x-slot>
        </x-profilepage>
    @endcan
</div>
