<div class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
        <div class="flex justify-between items-end gap-4 mb-6">
            <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold">Best Selling Products</h2><a href="#"
                class="inline-block bg-white hover:bg-gray-100 active:bg-gray-200 focus-visible:ring ring-indigo-300 border text-gray-500 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-4 md:px-8 py-2 md:py-3">Show
                more</a>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-4 md:gap-x-6 gap-y-8">
            @foreach ($barang as $item)
                <div class=""><a href="#"
                        class="group h-80 block bg-gray-100 overflow-hidden relative mb-2 rounded-global lg:mb-3"><img
                            alt="No alt"
                            src="{{asset('upload/'. $item->foto_produk)}}"
                            class="w-full h-full object-cover object-center group-hover:scale-110 transition duration-200 " /><span
                            class="bg-red-500 text-white text-sm tracking-wider uppercase rounded-br-lg absolute left-0 top-0 px-3 py-1.5">sale</span></a>
                    <div class=""><a href="#"
                            class="text-gray-500 hover:gray-800 lg:text-lg transition duration-100 mb-1">{{$item->nama_produk}}</a>
                        <div class="flex items-end gap-2"><span
                                class="text-gray-800 lg:text-lg font-bold">Rp. {{number_format($item->harga,0,2)}}</span><span
                                class="text-red-500 line-through mb-0.5">Diskon</span></div>
                    </div>
                </div>
            @endforeach
            {{-- <div class=""><a href="#"
                    class="group h-80 block bg-gray-100 overflow-hidden relative mb-2 rounded-global lg:mb-3"><img
                        alt="No alt"
                        src="https://images.unsplash.com/photo-1485955900006-10f4d324d411?auto=format&amp;q=75&amp;fit=crop&amp;w=600"
                        class="w-full h-full object-cover object-center group-hover:scale-110 transition duration-200 " /></a>
                <div class=""><a href="#"
                        class="text-gray-500 hover:gray-800 lg:text-lg transition duration-100 mb-1">Fancy
                        Plant</a>
                    <div class="flex items-end gap-2"><span
                            class="text-gray-800 lg:text-lg font-bold">$9.00</span></div>
                </div>
            </div>
            <div class=""><a href="#"
                    class="group h-80 block bg-gray-100 overflow-hidden relative mb-2 rounded-global lg:mb-3"><img
                        alt="No alt"
                        src="https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?auto=format&amp;q=75&amp;fit=crop&amp;w=600"
                        class="w-full h-full object-cover object-center group-hover:scale-110 transition duration-200 " /></a>
                <div class=""><a href="#"
                        class="text-gray-500 hover:gray-800 lg:text-lg transition duration-100 mb-1">Elderly
                        Cam</a>
                    <div class="flex items-end gap-2"><span
                            class="text-gray-800 lg:text-lg font-bold">$45.00</span></div>
                </div>
            </div>
            <div class=""><a href="#"
                    class="group h-80 block bg-gray-100 overflow-hidden relative mb-2 rounded-global lg:mb-3"><img
                        alt="No alt"
                        src="https://images.unsplash.com/photo-1560343090-f0409e92791a?auto=format&amp;q=75&amp;fit=crop&amp;w=600"
                        class="w-full h-full object-cover object-center group-hover:scale-110 transition duration-200 " /></a>
                <div class=""><a href="#"
                        class="text-gray-500 hover:gray-800 lg:text-lg transition duration-100 mb-1">Shiny Shoe</a>
                    <div class="flex items-end gap-2"><span
                            class="text-gray-800 lg:text-lg font-bold">$29.00</span></div>
                </div>
            </div>
            <div class=""><a href="#"
                    class="group h-80 block bg-gray-100 overflow-hidden relative mb-2 rounded-global lg:mb-3"><img
                        alt="No alt"
                        src="https://images.unsplash.com/photo-1528476513691-07e6f563d97f?auto=format&amp;q=75&amp;fit=crop&amp;w=600"
                        class="w-full h-full object-cover object-center group-hover:scale-110 transition duration-200 " /></a>
                <div class=""><a href="#"
                        class="text-gray-500 hover:gray-800 lg:text-lg transition duration-100 mb-1">Spiky
                        Plant</a>
                    <div class="flex items-end gap-2"><span
                            class="text-gray-800 lg:text-lg font-bold">$4.00</span></div>
                </div>
            </div>
            <div class=""><a href="#"
                    class="group h-80 block bg-gray-100 overflow-hidden relative mb-2 rounded-global lg:mb-3"><img
                        alt="No alt"
                        src="https://images.unsplash.com/photo-1612033448550-9d6f9c17f07d?auto=format&amp;q=75&amp;fit=crop&amp;w=600"
                        class="w-full h-full object-cover object-center group-hover:scale-110 transition duration-200 " /></a>
                <div class=""><a href="#"
                        class="text-gray-500 hover:gray-800 lg:text-lg transition duration-100 mb-1">Wieldy
                        Film</a>
                    <div class="flex items-end gap-2"><span
                            class="text-gray-800 lg:text-lg font-bold">$19.00</span></div>
                </div>
            </div>
            <div class=""><a href="#"
                    class="group h-80 block bg-gray-100 overflow-hidden relative mb-2 rounded-global lg:mb-3"><img
                        alt="No alt"
                        src="https://images.unsplash.com/photo-1579609598065-79f8e5bcfb70?auto=format&amp;q=75&amp;fit=crop&amp;w=600"
                        class="w-full h-full object-cover object-center group-hover:scale-110 transition duration-200 " /><span
                        class="bg-red-500 text-white text-sm tracking-wider uppercase rounded-br-lg absolute left-0 top-0 px-3 py-1.5">sale</span></a>
                <div class=""><a href="#"
                        class="text-gray-500 hover:gray-800 lg:text-lg transition duration-100 mb-1">Sturdy
                        Stand</a>
                    <div class="flex items-end gap-2"><span
                            class="text-gray-800 lg:text-lg font-bold">$12.00</span><span
                            class="text-red-500 line-through mb-0.5">$24.00</span></div>
                </div>
            </div>
            <div class=""><a href="#"
                    class="group h-80 block bg-gray-100 overflow-hidden relative mb-2 rounded-global lg:mb-3"><img
                        alt="No alt"
                        src="https://images.unsplash.com/photo-1619066045029-5c7e8537bd8c?auto=format&amp;q=75&amp;fit=crop&amp;w=600"
                        class="w-full h-full object-cover object-center group-hover:scale-110 transition duration-200 " /></a>
                <div class=""><a href="#"
                        class="text-gray-500 hover:gray-800 lg:text-lg transition duration-100 mb-1">Lazy
                        Bottle</a>
                    <div class="flex items-end gap-2"><span
                            class="text-gray-800 lg:text-lg font-bold">$9.00</span></div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
