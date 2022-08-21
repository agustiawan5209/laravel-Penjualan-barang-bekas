<div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
    <div class="flex items-center md:ml-auto md:pr-4">
        <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease">
            <span
                class="text-size-sm ease leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                <i class="fas fa-search"></i>
            </span>
            <input type="text"
                class="pl-9 text-size-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow"
                placeholder="Type here..." />
        </div>
    </div>
    <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
        <!-- online builder btn  -->
        <!-- <li class="flex items-center">
        <a class="inline-block px-8 py-2 mb-0 mr-4 font-bold text-center text-blue-500 uppercase align-middle transition-all ease-in bg-transparent border border-blue-500 border-solid rounded-lg shadow-none cursor-pointer leading-pro text-size-xs hover:-translate-y-px active:shadow-xs hover:border-blue-500 active:bg-blue-500 active:hover:text-blue-500 hover:text-blue-500 tracking-tight-rem hover:bg-transparent hover:opacity-75 hover:shadow-none active:text-white active:hover:bg-transparent" target="_blank" href="https://www.creative-tim.com/builder/soft-ui?ref=navbar-dashboard&amp;_ga=2.76518741.1192788655.1647724933-1242940210.1644448053">Online Builder</a>
      </li> -->
        <li class="flex items-center">
            <a href="{{route('profile.show')}}"
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
            <a href="#" class="block p-0 text-white transition-all text-size-sm "
                >
                <i class="cursor-pointer fa fa-bell" @click="notifChat = ! notifChat"></i>
            </a>

            <ul x-show='notifChat' :class="notifChat ? 'block opacity-100': 'hidden'"
                class="text-size-sm before:font-awesome before:leading-default before:duration-350 before:ease lg:shadow-3xl duration-250 min-w-44 before:sm:right-8 before:text-5.5 pointer-events-none absolute right-0 top-0 z-50 origin-top list-none rounded-lg border-0 border-solid border-transparent dark:shadow-dark-xl dark:bg-slate-850 bg-white bg-clip-padding px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-2 before:left-auto before:top-0 before:z-50 before:inline-block before:font-normal before:text-white before:antialiased before:transition-all before:content-['\f0d8'] sm:-mr-6 lg:absolute lg:right-0 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                <!-- add show class on dropdown open js -->
                @foreach ($chat->unreadNotifications as $item)
                <li class="relative mb-2">
                    <a class="dark:hover:bg-slate-900 ease py-1.2 clear-both block w-full whitespace-nowrap rounded-lg bg-transparent px-4 duration-300 hover:bg-gray-200 hover:text-slate-700 lg:transition-colors"
                        href="javascript:;">
                        <div class="flex py-1">
                            <div class="my-auto">
                                <img src="./assets/img/team-2.jpg"
                                    class="inline-flex items-center justify-center mr-4 text-white text-size-sm h-9 w-9 max-w-none rounded-xl" />
                            </div>
                            <div class="flex flex-col justify-center">
                                <h6 class="mb-1 font-normal leading-normal dark:text-white text-size-sm">
                                    <span class="font-semibold">New message</span> from {{$item->data['from']}}
                                </h6>
                                <p class="mb-0 leading-tight text-size-xs text-slate-400 dark:text-white/80">
                                    <i class="mr-1 fa fa-clock"></i>
                                    {{$item->created_at}}
                                </p>
                            </div>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
        </li>
    </ul>
</div>
