<x-guest-layout>
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="max-w-screen-lg px-4 md:px-8 mx-auto">
            <div class="flex justify-center mx-auto">
                @if (session()->has('message'))
                    <x-alert :message="session('message')" />
                @endif
            </div>
            @if ($keranjang->count() < 1)
                Maaf Barang Tidak Tersedia
            @else
                <div class="flex flex-col sm:border-t sm:border-b sm:divide-y mb-5 sm:mb-8">
                    <div class="py-5 sm:py-8">
                        @foreach ($keranjang as $item)
                            <div class="flex flex-wrap gap-4 lg:gap-6 sm:py-2.5">
                                <div class="sm:-my-2.5"><a href="#"
                                        class="group w-24 sm:w-40 h-40 sm:h-56 block bg-gray-100 rounded-lg overflow-hidden relative"><img
                                            alt="No alt" src="{{ asset('upload/' . $item->barang->foto_produk) }}"
                                            class="w-full h-full object-cover object-center group-hover:scale-110 transition duration-200 " /></a>
                                </div>
                                <div class="flex flex-col justify-between flex-1">
                                    <div class=""><a href="#"
                                            class="inline-block text-gray-800 hover:text-gray-500 text-lg lg:text-xl font-bold transition duration-100 mb-1">{{ $item->nama_produk }}</a><span
                                            class="block text-gray-500">Kategori:
                                            {{ $item->barang->category->kategory }}</span><span
                                            class="block text-gray-500">Color:
                                            White</span></div>
                                    <div class=""><span class="block text-gray-800 md:text-lg font-bold mb-1">Rp.
                                            {{ number_format($item->barang->harga, 0, 2) }}
                                            <input type="number" id="Harga_Barang" hidden
                                                value="{{ $item->barang->harga }}">
                                        </span><span class="flex items-center text-gray-500 text-sm gap-1"><span><svg
                                                    class="w-5 h-5 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                                    class="w-5 h-5 text-green-500" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg></span><span> In stock </span></span></div>
                                </div>
                                <div class="w-full sm:w-auto flex justify-between border-t sm:border-none pt-4 sm:pt-0">
                                    <div class="flex flex-col items-start gap-2">
                                        <div class="w-20 h-12 flex border rounded overflow-hidden">
                                            <input id="total_jumlah"
                                                class="w-full focus:ring ring-inset ring-indigo-300 outline-none transition duration-100 px-4 py-2"
                                                min="0" max="5" disabled
                                                value="{{ $item->jumlah_barang }}" />
                                        </div>
                                        <form action="{{ route('page.keranjang.delete', ['id' => $item->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button id="Byolvd" type="submit"
                                                wire:click='delete({{ $item->id }})'
                                                class="text-indigo-500 hover:text-indigo-600 active:text-indigo-700 text-sm font-semibold select-none transition duration-100 ">Delete</button>
                                        </form>

                                    </div>
                                    <div class="pt-3 sm:pt-2 ml-4 md:ml-8 lg:ml-16">
                                        <x-jet-input type="number" class="block text-gray-800 md:text-lg font-bold"
                                            id='subTotal' disabled value="{{ $item->sub_total }}" />
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="flex flex-col items-end gap-4">
                    <div class="w-full sm:max-w-xs bg-gray-100 rounded-lg p-4">
                        <div class="space-y-1">
                            <div class="flex justify-between text-gray-500 gap-4"><span
                                    class="">Subtotal</span><span id="total_harga" x-model='total_harga'>Rp.
                                    {{ number_format($sub_total, 0, 2) }}</span>
                            </div>
                            @if (session()->has('promo') || session()->has('nam_promo'))
                                <div class="flex justify-between text-gray-500 gap-4">
                                    {{-- @dd(sum(session('promo'))) --}}
                                    <div class="flex flex-col">
                                        @foreach (session('nam_promo') as $item => $value)
                                            <span class="">{{ $value }}</span>
                                        @endforeach
                                    </div>
                                    <div class="flex flex-col">
                                        @foreach (session('promo') as $item => $value)
                                            <span class="">Rp
                                                {{ number_format($sub_total * ($value / 100), 0, 2) }}</span>
                                        @endforeach

                                    </div>
                                </div>
                            @endif
                            @php
                                            if (session()->has('promo')) {
                                                $promo = intval(array_sum(session('promo')));
                                                $subtotal = $sub_total * ($promo / 100);
                                                $subtotal = $sub_total - $subtotal;
                                            }else{
                                                $subtotal = $sub_total;
                                            }
                                        @endphp
                        </div>
                        <div class="border-t pt-4 mt-4">
                            <div class="flex justify-between items-start text-gray-800 gap-4"><span
                                    class="text-lg font-bold">Total</span><span class="flex flex-col items-end"><span
                                        class="text-lg font-bold">Rp. {{ number_format($subtotal, 0, 2) }}</span><span
                                        class="text-gray-500 text-sm">including VAT</span></span></div>
                        </div>
                    </div>
                    <a href="{{ route('Lanjutkan-Pembayaran') }}">
                        <x-jet-button class="bg-blue-500" id="pay-button">Bayar Sekarang</x-jet-button>
                    </a>
                </div>
            @endif
        </div>

    </div>


</x-guest-layout>
