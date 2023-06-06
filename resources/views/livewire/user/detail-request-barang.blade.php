<div class="flex justify-center w-full py-3">
    @if (session()->has('message'))
        <x-Alert :message="session('message')" />
    @endif
    <div class="bg-white rounded-md shadow-md w-full">
        <div class="flex-auto px-0 pt-0 md:py-2 w-full">
            <div class="p-0 overflow-x-auto">

                <x-forms.table>
                    <thead class="align-bottom">
                        <tr>
                            <th>
                                <a href="{{ route('User.Request') }}">
                                    <x-jet-button  type='button'>Kembali</x-jet-button></a>
                            </th>
                            <th></th>
                        </tr>
                        <tr>
                            <x-forms.th class="w-48 text-base font-semibold whitespace-nowrap ">
                                Foto Produk</x-forms.th>
                            <x-forms.th class="w-full text-lg font-semibold whitespace-nowrap ">
                                <img src="{{ asset('upload/' . $barang->foto_produk) }}"
                                    class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-in-out text-sm h-96 w-96 object-cover rounded-xl"
                                    alt="user1" />
                            </x-forms.th>

                        </tr>
                        <tr>
                            <x-forms.th class="w-48 text-base font-semibold whitespace-nowrap ">
                                Nama Produk</x-forms.th>
                            <x-forms.th class="w-full text-lg font-semibold whitespace-nowrap ">
                                {{ $barang->nama_produk }}</x-forms.th>
                        </tr>
                        <tr>
                            <x-forms.th class="w-48 text-base font-semibold whitespace-nowrap ">
                                Harga</x-forms.th>
                            <x-forms.th class="w-full text-lg font-semibold whitespace-nowrap ">
                                {{ $barang->harga }}</x-forms.th>
                        </tr>
                        <tr>
                            <x-forms.th class="w-48 text-base font-semibold whitespace-nowrap ">
                                Jenis Request Produk</x-forms.th>
                            <x-forms.th class="w-full text-lg font-semibold whitespace-nowrap ">
                                {{ $barang->categories }}</x-forms.th>
                        </tr>
                        <tr>
                            <x-forms.th class="w-48 text-base font-semibold whitespace-nowrap ">
                                Status</x-forms.th>
                            <x-forms.th class="w-full text-lg font-semibold whitespace-nowrap ">
                                @if ($barang->status == 1)
                                    <span
                                        class="bg-gradient-to-tl from-blue-500 to-blue-400 px-3.6-em rounded-1.8 py-2.2-em inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-black dark:text-white">
                                        Belum Di Konfirmasi
                                    </span>
                                @elseif($barang->status == 2)
                                    <span
                                        class="bg-gradient-to-tl from-green-500 to-green-400 px-3.6-em rounded-1.8 py-2.2-em inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-black dark:text-white">
                                        Diterima
                                    </span>
                                @elseif($barang->status == 3)
                                    <span
                                        class="bg-gradient-to-tl from-red-500 to-red-400 px-3.6-em rounded-1.8 py-2.2-em inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-black dark:text-white">
                                        Ditolak
                                    </span>
                                @elseif($barang->status == 4)
                                    <span
                                        class="bg-gradient-to-tl from-red-500 to-red-400 px-3.6-em rounded-1.8 py-2.2-em inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-black dark:text-white">
                                        Diterima
                                    </span>
                                @endif
                            </x-forms.th>
                        </tr>
                        <tr>
                            <x-forms.th class="w-48 text-base font-semibold whitespace-nowrap ">Alasan
                                @if ($barang->status == 1)
                                    Belum Di Konfirmasi
                                @elseif ($barang->status == 2)
                                   Diterima
                                @elseif ($barang->status == 3)
                                  Ditolak
                                @elseif ($barang->status == 4)
                                    Diterima
                                @endif
                            </x-forms.th>
                            <x-forms.th class="w-full text-lg font-semibold whitespace-nowrap ">
                                {{ $barang->alasan }}</x-forms.th>
                        </tr>
                        <tr>
                            <x-forms.th class="w-48 text-base font-semibold whitespace-nowrap ">Jumlah Komisi
                            </x-forms.th>
                            <x-forms.th class="w-full text-lg font-semibold whitespace-nowrap ">
                               Rp. {{ number_format($barang->komisi,0,2) }}</x-forms.th>
                        </tr>
                    </thead>
                </x-forms.table>

            </div>
        </div>
    </div>
    <script>
        document.getElementById('back').addEventListener('back', function(){
            window.history.back();
        })
    </script>
</div>
