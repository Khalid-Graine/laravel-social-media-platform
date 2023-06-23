<hr>
<div class="mt-2 flex justify-between ">
    @if ($paginator->hasPages())
        <nav class="flex justify-between w-full">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <button class="cursor-not-allowed">
                    <i class="fa-solid fa-circle-arrow-left text-4xl text-blue-500"></i>
                </button>
            @else
                <a class="f flex justify-center items-center" href="{{ $paginator->previousPageUrl() }}">
                    <i class="fa-solid fa-circle-arrow-left text-4xl text-blue-500"></i>
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                <div>
                    @if (is_string($element))
                        <span aria-disabled="true">
                            <span class="">
                                {{ $element }}
                            </span>
                        </span>
                    @endif
                </div>

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span aria-current="page">
                                <button class="flex justify-center items-center font-bold w-[40px] h-[40px] border-2 border-blue-300 rounded-full">
                                    {{ $page }}
                                </button>
                            </span>
                        @else
                            <a href="{{ $url }}" class="f flex justify-center items-center font-bold w-[40px] h-[40px] border-2 rounded-full">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a class="flex justify-center items-center" href="{{ $paginator->nextPageUrl() }}">
                    <i class="fa-solid fa-circle-arrow-right text-4xl text-blue-500"></i>
                </a>
            @else
                <button class="flex justify-center items-center cursor-not-allowed">
                    <i class="fa-solid fa-circle-arrow-right text-4xl text-blue-500"></i>
                </button>
            @endif
        </nav>
    @endif
</div>
