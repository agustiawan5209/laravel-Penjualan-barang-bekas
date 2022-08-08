<x-guest-layout>
    <div class="flex w-full h-full justify-center items-center shadow-sm">
        <div class="w-full max-w-full px-3 mt-6 md:w-5/12 md:flex-none">
            <div
                class="relative flex flex-col h-full min-w-0 mb-6 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="p-6 px-4 pb-0 mb-0 border-b-0 rounded-t-2xl">
                    <div class="flex flex-wrap -mx-3">
                        <div class="max-w-full px-3 md:w-1/2 md:flex-none">
                            <h6 class="mb-0 dark:text-white">Pembelian Anda</h6>
                        </div>
                        <div class="flex items-center justify-end max-w-full px-3 dark:text-white/80 md:w-1/2 md:flex-none">
                            <i class="mr-2 far fa-calendar-alt" aria-hidden="true"></i>
                            <small>23 - 30 March 2020</small>
                        </div>
                    </div>
                </div>
                <div class="flex-auto p-4 pt-6">
                    <h6 class="mb-4 font-bold leading-tight uppercase dark:text-white text-size-xs text-slate-500">Barang Anda
                    </h6>
                    <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                        @foreach ($keranjang as $item)
                            <li
                                class="relative flex justify-between px-4 py-2 pl-0 mb-2 border-0 rounded-t-inherit text-size-inherit rounded-xl">
                                <div class="flex items-center">
                                    <button
                                        class="leading-pro ease-in text-size-xs bg-150 w-6.5 h-6.5 p-1.2 rounded-3.5xl tracking-tight-rem bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-red-600 border-transparent bg-transparent text-center align-middle font-bold uppercase text-red-600 transition-all hover:opacity-75"><i
                                            class="fas fa-arrow-down text-size-3xs" aria-hidden="true"></i></button>
                                    <div class="flex flex-col">
                                        <h6 class="mb-1 leading-normal dark:text-white text-size-sm text-slate-700">
                                            {{ $item->barang->nama_produk }}
                                        </h6>
                                        <span class="leading-tight text-size-xs dark:text-white/80">Harga :
                                            {{ $item->barang->harga }}, Jumlah: {{ $item->jumlah_barang }}</span>
                                    </div>
                                </div>
                                <div class="flex flex-col items-center justify-center">
                                    <p
                                        class="relative z-10 inline-block m-0 font-semibold leading-normal text-transparent bg-gradient-to-tl from-red-600 to-orange-600 text-size-sm bg-clip-text">
                                        Total : {{$item->sub_total}}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <h6 class="my-4 font-bold leading-tight uppercase dark:text-white text-size-xs text-slate-500">Sub Total : {{$item->sub_total}}
                    </h6>
                    <ul class="flex justify-between pl-0 mb-0 rounded-lg">
                        <li><x-jet-button type='button' id="pay-button">Bayar</x-jet-button></li>
                        <li><x-jet-danger-button type="button">Batal</x-jet-danger-button></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('json-data') }}" method="POST" id='submit_json'>
        @csrf
        <input type="text" name="json" id="json_callback">
        <input type="text" name="snap_token" value="{{$snapToken}}">
    </form>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>
    <script>
        const payButton = document.querySelector('#pay-button');
        payButton.addEventListener('click', function(e) {
            e.preventDefault();
            swal({
                title: "Lanjutkan Pembayaran?",
                icon: "warning",
                buttons: [
                    'No, cancel it!',
                    'Yes, I am sure!'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {
                    // console.log({{ $snapToken }})
                    snap.pay('{{ $snapToken }}', {
                        // Optional
                        onSuccess: function(result) {
                            /* You may add your own js here, this is just example */
                            // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                            console.log(result)
                        },
                        // Optional
                        onPending: function(result) {
                            /* You may add your own js here, this is just example */
                            // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                            swal("Menunggu Pembayaran Anda");
                            Send_to_response(result)
                            console.log(result)
                        },
                        // Optional
                        onError: function(result) {
                            /* You may add your own js here, this is just example */
                            // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                            swal("Pembayaran Gagal");
                            console.log(result)
                        }
                    });
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            })
        });

        function Send_to_response(result) {
            var jsCall = document.getElementById('json_callback');
            jsCall.value = JSON.stringify(result);
            $('#submit_json').submit();
            console.log(jsCall)
        }
    </script>

</x-guest-layout>
