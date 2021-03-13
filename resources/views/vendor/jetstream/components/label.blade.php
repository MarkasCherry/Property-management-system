@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}@if($attributes->get('important'))<span class="text-danger">*</span>@endif
</label>
