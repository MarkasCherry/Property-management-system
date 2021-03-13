@props(['on'])

<div x-data="{ shown: false, timeout: null }"
     x-init="@this.on('{{ $on }}', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000);  })"
     x-show.transition.opacity.out.duration.1500ms="shown"
     style="display: none;"
    {{ $attributes->merge(['class' => 'message is-success']) }}>
    <div class="message-body">
        {{ $slot->isEmpty() ? 'Saved.' : $slot }}
    </div>
</div>
