
<form action="{{route('masukan-kode-promo')}}" method="POST" {!! $attributes->merge(['class' => 'grid grid-cols-6 grid-rows-2 md:grid-rows-1']) !!}>
    @csrf
    <input class=" row-start-1 col-span-full md:col-span-4 focus:shadow-primary-outline text-size-sm leading-5.6 ease block appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" name="kode_promo" type='text' placeholder="Masukkan Kode Promo"/>
    <x-jet-button class="mb-0 row-start-2 md:row-start-1 col-span-full px-1 py-1" type='submit'>Kode Promo</x-jet-button>
</form>
