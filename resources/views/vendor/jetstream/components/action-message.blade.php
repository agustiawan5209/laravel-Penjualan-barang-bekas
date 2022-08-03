@props(['on'])

<div x-data="{ shown: false, timeout: null }" x-init="@this.on('{{ $on }}', () => { clearTimeout(timeout);
    shown = true;
    timeout = setTimeout(() => { shown = false }, 2000); })" x-show.transition.out.opacity.duration.1500ms="shown"
    x-transition:leave.opacity.duration.1500ms style="display: none;"
    {{ $attributes->merge(['class' => 'bg-blue-500 border border-blue-400 text-gray-100 px-4 py-3 rounded relative']) }}>

    <strong class="font-bold">Message</strong>
    <span class="block sm:inline">{{ $slot->isEmpty() ? 'Saved.' : $slot }}</span>
</div>
