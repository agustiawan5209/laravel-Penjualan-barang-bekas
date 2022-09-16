<x-guest-layout>
    <x-jet-banner></x-jet-banner>
   @if (Auth::check())
     <livewire:banner-voucher />
   @endif
   @include('sweetalert::alert')
    @if (request()->routeIs('home'))

        <livewire:page.slide />
        {{-- @include('page.hero') --}}
    @endif
    {{-- <livewire:voucher-klaim> --}}
    @include('page.item')


    @include('page.trending')


</x-guest-layout>
