<div class="px-4 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl">
    <div class="max-w-lg space-y-3 sm:mx-auto lg:max-w-xl">
        @foreach ($voucher as $item)
            <div
                class="flex justify-between items-center p-2 transition-colors duration-200 border shadow group hover:bg-primary-500 hover:border-primary-500 rounded-global">
                <span class="transition-colors duration-200 group-hover:text-black">{{$item->deskripsi}} / {{$item->diskon}}%</span>
                <div class="mr-2">
                    <span>
                        <x-jet-button>klaim</x-jet-button>
                    </span>
                </div>
            </div>
        @endforeach
    </div>
</div>
