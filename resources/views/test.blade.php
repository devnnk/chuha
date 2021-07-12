<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laravel - The PHP Framework For Web Artisans</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">


    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="/img/favicon/safari-pinned-tab.svg" color="#ff2d20">
    <link rel="shortcut icon" href="/img/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#ff2d20">
    <meta name="msapplication-config" content="/img/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="https://use.typekit.net/ins2wgm.css">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css/app.css')}}">
</head>
<body
    x-data="{
        navIsOpen: false,
        searchIsOpen: false,
        search: '',
    }"
    class="language-php h-full w-full font-sans text-gray-900 antialiased"
>

<header
    class="relative z-50"
    @keydown.window.escape="navIsOpen = false"
    @click.away="navIsOpen = false"
>
    <div class="relative max-w-screen-2xl mx-auto w-full py-10 bg-white transition duration-200">
        <div class="max-w-screen-xl mx-auto px-8 flex items-center justify-between">
            <a href="/" class="flex items-center">
                LARAVEL
{{--                <img class="" src="/img/logomark.min.svg" alt="Laravel">--}}
{{--                <img class="hidden ml-5 sm:block" src="/img/logotype.min.svg" alt="Laravel">--}}
            </a>
            <ul class="relative hidden lg:ml-6 lg:pt-3 lg:flex lg:items-end lg:space-x-6 xl:ml-14 xl:space-x-10">
                <li><a href="/docs">Documentation</a></li>
                <li><a href="https://forge.laravel.com">Forge</a></li>
                <li x-data="{ expanded: false }" class="relative" @keydown.window.escape="expanded = false">
                    <button class="flex items-center justify-center focus:outline-none" @click="expanded = !expanded">
                        Ecosystem<span class="ml-3 flex-shrink-0"><img :class="{ 'rotate-180': expanded }"
                                                                       class="w-2.5 h-2.5 transform transition-transform"
                                                                       src="{{asset('asset/img/icons/nav_arrow.min.svg')}}" alt="Expand"></span>
                    </button>
                    <div
                        x-show="expanded"
                        x-cloak
                        class="absolute left-0 z-20 transition transform"
                        x-transition:enter="duration-250 ease-out"
                        x-transition:enter-start="opacity-0 -translate-y-8"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="duration-250 ease-in"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0 -translate-y-8"
                    >
                        <div
                            class="mt-4 ml-8 w-224 -translate-x-1/2 p-8 bg-white shadow-lg transform transition-transform origin-top"
                            @click.away="expanded = false">
                            <ul class="grid gap-3 relative sm:grid-cols-2 md:grid-cols-3">
                                <li>
                                    <a href="https://vapor.laravel.com" class="flex items-center p-4 shadow-lg">
                                        <div class="w-14 h-14 bg-vapor flex items-center justify-center">
                                            <img src="/img/ecosystem/vapor.min.svg" alt="Icon" class="w-10 h-10">
                                        </div>
                                        <div class="ml-4 leading-5">
                                            <div>Vapor</div>
                                            <span class="text-gray-600 text-xs">Serverless Platform</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://forge.laravel.com" class="flex items-center p-4 shadow-lg">
                                        <div class="w-14 h-14 bg-forge flex items-center justify-center">
                                            <img src="/img/ecosystem/forge.min.svg" alt="Icon" class="w-10 h-10">
                                        </div>
                                        <div class="ml-4 leading-5">
                                            <div>Forge</div>
                                            <span class="text-gray-600 text-xs">Server Management</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://envoyer.io" class="flex items-center p-4 shadow-lg">
                                        <div class="w-14 h-14 bg-envoyer flex items-center justify-center">
                                            <img src="/img/ecosystem/envoyer.min.svg" alt="Icon" class="w-10 h-10">
                                        </div>
                                        <div class="ml-4 leading-5">
                                            <div>Envoyer</div>
                                            <span class="text-gray-600 text-xs">Zero Downtime Deployment</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/docs/8.x/horizon" class="flex items-center p-4 shadow-lg">
                                        <div class="w-14 h-14 bg-horizon flex items-center justify-center">
                                            <img src="/img/ecosystem/horizon.min.svg" alt="Icon" class="w-10 h-10">
                                        </div>
                                        <div class="ml-4 leading-5">
                                            <div>Horizon</div>
                                            <span class="text-gray-600 text-xs">Queue Monitoring</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://nova.laravel.com/" class="flex items-center p-4 shadow-lg">
                                        <div class="w-14 h-14 bg-nova flex items-center justify-center">
                                            <img src="/img/ecosystem/nova.min.svg" alt="Icon" class="w-10 h-10">
                                        </div>
                                        <div class="ml-4 leading-5">
                                            <div>Nova</div>
                                            <span class="text-gray-600 text-xs">Administration Panel</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/docs/8.x/broadcasting" class="flex items-center p-4 shadow-lg">
                                        <div class="w-14 h-14 bg-echo flex items-center justify-center">
                                            <img src="/img/ecosystem/echo.min.svg" alt="Icon" class="w-10 h-10">
                                        </div>
                                        <div class="ml-4 leading-5">
                                            <div>Echo</div>
                                            <span class="text-gray-600 text-xs">Realtime Events</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://lumen.laravel.com" class="flex items-center p-4 shadow-lg">
                                        <div class="w-14 h-14 bg-lumen flex items-center justify-center">
                                            <img src="/img/ecosystem/lumen.min.svg" alt="Icon" class="w-10 h-10">
                                        </div>
                                        <div class="ml-4 leading-5">
                                            <div>Lumen</div>
                                            <span class="text-gray-600 text-xs">Micro-Framework</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/docs/8.x/sail" class="flex items-center p-4 shadow-lg">
                                        <div class="bg-sail flex items-center justify-center w-14 h-14">
                                            <img src="/img/ecosystem/sail.min.svg" alt="Icon" class="w-10 h-10">
                                        </div>
                                        <div class="ml-4 leading-5">
                                            <div>Sail</div>
                                            <span class="text-xs text-gray-600">Local Docker environment</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://spark.laravel.com" class="flex items-center p-4 shadow-lg">
                                        <div class="w-14 h-14 bg-spark flex items-center justify-center">
                                            <img src="/img/ecosystem/spark.min.svg" alt="Icon" class="w-10 h-10">
                                        </div>
                                        <div class="ml-4 leading-5">
                                            <div>Spark</div>
                                            <span class="text-gray-600 text-xs">SaaS App Scaffolding</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/docs/8.x/valet" class="flex items-center p-4 shadow-lg">
                                        <div class="w-14 h-14 bg-valet flex items-center justify-center">
                                            <img src="/img/ecosystem/valet.min.svg" alt="Icon" class="w-10 h-10">
                                        </div>
                                        <div class="ml-4 leading-5">
                                            <div>Valet</div>
                                            <span class="text-gray-600 text-xs">Dev Environment for Macs</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/docs/8.x/mix" class="flex items-center p-4 shadow-lg">
                                        <div class="w-14 h-14 bg-mix flex items-center justify-center">
                                            <img src="/img/ecosystem/mix.min.svg" alt="Icon" class="w-10 h-10">
                                        </div>
                                        <div class="ml-4 leading-5">
                                            <div>Mix</div>
                                            <span class="text-gray-600 text-xs">Webpack Asset Compilation</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/docs/8.x/billing" class="flex items-center p-4 shadow-lg">
                                        <div class="w-14 h-14 bg-cashier flex items-center justify-center">
                                            <img src="/img/ecosystem/cashier.min.svg" alt="Icon" class="w-10 h-10">
                                        </div>
                                        <div class="ml-4 leading-5">
                                            <div>Cashier</div>
                                            <span class="text-gray-600 text-xs">Subscription Billing Integration</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/docs/8.x/dusk" class="flex items-center p-4 shadow-lg">
                                        <div class="w-14 h-14 bg-dusk flex items-center justify-center">
                                            <img src="/img/ecosystem/dusk.min.svg" alt="Icon" class="w-10 h-10">
                                        </div>
                                        <div class="ml-4 leading-5">
                                            <div>Dusk</div>
                                            <span class="text-gray-600 text-xs">Browser Testing and Automation</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/docs/8.x/sanctum" class="flex items-center p-4 shadow-lg">
                                        <div class="bg-sanctum flex items-center justify-center w-14 h-14">
                                            <img src="/img/ecosystem/sanctum.min.svg" alt="Laravel Sanctum logomark"
                                                 class="w-10 h-10">
                                        </div>
                                        <div class="ml-4 leading-5">
                                            <div>Sanctum</div>
                                            <span class="text-xs text-gray-600">API / Mobile Authentication</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/docs/8.x/scout" class="flex items-center p-4 shadow-lg">
                                        <div class="w-14 h-14 bg-scout flex items-center justify-center">
                                            <img src="/img/ecosystem/scout.min.svg" alt="Icon" class="w-10 h-10">
                                        </div>
                                        <div class="ml-4 leading-5">
                                            <div>Scout</div>
                                            <span class="text-gray-600 text-xs">Full-Text Search</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/docs/8.x/socialite" class="flex items-center p-4 shadow-lg">
                                        <div class="w-14 h-14 bg-socialite flex items-center justify-center">
                                            <img src="/img/ecosystem/socialite.min.svg" alt="Icon" class="w-10 h-10">
                                        </div>
                                        <div class="ml-4 leading-5">
                                            <div>Socialite</div>
                                            <span class="text-gray-600 text-xs">OAuth Authentication</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/docs/8.x/telescope" class="flex items-center p-4 shadow-lg">
                                        <div class="w-14 h-14 bg-telescope flex items-center justify-center">
                                            <img src="/img/ecosystem/telescope.min.svg" alt="Icon" class="w-10 h-10">
                                        </div>
                                        <div class="ml-4 leading-5">
                                            <div>Telescope</div>
                                            <span class="text-gray-600 text-xs">Debug Assistant</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://jetstream.laravel.com" class="flex items-center p-4 shadow-lg">
                                        <div class="w-14 h-14 bg-jetstream flex items-center justify-center">
                                            <img src="/img/ecosystem/jetstream.min.svg" alt="Icon" class="w-10 h-10">
                                        </div>
                                        <div class="ml-4 leading-5">
                                            <div>Jetstream</div>
                                            <span class="text-gray-600 text-xs">App Scaffolding</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li><a href="https://laravel-news.com">News</a></li>
                <li><a href="https://partners.laravel.com">Partners</a></li>
            </ul>
            <div class="flex-1 flex items-center justify-end">
                <div x-data="searchComponent()" x-init="init()"
                     class="ml-4 relative flex-1 flex justify-end max-w-xs w-full lg:absolute lg:right-0 lg:max-w-xxs lg:ml-10 xl:max-w-xs">
                    <div
                        class="relative w-6 border-b border-gray-600 border-opacity-50 overflow-hidden transition-all duration-500 lg:w-full hover:w-full focus-within:border-gray-600"
                        :class="{ 'w-6': !searchIsOpen, 'w-full': searchIsOpen }"
                        @click="searchIsOpen = true"
                        @click.away="clear"
                        @keydown.window.escape="clear"
                        @keydown.arrow-up.prevent="focusPreviousResult()"
                        @keydown.arrow-down.prevent="focusNextResult()"
                        @keydown.window="handleSlashKey"
                    >
                        <svg class="absolute inset-y-0 left-0 z-10 mt-1 w-5 h-5 text-gray-900 pointer-events-none"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <input
                            x-model.debouce.200ms="search"
                            x-ref="searchInput"
                            class="flex-1 w-full pl-8 pr-4 py-1 placeholder-gray-900 tracking-wide bg-white focus:outline-none"
                            placeholder="Search Docs (Press '/')"
                            aria-label="Search in the documentation"
                        >
                    </div>
                    <div x-show="hits.length" x-cloak
                         class="absolute w-full mt-8 pt-px divide-y divide-gray-200 shadow-sm z-30">
                        <template x-for="(hit, index) in hits" :key="index">
                            <a
                                :id="'search-result-' + index"
                                :href="hit.url"
                                class="search-result block px-4 py-3 bg-gray-100 transition-colors duration-200 hover:bg-gray-200 focus:outline-none focus:bg-gray-200"
                                @keydown.arrow-up.prevent="focusPreviousResult(index)"
                                @keydown.arrow-down.prevent="focusNextResult(index)"
                            >
                                <div x-show="hit._highlightResult.hierarchy.lvl0" class="text-sm font-medium"
                                     x-html="hit._highlightResult.hierarchy.lvl0 ? hit._highlightResult.hierarchy.lvl0.value : ''"></div>
                                <div class="mt-2">
                                    <div x-show="hit._highlightResult.hierarchy.lvl1" class="text-sm">
                                        <span class="text-red-600 opacity-75">#</span> <span
                                            x-html="hit._highlightResult.hierarchy.lvl1 ? hit._highlightResult.hierarchy.lvl1.value : ''"></span>
                                    </div>

                                    <div x-show="hit._highlightResult.hierarchy.lvl2" class="text-sm">
                                        > <span
                                            x-html="hit._highlightResult.hierarchy.lvl2 ? hit._highlightResult.hierarchy.lvl2.value : ''"></span>
                                    </div>

                                    <div x-show="hit._highlightResult.hierarchy.lvl3" class="text-sm">
                                        > <span
                                            x-html="hit._highlightResult.hierarchy.lvl3 ? hit._highlightResult.hierarchy.lvl3.value : ''"></span>
                                    </div>

                                    <div x-show="hit._highlightResult.hierarchy.lvl4" class="text-sm">
                                        > <span
                                            x-html="hit._highlightResult.hierarchy.lvl4 ? hit._highlightResult.hierarchy.lvl4.value : ''"></span>
                                    </div>

                                    <div x-show="hit._highlightResult.hierarchy.lvl5" class="text-sm">
                                        > <span
                                            x-html="hit._highlightResult.hierarchy.lvl5 ? hit._highlightResult.hierarchy.lvl5.value : ''"></span>
                                    </div>
                                </div>
                            </a>
                        </template>
                        <div class="bg-gray-100 flex justify-end">
                            <a class="px-4 py-2 inline-block" target="_blank"
                               href="https://www.algolia.com/?utm_source=laravel&utm_medium=link&utm_campaign=laravel_documentation_search">
                                <img width="105" src="/img/icons/algolia.min.svg" alt="Algolia">
                            </a>
                        </div>
                    </div>

                    <div x-show="search && ! hits.length" x-cloak
                         class="absolute w-full mt-8 pt-px divide-y divide-gray-200 shadow-sm z-30">
                        <div class="px-4 py-2 bg-gray-100">
                            <div class="text-sm" x-text="`We didn't find any result for '${search}'. Sorry!`"></div>
                        </div>
                        <div class="bg-gray-100 flex justify-end">
                            <a class="px-4 py-2 inline-block" target="_blank"
                               href="https://www.algolia.com/?utm_source=laravel&utm_medium=link&utm_campaign=laravel_documentation_search">
                                <img width="105" src="/img/icons/algolia.min.svg" alt="Algolia">
                            </a>
                        </div>
                    </div>
                </div>
                <button
                    class="ml-2 relative w-10 h-10 p-2 text-red-600 lg:hidden focus:outline-none focus:shadow-outline"
                    aria-label="Menu" @click.prevent="navIsOpen = !navIsOpen">
                    <svg x-show.transition.opacity="! navIsOpen" class="absolute inset-0 mt-2 ml-2 w-6 h-6"
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
                    <li><a class="block w-full py-2 text-center" href="/docs">Documentation</a></li>
                    <li><a class="block w-full py-2 text-center" href="https://forge.laravel.com">Forge</a></li>
                    <li x-data="{ expanded: false }" @keydown.window.escape="expanded = false"
                        @click.away="expanded = false">
                        <button class="flex items-center justify-center w-full py-2 text-center"
                                @click="expanded = !expanded">
                            Ecosystem
                            <span class="ml-3 flex-shrink-0">
                                <img :class="{ 'rotate-180': expanded }"
                                     class="w-2.5 h-2.5 transform transition-transform"
                                     src="/img/icons/nav_arrow.min.svg" alt="Expand">
                            </span>
                        </button>
                        <div
                            x-show="expanded"
                            x-cloak
                            class="pt-1 pb-8 transform transition-transform origin-top"
                            x-transition:enter="duration-250 ease-out"
                            x-transition:enter-start="opacity-0 -translate-y-8"
                            x-transition:enter-end="opacity-100"
                            x-transition:leave="duration-250 ease-in"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0 -translate-y-8"
                        >
                            <ul class="grid gap-3 relative sm:grid-cols-2 md:grid-cols-3">
                                <li>
                                    <a href="https://vapor.laravel.com" class="flex items-center p-4 shadow-lg">
                                        <div class="w-14 h-14 bg-vapor flex items-center justify-center">
                                            <img src="/img/ecosystem/vapor.min.svg" alt="Icon" class="w-10 h-10">
                                        </div>
                                        <div class="ml-4 leading-5">
                                            <div>Vapor</div>
                                            <span class="text-gray-600 text-xs">Serverless Platform</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://forge.laravel.com" class="flex items-center p-4 shadow-lg">
                                        <div class="w-14 h-14 bg-forge flex items-center justify-center">
                                            <img src="/img/ecosystem/forge.min.svg" alt="Icon" class="w-10 h-10">
                                        </div>
                                        <div class="ml-4 leading-5">
                                            <div>Forge</div>
                                            <span class="text-gray-600 text-xs">Server Management</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://envoyer.io" class="flex items-center p-4 shadow-lg">
                                        <div class="w-14 h-14 bg-envoyer flex items-center justify-center">
                                            <img src="/img/ecosystem/envoyer.min.svg" alt="Icon" class="w-10 h-10">
                                        </div>
                                        <div class="ml-4 leading-5">
                                            <div>Envoyer</div>
                                            <span class="text-gray-600 text-xs">Zero Downtime Deployment</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/docs/8.x/horizon" class="flex items-center p-4 shadow-lg">
                                        <div class="w-14 h-14 bg-horizon flex items-center justify-center">
                                            <img src="/img/ecosystem/horizon.min.svg" alt="Icon" class="w-10 h-10">
                                        </div>
                                        <div class="ml-4 leading-5">
                                            <div>Horizon</div>
                                            <span class="text-gray-600 text-xs">Queue Monitoring</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://nova.laravel.com/" class="flex items-center p-4 shadow-lg">
                                        <div class="w-14 h-14 bg-nova flex items-center justify-center">
                                            <img src="/img/ecosystem/nova.min.svg" alt="Icon" class="w-10 h-10">
                                        </div>
                                        <div class="ml-4 leading-5">
                                            <div>Nova</div>
                                            <span class="text-gray-600 text-xs">Administration Panel</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/docs/8.x/broadcasting" class="flex items-center p-4 shadow-lg">
                                        <div class="w-14 h-14 bg-echo flex items-center justify-center">
                                            <img src="/img/ecosystem/echo.min.svg" alt="Icon" class="w-10 h-10">
                                        </div>
                                        <div class="ml-4 leading-5">
                                            <div>Echo</div>
                                            <span class="text-gray-600 text-xs">Realtime Events</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://lumen.laravel.com" class="flex items-center p-4 shadow-lg">
                                        <div class="w-14 h-14 bg-lumen flex items-center justify-center">
                                            <img src="/img/ecosystem/lumen.min.svg" alt="Icon" class="w-10 h-10">
                                        </div>
                                        <div class="ml-4 leading-5">
                                            <div>Lumen</div>
                                            <span class="text-gray-600 text-xs">Micro-Framework</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/docs/8.x/homestead" class="flex items-center p-4 shadow-lg">
                                        <div class="w-14 h-14 bg-homestead flex items-center justify-center">
                                            <img src="/img/ecosystem/homestead.min.svg" alt="Icon" class="w-10 h-10">
                                        </div>
                                        <div class="ml-4 leading-5">
                                            <div>Homestead</div>
                                            <span class="text-gray-600 text-xs">Pre-Packaged Vagrant Box</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://spark.laravel.com" class="flex items-center p-4 shadow-lg">
                                        <div class="w-14 h-14 bg-spark flex items-center justify-center">
                                            <img src="/img/ecosystem/spark.min.svg" alt="Icon" class="w-10 h-10">
                                        </div>
                                        <div class="ml-4 leading-5">
                                            <div>Spark</div>
                                            <span class="text-gray-600 text-xs">SaaS App Scaffolding</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/docs/8.x/valet" class="flex items-center p-4 shadow-lg">
                                        <div class="w-14 h-14 bg-valet flex items-center justify-center">
                                            <img src="/img/ecosystem/valet.min.svg" alt="Icon" class="w-10 h-10">
                                        </div>
                                        <div class="ml-4 leading-5">
                                            <div>Valet</div>
                                            <span class="text-gray-600 text-xs">Dev Environment for Macs</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/docs/8.x/mix" class="flex items-center p-4 shadow-lg">
                                        <div class="w-14 h-14 bg-mix flex items-center justify-center">
                                            <img src="/img/ecosystem/mix.min.svg" alt="Icon" class="w-10 h-10">
                                        </div>
                                        <div class="ml-4 leading-5">
                                            <div>Mix</div>
                                            <span class="text-gray-600 text-xs">Webpack Asset Compilation</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/docs/8.x/billing" class="flex items-center p-4 shadow-lg">
                                        <div class="w-14 h-14 bg-cashier flex items-center justify-center">
                                            <img src="/img/ecosystem/cashier.min.svg" alt="Icon" class="w-10 h-10">
                                        </div>
                                        <div class="ml-4 leading-5">
                                            <div>Cashier</div>
                                            <span class="text-gray-600 text-xs">Subscription Billing Integration</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/docs/8.x/dusk" class="flex items-center p-4 shadow-lg">
                                        <div class="w-14 h-14 bg-dusk flex items-center justify-center">
                                            <img src="/img/ecosystem/dusk.min.svg" alt="Icon" class="w-10 h-10">
                                        </div>
                                        <div class="ml-4 leading-5">
                                            <div>Dusk</div>
                                            <span class="text-gray-600 text-xs">Browser Testing and Automation</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/docs/8.x/passport" class="flex items-center p-4 shadow-lg">
                                        <div class="w-14 h-14 bg-passport flex items-center justify-center">
                                            <img src="/img/ecosystem/passport.min.svg" alt="Icon" class="w-10 h-10">
                                        </div>
                                        <div class="ml-4 leading-5">
                                            <div>Passport</div>
                                            <span class="text-gray-600 text-xs">Painless OAuth2 Implementation</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/docs/8.x/scout" class="flex items-center p-4 shadow-lg">
                                        <div class="w-14 h-14 bg-scout flex items-center justify-center">
                                            <img src="/img/ecosystem/scout.min.svg" alt="Icon" class="w-10 h-10">
                                        </div>
                                        <div class="ml-4 leading-5">
                                            <div>Scout</div>
                                            <span class="text-gray-600 text-xs">Full-Text Search</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/docs/8.x/socialite" class="flex items-center p-4 shadow-lg">
                                        <div class="w-14 h-14 bg-socialite flex items-center justify-center">
                                            <img src="/img/ecosystem/socialite.min.svg" alt="Icon" class="w-10 h-10">
                                        </div>
                                        <div class="ml-4 leading-5">
                                            <div>Socialite</div>
                                            <span class="text-gray-600 text-xs">OAuth Authentication</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/docs/8.x/telescope" class="flex items-center p-4 shadow-lg">
                                        <div class="w-14 h-14 bg-telescope flex items-center justify-center">
                                            <img src="/img/ecosystem/telescope.min.svg" alt="Icon" class="w-10 h-10">
                                        </div>
                                        <div class="ml-4 leading-5">
                                            <div>Telescope</div>
                                            <span class="text-gray-600 text-xs">Debug Assistant</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://jetstream.laravel.com" class="flex items-center p-4 shadow-lg">
                                        <div class="w-14 h-14 bg-jetstream flex items-center justify-center">
                                            <img src="/img/ecosystem/jetstream.min.svg" alt="Icon" class="w-10 h-10">
                                        </div>
                                        <div class="ml-4 leading-5">
                                            <div>Jetstream</div>
                                            <span class="text-gray-600 text-xs">App Scaffolding</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li><a class="block w-full py-2 text-center" href="https://laravel-news.com">News</a></li>
                    <li><a class="block w-full py-2 text-center" href="https://partners.laravel.com">Partners</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<div class="overflow-hidden">
    <div class="max-w-screen-xl px-8 mx-auto">
        <div class="sm:transform sm:-translate-x-8 sm:py-6 2xl:-translate-x-24 py-3">
            <a href="https://forge.laravel.com/" class="hover:bg-gray-200 flex max-w-md transition bg-gray-100">
                <div class="bg-vapor sm:w-12 sm:h-12 flex items-center justify-center w-10 h-10">
                    <img src="/img/ecosystem/laracon-online.svg" alt="Laravel Forge" class="w-7 h-7">
                </div>
                <div class="flex items-center self-stretch px-3">
                    <p class="sm:text-sm text-xs text-gray-700">
                        Forge helps deploy your applications! <span class="whitespace-nowrap">Sign up now! →</span>
                    </p>
                </div>
            </a>
        </div>
    </div>

    <section class="md:py-20 xl:py-28 py-12">
        <div class="relative max-w-screen-xl px-8 mx-auto">
            <div style="z-index: -9998"
                 class="md:w-full md:transform md:translate-x-1/4 md:absolute md:-top-16 md:-right-16 md:h-80 md:flex md:items-center lg:w-3/4 lg:right-16 lg:h-96 hidden">
                <video poster="/img/hero/hero_poster.jpg" playsinline autoplay muted loop>
                    <source src="/img/hero/hero.mp4" type="video/mp4">
                </video>
            </div>
            <h1 class="sm:text-4xl lg:text-5xl lg:leading-tight xl:max-w-3xl xl:pr-8 xl:text-5xl max-w-xl text-3xl font-medium tracking-tight">
                The PHP Framework for <span class="whitespace-nowrap">Web Artisans</span></h1>
            <p class="sm:mt-5 lg:mt-8 lg:max-w-xl lg:text-lg xl:max-w-2xl max-w-md mt-3 text-gray-600">Laravel is a web
                application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you
                to create without sweating the small things.</p>
            <div class="sm:flex-row sm:mt-8 sm:space-y-0 sm:space-x-4 md:mt-8 lg:mt-12 flex flex-col mt-6 space-y-4">
                <a class="group relative h-12 inline-flex w-64 border border-red-600 sm:w-56 focus:outline-none"
                   href="/docs">
    <span
        class="absolute inset-0 inline-flex items-center justify-center self-stretch px-6 text-white text-center font-medium bg-red-600 ring-1 ring-red-600 ring-offset-1 ring-offset-red-600 transform transition-transform group-hover:-translate-y-1 group-hover:-translate-x-1 group-focus:-translate-y-1 group-focus:-translate-x-1">
        Documentation
    </span>
                </a>

                <a class="group relative h-12 inline-flex w-64 border border-red-600 sm:w-56 focus:outline-none"
                   href="https://laracasts.com" target="_blank">
    <span
        class="absolute inset-0 inline-flex items-center justify-center self-stretch px-6 text-red-600 text-center font-medium bg-white ring-1 ring-red-600 ring-offset-1 transform transition-transform group-hover:-translate-y-1 group-hover:-translate-x-1 group-focus:-translate-y-1 group-focus:-translate-x-1">
        <img class="flex-shrink-0 w-6 h-6" src="/img/icons/play.min.svg" alt="Play Video">
                        <span class="ml-3">Watch Laracasts</span>
    </span>
                </a>

            </div>
        </div>
    </section>
