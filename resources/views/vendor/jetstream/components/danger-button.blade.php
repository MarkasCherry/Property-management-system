<button {{ $attributes->merge(['type' => 'button', 'class' => 'button h-button is-danger is-outlined']) }}>
    {{ $slot }}
</button>
