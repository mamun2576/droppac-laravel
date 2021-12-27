<button {{ $attributes->merge(['type' => 'submit', 'class' => 'mt-6 bg-indigo-600 inline-flex px-4 py-2 border border-transparent rounded-sm shadow-sm font-semibold text-xs uppercase tracking-widest focus:outline-none focus:border-white focus:ring focus:ring-white disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
