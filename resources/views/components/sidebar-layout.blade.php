<aside id="dekstop"
    class="fixed inset-y-0 flex-wrap items-center sm:block hidden  justify-between w-full p-0  antialiased transition-transform duration-200  bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 overflow-x-auto"
    aria-expanded="false">
    <div class="h-19">
        <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-black text-slate-400 xl:hidden"
            sidenav-close></i>
        <a class="block px-8 py-6 m-0 text-size-sm whitespace-nowrap dark:text-black text-slate-700"
            href="https://demos.creative-tim.com/argon-dashboard-tailwind/pages/dashboard.html" target="_blank">
            <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">{{ Auth::user()->name }}</span>
        </a>
    </div>

    <hr
        class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

    <div class="items-center block w-auto max-h-screen  grow basis-full">

        @can('Manage-Admin')
            <ul class="flex flex-col pl-0 mb-0">
                <li class="mt-0.5 w-full">
                    <a class="{{ request()->routeIs('dashboard') ? 'py-2.7 bg-blue-500/13  text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors' : ' py-2.7 text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors' }}"
                        href="{{ route('dashboard') }}">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 leading-normal text-blue-500 ni ni-tv-2 text-size-sm"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full" x-data="{ Master: false }">
                    <a class="{{ request()->routeIs('Admin.Barang') ? 'py-2.7 bg-blue-500/13  text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors' : ' py-2.7 text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors' }} relative"
                        href="#" x-on:click="Master = ! Master">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 leading-normal text-blue-500 ni ni-tv-2 text-size-sm"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Master Data</span>
                    </a>
                    <ul class=" list-none hover:list-disc bg-blue-500 text-white" x-show="Master" x-transition>
                        <li class="mt-0.5 w-full">
                            <a class=" {{ request()->routeIs('Admin.Barang') ? 'py-2.7 bg-blue-500/13  text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-white underline transition-colors' : ' py-2.7 text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors' }}"
                                href="{{ route('Admin.Barang') }}">
                                <div
                                    class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                    <i class="relative top-0 leading-normal text-white text-size-sm ni ni-app"></i>
                                </div>
                                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Pengelolaan data
                                    Barang</span>
                            </a>
                        </li>
                        <li class="mt-0.5 w-full">
                            <a class=" {{ request()->routeIs('Admin.Promo') ? 'py-2.7 bg-blue-500/13  text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-white underline transition-colors' : ' py-2.7 text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors' }}"
                                href="{{ route('Admin.Promo') }}">
                                <div
                                    class="mr-2 flex h-8  items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                    <svg class=" w-4 h-4 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                </div>
                                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Promo</span>
                            </a>
                        </li>
                        <li class="mt-0.5 w-full">
                            <a class=" {{ request()->routeIs('Admin.Voucher') ? 'py-2.7 bg-blue-500/13  text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-white underline transition-colors' : ' py-2.7 text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors' }}"
                                href="{{ route('Admin.Voucher') }}">
                                <div
                                    class="mr-2 flex h-8  items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                    <svg class=" w-4 h-4 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                </div>
                                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Voucher</span>
                            </a>
                        </li>
                        <li class="mt-0.5 w-full">
                            <a class=" {{ request()->routeIs('chat') ? 'py-2.7 bg-blue-500/13  text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-white underline transition-colors' : ' py-2.7 text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors' }}"
                                href="{{ route('chat') }}">
                                <div
                                    class="mr-2 flex h-8  items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                                    </svg>
                                </div>
                                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Pesan</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="mt-0.5 w-full">
                    <a class=" {{ request()->routeIs('Admin.Penjualan') ? 'py-2.7 bg-blue-500/13  text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-white underline transition-colors' : ' py-2.7 text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors' }}"
                        href="{{ route('Admin.Penjualan') }}">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 leading-normal text-emerald-500 text-size-sm ni ni-credit-card"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Penjualan</span>
                    </a>
                </li>



                <li class="mt-0.5 w-full">
                    <a class=" {{ request()->routeIs('Admin.Pengiriman-Barang') ? 'py-2.7 bg-blue-500/13  text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors' : ' py-2.7 text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors' }}"
                        href="{{ route('Admin.Pengiriman-Barang') }}">
                        <div
                            class="mr-2 flex h-8  items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <svg class=" w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0">
                                </path>
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Pengiriman</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class=" {{ request()->routeIs('Pembelian-Index') ? 'py-2.7 bg-blue-500/13  text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors' : ' py-2.7 text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors' }}"
                        href="{{ route('Pembelian-Index') }}">
                        <div
                            class="mr-2 flex h-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full h-full">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                              </svg>

                        </div>
                        <span class="ml-1 px-2 duration-300 opacity-100 pointer-events-none ease">Pembelian</span>
                        @if ($data['request'] > 0)
                        <span class="text-white text-xs rounded-xl p-1 bg-red-500">{{ $data['request'] }}</span>
                        @endif
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class=" {{ request()->routeIs('Admin.Pengembalian-barang') ? 'py-2.7 bg-blue-500/13  text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors' : ' py-2.7 text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors' }}"
                        href="{{ route('Admin.Pengembalian-barang') }}">
                        <div
                            class="mr-2 flex h-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <svg class="w-full h-full text-blue-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                                </path>
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Pengembalian barang</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class=" {{ request()->routeIs('laporan-Penjualan') ? 'py-2.7 bg-blue-500/13  text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors' : ' py-2.7 text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors' }}"
                        href="{{ route('laporan-Penjualan') }}">
                        <div
                            class="mr-2 flex h-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <svg class="w-full h-full text-blue-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                                </path>
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Laporan Penjualan</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class=" {{ route('Laporan.titipbarang') ? 'py-2.7 bg-blue-500/13  text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors' : ' py-2.7 text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors' }}"
                        href="{{ route('Laporan.titipbarang') }}">
                        <div
                            class="mr-2 flex h-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <svg class="w-full h-full text-blue-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                                </path>
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Laporan Penitipan Barang</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class=" {{ route('Laporan.Pembelian') ? 'py-2.7 bg-blue-500/13  text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors' : ' py-2.7 text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors' }}"
                        href="{{ route('Laporan.Pembelian') }}">
                        <div
                            class="mr-2 flex h-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <svg class="w-full h-full text-blue-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                                </path>
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Laporan Pembelian</span>
                    </a>
                </li>
                <li class="w-full mt-4">
                    <h6 class="pl-6 ml-2 font-bold leading-tight uppercase dark:text-black text-size-xs opacity-60">
                        Account pages</h6>
                </li>

                <li class="mt-0.5 w-full">
                    <form
                        class=" py-2.7 bg-blue-500/13  text-size-sm  my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors"
                        action="{{ route('logout') }}" method="POST">
                        @csrf
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 leading-normal text-slate-700 text-size-sm ni ni-single-02"></i>
                        </div>
                        <button type="submit" class="ml-1 duration-300 opacity-100 cursor-pointer ease">Logout</button>
                    </form>
                </li>
                <li class="mt-0.5 w-full">
                    <a class=" {{ request()->routeIs('Metode_pembayaran') ? 'py-2.7 bg-blue-500/13  text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors' : ' py-2.7 text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors' }}"
                        href="{{ route('Metode_pembayaran') }}">
                        <div
                            class="mr-2 flex h-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <svg class=" w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                                </path>
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Metode Pembayaran</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class=" {{ request()->routeIs('Admin.Slide') ? 'py-2.7 bg-blue-500/13  text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors' : ' py-2.7 text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors' }}"
                        href="{{ route('Admin.Slide') }}">
                        <div
                            class="mr-2 flex h-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <svg class=" w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                                </path>
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Slide Setting</span>
                    </a>
                </li>

            </ul>
        @endcan
        @can('Manage-Customer')
            <ul class="flex flex-col pl-0 mb-0">
                <li class="mt-0.5 w-full">
                    <a class=" {{ request()->routeIs('home') ? 'py-2.7 bg-blue-500/13  text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors' : ' py-2.7 text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors' }}"
                        href="{{ route('home') }}">
                        <div
                            class="mr-2 flex h-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Home</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class=" {{ request()->routeIs('User.pesanan') ? 'py-2.7 bg-blue-500/13  text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors' : ' py-2.7 text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors' }}"
                        href="{{ route('User.pesanan') }}">
                        <div
                            class="mr-2 flex h-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Pesanan</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class=" {{ request()->routeIs('User.Request') ? 'py-2.7 bg-blue-500/13  text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors' : ' py-2.7 text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors' }}"
                        href="{{ route('User.Request') }}">
                        <div
                            class="mr-2 flex h-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <svg class="w-full h-full text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                                </path>
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Request Barang</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class=" {{ request()->routeIs('User.LaporanRequest') ? 'py-2.7 bg-blue-500/13  text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors' : ' py-2.7 text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors' }}"
                        href="{{ route('User.LaporanRequest') }}">
                        <div
                            class="mr-2 flex h-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <svg class="w-full h-full text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                                </path>
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Laporan Titip Barang</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class=" {{ request()->routeIs('Admin.Pengembalian-barang') ? 'py-2.7 bg-blue-500/13  text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors' : ' py-2.7 text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors' }}"
                        href="{{ route('Admin.Pengembalian-barang') }}">
                        <div
                            class="mr-2 flex h-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <svg class="w-full h-full text-blue-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                                </path>
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Pengembalian barang</span>
                    </a>
                </li>
                <li class="w-full mt-4">
                    <h6 class="pl-6 ml-2 font-bold leading-tight uppercase dark:text-black text-size-xs opacity-60">
                        User Setting</h6>
                </li>

                <li class="mt-0.5 w-full">
                    <form
                        class=" py-2.7 bg-blue-500/13  text-size-sm  my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors"
                        action="{{ route('logout') }}" method="POST">
                        @csrf
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 leading-normal text-slate-700 text-size-sm ni ni-single-02"></i>
                        </div>
                        <button type="submit" class="ml-1 duration-300 opacity-100 cursor-pointer ease">Logout</button>
                    </form>
                </li>
                <li class="mt-0.5 w-full">
                    <a class=" {{ request()->routeIs('profile.show') ? 'py-2.7 bg-blue-500/13  text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors' : ' py-2.7 text-size-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors' }}"
                        href="{{ route('profile.show') }}">
                        <div
                            class="mr-2 flex h-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <svg class="w-full h-full text-gray-800" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Pengaturan</span>
                    </a>
                </li>

            </ul>
        @endcan
    </div>
</aside>
