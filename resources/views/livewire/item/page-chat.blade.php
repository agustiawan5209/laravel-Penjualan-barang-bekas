<div class="container mx-auto">
    <div class="max-w-2xl border rounded">
        <div>
            <div class="w-full">
                <div class="relative flex items-center p-3 border-b border-gray-300">
                    <img class="object-cover w-10 h-10 rounded-full"
                        src="https://cdn.pixabay.com/photo/2018/01/15/07/51/woman-3083383__340.jpg" alt="username" />
                    <span class="block ml-2 font-bold text-gray-600">Admin</span>
                    </span>
                </div>
                <div class="relative w-full p-6 overflow-y-auto h-52 bg-gray-200">
                    <ul class="space-y-2">
                        @foreach ($pesan as $item)
                        @if ($item->from ==1 )
                        <li class="flex justify-start">
                            <div class="relative max-w-xl px-4 py-2 text-gray-700 rounded shadow">
                                <span class="block">
                                    {{$item->body}}
                                </span>
                            </div>
                        </li>
                        @endif
                        @if ($item->from !=1 )
                        <li class="flex justify-end">
                            <div class="relative max-w-xl px-4 py-2 text-gray-700 bg-gray-100 rounded shadow">
                                <span class="block">
                                    {{$item->body}}
                                </span>
                            </div>
                        </li>
                        @endif
                        @endforeach
                    </ul>

                </div>

                <div class="flex items-center justify-between w-full p-3 border-t border-gray-300">

                    <input type="text" placeholder="Message" wire:model='body'
                        class="block w-full py-2 pl-4 mx-3 bg-gray-100 rounded-full outline-none focus:text-gray-700"
                        name="message" required />
                    <button type="submit" wire:click='load()'>
                        <svg class="w-5 h-5 text-gray-500 origin-center transform rotate-90"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path
                                d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: ['|'],

            })
            .catch(error => {
                console.error(error);
            });
    </script>
</div>
