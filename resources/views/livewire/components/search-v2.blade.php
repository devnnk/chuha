<div class="relative max-w-screen-2xl mx-auto w-full py-10 bg-white transition duration-200">
    <div
        class="ml-4 relative flex-1 flex justify-end max-w-xs w-full lg:absolute lg:right-0 lg:max-w-xxs lg:ml-10 xl:max-w-xs">
        <form class="flex" method="GET" action="{{route('search')}}">
            <div
                class="relative border-b border-gray-600 border-opacity-50 overflow-hidden transition-all duration-500 lg:w-full hover:w-full focus-within:border-gray-600 w-full">
                <svg class="absolute inset-y-0 left-0 z-10 mt-1 w-5 h-5 text-gray-900 pointer-events-none" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <input
                    wire:keydown.debounce.400ms="isFirst"
                    wire:model.debounce.500ms="search" name="search" required
                    value="{{ $search }}" onfocusout="hiddenListDataSearch()" maxlength="191"
                    class="flex-1 w-full pl-8 pr-4 py-1 placeholder-gray-900 tracking-wide bg-white focus:outline-none"
                    placeholder="Search Item" aria-label="Search Item">
            </div>
            <button class="px-3 h-8 border border-red-600 cursor-pointer">{{\App\Handle\LanguageHandle::____('Search')}}</button>
        </form>

        @if($search && !$is_first)
            <div class="absolute w-full mt-8 pt-px divide-y divide-gray-200 shadow-sm z-50 overflow-auto" role="listbox"
                 id="autocomplete-listbox-0" style="max-height: 240px">
                @if($items->count())
                    @foreach($items as $item)
                        <a class="search-result block px-4 py-3 bg-gray-100 transition-colors duration-200 hover:bg-gray-200 focus:outline-none focus:bg-gray-200"
                           id="search-result-1" href="{{ route('item', ['code'=> $item->code]) }}">
                            <div class="text-sm font-medium">{{ $item->title }}</div>
                            <div class="mt-2">
                                <div class="text-sm"><span>{{ $item->product->name }}</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @else
                    <span
                        class="search-result block px-4 py-3 bg-gray-100 transition-colors duration-200 hover:bg-gray-200 focus:outline-none focus:bg-gray-200">
                        <div class="text-sm font-medium">No results were found!</div>
                    </span>
                @endif
            </div>
        @endif
    </div>
</div>

@push('js')
    <script>
        async function hiddenListDataSearch() {
            await sleep(100);
            let autocomplete_listbox_0 = document.getElementById('autocomplete-listbox-0');
            if (autocomplete_listbox_0) autocomplete_listbox_0.remove();
        }
    </script>
@endpush
