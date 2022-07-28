<x-guest-layout>
    <body class="font-body antialiased text-[#000000] bg-[#fcfcfc] dark:text-[#ffffff] dark:bg-[#031022]">
        <div class="px-4 py-16 sm:px-6 lg:px-8">
          <div class="max-w-lg mx-auto sm:max-w-md">
            <h1 class="text-3xl font-bold text-center text-blue-500 sm:text-3xl">Selamat Datang!</h1>
            <x-jet-validation-errors class="mb-4 text-center mx-auto" />
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
            <form class="p-8 mt-6 mb-0 space-y-4 rounded-lg shadow-2xl dark:shadow-slate-800" action="{{route('register')}}" method="POST">
                @csrf
              <p class="text-lg font-medium">Daftar Akun Anda</p>
              <form class="flex flex-col gap-y-3">
                <div class=""><label class="text-sm font-medium">
                    <p class="">Username</p>
                  </label>
                  <div class="relative mt-1"><input placeholder="Enter Username" name="name" class="w-full p-3 pr-12 text-sm shadow-sm border border-gray-200 rounded-global dark:bg-slate-900 dark:border-gray-700" /><span class="absolute inset-y-0 inline-flex items-center right-4"><span><svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                        </svg></span></span></div>
                </div>
                <div class=""><label class="text-sm font-medium">
                    <p class="">Email</p>
                  </label>
                  <div class="relative mt-1"><input placeholder="Enter email" name="email" class="w-full p-3 pr-12 text-sm shadow-sm border border-gray-200 rounded-global dark:bg-slate-900 dark:border-gray-700" /><span class="absolute inset-y-0 inline-flex items-center right-4"><span><svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                        </svg></span></span></div>
                </div>
                <div class=""><label class="text-sm font-medium">
                    <p class="">Password</p>
                  </label>
                  <div class="relative mt-1"><input placeholder="Enter password" name="password" class="w-full p-3 pr-12 text-sm shadow-sm border border-gray-200 rounded-global dark:bg-slate-900 dark:border-gray-700" /><span class="absolute inset-y-0 inline-flex items-center right-4"><span><svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg></span></span></div>
                </div>
                <div class=""><label class="text-sm font-medium">
                    <p class="">Confirm Password</p>
                  </label>
                  <div class="relative mt-1"><input placeholder="Enter password" name="password_confirmation" class="w-full p-3 pr-12 text-sm shadow-sm border border-gray-200 rounded-global dark:bg-slate-900 dark:border-gray-700" /><span class="absolute inset-y-0 inline-flex items-center right-4"><span><svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg></span></span></div>
                </div>
                <button type="submit" class="block w-full px-5 py-3 text-sm font-medium text-white bg-blue-500 rounded-global mt-3 hover:bg-blue-700">Submit</button>
              </form>
              <div class="flex items-center gap-x-1.5 justify-center">
                <p class="text-sm text-center text-gray-500">No Account? </p><a href="{{route('login')}}" class="underline text-sm">Masuk</a>
              </div>
            </form>
          </div>
        </div>
        <!-- AlpineJS Library -->
        <script defer src="https://unpkg.com/alpinejs@3.9.0/dist/cdn.min.js"></script>
      </body>

</x-guest-layout>
