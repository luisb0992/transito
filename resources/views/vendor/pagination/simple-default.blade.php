@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span>&laquo; @lang('Atras')</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo; @lang('Atras')</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="siguiente">@lang('Siguiente') &raquo;</a></li>
        @else
            <li class="disabled"><span>@lang('siguiente')</span></li>
        @endif
    </ul>
@endif
