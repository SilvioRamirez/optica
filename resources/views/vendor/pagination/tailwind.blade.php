@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Paginación" class="tw-flex tw-items-center tw-justify-between">
        <div class="tw-flex tw-justify-between tw-flex-1 sm:tw-hidden">
            @if ($paginator->onFirstPage())
                <span class="tw-relative tw-inline-flex tw-items-center tw-px-4 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-400 tw-bg-white tw-border tw-border-gray-300 tw-cursor-default tw-rounded-lg">
                    Anterior
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="tw-relative tw-inline-flex tw-items-center tw-px-4 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-700 tw-bg-white tw-border tw-border-gray-300 tw-rounded-lg hover:tw-bg-gray-50 tw-no-underline">
                    Anterior
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="tw-relative tw-inline-flex tw-items-center tw-px-4 tw-py-2 tw-ml-3 tw-text-sm tw-font-medium tw-text-gray-700 tw-bg-white tw-border tw-border-gray-300 tw-rounded-lg hover:tw-bg-gray-50 tw-no-underline">
                    Siguiente
                </a>
            @else
                <span class="tw-relative tw-inline-flex tw-items-center tw-px-4 tw-py-2 tw-ml-3 tw-text-sm tw-font-medium tw-text-gray-400 tw-bg-white tw-border tw-border-gray-300 tw-cursor-default tw-rounded-lg">
                    Siguiente
                </span>
            @endif
        </div>

        <div class="tw-hidden sm:tw-flex-1 sm:tw-flex sm:tw-items-center sm:tw-justify-center">
            <div>
                <span class="tw-relative tw-z-0 tw-inline-flex tw-shadow-sm tw-rounded-lg">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="Anterior" class="tw-relative tw-inline-flex tw-items-center tw-px-3 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-400 tw-bg-white tw-border tw-border-gray-300 tw-cursor-default tw-rounded-l-lg">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Anterior" class="tw-relative tw-inline-flex tw-items-center tw-px-3 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-500 tw-bg-white tw-border tw-border-gray-300 tw-rounded-l-lg hover:tw-bg-gray-50 tw-no-underline hover:tw-text-teal-600">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true" class="tw-relative tw-inline-flex tw-items-center tw-px-4 tw-py-2 tw--ml-px tw-text-sm tw-font-medium tw-text-gray-700 tw-bg-white tw-border tw-border-gray-300 tw-cursor-default">
                                {{ $element }}
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page" class="tw-relative tw-z-10 tw-inline-flex tw-items-center tw-px-4 tw-py-2 tw--ml-px tw-text-sm tw-font-bold tw-text-white tw-border tw-border-teal-500" style="background-color: #00a89d;">
                                        {{ $page }}
                                    </span>
                                @else
                                    <a href="{{ $url }}" aria-label="Ir a la página {{ $page }}" class="tw-relative tw-inline-flex tw-items-center tw-px-4 tw-py-2 tw--ml-px tw-text-sm tw-font-medium tw-text-gray-700 tw-bg-white tw-border tw-border-gray-300 hover:tw-bg-gray-50 tw-no-underline hover:tw-text-teal-600">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Siguiente" class="tw-relative tw-inline-flex tw-items-center tw-px-3 tw-py-2 tw--ml-px tw-text-sm tw-font-medium tw-text-gray-500 tw-bg-white tw-border tw-border-gray-300 tw-rounded-r-lg hover:tw-bg-gray-50 tw-no-underline hover:tw-text-teal-600">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="Siguiente" class="tw-relative tw-inline-flex tw-items-center tw-px-3 tw-py-2 tw--ml-px tw-text-sm tw-font-medium tw-text-gray-400 tw-bg-white tw-border tw-border-gray-300 tw-cursor-default tw-rounded-r-lg">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
