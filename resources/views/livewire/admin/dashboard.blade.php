<main>
    <!-- card1 -->

    <div class="flex flex-wrap">

        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p
                                    class="mb-0 font-sans font-semibold leading-normal uppercase dark:text-black dark:opacity-60 text-size-sm">
                                    Penjualan Bulan Ini</p>
                                <h5 class="mb-2 font-bold dark:text-black">Rp.
                                    {{ number_format($total_penjualan_bulan_ini, 0, 2) }}</h5>
                                {{-- <p class="mb-0 dark:text-black dark:opacity-60">
                                    <span class="font-bold leading-normal text-size-sm text-emerald-500">+55%</span>
                                    since yesterday
                                </p> --}}
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-blue-500 to-violet-500">
                                <i class="ni ni-money-coins text-size-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- card3 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p
                                    class="mb-0 font-sans font-semibold leading-normal uppercase dark:text-black dark:opacity-60 text-size-sm">
                                    Jumlah Pengguna</p>
                                <h5 class="mb-2 font-bold dark:text-black">{{$jumlah_user}}</h5>
                                {{-- <p class="mb-0 dark:text-black dark:opacity-60">
                                    <span class="font-bold leading-normal text-red-600 text-size-sm">-2%</span>
                                    since last quarter
                                </p> --}}
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-emerald-500 to-teal-400">
                                <i class="ni ni-paper-diploma text-size-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- card4 -->
        <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p
                                    class="mb-0 font-sans font-semibold leading-normal uppercase dark:text-black dark:opacity-60 text-size-sm">
                                    Penjualan Tahun Ini</p>
                                <h5 class="mb-2 font-bold dark:text-black">Rp. {{number_format($total_penjualan_tahun_ini,0,3)}}</h5>
                                {{-- <p class="mb-0 dark:text-black dark:opacity-60">
                                    <span class="font-bold leading-normal text-size-sm text-emerald-500">+5%</span>
                                    than last month
                                </p> --}}
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-orange-500 to-yellow-500">
                                <i class="ni ni-cart text-size-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-wrap mt-6 -mx-3">
        <div class="w-full max-w-full px-3 mt-0 ">
            <div
                class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                    <h6 class="capitalize dark:text-black">Penjualan Tahun Ini</h6>
                    <p class="mb-0 leading-normal dark:text-black dark:opacity-60 text-size-sm">
                        <i class="fa fa-arrow-up text-emerald-500" aria-hidden="true"></i>
                        {{date('Y')}}
                    </p>
                </div>
                <div class="flex-auto p-4">
                    <div>
                        <canvas id="chart-line" height="300" width="568"
                            style="display: block; box-sizing: border-box; height: 300px; width: 568.2px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="Penjualan" class="hidden" value="{{route('API-Data-Penjualan')}}">
    {{-- <script src="{{asset('js/charts.js')}}"></script> --}}

    <!-- plugin for charts  -->
    <script src="{{ asset('js/plugins/chartjs.min.js') }}" async></script>

</main>
