@if ($paginator->hasPages())
                <nav aria-label="Table navigation">
                    <ul class="inline-flex items-center">
                    @if ($paginator->onFirstPage())
                        <li style="display:none">
                            <button
                            class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                            aria-label="Previous"
                            >
                            <svg
                                class="w-4 h-4 fill-current"
                                aria-hidden="true"
                                viewBox="0 0 20 20"
                            >
                                <path
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd"
                                fill-rule="evenodd"
                                ></path>
                            </svg>
                            </button>
                        </li>
                    @else
                        <li>
                            <button onclick="location.href='{{ $paginator->previousPageUrl() }}'"
                            class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                            aria-label="Previous"
                            >
                            <svg
                                class="w-4 h-4 fill-current"
                                aria-hidden="true"
                                viewBox="0 0 20 20"
                            >
                                <path
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd"
                                fill-rule="evenodd"
                                ></path>
                            </svg>
                            </button>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)

                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                <li>
                                    <button
                                    class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple"
                                    >
                                    {{ $page }}
                                    </button>
                                </li>
                                @else
                                <li>
                                    <button onclick="location.href='{{ $url }}'"
                                    class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                                    >
                                    {{ $page }}
                                    </button>
                                </li>
                                @endif
                            @endforeach
                        @endif


                    @endforeach

                    @if ($paginator->hasMorePages())
                        <li>
                            <button onclick="location.href='{{ $paginator->nextPageUrl() }}'"
                                class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                                aria-label="Next"
                            >
                                <svg
                                class="w-4 h-4 fill-current"
                                aria-hidden="true"
                                viewBox="0 0 20 20"
                                >
                                <path
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"
                                    fill-rule="evenodd"
                                ></path>
                                </svg>
                            </button>
                        </li>
                    @else
                        <li style="display:none">
                            <button
                                class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                                aria-label="Next"
                            >
                                <svg
                                class="w-4 h-4 fill-current"
                                aria-hidden="true"
                                viewBox="0 0 20 20"
                                >
                                <path
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"
                                    fill-rule="evenodd"
                                ></path>
                                </svg>
                            </button>
                        </li>
                    @endif
                    </ui>
                </nav>
@endif
