<div class="field">
    <x-jet-label for="{{ $attributes->get('for') }}" important="{{ $attributes->get('important') }}" value="{{ $title }}" />
    <input id="{{ $attributes->get('for') }}"
           type="{{ $attributes->get('type', 'text') }}"
           @if($attributes->get('model', false))
                wire:model.defer="{{ $attributes->get('model') ?? $attributes->get('name', '') }}"
           @else
               name="{{ $attributes->get('name') ?? '' }}"
               value="{{ old($attributes->get('for') ?? '', $attributes->get('value') ?? '') }}"
           @endif
           @if($attributes->get('placeholder'))
                placeholder="{{ $attributes->get('placeholder') }}"
           @endif
           autocomplete="{{ $attributes->get('autocomplete') ?? $attributes->get('for') ?? '' }}"
           class="input"
    />
    <x-jet-input-error for="{{ $attributes->get('for') }}" class="mt-2"/>
</div>
