<div>
    @include('sweetalert::alert')
    @if (count($voucher) > 0)
    <div class="px-4 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl">
        <div class="max-w-lg space-y-3 sm:mx-auto lg:max-w-xl">
            {{-- @for ($i = 0; $i < count($voucher); $i++) --}}
            @foreach ($voucher as $item)
           @if ($item != null)
             @if ($item->status == 2 )
               <div
                   class="flex justify-between items-center p-2 transition-colors duration-200 border shadow group hover:bg-primary-500 hover:border-primary-500 rounded-global">
                   <span class="transition-colors duration-200 group-hover:text-black"> Voucher {{ $item->deskripsi }}/
                       {{$item->diskon}}%</span>
                   <div class="mr-2">
                       {{-- <span> --}}
                       <a href="#_" wire:click='KlaimVoucher({{$item->id}})'
                           class="px-5 py-2.5 font-medium bg-blue-50 hover:bg-blue-100 hover:text-blue-600 text-blue-500 rounded-lg text-sm">
                           Klaim
                       </a>
                       {{-- </span> --}}
                   </div>
               </div>
               @endif
           @endif
              @endforeach
            {{-- @endfor --}}
        </div>
    </div>

@endif



</div>
