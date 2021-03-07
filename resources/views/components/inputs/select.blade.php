<div class="field">
    @if(isset($title))
        <x-jet-label for="{{ $attributes->get('for') }}" value="{{ $title }}"/>
    @endif
    <div class="control width-100">
        <div class="select width-100">
            <select name="{{ $attributes->get('name') ?? '' }}"
                    class="width-100"
                    @if($attributes->get('model', true)) wire:model.defer="{{ $attributes->get('model') ?? $attributes->get('name', '') }}" @endif
                    @if($attributes->get('change')) wire:change="{{ $attributes->get('change') }}" @endif
            >
                @if($attributes->get('selectTitle'))
                    <option value="">{{ $attributes->get('selectTitle') }}</option>
                @endif
                @foreach($data as $id => $name)
                    <option value="{{ $id }}"
                            @if(old($attributes->get('name'), $attributes->get('value', -1)) == $id) selected @endif
                    >
                        {{ $name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <x-jet-input-error for="{{ $attributes->get('for') }}" class="mt-2"/>
</div>
