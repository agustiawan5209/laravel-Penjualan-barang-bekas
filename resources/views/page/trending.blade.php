<div class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
        <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-8 md:mb-12">Produk Terbaru</h2>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 md:gap-6">
           @foreach ($barang_terbaru as $item)
             <div class=""><a href="{{ route('Produk-list', ['id' => $item->id, 'name' => $item->nama_produk]) }}"
                     class="group h-96 flex items-end bg-gray-100 overflow-hidden shadow-lg relative p-4 rounded-global "><img
                         alt="No alt"
                         src="{{asset('upload/'. $item->foto_produk)}}"
                         class="w-full h-full object-cover object-center absolute inset-0 group-hover:scale-110 transition duration-200 " />
                     <div class="w-full flex flex-col bg-white text-center relative p-4 rounded-global "><span
                             class="text-gray-500">{{$item->category->kategory}}</span><span
                             class="text-gray-800 text-lg lg:text-xl font-bold">{{$item->nama_produk}}</span></div>
                 </a></div>
           @endforeach
        </div>
    </div>
</div>
