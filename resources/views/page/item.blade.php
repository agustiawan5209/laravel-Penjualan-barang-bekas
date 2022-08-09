<div class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
        <div class="flex justify-between items-end gap-4 mb-6">
            <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold">Best Selling Products</h2><a
                href="{{ route('page.penjualan') }}"
                class="inline-block bg-white hover:bg-gray-100 active:bg-gray-200 focus-visible:ring ring-indigo-300 border text-gray-500 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-4 md:px-8 py-2 md:py-3">Show
                more</a>
        </div>
        <div class="grid col-span-2 md:grid-cols-7 gap-4 w-full relative box-border p-0 m-0">
            <div class="col-span-1">
                <ul
                    class="w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    @foreach ($kategory as $item)
                        <li class="py-2 px-4 w-full border-b border-gray-200 dark:border-gray-600"><a
                                class="w-full h-full"
                                href="{{ route('Get-Kategory', ['Category' => $item->kategory, 'id' => $item->id]) }}">{{ $item->kategory }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div
                class=" col-span-1 md:col-span-6  grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-4 md:gap-x-6 gap-y-8">
                @if ($barang == null)
                    @foreach ($barang as $item)
                        <div class="">
                            <a href="{{ route('Produk-list', ['id' => $item->id, 'name' => $item->nama_produk]) }}"
                                class="group h-60 block bg-gray-100 overflow-hidden relative mb-2 rounded-global lg:mb-3"><img
                                    alt="No alt" src="{{ asset('upload/' . $item->foto_produk) }}"
                                    class="w-full h-full object-cover object-center group-hover:scale-110 transition duration-200 " /><span
                                    class="bg-red-500 text-white text-sm tracking-wider uppercase rounded-br-lg absolute left-0 top-0 px-3 py-1.5">{{ isset($item->diskon->diskon) ? 'Diskon ' . $item->diskon->diskon . '%' : '' }}</span></a>
                            <div class=""><a href="#"
                                    class="text-gray-500 hover:gray-800 lg:text-lg transition duration-100 mb-1">{{ $item->nama_produk }}</a>
                                <div class="flex items-end gap-2"><span class="text-gray-800 lg:text-lg font-bold">Rp.
                                        {{ number_format($item->harga, 0, 2) }}</span><span
                                        class="text-red-500 line-through mb-0.5"></span></div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="w-full text-center flex flex-wrap justify-center col-span-full">
                        <img class="sm:w-96 w-48" src="https://i.ibb.co/2M7rtLk/Remote1.png" />


                        <h1 class="text-center text-2xl sm:text-5xl py-10 font-medium whitespace-nowrap">Maaf Kosong
                        </h1>
                        <div
                            class="grid grid-cols-1 lg:grid-cols-2 sm:grid-cols-2 text-center mx-6 sm:mx-48 gap-x-5 gap-y-5 my-10">
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