</div>

<div class="md:py-40 lg:py-64 xl:py-72 relative py-16 overflow-hidden">
    <div class="md:space-y-0 md:flex md:items-center relative max-w-screen-xl px-8 mx-auto space-y-16">
        <div style="z-index: -9999; width: 120%"
             class="md:transform md:-translate-x-1/2 md:absolute md:inset-y-0 md:left-0 md:h-full md:flex md:items-center hidden">
            <video class="w-full" poster="/img/blocks/blocks_3.jpg" playsinline autoplay muted loop>
                <source src="/img/blocks/blocks_3.mp4" type="video/mp4">
            </video>
        </div>
        <div class="md:max-w-auto md:w-1/2 max-w-lg">
            <img class="w-full shadow-lg" src="/img/homepage/forge.png" alt="Forge">
        </div>
        <div class="md:w-1/2 md:pl-8 lg:pl-24">
            <h1 class="sm:text-4xl lg:text-5xl lg:leading-tight xl:text-5xl text-3xl font-medium tracking-tight">Laravel
                Forge</h1>
            <p class="sm:mt-5 md:max-w-2xl md:mt-8 md:text-lg max-w-xl mt-3 text-gray-600">Instant PHP Platforms on
                DigitalOcean, Linode, and more. Featuring push-to-deploy, Redis, queues, and everything else you could
                need to launch and deploy impressive Laravel applications.</p>
            <a class="group relative h-12 inline-flex w-64 border border-red-600 sm:w-56 focus:outline-none sm:mt-8 md:mt-10 mt-6"
               href="https://forge.laravel.com" target="_blank">
    <span
        class="absolute inset-0 inline-flex items-center justify-center self-stretch px-6 text-white text-center font-medium bg-red-600 ring-1 ring-red-600 ring-offset-1 ring-offset-red-600 transform transition-transform group-hover:-translate-y-1 group-hover:-translate-x-1 group-focus:-translate-y-1 group-focus:-translate-x-1">
        Learn More
    </span>
            </a>

        </div>
    </div>
