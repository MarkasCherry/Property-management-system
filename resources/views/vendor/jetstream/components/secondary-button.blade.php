<button {{ $attributes->merge(['type' => 'button', 'class' => 'button h-button is-white']) }}>
    {{ $slot }}
</button>
