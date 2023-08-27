<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full m-auto p-3 bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest']) }}>
    {{ $slot }}
</button>