</div>

<div class="max-w-screen-xl px-8 mx-auto">
    <h6 class="mx-auto text-lg font-medium text-center text-gray-600">Revolutionize how you build the web.</h6>
    <h1 class="sm:text-4xl lg:text-5xl lg:leading-tight xl:text-5xl mx-auto mt-4 text-3xl font-medium tracking-tight text-center">
        The Laravel Ecosystem</h1>
    <ul class="sm:grid-cols-2 md:mt-24 md:grid-cols-3 relative grid gap-6 mt-16">
        <li>
            <a href="https://vapor.laravel.com" class="flex items-center p-4 shadow-lg">
                <div class="bg-vapor flex items-center justify-center w-16 h-16">
                    <img src="/img/ecosystem/vapor.min.svg" alt="Icon" class="w-10 h-10">
                </div>
                <div class="ml-4 leading-5">
                    <div class="text-2xl">Vapor</div>
                    <span class="text-xs text-gray-600">Serverless Platform</span>
                </div>
            </a>
        </li>
        <li>
            <a href="https://forge.laravel.com" class="flex items-center p-4 shadow-lg">
                <div class="bg-forge flex items-center justify-center w-16 h-16">
                    <img src="/img/ecosystem/forge.min.svg" alt="Icon" class="w-10 h-10">
                </div>
                <div class="ml-4 leading-5">
                    <div class="text-2xl">Forge</div>
                    <span class="text-xs text-gray-600">Server Management</span>
                </div>
            </a>
        </li>
        <li>
            <a href="https://envoyer.io" class="flex items-center p-4 shadow-lg">
                <div class="bg-envoyer flex items-center justify-center w-16 h-16">
                    <img src="/img/ecosystem/envoyer.min.svg" alt="Icon" class="w-10 h-10">
                </div>
                <div class="ml-4 leading-5">
                    <div class="text-2xl">Envoyer</div>
                    <span class="text-xs text-gray-600">Zero Downtime Deployment</span>
                </div>
            </a>
        </li>
        <li>
            <a href="/docs/8.x/horizon" class="flex items-center p-4 shadow-lg">
                <div class="bg-horizon flex items-center justify-center w-16 h-16">
                    <img src="/img/ecosystem/horizon.min.svg" alt="Icon" class="w-10 h-10">
                </div>
                <div class="ml-4 leading-5">
                    <div class="text-2xl">Horizon</div>
                    <span class="text-xs text-gray-600">Queue Monitoring</span>
                </div>
            </a>
        </li>
        <li>
            <a href="https://nova.laravel.com/" class="flex items-center p-4 shadow-lg">
                <div class="bg-nova flex items-center justify-center w-16 h-16">
                    <img src="/img/ecosystem/nova.min.svg" alt="Icon" class="w-10 h-10">
                </div>
                <div class="ml-4 leading-5">
                    <div class="text-2xl">Nova</div>
                    <span class="text-xs text-gray-600">Administration Panel</span>
                </div>
            </a>
        </li>
        <li>
            <a href="/docs/8.x/broadcasting" class="flex items-center p-4 shadow-lg">
                <div class="bg-echo flex items-center justify-center w-16 h-16">
                    <img src="/img/ecosystem/echo.min.svg" alt="Icon" class="w-10 h-10">
                </div>
                <div class="ml-4 leading-5">
                    <div class="text-2xl">Echo</div>
                    <span class="text-xs text-gray-600">Realtime Events</span>
                </div>
            </a>
        </li>
        <li>
            <a href="https://lumen.laravel.com" class="flex items-center p-4 shadow-lg">
                <div class="bg-lumen flex items-center justify-center w-16 h-16">
                    <img src="/img/ecosystem/lumen.min.svg" alt="Icon" class="w-10 h-10">
                </div>
                <div class="ml-4 leading-5">
                    <div class="text-2xl">Lumen</div>
                    <span class="text-xs text-gray-600">Micro-Framework</span>
                </div>
            </a>
        </li>
        <li>
            <a href="/docs/8.x/sail" class="flex items-center p-4 shadow-lg">
                <div class="bg-sail flex items-center justify-center w-16 h-16">
                    <img src="/img/ecosystem/sail.min.svg" alt="Icon" class="w-10 h-10">
                </div>
                <div class="ml-4 leading-5">
                    <div class="text-2xl">Sail</div>
                    <span class="text-xs text-gray-600">Local Docker environment</span>
                </div>
            </a>
        </li>
        <li>
            <a href="https://spark.laravel.com" class="flex items-center p-4 shadow-lg">
                <div class="bg-spark flex items-center justify-center w-16 h-16">
                    <img src="/img/ecosystem/spark.min.svg" alt="Icon" class="w-10 h-10">
                </div>
                <div class="ml-4 leading-5">
                    <div class="text-2xl">Spark</div>
                    <span class="text-xs text-gray-600">SaaS App Scaffolding</span>
                </div>
            </a>
        </li>
        <li>
            <a href="/docs/8.x/valet" class="flex items-center p-4 shadow-lg">
                <div class="bg-valet flex items-center justify-center w-16 h-16">
                    <img src="/img/ecosystem/valet.min.svg" alt="Icon" class="w-10 h-10">
                </div>
                <div class="ml-4 leading-5">
                    <div class="text-2xl">Valet</div>
                    <span class="text-xs text-gray-600">Dev Environment for Macs</span>
                </div>
            </a>
        </li>
        <li>
            <a href="/docs/8.x/mix" class="flex items-center p-4 shadow-lg">
                <div class="bg-mix flex items-center justify-center w-16 h-16">
                    <img src="/img/ecosystem/mix.min.svg" alt="Icon" class="w-10 h-10">
                </div>
                <div class="ml-4 leading-5">
                    <div class="text-2xl">Mix</div>
                    <span class="text-xs text-gray-600">Webpack Asset Compilation</span>
                </div>
            </a>
        </li>
        <li>
            <a href="/docs/8.x/billing" class="flex items-center p-4 shadow-lg">
                <div class="bg-cashier flex items-center justify-center w-16 h-16">
                    <img src="/img/ecosystem/cashier.min.svg" alt="Icon" class="w-10 h-10">
                </div>
                <div class="ml-4 leading-5">
                    <div class="text-2xl">Cashier</div>
                    <span class="text-xs text-gray-600">Subscription Billing Integration</span>
                </div>
            </a>
        </li>
        <li>
            <a href="/docs/8.x/dusk" class="flex items-center p-4 shadow-lg">
                <div class="bg-dusk flex items-center justify-center w-16 h-16">
                    <img src="/img/ecosystem/dusk.min.svg" alt="Icon" class="w-10 h-10">
                </div>
                <div class="ml-4 leading-5">
                    <div class="text-2xl">Dusk</div>
                    <span class="text-xs text-gray-600">Browser Testing and Automation</span>
                </div>
            </a>
        </li>
        <li>
            <a href="/docs/8.x/sanctum" class="flex items-center p-4 shadow-lg">
                <div class="bg-sanctum flex items-center justify-center w-16 h-16">
                    <img src="/img/ecosystem/sanctum.min.svg" alt="Laravel Sanctum logomark" class="w-10 h-10">
                </div>
                <div class="ml-4 leading-5">
                    <div class="text-2xl">Sanctum</div>
                    <span class="text-xs text-gray-600">API / Mobile Authentication</span>
                </div>
            </a>
        </li>
        <li>
            <a href="/docs/8.x/scout" class="flex items-center p-4 shadow-lg">
                <div class="bg-scout flex items-center justify-center w-16 h-16">
                    <img src="/img/ecosystem/scout.min.svg" alt="Laravel Scout logomark" class="w-10 h-10">
                </div>
                <div class="ml-4 leading-5">
                    <div class="text-2xl">Scout</div>
                    <span class="text-xs text-gray-600">Full-Text Search</span>
                </div>
            </a>
        </li>
        <li>
            <a href="/docs/8.x/socialite" class="flex items-center p-4 shadow-lg">
                <div class="bg-socialite flex items-center justify-center w-16 h-16">
                    <img src="/img/ecosystem/socialite.min.svg" alt="Icon" class="w-10 h-10">
                </div>
                <div class="ml-4 leading-5">
                    <div class="text-2xl">Socialite</div>
                    <span class="text-xs text-gray-600">OAuth Authentication</span>
                </div>
            </a>
        </li>
        <li>
            <a href="/docs/8.x/telescope" class="flex items-center p-4 shadow-lg">
                <div class="bg-telescope flex items-center justify-center w-16 h-16">
                    <img src="/img/ecosystem/telescope.min.svg" alt="Icon" class="w-10 h-10">
                </div>
                <div class="ml-4 leading-5">
                    <div class="text-2xl">Telescope</div>
                    <span class="text-xs text-gray-600">Debug Assistant</span>
                </div>
            </a>
        </li>
        <li>
            <a href="https://jetstream.laravel.com" class="flex items-center p-4 shadow-lg">
                <div class="bg-jetstream flex items-center justify-center w-16 h-16">
                    <img src="/img/ecosystem/jetstream.min.svg" alt="Icon" class="w-10 h-10">
                </div>
                <div class="ml-4 leading-5">
                    <div class="text-2xl">Jetstream</div>
                    <span class="text-xs text-gray-600">App Scaffolding</span>
                </div>
            </a>
        </li>
    </ul>
