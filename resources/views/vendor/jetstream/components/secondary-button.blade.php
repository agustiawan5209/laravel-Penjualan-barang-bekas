<button {{ $attributes->merge(['type' => 'button', 'class' => 'hidden px-8 py-2 font-bold leading-normal text-center text-white align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer text-size-xs bg-cyan-500 lg:block tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85']) }}>
    {{ $slot }}
</button>
