<div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
    <div class="flex items-center md:ml-auto md:pr-4">
        <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease">
            <span
                class="text-size-sm ease leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                <i class="fas fa-search"></i>
            </span>
            <input type="text"
                class="pl-9 text-size-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-black bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow"
                placeholder="Type here..." />
        </div>
    </div>
    <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
        <!-- online builder btn  -->
        <!-- <li class="flex items-center">
        <a class="inline-block px-8 py-2 mb-0 mr-4 font-bold text-center text-blue-500 uppercase align-middle transition-all ease-in bg-transparent border border-blue-500 border-solid rounded-lg shadow-none cursor-pointer leading-pro text-size-xs hover:-translate-y-px active:shadow-xs hover:border-blue-500 active:bg-blue-500 active:hover:text-blue-500 hover:text-blue-500 tracking-tight-rem hover:bg-transparent hover:opacity-75 hover:shadow-none active:text-white active:hover:bg-transparent" target="_blank" href="https://www.creative-tim.com/builder/soft-ui?ref=navbar-dashboard&amp;_ga=2.76518741.1192788655.1647724933-1242940210.1644448053">Online Builder</a>
      </li> -->
        <li class="flex items-center">
            <a href="{{ route('profile.show') }}"
                class="block px-0 py-2 font-semibold text-white transition-all ease-nav-brand text-size-sm">
                <i class="fa fa-user sm:mr-1"></i>
                <span class="hidden sm:inline">Setting</span>
            </a>
        </li>
        <li class="flex items-center pl-4 xl:hidden">
            <a href="javascript:;" class="block p-0 text-white transition-all ease-nav-brand text-size-sm"
                sidenav-trigger>
                <div class="w-4.5 overflow-hidden">
                    <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                    <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                    <i class="ease relative block h-0.5 rounded-sm bg-white transition-all"></i>
                </div>
            </a>
        </li>
        <li class="flex items-center px-4">
            <a href="javascript:;" class="p-0 text-white transition-all text-size-sm ease-nav-brand">
                <i fixed-plugin-button-nav class="cursor-pointer fa fa-cog"></i>
                <!-- fixed-plugin-button-nav  -->
            </a>
        </li>

        <!-- notifications -->

        <li class="relative flex items-center pr-2" x-data='{notifChat : false}'>
            {{-- <p class="hidden transform-dropdown-show"></p>
             --}}
            <a href="#" x-on:click="notifChat = ! notifChat"
                class="block p-0 text-white transition-all text-size-sm ">

                @if ($countNotif > 0)
                <i class="cursor-pointer fa fa-bell text-red-500"></i>
                @else
                <i class="cursor-pointer fa fa-bell"></i>
                @endif
                {{ $countNotif }}
            </a>

            <ul x-show="notifChat" class="absolute -left-[18rem] top-8 w-96 bg-white rounded-xl z-50 px-4 shadow-md">
                <!-- add show class on dropdown open js -->
                <section class=" min-w-full">
                    @foreach ($user as $user)
                        @foreach ($user->unreadNotifications as $Item => $notification)
                            @if ($notification->data['type'] == 'User Regis')
                                <div
                                    class="mx-2  w-1/2  my-3 flex flex-row items-center justify-between bg-gray-50 shadow-lg p-3 text-sm leading-none font-medium rounded-xl whitespace-no-wrap">
                                    <div class="inline-flex items-center text-blue-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        {{ $notification->data['body'] }}
                                    </div>
                                    <div class="text-blue-700 cursor-pointer hover:text-blue-800">
                                        <a wire:click="notify({{ $user->id }}, '1')"
                                            class="flex-shrink-0 inline-flex item-center justify-center border-l-2 border-t-2 border-blue-700 p-1 leading-none rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                    @foreach ($payment as $payment)
                        @foreach ($payment->unreadNotifications as $Item => $notification)
                            @if ($notification->data['type'] == 'payment')
                                <div
                                    class="mx-2  w-sm my-3 flex flex-row items-center justify-between bg-gray-50 shadow-lg p-3 text-sm leading-none font-medium rounded-xl whitespace-no-wrap">
                                    <div class="inline-flex items-center text-blue-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        {{ $notification->data['body'] }}
                                    </div>
                                    <div class="text-blue-700 cursor-pointer hover:text-blue-800">
                                        <a wire:click="notify({{ $payment->id }}, '2')"
                                            class="flex-shrink-0 inline-flex item-center justify-center border-l-2 border-t-2 border-blue-700 p-1 leading-none rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach

                </section>
            </ul>
        </li>
    </ul>
</div>