</div>

<div class="md:py-40 lg:py-64 xl:py-80 py-16 overflow-hidden">
    <div class="md:space-y-0 md:flex md:items-center relative max-w-screen-xl px-8 mx-auto space-y-12">
        <div style="z-index: -9998; width: 120%"
             class="md:transform md:translate-x-1/3 md:absolute md:inset-y-0 md:right-0 md:flex md:items-center hidden">
            <video poster="/img/blocks/blocks_4.jpg" playsinline autoplay muted loop>
                <source src="/img/blocks/blocks_4.mp4" type="video/mp4">
            </video>
        </div>
        <div class="md:w-1/2">
            <h6 class="text-lg font-medium text-gray-600">Resources</h6>
            <h1 class="sm:text-4xl md:mt-4 md:max-w-4xl md:text-5xl md:leading-tight xl:text-5xl max-w-md mt-2 text-3xl font-medium tracking-tight">
                A community built<br class="md:hidden lg:inline"> for people like you</h1>
            <p class="sm:mt-5 md:max-w-2xl md:mt-8 md:text-lg max-w-xl mt-3 text-gray-600">Whether you’re a solo
                developer or a 20-person team, getting started is simple thanks to our great community.</p>
            <ul class="list-custom sm:mt-8 grid max-w-md grid-cols-2 gap-4 mt-6 text-sm font-medium leading-4 text-gray-600">
                <li><a href="https://blog.laravel.com">Blog</a></li>
                <li><a href="https://laracasts.com">Laracasts</a></li>
                <!-- <li><a href="http://laravelpodcast.com/">Podcast</a></li> -->
                <li><a href="https://laravel-news.com">Laravel News</a></li>
                <li><a href="https://laracon.us/">Laracon</a></li>
                <li><a href="https://larajobs.com/">Jobs</a></li>
                <li><a href="https://laracon.eu/">Laracon EU</a></li>
                <li><a href="https://laracasts.com/discuss">Forums</a></li>
                <li><a href="https://laracon.com.au/">Laracon AU</a></li>
                <li><a href="https://certification.laravel.com/">Certification</a></li>
            </ul>
        </div>

        <div class="md:w-1/2 md:px-12 pr-12">
            <div class="lg:p-16 relative max-w-lg p-6 bg-white shadow-lg">
                <div
                    class="sm:w-24 sm:h-24 md:w-16 md:h-16 lg:w-24 lg:h-24 absolute right-0 flex items-center justify-center w-16 h-16 transform translate-x-8 bg-black">
                    <img class="w-9 h-9 sm:w-14 sm:h-14 md:w-9 md:h-9 lg:w-14 lg:h-14"
                         src="/img/icons/laracasts.min.svg" alt="Laracasts">
                </div>
                <h6 class="text-sm font-medium text-gray-600">Featured Resource</h6>
                <h3 class="sm:mt-5 sm:text-2xl mt-3 text-xl font-medium">Laracasts</h3>
                <p class="sm:mt-5 sm:text-base md:mt-8 md:leading-6 lg:max-w-sm max-w-xs mt-3 text-xs leading-5 text-gray-600">
                    Nine out of ten doctors recommend Laracasts over competing brands. Check them out, see for yourself,
                    and massively level up your development skills in the process.</p>
                <a class="group relative h-12 inline-flex w-64 border border-red-600 sm:w-56 focus:outline-none mt-6"
                   href="https://laracasts.com">
    <span
        class="absolute inset-0 inline-flex items-center justify-center self-stretch px-6 text-red-600 text-center font-medium bg-white ring-1 ring-red-600 ring-offset-1 transform transition-transform group-hover:-translate-y-1 group-hover:-translate-x-1 group-focus:-translate-y-1 group-focus:-translate-x-1">
        Start Learning →
    </span>
                </a>

            </div>
        </div>
    </div>
