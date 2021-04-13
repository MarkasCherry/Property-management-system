<div>
    <div class="toolbar-link">
        <label class="dark-mode ml-auto">
            <input wire:click="setDarkMode()" type="checkbox" @if(!auth()->user()->dark_mode) checked @endif>
            <span></span>
        </label>
    </div>
</div>
