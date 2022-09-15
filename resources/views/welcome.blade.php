<x-guest-layout>

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
