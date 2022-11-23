<div class="bg-white py-6 sm:py-8 lg:py-12">
    @include('sweetalert::alert')
    @if ($foto_produk == null && $nama_produk == null && $harga == null && $deskripsi == null && $categories == null)
        {{-- Detail Produk --}}
        Maaf Barang Belum Tersedia
    @else
        <div class="max-w-screen-lg px-4 md:px-8 mx-auto">

            <div class="grid md:grid-cols-2 gap-8 wow fadeIn">
                <div class="space-y-4">
                    <div class="bg-gray-100 rounded-lg overflow-hidden relative"><img alt="No alt"
                            src="{{ asset('upload/' . $foto_produk) }}"
                            class="w-full h-full object-cover object-center " /><span
                            class="bg-red-500 text-white text-sm tracking-wider uppercase rounded-br-lg absolute left-0 top-0 px-3 py-1.5">sale</span>
                    </div>
                </div>
                <div class="md:py-8 wow fadeIn">
                    <div class="mb-2 md:mb-3"><span class="inline-block text-gray-500 mb-0.5">Barang Bekas</span>
                        <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold">{{ $nama_produk }}</h2>
                    </div>
                    <div class="flex items-center mb-6 md:mb-10">
                        <div class="flex gap-0.5 -ml-1"><span><svg class="w-6 h-6 text-yellow-400"
                                    xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-yellow-400"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg></span><span><svg class="w-6 h-6 text-yellow-400"
                                    xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-yellow-400"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg></span><span><svg class="w-6 h-6 text-yellow-400"
                                    xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-yellow-400"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg></span><span><svg class="w-6 h-6 text-yellow-400"
                                    xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-yellow-400"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg></span><span><svg class="w-6 h-6 text-gray-300" xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6 text-gray-300" viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg></span></div><span class="text-gray-500 text-sm ml-2">4.2</span><a href="#"
                            class="text-indigo-500 hover:text-indigo-600 active:text-indigo-700 text-sm font-semibold transition duration-100 ml-4">view
                            all 47 reviews</a>
                    </div>
                    <div class="w-full sm:w-auto flex justify-between border-t sm:border-none pt-4 sm:pt-0">
                        <div class="flex flex-col items-start gap-2">
                            <div class="w-20 h-12 flex border rounded overflow-hidden">
                                <input id="total_jumlah" wire:model='jumlah'
                                    class="w-full focus:ring ring-inset ring-indigo-300 outline-none transition duration-100 px-4 py-2"
                                    min="0" max="5" disabled />
                                <div class="flex flex-col border-l divide-y">
                                    <button id="plus" wire:click='Hitung({{ $itemID }})'
                                        class="w-6 flex justify-center items-center flex-1 bg-white hover:bg-gray-100 active:bg-gray-200 leading-none select-none transition duration-100 ">+</button>
                                    <button id="mines" wire:click='kurang({{ $itemID }})'
                                        class="w-6 flex justify-center items-center flex-1 bg-white hover:bg-gray-100 active:bg-gray-200 leading-none select-none transition duration-100 ">-</button>
                                </div>
                            </div>
                            <button id="Byolvd"
                                class="text-indigo-500 hover:text-indigo-600 active:text-indigo-700 text-sm font-semibold select-none transition duration-100 ">Delete</button>
                        </div>
                        <div class="pt-3 sm:pt-2 ml-4 md:ml-8 lg:ml-16">
                            <x-jet-input type="text" class="block text-gray-800 md:text-lg font-bold"
                                wire:model='sub_total' id='subTotal' disabled />
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="flex items-end gap-2"><span class="text-gray-800 text-xl md:text-2xl font-bold"> Rp.
                                {{ number_format($harga, 0, 2) }}</span><span
                                class="text-red-500 line-through mb-0.5">Rp. {{ number_format($diskon, 0, 2) }}</span>
                        </div><span class="text-gray-500 text-sm">{{ $categories }}</span>
                    </div>
                    <div class="flex items-center text-gray-500 gap-2 mb-6"><span><svg class="w-6 h-6"
                                xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                            </svg></span><span class="text-sm">2-4 day shipping</span></div>
                    <div class="flex gap-2.5">
                        <x-jet-button type="submit" wire:click='toCart()' class="">Masukkan
                            Ke Keranjang</x-jet-button>
                        <a href="#"
                            class="inline-block bg-gray-200 hover:bg-gray-300 focus-visible:ring ring-indigo-300 text-gray-500 active:text-gray-700 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-4 py-3">Beli
                        </a>
                    </div>
                    <div class="mt-10 md:mt-16 lg:mt-20">
                        <div class="text-gray-800 text-lg font-semibold mb-3">Description</div>
                        <p class="text-gray-500">{{ $deskripsi }}</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class=" bg-white py-6 sm:py-8 lg:py-12">
            <div class=" max-w-screen-xl px-4 md:px-8 mx-auto">
                <div class=" grid sm:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12">
                    {{-- <div class=" ">
                        <div class=" border rounded-lg p-4">
                            <h2 class=" text-gray-800 text-lg lg:text-xl font-bold mb-3">Customer Reviews</h2>
                            <div class=" flex items-center gap-2 mb-0.5">
                                <div class=" flex gap-0.5 -ml-1"><span><svg class="w-6 h-6 text-yellow-400"
                                            xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-yellow-400"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg></span><span><svg class="w-6 h-6 text-yellow-400"
                                            xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-yellow-400"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg></span><span><svg class="w-6 h-6 text-yellow-400"
                                            xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-yellow-400"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg></span><span><svg class="w-6 h-6 text-yellow-400"
                                            xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-yellow-400"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg></span><span><svg class="w-6 h-6 text-gray-300"
                                            xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-300"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg></span></div><span class=" text-sm font-semibold">4/5</span>
                            </div><span class=" block text-gray-500 text-sm">Bases on 27 reviews</span>
                            <div class=" flex flex-col border-t border-b gap-2 py-5 my-5">
                                <div class=" flex items-center gap-3"><span
                                        class=" w-10 text-gray-600 text-sm text-right whitespace-nowrap">5 Star</span>
                                    <div class=" h-4 flex flex-1 bg-gray-200 overflow-hidden rounded">
                                        <div class=" w-3/4 h-full bg-yellow-400 rounded"></div>
                                    </div>
                                </div>
                                <div class=" flex items-center gap-3"><span
                                        class=" w-10 text-gray-600 text-sm text-right whitespace-nowrap">4 Star</span>
                                    <div class=" h-4 flex flex-1 bg-gray-200 overflow-hidden rounded">
                                        <div class=" w-1/2 h-full bg-yellow-400 rounded"></div>
                                    </div>
                                </div>
                                <div class=" flex items-center gap-3"><span
                                        class=" w-10 text-gray-600 text-sm text-right whitespace-nowrap">3 Star</span>
                                    <div class=" h-4 flex flex-1 bg-gray-200 overflow-hidden rounded">
                                        <div class=" w-1/6 h-full bg-yellow-400 rounded"></div>
                                    </div>
                                </div>
                                <div class=" flex items-center gap-3"><span
                                        class=" w-10 text-gray-600 text-sm text-right whitespace-nowrap">2 Star</span>
                                    <div class=" h-4 flex flex-1 bg-gray-200 overflow-hidden rounded">
                                        <div class=" w-1/4 h-full bg-yellow-400 rounded"></div>
                                    </div>
                                </div>
                                <div class=" flex items-center gap-3"><span
                                        class=" w-10 text-gray-600 text-sm text-right whitespace-nowrap">1 Star</span>
                                    <div class=" h-4 flex flex-1 bg-gray-200 overflow-hidden rounded">
                                        <div class=" w-1/12 h-full bg-yellow-400 rounded"></div>
                                    </div>
                                </div>
                            </div><a href="#"
                                class=" block bg-white hover:bg-gray-100 active:bg-gray-200 focus-visible:ring ring-indigo-300 border text-gray-500 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-4 md:px-8 py-2 md:py-3">Write
                                a review</a>
                        </div>
                    </div> --}}
                    <div class=" lg:col-span-3">
                        <div class=" border-b pb-4 md:pb-6">
                            <h2 class=" text-gray-800 text-lg lg:text-xl font-bold">Top Ulasan</h2>
                        </div>
                        <div class="grid grid-cols-1 gap-2 md:grid-cols-12">
                         @if (Auth::check())
                               <div class=" col-span-4 border-r border-gray-400">
                                   <div class="px-2 py-2 select-none">
                                       <form action="#" method="post" class="block">
                                           @csrf
                                           <div class="mb-4">
                                               <x-jet-label for='ket'>Email</x-jet-label>
                                               <x-jet-input type="text" wire:model="email" class="w-full border-gray-300 "/>
                                               @error('email')
                                                 <span class="text-sm text-red-500">{{$message}}</span>
                                               @enderror
                                           </div>
                                           <div class="mb-4">
                                               <x-jet-label for='ket'>Keterangan</x-jet-label>
                                               <textarea wire:model="ket" class="w-full border-gray-300 "></textarea>
                                               @error('ket')
                                                 <span class="text-sm text-red-500">{{$message}}</span>
                                               @enderror
                                           </div>

                                           <x-jet-button type='button' wire:click='createUlasan'>Kirim Ulasan</x-jet-button>
                                       </form>
                                   </div>
                               </div>
                         @endif
                            <div class=" divide-y col-span-8">
                                @if ($ulasan->count() > 0)
                                    @foreach ($ulasan as $ulasan)
                                        <div class=" flex flex-col gap-3 py-4 md:py-8">
                                            <div class=" "><span class=" block text-sm font-bold">{{$ulasan->email}}</span><span
                                                    class=" block text-gray-500 text-sm">{{$ulasan->created_at}}</span></div>
                                            <div class=" flex gap-0.5 -ml-1"><span><svg class="w-5 h-5 text-yellow-400"
                                                        xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-400"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                    </svg></span><span><svg class="w-5 h-5 text-yellow-400"
                                                        xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-400"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                    </svg></span><span><svg class="w-5 h-5 text-yellow-400"
                                                        xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-400"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                    </svg></span><span><svg class="w-5 h-5 text-yellow-400"
                                                        xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-400"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                    </svg></span><span><svg class="w-5 h-5 text-yellow-400"
                                                        xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-400"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                    </svg></span></div>
                                            <p class=" text-gray-600">{{$ulasan->ket}}.</p>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class=" border-t pt-6"><a href="#"
                                class=" flex items-center text-indigo-400 hover:text-indigo-500 active:text-indigo-600 font-semibold transition duration-100 gap-0.5">Read
                                all reviews</a></div>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>
