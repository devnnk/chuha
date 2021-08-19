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

<livewire:search-v2/>
