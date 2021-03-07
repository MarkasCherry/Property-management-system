<button {{ $attributes->merge(['type' => 'submit', 'class' => 'button h-button is-primary is-raised']) }}>
    {{ $slot }}
</button>
