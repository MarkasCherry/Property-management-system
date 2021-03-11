<ul class="pagination">
    @if ($paginator->onFirstPage())
        <li class="active">
            <a>
                <i class="fas fa-angle-left"></i>
            </a>
        </li>
    @else
        <li>
            <a wire:click.prevent="previousPage">
                <i class="fas fa-angle-left"></i>
            </a>
        </li>
    @endif
    @if ($paginator->hasMorePages())
        <li>
            <a wire:click.prevent="nextPage">
                <i class="fas fa-angle-right"></i>
            </a>
        </li>
    @else
        <li class="active">
            <a>
                <i class="fas fa-angle-right"></i>
            </a>
        </li>
    @endif
</ul>
