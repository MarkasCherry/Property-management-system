<div class="field">
    <x-jet-label for="{{ $attributes->get('for') }}" value="{{ $title }}"/>
    <div class="control">
        <textarea class="textarea"
                  id="{{ $attributes->get('id') ? $attributes->get('id') : $attributes->get('for') }}"
                  rows="{{ $attributes->get('rows') }}"
                  {{--                  @if($attributes->get('model', true)) wire:model.defer="{{ $attributes->get('model') ?? $attributes->get('name', '') }}" @endif--}}
                  placeholder="{{ $attributes->get('placeholder') }}">{{ old($attributes->get('for')) ?? $attributes->get('value') ?? null }}</textarea>
    </div>
    <input id="sun-editor-text" name="{{ $attributes->get('name') }}" type="hidden" value="{{ old($attributes->get('for')) ?? $attributes->get('value') ?? null }}">
    <x-jet-input-error for="{{ $attributes->get('for') }}" class="mt-2"/>
</div>
