<div class="w-full h-screen">
    <div class="flex h-full ">
        <div class="main flex-1 flex flex-col bg-white rounded-md">
            <div class="hidden lg:block heading flex-2">
                <h1 class="text-3xl bg- text-gray-700 mb-4">--</h1>
            </div>

            <div class="flex-1 flex h-full">
                <div class="sidebar hidden lg:flex w-1/3 flex-2 flex-col pr-6">
                    <div class="search flex-2 pb-6 px-2">
                        <input type="text" wire:model='search'
                            class="outline-none py-2 block w-full bg-transparent border-b-2 border-gray-200"
                            placeholder="Search">
                    </div>
                    <div class="flex-1 h-full overflow-auto px-2 border">
                        @foreach ($chat_id as $item)
                        <div class="entry cursor-pointer transform hover:scale-105 duration-300 transition-transform bg-white mb-4 rounded p-4 flex shadow-md"
                            wire:click='selectChat({{$item->id}})'>
                            <div class="flex-2">
                                @if ($item->user->profile_photo != null)
                                <div class="w-12 h-12 relative">
                                    <img class="w-12 h-12 rounded-full mx-auto"
                                        src="{{asset('storage/profile-photos/'.$item->user->profile_photo)}}"
                                        alt="chat-user" />
                                    <span
                                        class="absolute w-4 h-4 bg-green-400 rounded-full right-0 bottom-0 border-2 border-white"></span>
                                </div>
                                @else
                                <div class="w-12 h-12 relative">
                                    <div class="w-12 h-12 rounded-full mx-auto bg-green-300">
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="flex-1 px-2">
                                <div class="truncate w-32"><span class="text-gray-800 font-bold">{{$item->user->name}}</span>
                                </div>
                            </div>
                            {{-- <div class="flex-2 text-right">
                                <div><small class="text-gray-500">15 April</small></div>
                                <div>
                                    <small
                                        class="text-xs bg-red-500 text-white rounded-full h-6 w-6 leading-6 text-center inline-block">
                                        23
                                    </small>
                                </div>
                            </div> --}}
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="chat-area flex-1 flex flex-col border">
                    <div class="flex-3">
                        <h2 class="text-xl py-1 mb-8 border-b-2 border-gray-200">Chatting Dengan <b>{{$nama_chat}}</b>
                        </h2>
                    </div>
                    <div class="messages flex-1 overflow-auto ">
                        @if ($pesan != null)
                        @foreach ($pesan as $item)
                        @if ($item->from != 1)
                        <div class="message mb-4 flex">
                            <div class="flex-1 px-2">
                                <div class="inline-block bg-gray-300 rounded-md p-2 px-6 text-gray-700">
                                    <span>
                                    {!! $item->body !!}
                                    </span>
                                </div>
                                <div class="pl-4"><small class="text-gray-500">{{$item->created_at}}</small></div>
                            </div>
                        </div>
                        @endif
                        @if ($item->from == 1)
                        <div class="message me mb-4 flex text-right">
                            <div class="flex-1 px-2">
                                <div class="inline-block bg-blue-600 rounded-md p-2 px-6 text-white">
                                    <span>
                                    {!! $item->body !!}
                                    </span>
                                </div>
                                <div class="pr-4"><small class="text-gray-500">{{$item->created_at}}</small></div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @else
                        Maaf Pesan Kosong
                        @endif

                    </div>
                    @if ($pesan != null)
                    <div class="flex-2 pt-4 pb-10">
                        <div class="write bg-white shadow flex rounded-lg">
                            <div class="flex-3 flex content-center items-center text-center p-4 pr-0">
                                <span class="block text-center text-gray-400 hover:text-gray-800">
                                    <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        stroke="currentColor" viewBox="0 0 24 24" class="h-6 w-6">
                                        <path
                                            d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>
                                    </svg>
                                </span>
                            </div>
                            <div class="flex-1">
                                <textarea wire:model="message" id="editor" rows="1"
                                    placeholder="Type a message..." autofocus>{{ $message }}</textarea>
                            </div>
                            <div class="flex-2 w-32 p-2 flex content-center items-center">
                                <div class="flex-1">
                                    <button class="bg-blue-400 w-10 h-10 rounded-full inline-block"
                                        wire:click='loadmessage'>
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
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
