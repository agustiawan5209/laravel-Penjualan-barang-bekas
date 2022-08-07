<x-guest-layout>
    @if ($payment->payment_status == 1)
        <x-jet-button class=" bg-blue-500" id="pay-button">Bayar Sekarang</x-jet-button>
    @else
        Pembayaran berhasil
    @endif
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>

</x-guest-layout>
