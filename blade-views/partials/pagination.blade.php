{{--
    ATTENTION
    =========
    /src/scss/search-results/pagination.scss

    Default pagination partial for your property
    search results.
--}}

@if($paginate['hasPagination'] ?? false)
<nav aria-label="Search Results Navigation">
    <ul class="pagination">
        @isset($paginate['firstPageUrl'])
            <li class='page-item'>
                <a href="{{ $paginate['firstPageUrl'] }}" class='page-link' aria-label="First Page">&laquo;</a>
            </li>
        @endisset
        @isset($paginate['previousPageUrl'])
            <li class='page-item'>
                <a href="{{ $paginate['previousPageUrl'] }}" class='page-link' aria-label="Previous">&lsaquo;</a>
            </li>
        @endisset
        @if(is_array($paginate['pages'] ?? ''))
            @foreach ($paginate['pages'] as $page)
                <li class="page-item {{ $page['active_class'] }}">
                    <a href="{{ $page['pageUrl'] }}" class='page-link'>{{ $page['pageNo'] }}</a>
                </li>
            @endforeach
        @endif
        @isset($paginate['nextPageUrl'])
            <li class='page-item'>
                <a href="{{ $paginate['nextPageUrl'] }}" class='page-link' aria-label="Next">&rsaquo;</a>
            </li>
        @endisset
        @isset($paginate['lastPageUrl'])
            <li class='page-item'>
                <a href="{{ $paginate['lastPageUrl'] }}" class='page-link' aria-label="Last Page">&raquo;</a>
            </li>
        @endisset
    </ul>
</nav>
@endif