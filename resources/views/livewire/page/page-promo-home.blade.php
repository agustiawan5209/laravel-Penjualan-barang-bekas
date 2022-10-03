<div>
    <section>
        <div class="grid grid-cols-3 gap-4 px-5 py-12 mx-auto lg:px-20 space-y-5">
            @foreach ($promo as $promo)
                <div
                    class="flex flex-wrap items-end justify-start w-full  duration-500 ease-in-out transform bg-white border-2 hover:border-4 border-indigo-200 hover:border-indigo-600 rounded-lg shadow-md hover:shadow-2xl transition-transform hover:scale-95 group">
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
                              Tanggal  Kadaluarsa : {{$promo->tgl_kadaluarsa}}
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </section>
    {{-- <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
        <div
            class="grid max-w-md lg:max-w-screen-lg lg:grid-cols-2 xl:max-w-screen-lg mx-auto divide-y-4 md:divide-x-4 md:divide-y-0">
            <div
                class="flex flex-col justify-between px-8 sm:px-12 py-4 transition-shadow duration-300 bg-white rounded shadow-2xl">
                <div class="text-center">
                    <div class="mr-1 text-2xl sm:text-3xl font-bold mt-8 mb-4">Free Plan</div>
                    <div class="text-base sm:text-lg font-semibold sm:mx-8">For early stage startups and applications
                    </div>
                    <button
                        class="mx-auto my-8 w-full sm:px-24 py-2 text-base sm:text-lg text-indigo-700 shadow-xl bg-white rounded-xl hover:bg-indigo-50 border focus:outline-none duration-100 ease-in-out font-semibold">Start
                        for Free</button>
                </div>
                <div class="space-y-3 text-left mx-4">
                    <div class="text-gray-700 inline-flex items-center text-sm sm:text-lg font-medium">
                        <img src="https://cdn-icons-png.flaticon.com/128/1828/1828640.png" alt="cdn-icons-png"
                            class="sm:w-6 w-4 mr-4">
                        Up to 1000 free image uses per month
                    </div>
                    <div class="text-gray-700 inline-flex items-center text-sm sm:text-lg font-medium">
                        <img src="https://cdn-icons-png.flaticon.com/128/1828/1828640.png" alt="cdn-icons-png"
                            class="sm:w-6 w-4 mr-4">
                        Access to the entire library
                    </div>
                    <div class="text-gray-700 inline-flex items-center text-sm sm:text-lg font-medium">
                        <img src="https://cdn-icons-png.flaticon.com/128/1828/1828640.png" alt="cdn-icons-png"
                            class="sm:w-6 w-4 mr-4">
                        Advanced search features
                    </div>
                    <div class="text-gray-700 inline-flex items-center text-sm sm:text-lg font-medium">
                        <img src="https://cdn-icons-png.flaticon.com/128/1828/1828640.png" alt="cdn-icons-png"
                            class="sm:w-6 w-4 mr-4">
                        No attribution required
                    </div>
                    <div class="text-gray-700 inline-flex items-center text-sm sm:text-lg font-medium">
                        <img src="https://cdn-icons-png.flaticon.com/128/1828/1828640.png" alt="cdn-icons-png"
                            class="sm:w-6 w-4 mr-4">
                        Up to 1000 free image uses per month
                    </div>
                    <div class="text-gray-700 inline-flex items-center text-sm sm:text-lg font-medium">
                        <img src="https://cdn-icons-png.flaticon.com/128/1828/1828640.png" alt="cdn-icons-png"
                            class="sm:w-6 w-4 mr-4">
                        Access to the entire library
                    </div>
                </div>
                <small class="text-base sm:text-lg font-bold my-8">Free up to 3 months only</small>
            </div>
            <div
                class="flex flex-col justify-between px-8 sm:px-12 py-4 transition-shadow duration-300 bg-white rounded shadow-2xl">
                <div class="text-center">
                    <div class="mr-1 text-2xl sm:text-3xl font-bold mt-8 mb-4">Premium Plan</div>
                    <div class="text-base sm:text-lg font-semibold sm:mx-8">Flexible options for larger scale content
                        needs.</div>
                    <div class="py-4 px-8 mt-8 text-lg sm:text-xl font-medium border-dashed border-2 rounded-xl">
                        $0.39-$0.69 per
                        image use</div>
                    <button
                        class="mx-auto my-8 w-full sm:px-20 py-2 text-base sm:text-lg text-white shadow-xl bg-indigo-600 rounded-xl hover:bg-indigo-800 border focus:outline-none duration-100 ease-in-out font-semibold">Request
                        Premium</button>
                </div>
                <div class="space-y-3 text-left mx-4">
                    <div class="text-gray-700 inline-flex items-center text-sm sm:text-lg font-medium">
                        <img src="https://cdn-icons-png.flaticon.com/128/1828/1828640.png" alt="cdn-icons-png"
                            class="sm:w-6 w-4 mr-4">
                        Unlimited access to the entire library
                    </div>
                    <div class="text-gray-700 inline-flex items-center text-sm sm:text-lg font-medium">
                        <img src="https://cdn-icons-png.flaticon.com/128/1828/1828640.png" alt="cdn-icons-png"
                            class="sm:w-6 w-4 mr-4">
                        Custom collections
                    </div>
                    <div class="text-gray-700 inline-flex items-center text-sm sm:text-lg font-medium">
                        <img src="https://cdn-icons-png.flaticon.com/128/1828/1828640.png" alt="cdn-icons-png"
                            class="sm:w-6 w-4 mr-4">
                        No attribution required
                    </div>
                    <div class="text-gray-700 inline-flex items-center text-sm sm:text-lg font-medium">
                        <img src="https://cdn-icons-png.flaticon.com/128/1828/1828640.png" alt="cdn-icons-png"
                            class="sm:w-6 w-4 mr-4">
                        Custom collections
                    </div>
                    <div class="text-gray-700 inline-flex items-center text-sm sm:text-lg font-medium">
                        <img src="https://cdn-icons-png.flaticon.com/128/1828/1828640.png" alt="cdn-icons-png"
                            class="sm:w-6 w-4 mr-4">
                        Unlimited API calls
                    </div>
                    <div class="text-gray-700 inline-flex items-center text-sm sm:text-lg font-medium">
                        <img src="https://cdn-icons-png.flaticon.com/128/1828/1828640.png" alt="cdn-icons-png"
                            class="sm:w-6 w-4 mr-4">
                        No attribution required
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</div>
