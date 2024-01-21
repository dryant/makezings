<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-orange-400 px-8 py-2 font-bold border-gray-700 hover:bg-white border-zinc-600']) }}>
    {{ $slot }}
</button>
