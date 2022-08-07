<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-block px-8 py-2 mb-4  font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-size-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85']) }}>
    {{ $slot }}
</button>
