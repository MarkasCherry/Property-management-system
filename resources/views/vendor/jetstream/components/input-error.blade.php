@props(['for'])

@error($for)
    <p {{ $attributes->merge(['class' => 'help danger-text']) }}>{{ $message }}</p>
@enderror
