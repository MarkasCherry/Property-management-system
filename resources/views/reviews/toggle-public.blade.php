<div class="field">
    <div class="switch-block">
        <label class="form-switch is-primary">
            <input type="checkbox"
                   class="is-switch"
                   wire:click="setPublic({{ $id }}, {{ $public }})"
                   @if($public)
                       checked
                   @endif
            >
            <i></i>
        </label>
    </div>
</div>
