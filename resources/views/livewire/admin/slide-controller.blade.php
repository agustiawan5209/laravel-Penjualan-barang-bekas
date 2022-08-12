<main>
    @if (session()->has('message'))
        <x-alert :message="session('message')"/>
    @endif
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" x-data="{ isUploading: false, progress: 0 }"
    x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false"
    x-on:livewire-upload-error="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
    @csrf
    <div class="mb-4">
        <label for="dropzone-file"
            class="mx-auto cursor-pointer flex w-full max-w-lg flex-col items-center rounded-xl border-2 border-dashed border-blue-400 bg-white p-6 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-500" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
            </svg>

            <h2 class="mt-4 text-xl font-medium text-gray-700 tracking-wide">Thumbnail File</h2>

            <p class="mt-2 text-gray-500 tracking-wide">Masukkan Thumbnail Anda</p>

            <input id="dropzone-file" wire:model='thumbnail' type="file" class="hidden" />
            </section>
            @if ($thumbnail)
                thumbnail Preview:
                <img src="{{ $thumbnail->temporaryUrl() }}">
            @endif
            @error('thumbnail')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
    </div>
    <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
            Nama Slide
        </label>
        <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
            wire:model='slide' id="text" type="text" placeholder="******************">
        @error('slide')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
            Deskripsi
        </label>
        <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
            wire:model='deskripsi' id="text" type="text" placeholder="******************">
        @error('deskripsi')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>
    <div class="flex items-center justify-between">
        <button wire:click='create'
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            type="button">
            Simpan
        </button>
    </div>
</form>
<livewire:page.slide>

</main>
