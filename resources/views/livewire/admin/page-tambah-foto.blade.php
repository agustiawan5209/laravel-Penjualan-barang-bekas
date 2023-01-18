<div>

    <div class="overflow-auto md:px-5 bg-white py-10">
        <a href="{{ route('Admin.Barang') }}">
            <x-jet-danger-button type='button'>Kembali
            </x-jet-danger-button>
        </a>
        <table class="table w-full border">
            @foreach ($fotoBarang as $key => $item)
                <tr>
                    <td class="border px-3 py-2">Foto Ke-{{ $key + 1 }}</td>
                    <td class="border px-3 py-2">
                        <img src="{{ asset('upload/' . $item->foto) }}" alt="" width="100">
                    </td>
                    <td class="border px-3 py-2">
                        <div class="flex items-center">
                            <input id="link-checkbox" type="radio" wire:click='default_foto({{ $item->id }})' value="{{ $key }}"
                                {{ $item->default == 'yes' ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="link-checkbox"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Jadikan
                                Default</label>
                        </div>
                    </td>
                    <td class="border px-3 py-2">
                        <x-jet-danger-button type='button' wire:click='hapusFoto({{ $item->id }})'>Hapus
                        </x-jet-danger-button>
                    </td>
                </tr>
            @endforeach

            <tr>
                <td colspan="3" class="flex justify-center w-full">
                    <x-jet-button type='button' wire:click='count'>Tambah Foto</x-jet-button>
                </td>
            </tr>
        </table>
        <x-jet-dialog-modal wire:model='itemAdd'>
            <x-slot name='title'>Tambah Foto</x-slot>
            <x-slot name='content'>
                <div class="mb-4">
                    <label for="dropzone-file"
                        class="mx-auto cursor-pointer flex w-full max-w-lg flex-col items-center rounded-xl border-2 border-dashed border-blue-400 bg-white p-6 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>

                        <h2 class="mt-4 text-xl font-medium text-gray-700 tracking-wide">File</h2>

                        <p class="mt-2 text-gray-500 tracking-wide">Upload Foto </p>

                        <input id="dropzone-file" wire:model='foto_barang' type="file" class="hidden" />
                        </section>
                        @if ($foto_barang)
                            foto_barang Preview:
                            <img src="{{ $foto_barang->temporaryUrl() }}">
                        @endif
                        @error('foto_barang')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                </div>
            </x-slot>
            <x-slot name='footer'>
                <x-jet-button type='button' wire:click='tambahFoto'>Simpan</x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>
</div>
