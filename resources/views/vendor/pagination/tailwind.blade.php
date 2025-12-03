@if ($paginator->hasPages())
    <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
        <!-- Page Info -->
        <div class="text-sm text-gray-600">
            Page <span class="font-bold">{{ $paginator->currentPage() }}</span> 
            of <span class="font-bold">{{ $paginator->lastPage() }}</span>
            @if($paginator->total())
                <span class="text-gray-400 ml-2">
                    ({{ $paginator->firstItem() }}-{{ $paginator->lastItem() }} of {{ $paginator->total() }})
                </span>
            @endif
        </div>

        <!-- Pagination Controls -->
        <div class="flex items-center space-x-2">
            <!-- Previous -->
            @if ($paginator->onFirstPage())
                <button disabled class="px-3 py-2 text-sm border rounded text-gray-400 cursor-not-allowed">
                    ← Previous
                </button>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-2 text-sm border rounded hover:bg-gray-50">
                    ← Previous
                </a>
            @endif

            <!-- Page Numbers -->
            <div class="flex items-center space-x-1">
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <span class="px-2 text-gray-400">...</span>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span class="px-3 py-2 text-sm bg-blue-600 text-white rounded">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}" class="px-3 py-2 text-sm border rounded hover:bg-gray-50">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>

            <!-- Next -->
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-2 text-sm border rounded hover:bg-gray-50">
                    Next →
                </a>
            @else
                <button disabled class="px-3 py-2 text-sm border rounded text-gray-400 cursor-not-allowed">
                    Next →
                </button>
            @endif
        </div>
    </div>

@endif