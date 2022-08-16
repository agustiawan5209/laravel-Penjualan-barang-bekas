<div class="w-full px-6 py-6 mx-auto" x-data="{active: 1,}">
    <!-- content -->

    <div
        class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 overflow-hidden break-words bg-white border-0 dark:bg-slate-850 dark:shadow-dark-xl shadow-3xl rounded-2xl bg-clip-border">
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 mt-4 sm:my-auto sm:mr-0 md:w-1/2 md:flex-none lg:w-4/12">
                <div class="relative ">
                    <ul class="relative flex flex-wrap p-1 list-none bg-gray-50 rounded-xl" nav-pills="" role="tablist">
                        <li class="z-30 flex-auto text-center" @click="active = 0" :class="active === 0 ? 'bg-white' : ''">
                            <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg bg-inherit text-slate-700" nav-link="" href="javascript:;" role="tab" aria-selected="true" active="">
                                <i class="ni ni-app"></i>
                                <span class="ml-2">COD</span>
                              </a>
                        </li>
                        <li class="z-30 flex-auto text-center">
                            <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg bg-inherit text-slate-700"  @click="active = 1" :class="active === 1 ? 'bg-white' : ''"
                                nav-link="" href="javascript:;" role="tab" aria-selected="false">
                                <i class="ni ni-email-83"></i>
                                <span class="ml-2">Transfer</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    {{-- Transfer --}}
    <section class="mt-5 w-full relative" x-show="active === 1">
        <div class="flex flex-wrap -mx-3">
            <div class="max-w-full px-3 lg:w-2/3 lg:flex-none bg-white rounded-lg shadow-md">
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <x-forms.table>
                            <thead class="align-bottom">
                                <tr>
                                    <x-forms.th>
                                        Pengguna</x-forms.th>
                                    <x-forms.th>
                                        Produk</x-forms.th>
                                    <x-forms.th>
                                        Status Pembayaran</x-forms.th>
                                    <x-forms.th>
                                        Detail</x-forms.th>
                                    <x-forms.th>
                                        Kirim</x-forms.th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksi as $item)
                                <tr>
                                    <x-forms.td>
                                        <div class="flex px-2 py-1">
                                            <div>
                                                <img src="{{ Auth::user()->profile_photo_url }}"
                                                    class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-in-out text-size-sm h-9 w-9 rounded-xl"
                                                    alt="user1">
                                            </div>
                                            <div class="flex flex-col justify-center">
                                                <h6 class="mb-0 leading-normal dark:text-white text-size-sm">
                                                    {{ $item->user->name }}</h6>
                                                <p
                                                    class="mb-0 leading-tight dark:text-white dark:opacity-80 text-size-xs text-slate-400">
                                                    {{ $item->user->email }}</p>
                                            </div>
                                        </div>
                                    </x-forms.td>
                                    <x-forms.td>
                                        <p
                                            class="mb-0 font-semibold leading-tight dark:text-white dark:opacity-80 text-size-xs">
                                            Produk</p>
                                    </x-forms.td>
                                    <x-forms.td>
                                        <span
                                            class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-3.6-em text-size-xs-em rounded-1.8 py-2.2-em inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                                            @if ($item->payment_status == 1)
                                            Pembayaran Belum Dilakukan
                                            @elseif ($item->payment_status == 2)
                                            Pembayaran Selesai
                                            @elseif ($item->payment_status == 3)
                                            Pembayaran Di Konfirmasi
                                            @endif
                                        </span>
                                        <p
                                            class="mb-0 font-semibold leading-tight dark:text-white dark:opacity-80 text-xs">
                                            {{ $item->payment_type }}</p>
                                    </x-forms.td>
                                    <x-forms.td>
                                        <a href="{{ asset('bukti/'.$item->pdf_url) }}" target="_blank" class="px-0">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                </path>
                                            </svg>
                                        </a>
                                    </x-forms.td>
                                    <x-forms.td>
                                        <span wire:click='OngkirBtn({{$item->transaksi_id}})'
                                            class="bg-gradient-to-tl from-blue-500 to-blue-400 px-3.6-em text-size-xs-em rounded-1.8 py-2.2-em inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white cursor-pointer">
                                            Buat Pengiriman
                                        </span>
                                    </x-forms.td>
                                </tr>
                                @endforeach
                            </tbody>
                        </x-forms.table>

                    </div>
                </div>
            </div>
            <div class="w-full max-w-full px-3 lg:w-1/3 lg:flex-none">
                <div
                    class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="p-4 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex flex-wrap -mx-3">
                            <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                                <h6 class="mb-0 dark:text-white">Transaksi Tertunda</h6>
                            </div>
                            <div class="flex-none w-1/2 max-w-full px-3 text-right">
                                <button
                                    class="inline-block px-8 py-2 mb-0 font-bold leading-normal text-center text-blue-500 align-middle transition-all ease-in bg-transparent border border-blue-500 border-solid rounded-lg shadow-none cursor-pointer text-size-xs bg-150 active:opacity-85 hover:-translate-y-px tracking-tight-rem bg-x-25 hover:opacity-75">View
                                    All</button>
                            </div>
                        </div>
                    </div>
                    <div class="flex-auto p-4 pb-0">
                        <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                            @foreach ($transaksi_tertunda as $item)
                            <li
                                class="relative flex justify-between px-4 py-2 pl-0 mb-2 border-0 rounded-t-inherit text-size-inherit rounded-xl">
                                <div class="flex flex-col">
                                    <h6
                                        class="mb-1 font-semibold leading-normal dark:text-white text-size-sm text-slate-700">
                                        {{$item->user->name}}</h6>
                                    <span
                                        class="leading-tight dark:text-white dark:opacity-80 text-size-xs">#MS-415646</span>
                                </div>
                                <div class="flex items-center leading-normal dark:text-white/80 text-size-sm">
                                    {{$item->total_price}}
                                    <button
                                        class="dark:text-white inline-block px-0 py-2.5 mb-0 ml-6 font-bold leading-normal text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer ease-in bg-150 text-size-sm active:opacity-85 hover:-translate-y-px tracking-tight-rem bg-x-25 text-slate-700"><i
                                            class="mr-1 fas fa-file-pdf text-size-lg" aria-hidden="true"></i>
                                        Detail</button>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 mt-6 md:w-7/12 md:flex-none">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="p-6 px-4 pb-0 mb-0 border-b-0 rounded-t-2xl">
                        <h6 class="mb-0 dark:text-white">Transaksi Belum Di Bayar</h6>
                    </div>
                    <div class="flex-auto p-4 pt-6">
                        <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                            <li
                                class="relative flex p-6 mb-2 border-0 rounded-t-inherit rounded-xl bg-gray-50 dark:bg-slate-850">
                                <div class="flex flex-col">
                                    <h6 class="mb-4 leading-normal dark:text-white text-size-sm">Oliver Liam</h6>
                                    <span class="mb-2 leading-tight text-size-xs dark:text-white/80">Company Name: <span
                                            class="font-semibold text-slate-700 dark:text-white sm:ml-2">Viking
                                            Burrito</span></span>
                                    <span class="mb-2 leading-tight text-size-xs dark:text-white/80">Email Address:
                                        <span
                                            class="font-semibold text-slate-700 dark:text-white sm:ml-2">oliver@burrito.com</span></span>
                                    <span class="leading-tight text-size-xs dark:text-white/80">VAT Number: <span
                                            class="font-semibold text-slate-700 dark:text-white sm:ml-2">FRB1235476</span></span>
                                </div>
                                <div class="ml-auto text-right">
                                    <a class="relative z-10 inline-block px-4 py-2.5 mb-0 font-bold text-center text-transparent align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-normal text-size-sm ease-in bg-150 bg-gradient-to-tl from-red-600 to-orange-600 hover:-translate-y-px active:opacity-85 bg-x-25 bg-clip-text"
                                        href="javascript:;"><i
                                            class="mr-2 far fa-trash-alt bg-150 bg-gradient-to-tl from-red-600 to-orange-600 bg-x-25 bg-clip-text"
                                            aria-hidden="true"></i>Delete</a>
                                    <a class="inline-block dark:text-white px-4 py-2.5 mb-0 font-bold text-center align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-normal text-size-sm ease-in bg-150 hover:-translate-y-px active:opacity-85 bg-x-25 text-slate-700"
                                        href="javascript:;"><i class="mr-2 fas fa-pencil-alt text-slate-700"
                                            aria-hidden="true"></i>Edit</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="w-full max-w-full px-3 mt-6 md:w-5/12 md:flex-none">
                <div
                    class="relative flex flex-col h-full min-w-0 mb-6 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="p-6 px-4 pb-0 mb-0 border-b-0 rounded-t-2xl">
                        <div class="flex flex-wrap -mx-3">
                            <div class="max-w-full px-3 md:w-1/2 md:flex-none">
                                <h6 class="mb-0 dark:text-white">Transaksi Terbaru</h6>
                            </div>
                            <div
                                class="flex items-center justify-end max-w-full px-3 dark:text-white/80 md:w-1/2 md:flex-none">
                                <i class="mr-2 far fa-calendar-alt" aria-hidden="true"></i>
                                <small>{{date('Y-m-d')}}</small>
                            </div>
                        </div>
                    </div>
                    <div class="flex-auto p-4 pt-6">
                        <h6 class="mb-4 font-bold leading-tight uppercase dark:text-white text-size-xs text-slate-500">
                            Newest</h6>
                        <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                            @foreach ($transaksi_terbaru as $item)
                            <li
                                class="relative flex justify-between px-4 py-2 pl-0 mb-2 border-0 rounded-t-inherit text-size-inherit rounded-xl">
                                <div class="flex items-center">
                                    <button
                                        class="leading-pro ease-in text-size-xs bg-150 w-6.5 h-6.5 p-1.2 rounded-3.5xl tracking-tight-rem bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-red-600 border-transparent bg-transparent text-center align-middle font-bold uppercase text-red-600 transition-all hover:opacity-75"><i
                                            class="fas fa-arrow-down text-size-3xs" aria-hidden="true"></i></button>
                                    <div class="flex flex-col">
                                        <h6 class="mb-1 leading-normal dark:text-white text-size-sm text-slate-700">
                                            {{$item->user->name}}
                                        </h6>
                                        <span
                                            class="leading-tight text-size-xs dark:text-white/80">{{$item->user->email}}
                                        </span>
                                    </div>
                                </div>
                                <div class="flex flex-col items-center justify-center">
                                    <p
                                        class="relative z-10 inline-block m-0 font-semibold leading-normal text-transparent bg-gradient-to-tl from-red-600 to-orange-600 text-size-sm bg-clip-text">
                                        {{$item->created_at}}</p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- COD --}}
    <section class="mt-5 w-full relative" x-show="active === 0">
        <div class="flex flex-wrap -mx-3 w-full" >
            <div class="w-full px-3 lg:flex-none bg-white rounded-lg shadow-md">
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <x-forms.table>
                            <thead class="align-bottom">
                                <tr>
                                    <x-forms.th>
                                        Pengguna</x-forms.th>
                                    <x-forms.th>
                                        Produk</x-forms.th>
                                    <x-forms.th>
                                        Status Pembayaran</x-forms.th>
                                    <x-forms.th>
                                        Detail</x-forms.th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($COD as $item)
                                <tr>
                                    <x-forms.td>
                                        <div class="flex px-2 py-1">
                                            <div>
                                                <img src="{{ Auth::user()->profile_photo_url }}"
                                                    class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-in-out text-size-sm h-9 w-9 rounded-xl"
                                                    alt="user1">
                                            </div>
                                            <div class="flex flex-col justify-center">
                                                <h6 class="mb-0 leading-normal dark:text-white text-size-sm">
                                                    {{ $item->user->name }}</h6>
                                                <p
                                                    class="mb-0 leading-tight dark:text-white dark:opacity-80 text-size-xs text-slate-400">
                                                    {{ $item->user->email }}</p>
                                            </div>
                                        </div>
                                    </x-forms.td>
                                    <x-forms.td>
                                        <p
                                            class="mb-0 font-semibold leading-tight dark:text-white dark:opacity-80 text-size-xs">
                                            Produk</p>
                                    </x-forms.td>
                                    <x-forms.td>
                                        <span
                                            class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-3.6-em text-size-xs-em rounded-1.8 py-2.2-em inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">{{
                                            $item->payment_status }}</span>
                                        <p
                                            class="mb-0 font-semibold leading-tight dark:text-white dark:opacity-80 text-xs">
                                            {{ $item->payment_type }}</p>
                                    </x-forms.td>
                                    <x-forms.td>
                                        <a href="{{ asset('bukti/'.$item->pdf_url) }}" class="px-0">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                </path>
                                            </svg>
                                        </a>
                                    </x-forms.td>
                                </tr>
                                @endforeach
                            </tbody>
                        </x-forms.table>

                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
