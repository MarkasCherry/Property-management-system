<ul class="pagination">
    <li @if($paginator->onFirstPage()) class="active" @else wire:click="previousPage" @endif>
        <a>
            <i class="fas fa-angle-left"></i>
        </a>
    </li>
    @foreach($elements as $element)
        @if(is_string($element))
            <li class="active">
                <a>
                    {{ $element }}
                </a>
            </li>
        @endif
        @if(is_array($element))
            @foreach ($element as $page => $url)
                <li @if($page === $paginator->currentPage()) class="active" @endif>
                    {{-- Sometimes wire:click doesnt fire, todo --}}
                    <a wire:click.prevent="gotoPage({{ $page }})">
                        {{ $page }}
                    </a>
                </li>
            @endforeach
        @endif
    @endforeach
    <li @if($paginator->hasMorePages()) wire:click="nextPage" @else class="active" @endif>
        <a>
            <i class="fas fa-angle-right"></i>
        </a>
    </li>
</ul>
