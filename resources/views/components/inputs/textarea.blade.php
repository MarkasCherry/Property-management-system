<div class="field">
    <x-jet-label for="{{ $attributes->get('for') }}" value="{{ $title }}"/>
    <div class="control">
        <textarea class="textarea"
                  id="{{ $attributes->get('for') }}"
                  rows="{{ $attributes->get('rows') }}"
                  name="{{ $attributes->get('name') ?? '' }}"
                  @if($attributes->get('model', true)) wire:model.defer="{{ $attributes->get('model') ?? $attributes->get('name', '') }}" @endif
                  placeholder="{{ $attributes->get('placeholder') }}">{{ old($attributes->get('for')) ?? $attributes->get('value') ?? null }}</textarea>

    </div>
    <x-jet-input-error for="{{ $attributes->get('for') }}" class="mt-2"/>
</div>
