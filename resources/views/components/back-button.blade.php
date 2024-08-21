<a {{ $attributes->merge(['class' => 'absolute top-4 left-4 text-sm font-semibold leading-6 text-gray-900 md:top-6 md:left-6']) }}>
    <span aria-hidden="true">&larr;</span>
    {{ $slot }}
</a>
