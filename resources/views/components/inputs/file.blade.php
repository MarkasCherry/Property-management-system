<div class="control">
    <div class="file is-boxed {{ $attributes->get('file') != "" ? "is-success" : "is-primary" }}">
        <label class="file-label">
            <input class="file-input"
                   type="{{ $attributes->get('type', 'file') }}"
                   wire:model="{{ $attributes->get('name') ?? '' }}">
            <span class="file-cta">
                <span class="file-icon">
                    <i class="lnil lnil-32 lnil-cloud-upload"></i>
                </span>
                <span class="file-label">
                    {{ $attributes->get('file') != "" ? $attributes->get('file') : "Choose a file…" }}
                </span>
            </span>
        </label>
    </div>
    <x-jet-input-error for="{{ $attributes->get('for') }}" class="mt-2"/>
</div>
