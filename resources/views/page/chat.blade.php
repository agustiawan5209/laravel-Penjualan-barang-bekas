<form class="w-8/12">
    <label for="chat" class="sr-only">Your message</label>
    <div class="h-80 w-full bg-white max-w-full overflow-y-scroll">
        <div class="px-4 py-5 block">
            {{-- balon chat --}}
            <div class="w-full relative flex justify-start items-center  text-white ">
                <div class="max-w-max border-red rounded-lg bg-blue-500 px-10 py-1">
                    <span>Admin</span>
                </div>
            </div>
            <div class="w-full relative flex justify-end  text-gray-600">
                <div class="max-w-max border-red rounded-lg bg-green-500 px-10 py-1">
                    <span>Admin</span>
                </div>
            </div>
        </div>
    </div>
    <div class=" absolute bottom-0 flex items-center py-2 px-3 bg-gray-50 rounded-lg dark:bg-gray-700 w-8/12">
        <textarea id="chat" rows="1"
            class="  block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "
            placeholder="Your message..."></textarea>
        <button type="submit"
            class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
            <svg class="w-6 h-6 rotate-90" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z">
                </path>
            </svg>
        </button>
    </div>
</form>
