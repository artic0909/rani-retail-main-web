@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; width: 100%;">
        <div>
            <p style="margin: 0; font-size: 0.875rem; color: #64748b;">
                Showing
                <span style="font-weight: 600; color: #1e293b;">{{ $paginator->firstItem() ?? 0 }}</span>
                to
                <span style="font-weight: 600; color: #1e293b;">{{ $paginator->lastItem() ?? 0 }}</span>
                of
                <span style="font-weight: 600; color: #1e293b;">{{ $paginator->total() }}</span>
                results
            </p>
        </div>

        <div>
            <ul style="display: inline-flex; align-items: center; gap: 6px; list-style: none; margin: 0; padding: 0; flex-wrap: wrap;">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li>
                        <span style="display: inline-flex; align-items: center; justify-content: center; min-width: 36px; height: 36px; padding: 0 10px; font-size: 0.875rem; color: #94a3b8; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; cursor: not-allowed;">
                            <i class="fas fa-chevron-left" style="font-size: 11px;"></i>
                        </span>
                    </li>
                @else
                    <li>
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" style="display: inline-flex; align-items: center; justify-content: center; min-width: 36px; height: 36px; padding: 0 10px; font-size: 0.875rem; font-weight: 500; color: #334155; background: #ffffff; border: 1px solid #cbd5e1; border-radius: 8px; text-decoration: none; transition: all 0.2s;" onmouseover="this.style.background='#f1f5f9'; this.style.borderColor='#94a3b8';" onmouseout="this.style.background='#ffffff'; this.style.borderColor='#cbd5e1';">
                            <i class="fas fa-chevron-left" style="font-size: 11px;"></i>
                        </a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li>
                            <span style="display: inline-flex; align-items: center; justify-content: center; min-width: 36px; height: 36px; padding: 0 8px; font-size: 0.875rem; color: #94a3b8;">{{ $element }}</span>
                        </li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li>
                                    <span style="display: inline-flex; align-items: center; justify-content: center; min-width: 36px; height: 36px; padding: 0 10px; font-size: 0.875rem; font-weight: 700; color: #ffffff; background: #5e72e4; border: 1px solid #5e72e4; border-radius: 8px; box-shadow: 0 2px 5px rgba(94, 114, 228, 0.3);">{{ $page }}</span>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $url }}" style="display: inline-flex; align-items: center; justify-content: center; min-width: 36px; height: 36px; padding: 0 10px; font-size: 0.875rem; font-weight: 500; color: #334155; background: #ffffff; border: 1px solid #cbd5e1; border-radius: 8px; text-decoration: none; transition: all 0.2s;" onmouseover="this.style.background='#f1f5f9'; this.style.borderColor='#94a3b8';" onmouseout="this.style.background='#ffffff'; this.style.borderColor='#cbd5e1';">
                                        {{ $page }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li>
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" style="display: inline-flex; align-items: center; justify-content: center; min-width: 36px; height: 36px; padding: 0 10px; font-size: 0.875rem; font-weight: 500; color: #334155; background: #ffffff; border: 1px solid #cbd5e1; border-radius: 8px; text-decoration: none; transition: all 0.2s;" onmouseover="this.style.background='#f1f5f9'; this.style.borderColor='#94a3b8';" onmouseout="this.style.background='#ffffff'; this.style.borderColor='#cbd5e1';">
                            <i class="fas fa-chevron-right" style="font-size: 11px;"></i>
                        </a>
                    </li>
                @else
                    <li>
                        <span style="display: inline-flex; align-items: center; justify-content: center; min-width: 36px; height: 36px; padding: 0 10px; font-size: 0.875rem; color: #94a3b8; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; cursor: not-allowed;">
                            <i class="fas fa-chevron-right" style="font-size: 11px;"></i>
                        </span>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
@endif
