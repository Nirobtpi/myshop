<div class="card-footer clearfix">
    @if ($paginator->hasPages())
        <nav aria-label="Page navigation example">
            <ul class="pagination pagination-sm m-0 float-end">
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled"> <a class="page-link" href="#" tabindex="-1">«</a> </li>
                @else
                    <li class="page-item"> <a class="page-link" href="{{ $paginator->previousPageUrl() }}">«</a> </li>
                @endif

                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li class="page-item disabled">{{ $element }}</li>
                        <li class="page-item disabled"> <a class="page-link" href="#">{{ $element }}</a>
                        </li>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active">
                                    <a class="page-link">{{ $page }}</a>
                                </li>
                            @else
                                <li class="page-item"> <a class="page-link"
                                        href="{{ $url }}">{{ $page }}</a> </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <li class="page-item"> <a class="page-link" href="{{ $paginator->nextPageUrl() }}"
                            rel="next">»</a> </li>
                @else
                    <li class="page-item disabled"> <a class="page-link" href="#">»</a> </li>
                @endif
            </ul>
        </nav>
    @endif
</div>
