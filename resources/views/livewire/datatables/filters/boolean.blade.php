<div x-data class="field flex flex-col">
    <div class="control has-icons-left">
        <div class="select">
            <select
                x-ref="select"
                name="{{ $name }}"
                class="datatable-filter datatable-select form-control"
                wire:input="doBooleanFilter('{{ $index }}', $event.target.value)"
                x-on:input="$refs.select.value=''"
            >
                <option value=""></option>
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
        </div>
        <div class="icon is-small is-left">
            <i class="lnil lnil-menu-circle"></i>
        </div>
    </div>

    <div class="flex flex-wrap max-w-48 space-x-1">
        @isset($this->activeBooleanFilters[$index])
        @if($this->activeBooleanFilters[$index] == 1)
        <button wire:click="removeBooleanFilter('{{ $index }}')"
            class="m-1 pl-1 flex items-center uppercase tracking-wide bg-gray-300 text-white hover:bg-red-600 rounded-full focus:outline-none text-xs space-x-1">
            <span>YES</span>
            <x-icons.x-circle />
        </button>
        @elseif(strlen($this->activeBooleanFilters[$index]) > 0)
        <button wire:click="removeBooleanFilter('{{ $index }}')"
            class="m-1 pl-1 flex items-center uppercase tracking-wide bg-gray-300 text-white hover:bg-red-600 rounded-full focus:outline-none text-xs space-x-1">
            <span>No</span>
            <x-icons.x-circle />
        </button>
        @endif
        @endisset
    </div>
</div>
