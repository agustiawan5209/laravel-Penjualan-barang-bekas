<div class="py-10 clear-both pb-72 sm:pb-96 md:py-36 bg-indigo-500 dark:bg-gray-900">
    <div
        class="grid gap-2 bg-primary-500 text-white px-1 mx-3 rounded-lg grid-rows-2 md:grid-cols-2 md:grid-rows-none xl:mx-auto xl:max-w-5xl">
        <div class="p-7 md:flex md:flex-col md:justify-center md:py-8 lg:py-20 lg:pl-20">
            <h1 class="text-3xl font-black sm:text-4xl text-white">Masukkan Kode Promo</h1>
            <p class="tracking-tight mt-2 text-lg leading-6 text-white">
            <form action="{{route('masukan-kode-promo')}}" method="POST">
                @csrf
                <x-jet-input name="kode_promo" type='text' placeholder="Masukkan Kode Promo"/>
                <x-jet-button type='submit'>Cek Kode Promo</x-jet-button>
            </form>
            </p>
        </div>
        <div class="relative "><img alt="No alt"
                src="https://res.cloudinary.com/dpatgkgqs/image/upload/v1639027081/mobile_gmjdzu.png"
                class="absolute top-0 sm:w-72 sm:left-1/4 md:absolute md:left-auto md:-mt-36 md:right-11 lg:right-28 lg:-mt-32 lg:top-2.5 " />
        </div>
    </div>
</div>
