<div class="w-full h-screen">
    <div class="flex h-full ">
        <div class="main flex-1 flex flex-col bg-white rounded-md">
            <div class="hidden lg:block heading flex-2">
                <h1 class="text-3xl bg- text-gray-700 mb-4">--</h1>
            </div>

            <div class="flex-1 flex h-full">
                <div class="chat-area flex-1 flex flex-col border">
                    <div class="flex-3">
                        <h2 class="text-xl py-1 mb-8 border-b-2 border-gray-200">Chatting Dengan
                            <b>{{ $nama_chat }}</b>
                        </h2>
                    </div>
                    <div class="messages flex-1 overflow-auto w-full ">
                        @if ($pesan != null)
                            @foreach ($pesan as $item)
                                @if ($item->from != 1)
                                    <div class="message mb-4 flex flex-col">
                                        <div class="flex items-center  px-2">
                                            <div class="inline-block bg-gray-300 rounded-md p-2 px-6 text-gray-700">
                                                <span>
                                                    {!! $item->body !!}
                                                </span>

                                            </div>
                                            <span>
                                                @if ($item->status == '1')
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                @endif
                                            </span>
                                        </div>
                                        <div class="pl-4"><small class="text-gray-500">{{ $item->created_at }}</small>
                                        </div>
                                    </div>
                                @endif
                                @if ($item->from == 1)
                                    <div class="message me mb-4 flex flex-col text-right">
                                        <div class="flex items-center justify-end  px-2">
                                            <span>
                                                @if ($item->status == '1')
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                @endif
                                            </span>
                                            <div class="inline-block bg-blue-500 rounded-md p-2 px-6 text-gray-700">
                                                <span>
                                                    {!! $item->body !!}
                                                </span>

                                            </div>

                                        </div>
                                        <div class="pr-4"><small
                                                class="text-gray-500">{{ $item->created_at }}</small></div>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            Maaf Pesan Kosong
                        @endif

                    </div>
                    @if ($pesan != null)
                        <div class="w-full">
                            <div class="write bg-white shadow flex rounded-lg">
                                <div class="flex-1">
                                    <textarea wire:model="message" id="editor" rows="1" width='400' height="100"
                                        class="w-full block outline-none py-4 px-4 bg-transparent border border-r-2" placeholder="Type a message..."
                                        autofocus>{{ $message }}</textarea>
                                    @error('message')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex-2 w-32 flex content-center items-center">
                                    <button class="bg-blue-400 w-full h-full inline-block" wire:click='loadmessage'>
                                        <span class="inline-block align-text-bottom">
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                                class="w-4 h-4 text-white">
                                                <path d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
