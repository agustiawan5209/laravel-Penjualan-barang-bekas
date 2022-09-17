<main>
    <!-- card1 -->
    <section class=" min-w-full flex">
        @foreach ($user->unreadNotifications as $Item => $notification )
            @if ($notification->data['type'] == 'User Regis')
                <div
                    class="mx-2  w-1/2  my-3 flex flex-row items-center justify-between bg-gray-50 shadow-lg p-3 text-sm leading-none font-medium rounded-xl whitespace-no-wrap">
                    <div class="inline-flex items-center text-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd" />
                        </svg>
                        {{ $notification->data['body'] }}
                    </div>
                    <div class="text-blue-700 cursor-pointer hover:text-blue-800">
                        <a wire:click="notify({{$user->id}}, '1')"
                            class="flex-shrink-0 inline-flex item-center justify-center border-l-2 border-t-2 border-blue-700 p-1 leading-none rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            @endif
        @endforeach
        @foreach ($payment->unreadNotifications as $Item => $notification )
            @if ($notification->data['type'] == 'payment')
            <div
            class="mx-2  w-sm my-3 flex flex-row items-center justify-between bg-gray-50 shadow-lg p-3 text-sm leading-none font-medium rounded-xl whitespace-no-wrap">
            <div class="inline-flex items-center text-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd" />
                </svg>
                {{ $notification->data['body'] }}
            </div>
            <div class="text-blue-700 cursor-pointer hover:text-blue-800">
                <a wire:click="notify({{$payment->id}}, '2')"
                    class="flex-shrink-0 inline-flex item-center justify-center border-l-2 border-t-2 border-blue-700 p-1 leading-none rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
            @endif
        @endforeach

    </section>
    <div class="flex flex-wrap">

        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p
                                    class="mb-0 font-sans font-semibold leading-normal uppercase dark:text-white dark:opacity-60 text-size-sm">
                                    Penjualan Bulan Ini</p>
                                <h5 class="mb-2 font-bold dark:text-white">Rp.
                                    {{ number_format($total_penjualan_bulan_ini, 0, 2) }}</h5>
                                {{-- <p class="mb-0 dark:text-white dark:opacity-60">
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

        <!-- card2 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p
                                    class="mb-0 font-sans font-semibold leading-normal uppercase dark:text-white dark:opacity-60 text-size-sm">
                                    Pengguna Hari Ini</p>
                                <h5 class="mb-2 font-bold dark:text-white">2,300</h5>
                                {{-- <p class="mb-0 dark:text-white dark:opacity-60">
                                    <span class="font-bold leading-normal text-size-sm text-emerald-500">+3%</span>
                                    since last week
                                </p> --}}
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-red-600 to-orange-600">
                                <i class="ni ni-world text-size-lg relative top-3.5 text-white"></i>
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
                                    class="mb-0 font-sans font-semibold leading-normal uppercase dark:text-white dark:opacity-60 text-size-sm">
                                    Jumlah Pengguna</p>
                                <h5 class="mb-2 font-bold dark:text-white">{{$jumlah_user}}</h5>
                                {{-- <p class="mb-0 dark:text-white dark:opacity-60">
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
                                    class="mb-0 font-sans font-semibold leading-normal uppercase dark:text-white dark:opacity-60 text-size-sm">
                                    Penjualan Tahun Ini</p>
                                <h5 class="mb-2 font-bold dark:text-white">Rp. {{number_format($total_penjualan_tahun_ini,0,3)}}</h5>
                                {{-- <p class="mb-0 dark:text-white dark:opacity-60">
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
                    <h6 class="capitalize dark:text-white">Penjualan Tahun Ini</h6>
                    <p class="mb-0 leading-normal dark:text-white dark:opacity-60 text-size-sm">
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
    <script src="{{asset('js/charts.js')}}"></script>
    {{-- <script>
        // chart 1

        if (document.querySelector("#chart-bars")) {

            var ctx = document.getElementById("chart-bars").getContext("2d");

            new Chart(ctx, {
                type: "bar",
                data: {
                    labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: "Sales",
                        tension: 0.4,
                        borderWidth: 0,
                        borderRadius: 4,
                        borderSkipped: false,
                        backgroundColor: "#fff",
                        data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
                        maxBarThickness: 6,
                    }, ],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        },
                    },
                    interaction: {
                        intersect: false,
                        mode: "index",
                    },
                    scales: {
                        y: {
                            grid: {
                                drawBorder: false,
                                display: false,
                                drawOnChartArea: false,
                                drawTicks: false,
                            },
                            ticks: {
                                suggestedMin: 0,
                                suggestedMax: 600,
                                beginAtZero: true,
                                padding: 15,
                                font: {
                                    size: 14,
                                    family: "Open Sans",
                                    style: "normal",
                                    lineHeight: 2,
                                },
                                color: "#fff",
                            },
                        },
                        x: {
                            grid: {
                                drawBorder: false,
                                display: false,
                                drawOnChartArea: false,
                                drawTicks: false,
                            },
                            ticks: {
                                display: false,
                            },
                        },
                    },
                },
            });
        }

        // chart 2

        if (document.querySelector("#chart-line")) {

            var ctx1 = document.getElementById("chart-line").getContext("2d");

            var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

            gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
            gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
            gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
            new Chart(ctx1, {
                type: "line",
                data: {
                    labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: "Penjualan Produk",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "#5e72e4",
                        backgroundColor: gradientStroke1,
                        borderWidth: 3,
                        fill: true,
                        data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                        maxBarThickness: 6

                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    },
                    scales: {
                        y: {
                            grid: {
                                drawBorder: false,
                                display: true,
                                drawOnChartArea: true,
                                drawTicks: false,
                                borderDash: [5, 5]
                            },
                            ticks: {
                                display: true,
                                padding: 10,
                                color: '#fbfbfb',
                                font: {
                                    size: 11,
                                    family: "Open Sans",
                                    style: 'normal',
                                    lineHeight: 2
                                },
                            }
                        },
                        x: {
                            grid: {
                                drawBorder: false,
                                display: false,
                                drawOnChartArea: false,
                                drawTicks: false,
                                borderDash: [5, 5]
                            },
                            ticks: {
                                display: true,
                                color: '#ccc',
                                padding: 20,
                                font: {
                                    size: 11,
                                    family: "Open Sans",
                                    style: 'normal',
                                    lineHeight: 2
                                },
                            }
                        },
                    },
                },
            });
        }
    </script> --}}
</main>
