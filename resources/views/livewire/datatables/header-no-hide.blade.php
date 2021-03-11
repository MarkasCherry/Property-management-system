@if($column['hidden'])
@else
    <th class="sorting @if($sort === $index) @if($direction) sorting-asc @else sorting-desc @endif @endif"
        wire:click.prefetch="sort('{{ $index }}')"
        align="{{ $column['align'] }}"
    >
        {{ str_replace('_', ' ', $column['label']) }}
    </th>
@endif
