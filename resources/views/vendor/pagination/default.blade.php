@if ($paginator->hasPages())
    <nav class="flex-pagination pagination is-rounded" aria-label="pagination" data-filter-hide>
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a disabled class="pagination-previous has-chevron" rel="prev" aria-label="@lang('pagination.previous')"><i data-feather="chevron-left"></i></a>
        @else
            <a class="pagination-previous has-chevron" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i data-feather="chevron-left"></i></a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="pagination-next has-chevron" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i data-feather="chevron-right"></i></a>
        @else
            <a disabled class="pagination-next has-chevron" rel="next" aria-label="@lang('pagination.next')"><i data-feather="chevron-right"></i></a>
        @endif

        <ul class="pagination-list">
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span class="pagination-ellipsis">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li aria-current="page"><a class="pagination-link is-current" aria-current="page">{{ $page }}</a></li>
                        @else
                            <li><a class="pagination-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>
    </nav>
@endif
