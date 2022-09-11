<x-guest-layout>
    <div class="grid grid-cols-3 w-full h-full justify-center items-start shadow-sm">

        <div class=" col-span-full md:col-span-1 bg-white block ">
            <livewire:voucher-klaim :item="$voucher">
            <h1 class="py-6 border-b-2 text-xl text-gray-600 md:px-8">Ringkasan Pesanan</h1>
            <ul class="py-6 border-b space-y-6 px-8">
                @if (Auth::check() && $keranjang != null)
                @foreach ($keranjang as $item)
                <li class="grid grid-cols-6 gap-2 border-b-1">
                    <div class="col-span-1 self-center">
                        <img src="{{ asset('upload/' . $item->barang->foto_produk) }}" alt="Product"
                            class="rounded w-full">
                    </div>
                    <div class="flex flex-col col-span-3 pt-2">
                        <span class="text-gray-600 text-md font-semi-bold">{{ $item->barang->produk }}</span>
                        <span class="text-gray-400 text-sm inline-block pt-2">{{ $item->barang->category->kategory
                            }}</span>
                    </div>
                    <div class="col-span-2 pt-3">
                        <div class="flex items-center space-x-2 text-sm justify-between">
                            <span class="text-pink-400 font-semibold inline-block">Rp.
                                {{ number_format($item->sub_total, 0, 2) }}</span>
                        </div>
                    </div>
                </li>
                @endforeach
                @endif
            </ul>
            <div class="px-8 border-b">
                <div class="flex justify-between py-4 text-gray-600">
                    <span>Subtotal</span>
                    <span class="font-semibold text-pink-500">Rp. {{ number_format($total_price, 0, 2) }}</span>
                </div>
                <div class="flex justify-between py-4 text-gray-600">
                    <span>Potongan</span>
                    <span class="font-semibold text-pink-500">Rp. {{ number_format($potongan, 0, 2) }}</span>
                </div>
            </div>
            <div class="font-semibold text-xl px-8 flex justify-between py-8 text-gray-600">
                <span>Total</span>
                <span>Rp. {{ number_format($sub_total, 0, 2) }}</span>
            </div>
        </div>
        <div class=" grid grid-cols-3 col-span-2">
            <div class=" col-span-3 bg-indigo-50  md:px-12">
                <div class="mt-8 md:p-4 relative flex flex-col sm:flex-row sm:items-center bg-white shadow rounded-md">
                    <div class="flex flex-row items-center border-b sm:border-b-0 w-full sm:w-auto pb-4 sm:pb-0">
                        <div class="text-yellow-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 sm:w-5 h-6 sm:h-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="text-sm font-medium ml-3">Checkout</div>
                    </div>
                    <div class="text-sm tracking-wide text-gray-500 mt-4 sm:mt-0 sm:ml-4">Selesaikan pengiriman Anda dan
                        rincian pembayaran di bawah ini.</div>
                    @if (session()->has('message'))
                    <x-alert :message="session('message')" />
                    @endif

                    <div
                        class="absolute sm:relative sm:top-auto sm:right-auto ml-auto right-4 top-4 text-gray-400 hover:text-gray-800 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                </div>
                <section class=" w-full mb-6">
                    <h2 class="uppercase tracking-wide text-lg font-semibold text-gray-700 my-2">
                        Promo
                    </h2>

                    <form action="{{route('masukan-kode-promo')}}" method="POST" class="grid grid-cols-6 ">
                        @csrf
                        <input
                            class="  col-span-full md:col-span-4 focus:shadow-primary-outline text-size-sm leading-5.6 ease block appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            name="kode_promo" type='text' placeholder="Masukkan Kode Promo" />
                        <x-jet-button class="mb-0   md:col-span-2 px-1 py-1" type='submit'>Cek Promo</x-jet-button>
                    </form>

                </section>
                <form id="payment-form" method="POST" action="{{ route('receive') }}" class="overflow-hidden"
                    enctype="multipart/form-data">
                    <input type="hidden" name="sub_total" value="{{ $sub_total }}" required>
                    <div class="rounded-md">
                        @csrf
                        <section>
                            <h2 class="uppercase tracking-wide text-lg font-semibold text-gray-700 my-2">Shipping &
                                Billing Information</h2>
                            <fieldset class="mb-3 bg-white shadow-lg rounded text-gray-600 overflow-hidden">
                                <label
                                    class="flex md:flex-nowrap flex-wrap border-b border-gray-200 h-12 py-3 items-center">
                                    <span class="text-right px-2">Name</span>
                                    <input name="name" class="focus:outline-none px-3" placeholder="Try Odinsson"
                                        value="{{ Auth::user()->name }}" required>
                                    @error('name')
                                    <span
                                        class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                        Invalid {{ $message }}
                                    </span>
                                    @enderror
                                </label>
                                <label class="flex border-b border-gray-200 h-12 py-3 items-center">
                                    <span class="text-right px-2">Email</span>
                                    <input name="email" type="email"
                                        class="focus:outline-none border-none active:border-none px-3"
                                        placeholder="try@example.com" value="{{ Auth::user()->email }}" required />
                                    @error('email')
                                    <span
                                        class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                        Invalid {{ $message }}
                                    </span>
                                    @enderror
                                </label>

                                <label class="flex border-b border-gray-200 h-12 py-3 items-center">
                                    <span class="text-right px-2">Kabupaten/Kota</span>
                                    <input name="kabupaten" class="focus:outline-none px-3" :old="$kabupaten"
                                        placeholder="Kabupate/Kota" required />
                                    @error('kabupaten')
                                    <span
                                        class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                        Invalid {{ $message }}
                                    </span>
                                    @enderror
                                </label>
                                <label class="inline-flex w-2/4 border-gray-200 py-3">
                                    <span class="text-right px-2">Kecamatan</span>
                                    <input name="kecamatan" class="focus:outline-none px-3" :old="$kecamatan"
                                        placeholder="Kecamatan" required />
                                    @error('kecamatan')
                                    <span
                                        class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                        Invalid {{ $message }}
                                    </span>
                                    @enderror
                                </label>
                                <label
                                    class="xl:w-1/3 xl:inline-flex items-center flex xl:border-none border-t border-gray-200 py-3">
                                    <span class="text-right px-2 whitespace-nowrap xl:px-0 xl:text-none">Kode Pos</span>
                                    <input name="kode_pos" class="focus:outline-none px-3" :old="$kode_pos"
                                        placeholder="90241" required>
                                    @error('kode_pos')
                                    <span
                                        class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                        Invalid {{ $message }}
                                    </span>
                                    @enderror
                                </label>
                                <label class="flex  border-b border-gray-200 h-12 py-3 items-center">
                                    <span class="text-right px-2">Alamat</span>
                                    {{-- <div>
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.7001638374118!2d119.44694411412765!3d-5.1518720535065174!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbee2c5b009c7b9%3A0xdd68d36bc04fc8c0!2sUniversitas%20Handayani%20Makassar!5e0!3m2!1sid!2sid!4v1660662492131!5m2!1sid!2sid"
                                            class="w-full max-h-72" style="border:0;" allowfullscreen="" loading="lazy"
                                            referrerpolicy="no-referrer-when-downgrade">
                                        </iframe>
                                    </div> --}}
                                    <input name="alamat" class="focus:outline-none px-3" value="{{old('alamat')}}"
                                        placeholder="Alamat Lengkap" required />
                                    @error('alamat')
                                    <span
                                        class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                        Invalid {{ $message }}
                                    </span>
                                    @enderror
                                </label>
                            </fieldset>

                        </section>

                    </div>
                    <div class="rounded-md" x-data="{ Payment: true, }">
                        <section>
                            <h2 class="uppercase tracking-wide text-lg font-semibold text-gray-700 my-2">Metode
                                Pembayaran
                            </h2>
                            <div
                                class="flex items-center bg-white pl-4 rounded border border-gray-200 dark:border-gray-700">
                                <input id="bordered-checkbox-1" @click="Payment = ! Payment" type="checkbox"
                                    value="BANK" name="metode"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="metode-1"
                                    class="py-4 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Bayar
                                    Bank</label>
                            </div>
                            <div class="mb-4" x-show="Payment">
                                <label for="dropzone-file"
                                    class="mx-auto cursor-pointer flex w-full max-w-lg flex-col items-center rounded-xl border-2 border-dashed border-blue-400 bg-white p-6 text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>

                                    <h2 class="mt-4 text-xl font-medium text-gray-700 tracking-wide">Masukkan Bukti
                                        Transaksi Anda</h2>

                                    <p class="mt-2 text-gray-500 tracking-wide">Upload Bukti Transaksi Anda Dalam
                                        Format
                                        jpg, png </p>
                                    <p class="mt-2 text-gray-500 tracking-wide">
                                        Kirim pembaaran anda ke
                                    <table>
                                        <tr>
                                            <td>Bank :</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                No. Rek :</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Nama</td>
                                        </tr>
                                    </table>
                                    </p>

                                    <input id="dropzone-file" name='foto' type="file" class="text" />

                                </label>
                            </div>
                            {{-- <div
                                class="flex items-center bg-white pl-4 rounded border border-gray-200 dark:border-gray-700">
                                <input id="metode-2" checked type="checkbox" value="COD" name="metode"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="bordered-checkbox-2"
                                    class="py-4 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">COD</label>
                            </div> --}}
                        </section>
                    </div>
                </form>

            </div>
            <x-jet-button class="bg-red-500 hover:bg-red-600" type="button" id="pay-button"
                class="submit-button px-4 py-3 rounded-full focus:ring focus:outline-none w-full text-xl font-semibold transition-colors">
                Bayar
            </x-jet-button>
        </div>
    </div>
    <script>
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener("click", function() {
            $("#payment-form").submit();
        })
    </script>
</x-guest-layout>
