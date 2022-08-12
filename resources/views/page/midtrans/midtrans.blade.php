<x-guest-layout>
    <div class="flex w-full h-full justify-center items-center shadow-sm">
        <div class="h-screen grid grid-cols-3">
            <div class="lg:col-span-2 col-span-3 bg-indigo-50 space-y-8 px-12">
                <div class="mt-8 p-4 relative flex flex-col sm:flex-row sm:items-center bg-white shadow rounded-md">
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
                    <div
                        class="absolute sm:relative sm:top-auto sm:right-auto ml-auto right-4 top-4 text-gray-400 hover:text-gray-800 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                </div>
                <form id="payment-form" method="POST" action="{{ route('receive') }}" enctype="multipart/form-data">
                    <input type="hidden" name="sub_total" value="{{ $sub_total }}" required>
                    <div class="rounded-md">
                        @csrf
                        <section>
                            <h2 class="uppercase tracking-wide text-lg font-semibold text-gray-700 my-2">Shipping &
                                Billing Information</h2>
                            <fieldset class="mb-3 bg-white shadow-lg rounded text-gray-600">
                                <label class="flex border-b border-gray-200 h-12 py-3 items-center">
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
                                        placeholder="try@example.com" value="{{ Auth::user()->email }}" required/>
                                    @error('email')
                                        <span
                                            class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                            Invalid {{ $message }}
                                        </span>
                                    @enderror
                                </label>
                                <label class="flex border-b border-gray-200 h-12 py-3 items-center">
                                    <span class="text-right px-2">Alamat</span>
                                    <input name="alamat" class="focus:outline-none px-3" value="{{old('alamat')}}" placeholder="Alamat Lengkap"
                                        required/>
                                    @error('alamat')
                                        <span
                                            class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                            Invalid {{ $message }}
                                        </span>
                                    @enderror
                                </label>
                                <label class="flex border-b border-gray-200 h-12 py-3 items-center">
                                    <span class="text-right px-2">Kabupaten/Kota</span>
                                    <input name="kabupaten" class="focus:outline-none px-3" value="{{old('kabupaten')}}" placeholder="Kabupate/Kota"
                                        required/>
                                    @error('kabupaten')
                                        <span
                                            class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                            Invalid {{ $message }}
                                        </span>
                                    @enderror
                                </label>
                                <label class="inline-flex w-2/4 border-gray-200 py-3">
                                    <span class="text-right px-2">Kecamatan</span>
                                    <input name="kecamatan" class="focus:outline-none px-3" value="{{old('kecamatan')}}" placeholder="Kecamatan"
                                        required/>
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
                                    <input name="kode_pos" class="focus:outline-none px-3" value="{{old('kode_pos')}}" placeholder="90241" required>
                                    @error('kode_pos')
                                        <span
                                            class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                            Invalid {{ $message }}
                                        </span>
                                    @enderror
                                </label>
                                {{-- <label class="flex border-t border-gray-200 h-12 py-3 items-center select relative">
                                    <span class="text-right px-2">Country</span>
                                    <div id="country" class="focus:outline-none px-3 w-full flex items-center">
                                        <select name="country"
                                            class="border-none bg-transparent flex-1 cursor-pointer appearance-none focus:outline-none">
                                            <option value="AU">Australia</option>
                                            <option value="BE">Belgium</option>
                                            <option value="BR">Brazil</option>
                                            <option value="CA">Canada</option>
                                            <option value="CN">China</option>
                                            <option value="DK">Denmark</option>
                                            <option value="FI">Finland</option>
                                            <option value="FR">France</option>
                                            <option value="DE">Germany</option>
                                            <option value="HK">Hong Kong</option>
                                            <option value="IE">Ireland</option>
                                            <option value="IT">Italy</option>
                                            <option value="JP">Japan</option>
                                            <option value="LU">Luxembourg</option>
                                            <option value="MX">Mexico</option>
                                            <option value="NL">Netherlands</option>
                                            <option value="PL">Poland</option>
                                            <option value="PT">Portugal</option>
                                            <option value="SG">Singapore</option>
                                            <option value="ES">Spain</option>
                                            <option value="TN">Tunisia</option>
                                            <option value="GB">United Kingdom</option>
                                            <option value="US" selected="selected">United States</option>
                                        </select>
                                    </div>
                                </label> --}}
                            </fieldset>
                        </section>

                    </div>
                    <div class="rounded-md" x-data="{ Payment: false, }">
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
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-500"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>

                                    <h2 class="mt-4 text-xl font-medium text-gray-700 tracking-wide">Masukkan Bukti
                                        Transaksi Anda</h2>

                                    <p class="mt-2 text-gray-500 tracking-wide">Upload Bukti Transaksi Anda Dalam
                                        Format
                                        jpg, png </p>

                                    <input id="dropzone-file" name='foto' type="file" class="hidden" />
                                </label>
                            </div>
                            <div
                                class="flex items-center bg-white pl-4 rounded border border-gray-200 dark:border-gray-700">
                                <input id="metode-2" checked type="checkbox" value="COD" name="metode"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="bordered-checkbox-2"
                                    class="py-4 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">COD</label>
                            </div>
                        </section>
                    </div>
                </form>
                <x-jet-button type="button" id="pay-button"
                    class="submit-button px-4 py-3 rounded-full focus:ring focus:outline-none w-full text-xl font-semibold transition-colors">
                    Bayar
                </x-jet-button>
            </div>
            <div class="col-span-1 bg-white lg:block hidden">
                <h1 class="py-6 border-b-2 text-xl text-gray-600 px-8">Ringkasan Pesanan</h1>
                <ul class="py-6 border-b space-y-6 px-8">
                    @if (Auth::check() && $keranjang != null)
                        @foreach ($keranjang as $item)
                            <li class="grid grid-cols-6 gap-2 border-b-1">
                                <div class="col-span-1 self-center">
                                    <img src="{{ asset('upload/' . $item->barang->foto_produk) }}" alt="Product"
                                        class="rounded w-full">
                                </div>
                                <div class="flex flex-col col-span-3 pt-2">
                                    <span
                                        class="text-gray-600 text-md font-semi-bold">{{ $item->barang->produk }}</span>
                                    <span
                                        class="text-gray-400 text-sm inline-block pt-2">{{ $item->barang->category->kategory }}</span>
                                </div>
                                <div class="col-span-2 pt-3">
                                    <div class="flex items-center space-x-2 text-sm justify-between">
                                        <span class="text-gray-400">{{ $item->barang->diskon }}</span>
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
        </div>
    </div>
    <script>
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener("click", function() {
            $("#payment-form").submit();
        })
    </script>
</x-guest-layout>
