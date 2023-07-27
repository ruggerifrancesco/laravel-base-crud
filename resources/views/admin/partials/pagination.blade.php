<ul class="pagination justify-content-center">
    <!-- Previous Page Link -->
    @if ($paginator->onFirstPage())
        <li class="page-item disabled" aria-disabled="true">
            <span class="page-link edit-pagination">
                <i class="fa-solid fa-angles-left"></i>
            </span>
        </li>
    @else
        <li class="page-item">
            <a class="page-link edit-pagination" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                <i class="fa-solid fa-angles-left"></i>
            </a>
        </li>
    @endif

    <!-- Pagination Elements -->
    @foreach ($elements as $element)
        <!-- "Three Dots" Separator -->
        @if (is_string($element))
            <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
        @endif

        <!-- Array Of Links -->
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="page-item active edit-pagination" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach

    <!-- Next Page Link -->
    @if ($paginator->hasMorePages())
        <li class="page-item">
            <a class="page-link edit-pagination" href="{{ $paginator->nextPageUrl() }}" rel="next">
                <i class="fa-solid fa-angles-right"></i>
            </a>
        </li>
    @else
        <li class="page-item disabled" aria-disabled="true">
            <span class="page-link edit-pagination">
                <i class="fa-solid fa-angles-right"></i>
            </span>
        </li>
    @endif
</ul>
