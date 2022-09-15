<x-guest-layout>
    <x-jet-banner></x-jet-banner>
   @if (Auth::check())
     <livewire:banner-voucher />
   @endif
    @if (request()->routeIs('home'))
        @if (session()->has('message'))
            <x-alert :message="session('message')" />
        @endif
        <livewire:page.slide />
        {{-- @include('page.hero') --}}
    @endif
    {{-- <livewire:voucher-klaim> --}}
    @include('page.item')


    @include('page.trending')


</x-guest-layout>
