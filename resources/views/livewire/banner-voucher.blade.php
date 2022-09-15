@if ($uservoucher->count() > 0)
    <div class="sm:px-4 md:px-10 lg:px-14">
        @foreach ($uservoucher as $item)
            @if ($item->status == 1)
                <div x-data="{{ json_encode(['show' => true, 'style' => 'success', 'message' => $item->voucher->deskripsi]) }}"
                    :class="{
                        'bg-blue-500': style == 'success',
                        'bg-red-700': style == 'danger',
                        'bg-gray-500': style !=
                            'success' && style != 'danger'
                    }"
                    style="display: none;" x-show="show && message" x-init="document.addEventListener('banner-message', event => {
                        style = event.detail.style;
                        message = event.detail.message;
                        show = true;
                    });" class="my-1 rounded-md">
                    <div class="max-w-screen-xl mx-auto py-2 px-3 sm:px-6 lg:px-8">
                        <div class="flex items-center justify-between flex-wrap">
                            <div class="w-0 flex-1 flex items-center justify-betwwen min-w-0">
                                <span class="flex p-2 rounded-lg"
                                    :class="{ 'bg-blue-600': style == 'success', 'bg-red-600': style == 'danger' }">
                                    <svg x-show="style == 'success'" class="h-5 w-5 text-white"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <svg x-show="style == 'danger'" class="h-5 w-5 text-white"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <svg x-show="style != 'success' && style != 'danger'" class="h-5 w-5 text-white"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </span>

                                <p class="ml-3 font-medium text-sm text-white truncate" x-text="message"></p> <span
                                    class="text-white font-bold"> &nbsp; /&nbsp;{{ $item->voucher->diskon }}%</span>
                            </div>

                            <div class="shrink-0 sm:ml-3 flex flex-wrap md:flex-nowrap items-center justify-around">
                                <span class="text-white text-sm mr-3">Tanggal Kadaluarsa : {{$item->tgl_kadaluarsa}} / Jam : {{$item->waktu}}</span>
                                {{-- <span class="text-white text-sm mr-3">Kadaluarsa {{ $carbon_date->diffInHours($item->waktu) }}</span> --}}

                                <button type="button"
                                    class="-mr-1 flex p-2 rounded-md focus:outline-white border border-white sm:-mr-2 transition text-white"
                                    :class="{
                                        'hover:bg-blue-600 focus:bg-blue-600': style ==
                                            'success',
                                        'hover:bg-red-600 focus:bg-red-600': style == 'danger'
                                    }"
                                    aria-label="Dismiss" wire:click='KlaimVoucher({{ $item->voucher->id }})'>
                                    Klaim
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

@endif
