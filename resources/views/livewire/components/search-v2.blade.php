<div class="relative max-w-screen-2xl mx-auto w-full py-10 bg-white transition duration-200">
    <div
        class="ml-4 relative flex-1 flex justify-end max-w-xs w-full lg:absolute lg:right-0 lg:max-w-xxs lg:ml-10 xl:max-w-xs">
        <div
            class="relative border-b border-gray-600 border-opacity-50 overflow-hidden transition-all duration-500 lg:w-full hover:w-full focus-within:border-gray-600 w-full">
            <svg class="absolute inset-y-0 left-0 z-10 mt-1 w-5 h-5 text-gray-900 pointer-events-none" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
            <input
                wire:keydown.debounce.400ms="isFirst"
                wire:model.debounce.500ms="search" name="search"
                value="{{ $search }}"
                class="flex-1 w-full pl-8 pr-4 py-1 placeholder-gray-900 tracking-wide bg-white focus:outline-none"
                placeholder="Search Item" aria-label="Search Item">
        </div>
        @if($search && !$is_first)
            <div class="absolute w-full mt-8 pt-px divide-y divide-gray-200 shadow-sm z-30" role="listbox"
                 id="autocomplete-listbox-0">
                <a class="search-result block px-4 py-3 bg-gray-100 transition-colors duration-200 hover:bg-gray-200 focus:outline-none focus:bg-gray-200"
                   id="search-result-1" href="https://laravel.com/docs/8.x/container#introduction">
                    <div class="text-sm font-medium"><em class="not-italic bg-red-600 bg-opacity-25">A</em>rchitecture
                        Concepts
                    </div>
                    <div class="mt-2">
                        <div class="text-sm">
                            <span class="text-red-600 opacity-75">#</span> <span>Service Container</span>
                        </div>

                        <div class="text-sm">
                            &gt; <span>Introduction</span>
                        </div>
                    </div>
                </a>
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