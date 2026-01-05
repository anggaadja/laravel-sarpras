@if ($paginator->hasPages())
    <div style="display: flex; justify-content: center; padding: 1rem 0;">
        <nav role="navigation" aria-label="Pagination" style="display: flex; gap: 0.5rem; align-items: center;">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span style="color: #ccc; cursor: default; padding: 0.5rem 1rem; border: 1px solid #ddd; border-radius: 0.375rem;">
                    &laquo; Previous
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" style="text-decoration: none; color: #4a5568; padding: 0.5rem 1rem; border: 1px solid #ddd; border-radius: 0.375rem; transition: all 0.2s;" onmouseover="this.style.borderColor='#a0aec0'" onmouseout="this.style.borderColor='#ddd'">
                    &laquo; Previous
                </a>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" style="text-decoration: none; color: #4a5568; padding: 0.5rem 1rem; border: 1px solid #ddd; border-radius: 0.375rem; transition: all 0.2s;" onmouseover="this.style.borderColor='#a0aec0'" onmouseout="this.style.borderColor='#ddd'">
                    Next &raquo;
                </a>
            @else
                <span style="color: #ccc; cursor: default; padding: 0.5rem 1rem; border: 1px solid #ddd; border-radius: 0.375rem;">
                    Next &raquo;
                </span>
            @endif
        </nav>
    </div>
@endif
