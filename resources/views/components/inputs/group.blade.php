<div class="field">
    <x-jet-label for="{{ $attributes->get('for') }}" value="{{ $title }}"/>
    <input id="{{ $attributes->get('for') }}"
           type="{{ $attributes->get('type', 'text') }}"
           @if($attributes->get('model', true)) wire:model.{{ $attributes->get('update', 'defer') }}="{{ $attributes->get('model') ?? $attributes->get('name', '') }}" @endif
           name="{{ $attributes->get('name') ?? '' }}"
           value="{{ old($attributes->get('for') ?? '', $attributes->get('value') ?? '') }}"
           autocomplete="{{ $attributes->get('autocomplete') ?? $attributes->get('for') ?? '' }}"
           @if($attributes->get('readonly', false)) readonly @endif
           class="input"
    />
    <x-jet-input-error for="{{ $attributes->get('for') }}" class="mt-2"/>
</div>
