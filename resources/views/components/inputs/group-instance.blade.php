<div class="field">
    <x-jet-label for="{{ $attributes->get('for') }}" value="{{ $title }}"/>
    <x-jet-input id="{{ $attributes->get('for') }}" type="{{ $attributes->get('type', 'text') }}"
                 wire:model="{{ $attributes->get('name') ?? '' }}"
                 wire:keydown.escape="{{ $attributes->get('reset') ?? '' }}"
                 name="{{ $attributes->get('name') ?? '' }}"
                 value="{{ old($attributes->get('name') ?? '', $attributes->get('value') ?? '') }}"
                 autocomplete="{{ $attributes->get('autocomplete') ?? $attributes->get('for') ?? '' }}" />
    <x-jet-input-error for="{{ $attributes->get('for') }}" class="mt-2"/>
</div>
