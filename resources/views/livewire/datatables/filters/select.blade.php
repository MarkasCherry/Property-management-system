<div x-data class="field flex flex-col">
    <div class="control has-icons-left">
        <div class="select">
            <select
                x-ref="select"
                name="{{ $name }}"
                class="datatable-filter datatable-select form-control"
                wire:input="doSelectFilter('{{ $index }}', $event.target.value)"
                x-on:input="$refs.select.value=''"
            >
                <option value=""></option>
                @foreach($options as $value => $label)
                    @if(is_object($label))
                        <option value="{{ $label->id }}">{{ $label->name }}</option>
                    @elseif(is_array($label))
                        <option value="{{ $label['id'] }}">{{ $label['name'] }}</option>
                    @elseif(is_numeric($value))
                        <option value="{{ $label }}">{{ $label }}</option>
                    @else
                        <option value="{{ $value }}">{{ $label }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="icon is-small is-left">
            <i class="lnil lnil-menu-circle"></i>
        </div>
    </div>

    <div class="flex flex-wrap max-w-48 space-x-1">
        @foreach($this->activeSelectFilters[$index] ?? [] as $key => $value)
            <button wire:click="removeSelectFilter('{{ $index }}', '{{ $key }}')" x-on:click="$refs.select.value=''"
                    class="m-1 pl-1 flex items-center uppercase tracking-wide bg-gray-300 text-white hover:bg-red-600 rounded-full focus:outline-none text-xs space-x-1">
                <span>{{ $this->getDisplayValue($index, $value) }}</span>
                <x-icons.x-circle />
            </button>
        @endforeach
    </div>
</div>
