<div class="w-full px-5">
    <div class="flex flex-wrap items-center justify-between">
        <h1 class="text-xl sm:text-3xl font-bold text-gray-800 dark:text-gray-50">Proses Pengiriman</h1>
        <span>
            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-4 h-4 sm:h-6 sm:w-6 sm:-ml-8 text-gray-700 dark:text-gray-300 cursor-pointer hover:text-gray-800 dark:hover:text-gray-200"
                viewBox="0 0 20 20" fill="currentColor">
                <path
                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
            </svg>
        </span>
    </div>
    <div class="border-l-2 mt-10">
        @foreach ((object) $status as $item)
            <div
                class="transform transition cursor-pointer hover:-translate-y-2 ml-10 relative flex items-center pl-12 pr-2 sm:pl-0 sm:pr-0 px-3 py-2 text-white rounded mb-5 flex-col md:flex-row space-y-5 md:space-y-0">
                <div
                    class="w-8 h-8 bg-blue-200 dark:bg-gray-100 absolute -left-10 transform -translate-x-2/4 rounded-full z-10 mt-2 md:mt-0">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 mx-auto mt-1.5 text-white-600 dark:text-gray-700" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <div class="flex-auto -ml-12 sm:-ml-16 md:-ml-0">
                    <h3 class="text-lg font-bold -mt-5 md:-mt-0 text-gray-700 dark:text-gray-200">
                        {{ $item->ket }}<span class="font-medium text-white-600 dark:text-gray-100"></span></h3>
                    <small class="text-gray-500 dark:text-gray-300">Waktu Konfirmasi{{ $item->created_at }}</small> <br>
                    <small class="text-gray-500 dark:text-gray-300">ID Transaksi
                        :{{ $item->ongkir->transaksi_id }}</small>
                </div>
            </div>
        @endforeach
    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap');

    body {
        font-family: 'Lato', sans-serif;
    }
</style>
