<div>
    <section>
        @include('sweetalert::alert')
        <div class="grid grid-cols-3 gap-4 px-5 py-12 mx-auto lg:px-20 space-y-5">
            @foreach ($promo as $promo)
                <div
                    class="flex flex-wrap items-end justify-start w-full  duration-500 ease-in-out transform bg-white border-2 hover:border-4 border-indigo-200 hover:border-indigo-600 rounded-lg shadow-md hover:shadow-2xl transition-transform hover:scale-95 group wow slideInLeft" data-wow-delay="500ms">
                    <div class="w-full  ">
                        <div class="relative flex flex-col h-full  px-4 text-center md:text-left">
                            <h2
                                class="mb-4 text-2xl xl:text-2xl md:text-xl font-bold tracking-widest text-indigo-900 uppercase title-font">
                                Kode Promo : {{ $promo->kode_promo }}
                            </h2>

                            <p
                                class="flex items-center mb-2 text-lg font-normal tracking-wide text-indigo-800 justify-center md:justify-start">
                                {{ $promo->deskripsi }}
                            </p>
                        </div>
                    </div>
                    <div class="w-full lg:ml-auto">
                        <div class="relative flex flex-col h-full p-8">
                            <h1
                                class="flex items-end mx-auto text-5xl lg:text-5xl sm:text-4xl font-black leading-none text-indigo-800 ">
                                @if ($promo->promo_nominal != null)
                                    Rp. {{ number_format($promo->promo_nominal, 0, 2) }}<span class="text-lg">/</span>
                                @elseif($promo->promo_persen != null)
                                    {{ $promo->promo_persen }}<span class="text-lg">%</span>
                                @endif
                            </h1>
                            <button
                                class="w-full px-4 py-2 mx-auto mt-3 text-indigo-800 border border-indigo-700 rounded-full text-md hover:bg-indigo-700 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 focus:border-gray-700 focus:bg-indigo-800 hover:text-gray-200">
                                Tanggal Kadaluarsa : {{ $promo->tgl_kadaluarsa }}
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </section>
    <div class="px-4 py-8 mx-auto divide">
        <div class="w-full flex flex-col justify-center text-center text-indigo-500">
            <h1 class="font-semibold text-2xl capitalize underline">Vouhcer</h1>
            <p>Klaim Sekarang</p>
        </div>
        <div class="grid max-w-md ">
            @foreach ($voucher as $item)
                <div
                    class="flex flex-wrap items-end justify-start w-full  duration-500 ease-in-out transform bg-white border-2 hover:border-4 border-indigo-200 hover:border-indigo-600 rounded-lg shadow-md hover:shadow-2xl transition-transform hover:scale-95 group wow fadeInLeft" data-wow-delay="1s" >
                    <div class="w-full  ">
                        <div class="relative flex flex-col h-full  px-4 text-center md:text-left">
                            <h2
                                class="mb-4 text-2xl xl:text-2xl md:text-xl font-bold tracking-widest text-indigo-900 uppercase title-font">
                                Kode Promo : {{ $item->kode_voucher }}
                            </h2>

                            <p
                                class="flex items-center mb-2 text-lg font-normal tracking-wide text-indigo-800 justify-center md:justify-start">
                                {{ $item->deskripsi }}
                            </p>
                        </div>
                    </div>
                    <div class="w-full lg:ml-auto">
                        <div class="relative flex flex-col h-full p-8">
                            <h1
                                class="flex items-end mx-auto text-5xl lg:text-5xl sm:text-4xl font-black leading-none text-indigo-800 ">

                                {{ number_format($item->diskon, 0, 2) }}<span class="text-lg">%</span>

                            </h1>
                            <button
                                class="w-full px-4 py-2 mx-auto mt-3 text-indigo-800 border border-indigo-700 rounded-full text-md hover:bg-indigo-700 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 focus:border-gray-700 focus:bg-indigo-800 hover:text-gray-200"
                                wire:click="KlaimVoucher({{ $item->id }})">
                                Klaim Voucher
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</div>