</div>

<footer style="background: linear-gradient(0deg,#fff 90%,hsla(0,0%,100%,0))" class="relative z-30">
    <div class="relative z-20 overflow-x-hidden">
        <div class="relative max-w-screen-2xl mx-auto sm:px-8">
            <div class="absolute inset-0 flex flex-col px-4 lg:px-12 xl:px-16">
                <div class="flex-1"></div>
                <div class="flex-1 bg-gray-100"></div>
            </div>
            <div class="relative max-w-screen-xl mx-auto px-8">
                <section class="relative z-10 p-6 bg-white shadow-lg md:flex md:items-center md:p-12 lg:p-16">
                    <div class="content md:pr-12">
                        <h2 class="text-3xl tracking-tight sm:text-4xl md:mt-4 xl:text-5xl">Become a Laravel
                            Partner</h2>
                        <p class="mt-3 max-w-xl text-gray-600 sm:mt-5 md:max-w-2xl md:mt-8 md:text-lg">Laravel Partners
                            are elite shops providing top-notch Laravel development and consulting. Each of our partners
                            can help you craft a beautiful, well-architected project.</p>
                    </div>
                    <a class="group relative h-12 inline-flex w-64 border border-red-600 sm:w-56 focus:outline-none mt-8"
                       href="/partners">
    <span
        class="absolute inset-0 inline-flex items-center justify-center self-stretch px-6 text-white text-center font-medium bg-red-600 ring-1 ring-red-600 ring-offset-1 ring-offset-red-600 transform transition-transform group-hover:-translate-y-1 group-hover:-translate-x-1 group-focus:-translate-y-1 group-focus:-translate-x-1">
        Our Partners
    </span>
                    </a>

                </section>
            </div>
        </div>

        <div class="max-w-screen-2xl mx-auto px-4 lg:px-12 xl:px-16">
            <div class="px-8 pb-12 bg-gray-100 xl:px-20">
                <div>
                    <img class="-mt-2 max-w-4xl w-full transform -translate-x-12 lg:-translate-x-24 xl:-translate-x-40"
                         src="/img/logotype.min.svg" alt="Laravel">
                </div>
                <div class="mt-6 sm:mt-12 md:flex">
                    <div class="divide-y divide-gray-600 divide-opacity-25 sm:hidden">
                        <div
                            x-data="{ expanded: false }"
                            class="py-4"
                        >
                            <button class="-mx-2 px-2 w-full flex items-center justify-between py-2 font-bold"
                                    @click="expanded = ! expanded">
                                <span>Highlights</span>
                                <span class="transform transition-transform"
                                      :class="{ 'rotate-45': expanded }">&plus;</span>
                            </button>
                            <div
                                x-show="expanded"
                                x-cloak
                                class="py-2 transition transform"
                                x-transition:enter="duration-250 ease-out"
                                x-transition:enter-start="opacity-0 -translate-y-8"
                                x-transition:enter-end="opacity-100"
                                x-transition:leave="duration-250 ease-in"
                                x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0 -translate-y-8"
                            >
                                <ul class="space-y-2 text-gray-600 text-sm">
                                    <li><a href="/team">Our Team</a></li>
                                    <li><a href="/docs/8.x/releases">Release Notes</a></li>
                                    <li><a href="/docs/8.x/installation">Getting Started</a></li>
                                    <li><a href="/docs/8.x/routing">Routing</a></li>
                                    <li><a href="/docs/8.x/blade">Blade Templates</a></li>
                                    <li><a href="/docs/8.x/authentication">Authentication</a></li>
                                    <li><a href="/docs/8.x/authorization">Authorization</a></li>
                                    <li><a href="/docs/8.x/artisan">Artisan Console</a></li>
                                    <li><a href="/docs/8.x/database">Database</a></li>
                                    <li><a href="/docs/8.x/eloquent">Eloquent ORM</a></li>
                                    <li><a href="/docs/8.x/testing">Testing</a></li>
                                </ul>
                            </div>
                        </div>
                        <div
                            x-data="{ expanded: false }"
                            class="py-4"
                        >
                            <button class="-mx-2 px-2 w-full flex items-center justify-between py-2 font-bold"
                                    @click="expanded = ! expanded">
                                <span>Resources</span>
                                <span class="transform transition-transform"
                                      :class="{ 'rotate-45': expanded }">&plus;</span>
                            </button>
                            <div
                                x-show="expanded"
                                x-cloak
                                class="py-2 transition transform"
                                x-transition:enter="duration-250 ease-out"
                                x-transition:enter-start="opacity-0 -translate-y-8"
                                x-transition:enter-end="opacity-100"
                                x-transition:leave="duration-250 ease-in"
                                x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0 -translate-y-8"
                            >
                                <ul class="space-y-2 text-gray-600 text-sm">
                                    <li><a href="https://laracasts.com">Laracasts</a></li>
                                    <li><a href="https://laravel-news.com">Laravel News</a></li>
                                    <li><a href="https://laracon.us">Laracon</a></li>
                                    <li><a href="https://laracon.eu/">Laracon EU</a></li>
                                    <li><a href="https://larajobs.com">Jobs</a></li>
                                    <li><a href="https://certification.laravel.com/">Certification</a></li>
                                    <li><a href="https://laracasts.com/discuss">Forums</a></li>
                                </ul>
                            </div>
                        </div>
                        <div
                            x-data="{ expanded: false }"
                            class="py-4"
                        >
                            <button class="-mx-2 px-2 w-full flex items-center justify-between py-2 font-bold"
                                    @click="expanded = ! expanded">
                                <span>Partners</span>
                                <span class="transform transition-transform"
                                      :class="{ 'rotate-45': expanded }">&plus;</span>
                            </button>
                            <div
                                x-show="expanded"
                                x-cloak
                                class="py-2 transition transform"
                                x-transition:enter="duration-250 ease-out"
                                x-transition:enter-start="opacity-0 -translate-y-8"
                                x-transition:enter-end="opacity-100"
                                x-transition:leave="duration-250 ease-in"
                                x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0 -translate-y-8"
                            >
                                <ul class="space-y-2 text-gray-600 text-sm">
                                    <li><a href="https://vehikl.com">Vehikl</a></li>
                                    <li><a href="https://tighten.co">Tighten</a></li>
                                    <li><a href="https://64robots.com/">64 Robots</a></li>
                                    <li><a href="https://kirschbaumdevelopment.com/">Kirschbaum</a></li>
                                    <li><a href="https://www.curotec.com/services/technologies/laravel/">Curotec</a>
                                    </li>
                                    <li><a href="https://jump24.co.uk/">Jump24</a></li>
                                    <li><a href="https://www.a2design.biz/">A2 Design</a></li>
                                    <li>
                                        <a href="https://corporate.aboutyou.de/app/uploads/2019/08/INTRO-Pitch-I-AY-Tech.pdf?utm_source=laravelpartnersfindoutmore&amp;utm_medium=socialgroups&amp;utm_campaign=tech">ABOUT
                                            YOU</a></li>
                                    <li><a href="https://www.byte5.net/">Byte 5</a></li>
                                    <li><a href="https://cubettech.com/">Cubet</a></li>
                                    <li>
                                        <a href="https://www.cyber-duck.co.uk/how-we-work/technology/laravel?utm_source=Laravel%20Partner&amp;utm_medium=Sponsorship">Cyber-Duck</a>
                                    </li>
                                    <li><a href="https://devsquad.com/">DevSquad</a></li>
                                    <li><a href="https://www.ideil.com/">Ideil</a></li>
                                    <li><a href="https://romegadigital.com/">Romega Software</a></li>
                                    <li><a href="https://www.worksome.com/">Worksome</a></li>
                                </ul>
                            </div>
                        </div>
                        <div
                            x-data="{ expanded: false }"
                            class="py-4"
                        >
                            <button class="-mx-2 px-2 w-full flex items-center justify-between py-2 font-bold"
                                    @click="expanded = ! expanded">
                                <span>Ecosystem</span>
                                <span class="transform transition-transform"
                                      :class="{ 'rotate-45': expanded }">&plus;</span>
                            </button>
                            <div
                                x-show="expanded"
                                x-cloak
                                class="py-2 transition transform"
                                x-transition:enter="duration-250 ease-out"
                                x-transition:enter-start="opacity-0 -translate-y-8"
                                x-transition:enter-end="opacity-100"
                                x-transition:leave="duration-250 ease-in"
                                x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0 -translate-y-8"
                            >
                                <ul class="space-y-2 text-gray-600 text-sm">
                                    <li><a href="/docs/8.x/billing">Cashier</a></li>
                                    <li><a href="/docs/8.x/dusk">Dusk</a></li>
                                    <li><a href="/docs/8.x/broadcasting">Echo</a></li>
                                    <li><a href="https://envoyer.io">Envoyer</a></li>
                                    <li><a href="https://forge.laravel.com">Forge</a></li>
                                    <li><a href="/docs/8.x/homestead">Homestead</a></li>
                                    <li><a href="/docs/8.x/horizon">Horizon</a></li>
                                    <li><a href="https://lumen.laravel.com">Lumen</a></li>
                                    <li><a href="/docs/8.x/mix">Mix</a></li>
                                    <li><a href="https://nova.laravel.com">Nova</a></li>
                                    <li><a href="/docs/8.x/passport">Passport</a></li>
                                    <li><a href="/docs/8.x/scout">Scout</a></li>
                                    <li><a href="/docs/8.x/socialite">Socialite</a></li>
                                    <li><a href="https://spark.laravel.com">Spark</a></li>
                                    <li><a href="/docs/8.x/telescope">Telescope</a></li>
                                    <li><a href="/docs/8.x/valet">Valet</a></li>
                                    <li><a href="https://vapor.laravel.com">Vapor</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="hidden sm:grid sm:grid-cols-2 sm:gap-x-4 sm:gap-y-8 md:w-1/2 lg:w-3/4 lg:grid-cols-4">
                        <div>
                            <span class="font-bold">Highlights</span>
                            <div class="mt-6">
                                <ul class="space-y-3 text-gray-600 text-sm">
                                    <li>
                                        <a href="/team" class="transition-colors hover:text-gray-700">Our Team</a>
                                    </li>
                                    <li>
                                        <a href="/docs/8.x/releases" class="transition-colors hover:text-gray-700">Release
                                            Notes</a>
                                    </li>
                                    <li>
                                        <a href="/docs/8.x/installation" class="transition-colors hover:text-gray-700">Getting
                                            Started</a>
                                    </li>
                                    <li>
                                        <a href="/docs/8.x/routing" class="transition-colors hover:text-gray-700">Routing</a>
                                    </li>
                                    <li>
                                        <a href="/docs/8.x/blade" class="transition-colors hover:text-gray-700">Blade
                                            Templates</a>
                                    </li>
                                    <li>
                                        <a href="/docs/8.x/authentication"
                                           class="transition-colors hover:text-gray-700">Authentication</a>
                                    </li>
                                    <li>
                                        <a href="/docs/8.x/authorization" class="transition-colors hover:text-gray-700">Authorization</a>
                                    </li>
                                    <li>
                                        <a href="/docs/8.x/artisan" class="transition-colors hover:text-gray-700">Artisan
                                            Console</a>
                                    </li>
                                    <li>
                                        <a href="/docs/8.x/database" class="transition-colors hover:text-gray-700">Database</a>
                                    </li>
                                    <li>
                                        <a href="/docs/8.x/eloquent" class="transition-colors hover:text-gray-700">Eloquent
                                            ORM</a>
                                    </li>
                                    <li>
                                        <a href="/docs/8.x/testing" class="transition-colors hover:text-gray-700">Testing</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <span class="font-bold">Resources</span>
                            <div class="mt-6">
                                <ul class="space-y-3 text-gray-600 text-sm">
                                    <li>
                                        <a href="https://laracasts.com" class="transition-colors hover:text-gray-700">Laracasts</a>
                                    </li>
                                    <li>
                                        <a href="https://laravel-news.com"
                                           class="transition-colors hover:text-gray-700">Laravel News</a>
                                    </li>
                                    <li>
                                        <a href="https://laracon.us" class="transition-colors hover:text-gray-700">Laracon</a>
                                    </li>
                                    <li>
                                        <a href="https://laracon.eu/" class="transition-colors hover:text-gray-700">Laracon
                                            EU</a>
                                    </li>
                                    <li>
                                        <a href="https://larajobs.com" class="transition-colors hover:text-gray-700">Jobs</a>
                                    </li>
                                    <li>
                                        <a href="https://certification.laravel.com/"
                                           class="transition-colors hover:text-gray-700">Certification</a>
                                    </li>
                                    <li>
                                        <a href="https://laracasts.com/discuss"
                                           class="transition-colors hover:text-gray-700">Forums</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <span class="font-bold">Partners</span>
                            <div class="mt-6">
                                <ul class="space-y-3 text-gray-600 text-sm">
                                    <li>
                                        <a href="https://vehikl.com" class="transition-colors hover:text-gray-700">Vehikl</a>
                                    </li>
                                    <li>
                                        <a href="https://tighten.co" class="transition-colors hover:text-gray-700">Tighten</a>
                                    </li>
                                    <li>
                                        <a href="https://64robots.com/" class="transition-colors hover:text-gray-700">64
                                            Robots</a>
                                    </li>
                                    <li>
                                        <a href="https://kirschbaumdevelopment.com/"
                                           class="transition-colors hover:text-gray-700">Kirschbaum</a>
                                    </li>
                                    <li>
                                        <a href="https://www.curotec.com/services/technologies/laravel/"
                                           class="transition-colors hover:text-gray-700">Curotec</a>
                                    </li>
                                    <li>
                                        <a href="https://jump24.co.uk/" class="transition-colors hover:text-gray-700">Jump24</a>
                                    </li>
                                    <li>
                                        <a href="https://www.a2design.biz/"
                                           class="transition-colors hover:text-gray-700">A2 Design</a>
                                    </li>
                                    <li>
                                        <a href="https://corporate.aboutyou.de/app/uploads/2019/08/INTRO-Pitch-I-AY-Tech.pdf?utm_source=laravelpartnersfindoutmore&amp;utm_medium=socialgroups&amp;utm_campaign=tech"
                                           class="transition-colors hover:text-gray-700">ABOUT YOU</a>
                                    </li>
                                    <li>
                                        <a href="https://www.byte5.net/" class="transition-colors hover:text-gray-700">Byte
                                            5</a>
                                    </li>
                                    <li>
                                        <a href="https://cubettech.com/" class="transition-colors hover:text-gray-700">Cubet</a>
                                    </li>
                                    <li>
                                        <a href="https://www.cyber-duck.co.uk/how-we-work/technology/laravel?utm_source=Laravel%20Partner&amp;utm_medium=Sponsorship"
                                           class="transition-colors hover:text-gray-700">Cyber-Duck</a>
                                    </li>
                                    <li>
                                        <a href="https://devsquad.com/" class="transition-colors hover:text-gray-700">DevSquad</a>
                                    </li>
                                    <li>
                                        <a href="https://www.ideil.com/" class="transition-colors hover:text-gray-700">Ideil</a>
                                    </li>
                                    <li>
                                        <a href="https://romegadigital.com/"
                                           class="transition-colors hover:text-gray-700">Romega Software</a>
                                    </li>
                                    <li>
                                        <a href="https://www.worksome.com/"
                                           class="transition-colors hover:text-gray-700">Worksome</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <span class="font-bold">Ecosystem</span>
                            <div class="mt-6">
                                <ul class="space-y-3 text-gray-600 text-sm">
                                    <li>
                                        <a href="/docs/8.x/billing" class="transition-colors hover:text-gray-700">Cashier</a>
                                    </li>
                                    <li>
                                        <a href="/docs/8.x/dusk" class="transition-colors hover:text-gray-700">Dusk</a>
                                    </li>
                                    <li>
                                        <a href="/docs/8.x/broadcasting" class="transition-colors hover:text-gray-700">Echo</a>
                                    </li>
                                    <li>
                                        <a href="https://envoyer.io" class="transition-colors hover:text-gray-700">Envoyer</a>
                                    </li>
                                    <li>
                                        <a href="https://forge.laravel.com"
                                           class="transition-colors hover:text-gray-700">Forge</a>
                                    </li>
                                    <li>
                                        <a href="/docs/8.x/homestead" class="transition-colors hover:text-gray-700">Homestead</a>
                                    </li>
                                    <li>
                                        <a href="/docs/8.x/horizon" class="transition-colors hover:text-gray-700">Horizon</a>
                                    </li>
                                    <li>
                                        <a href="https://lumen.laravel.com"
                                           class="transition-colors hover:text-gray-700">Lumen</a>
                                    </li>
                                    <li>
                                        <a href="/docs/8.x/mix" class="transition-colors hover:text-gray-700">Mix</a>
                                    </li>
                                    <li>
                                        <a href="https://nova.laravel.com"
                                           class="transition-colors hover:text-gray-700">Nova</a>
                                    </li>
                                    <li>
                                        <a href="/docs/8.x/passport" class="transition-colors hover:text-gray-700">Passport</a>
                                    </li>
                                    <li>
                                        <a href="/docs/8.x/scout"
                                           class="transition-colors hover:text-gray-700">Scout</a>
                                    </li>
                                    <li>
                                        <a href="/docs/8.x/socialite" class="transition-colors hover:text-gray-700">Socialite</a>
                                    </li>
                                    <li>
                                        <a href="https://spark.laravel.com"
                                           class="transition-colors hover:text-gray-700">Spark</a>
                                    </li>
                                    <li>
                                        <a href="/docs/8.x/telescope" class="transition-colors hover:text-gray-700">Telescope</a>
                                    </li>
                                    <li>
                                        <a href="/docs/8.x/valet"
                                           class="transition-colors hover:text-gray-700">Valet</a>
                                    </li>
                                    <li>
                                        <a href="https://vapor.laravel.com"
                                           class="transition-colors hover:text-gray-700">Vapor</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="mt-10 max-w-md md:mt-0 md:w-1/2 lg:w-1/4">
                        <p class="text-xs text-gray-600 sm:text-sm">Laravel is a web application framework with
                            expressive, elegant syntax. We believe development must be an enjoyable and creative
                            experience to be truly fulfilling. Laravel attempts to take the pain out of development by
                            easing common tasks used in most web projects.</p>
                        <p class="mt-6 text-xs text-gray-600 text-opacity-75 sm:text-sm">
                            Laravel is a Trademark of Taylor Otwell.<br>Copyright &copy; 2011-2021 Laravel LLC.
                        </p>
                        <ul class="mt-6 flex items-center space-x-3">
                            <li>
                                <a href="https://twitter.com/laravelphp">
                                    <img class="w-6 h-6" src="/img/social/twitter.min.svg" alt="Twitter">
                                </a>
                            </li>
                            <li>
                                <a href="https://github.com/laravel">
                                    <img class="w-6 h-6" src="/img/social/github.min.svg" alt="GitHub">
                                </a>
                            </li>
                            <li>
                                <a href="https://discord.gg/mPZNm7A">
                                    <img class="w-6 h-6" src="/img/social/discord.min.svg" alt="Discord">
                                </a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/laravelphp">
                                    <img class="w-6 h-6" src="/img/social/youtube.min.svg" alt="YouTube">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center py-6">
            <a href="/" class="logomark">
                <img class="w-9 h-9" src="/img/logomark.min.svg" alt="Laravel">
            </a>
        </div>
    </div>
</footer>

<script>
    var algolia_app_id = 'BH4D9OD16A';
    var algolia_search_key = '7dc4fe97e150304d1bf34f5043f178c4';
    var version = '8.x';
</script>

<script src="{{ asset('asset/js/app.js') }}"></script>
</body>
</html>
