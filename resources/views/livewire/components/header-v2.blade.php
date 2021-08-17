<header class="relative z-50" @keydown.window.escape="navIsOpen = false" @click.away="navIsOpen = false">
    <div class="relative max-w-screen-2xl mx-auto w-full py-10 bg-white transition duration-200">
        <div class="max-w-screen-xl mx-auto px-8 flex items-center justify-between">
            <a href="/" class="flex items-center">
                CHUHA
                {{--                <img class="" src="/img/logomark.min.svg" alt="Laravel">--}}
                {{--                <img class="hidden ml-5 sm:block" src="/img/logotype.min.svg" alt="Laravel">--}}
            </a>
            <ul class="relative hidden lg:ml-6 lg:pt-3 lg:flex lg:items-end lg:space-x-6 xl:ml-14 xl:space-x-10">
                @include('common/header-category-product-v2')
            </ul>
            <div class="flex-1 flex items-center justify-end">
                <button
                    class="ml-2 relative w-10 h-10 p-2 text-red-600 lg:hidden focus:outline-none focus:shadow-outline"
                    aria-label="Menu" @click.prevent="navIsOpen = !navIsOpen">
                    <svg x-show.transition.opacity="!navIsOpen" class="absolute inset-0 mt-2 ml-2 w-6 h-6"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"
                         stroke-linejoin="round">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                    <svg x-show.transition.opacity="navIsOpen" x-cloak class="absolute inset-0 mt-2 ml-2 w-6 h-6"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"
                         stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
        </div>
        <span :class="{ 'shadow-sm': navIsOpen }" class="absolute inset-0 z-20 pointer-events-none"></span>
    </div>
    <div
        x-show="navIsOpen"
        class="lg:hidden"
        x-transition:enter="duration-150"
        x-transition:leave="duration-100 ease-in"
        x-cloak
    >
        <nav
            x-show="navIsOpen"
            x-cloak
            class="absolute w-full transform origin-top shadow-sm z-10"
            x-transition:enter="duration-150 ease-out"
            x-transition:enter-start="opacity-0 -translate-y-8 scale-75"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="duration-100 ease-in"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 -translate-y-8 scale-75"
        >
            <div class="relative py-8 px-8 bg-white">
                <ul>
                    @include('common/header-category-product-v2', ['class_li' => '',
                                                                    'class_button' => 'flex items-center justify-center w-full py-2 text-center',
                                                                    'class_x_show_expanded' => 'pt-1 pb-8 transform transition-transform origin-top',
                                                                    'is_mobile' => true
                                                                    ])
                </ul>
            </div>
        </nav>
    </div>
</header>
<div class="relative max-w-screen-2xl mx-auto w-full py-10 bg-white transition duration-200">
    <div x-data="searchComponent()"
         class="ml-4 relative flex-1 flex justify-end max-w-xs w-full lg:absolute lg:right-0 lg:max-w-xxs lg:ml-10 xl:max-w-xs">
        <div
            class="relative border-b border-gray-600 border-opacity-50 overflow-hidden transition-all duration-500 lg:w-full hover:w-full focus-within:border-gray-600 w-full"
            @click.away="clear" @keydown.window.escape="clear" @keydown.arrow-up.prevent="focusPreviousResult()"
            @keydown.arrow-down.prevent="focusNextResult()">
            <svg class="absolute inset-y-0 left-0 z-10 mt-1 w-5 h-5 text-gray-900 pointer-events-none" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
            <input x-ref="searchInput"
                   class="flex-1 w-full pl-8 pr-4 py-1 placeholder-gray-900 tracking-wide bg-white focus:outline-none"
                   placeholder="Search Item" aria-label="Search Item">
        </div>
        <div class="absolute w-full mt-8 pt-px divide-y divide-gray-200 shadow-sm z-30">
            <a class="search-result block px-4 py-3 bg-gray-100 transition-colors duration-200 hover:bg-gray-200 focus:outline-none focus:bg-gray-200" id="search-result-1" href="https://laravel.com/docs/8.x/container#introduction">
                <div class="text-sm font-medium"><em class="not-italic bg-red-600 bg-opacity-25">A</em>rchitecture Concepts</div>
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
    </div>
</div>
