
@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" style="
        display: flex;
        justify-content: space-evenly;
        width:100% !important;
        ">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span style="
                            display: block;
                            padding: 6px 18px;
                            min-width: 120px;
                            text-align: center;
                            margin: 0 auto;
                            color: white;
                            background-color: #9B73F2;
                            border-radius: 0.5rem;
                            font-size: 0.875rem;
                            font-weight: 500;
                            max-width: 200px;
                            cursor: not-allowed;
                            opacity: 0.5;">
                عودة
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" style="
                            display: block;
                            padding: 6px 18px;
                            min-width: 120px;
                            text-align: center;
                            margin: 0 auto;
                            color: white;
                            background-color: #9B73F2;
                            border-radius: 0.5rem;
                            font-size: 0.875rem;
                            font-weight: 500;
                            max-width: 200px;
                            text-decoration: none;">
                عودة
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" style="
                            display: block;
                            padding: 6px 18px;
                            min-width: 120px;
                            text-align: center;
                            margin: 0 auto;
                            color: white;
                            background-color: #9B73F2;
                            border-radius: 0.5rem;
                            font-size: 0.875rem;
                            font-weight: 500;
                            max-width: 200px;
                            text-decoration: none;">
                التالي
            </a>
        @else
            <span style="
                            display: block;
                            padding: 6px 18px;
                            min-width: 120px;
                            text-align: center;
                            margin: 0 auto;
                            color: white;
                            background-color: #9B73F2;
                            border-radius: 0.5rem;
                            font-size: 0.875rem;
                            font-weight: 500;
                            max-width: 200px;
                            cursor: not-allowed;
                            opacity: 0.5;">
                التالي
            </span>
        @endif
    </nav>
@endif