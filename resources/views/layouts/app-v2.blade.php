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
    @stack('css')
    @livewireStyles
</head>
<body
    x-data="{
        navIsOpen: false,
        searchIsOpen: false,
        search: '',
    }"
    class="language-php h-full w-full font-sans text-gray-900 antialiased"
>

<livewire:header-v2/>

<main>
    {{ $slot }}
</main>

<footer style="background: linear-gradient(0deg,#fff 90%,hsla(0,0%,100%,0))" class="relative z-30">
    <div class="relative z-20 overflow-x-hidden">
        <div class="max-w-screen-2xl mx-auto px-4 lg:px-12 xl:px-16">
            <div class="px-8 pb-12 bg-gray-100 xl:px-20">
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
                                    <li><a href="https://laravel-news.com">Laravel News</a></li>
                                    <li><a href="https://laracon.us">Laracon</a></li>
                                    <li><a href="https://laracon.eu/">Laracon EU</a></li>
                                    <li><a href="https://larajobs.com">Jobs</a></li>
                                    <li><a href="https://certification.laravel.com/">Certification</a></li>
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

@livewireScripts

<script src="{{ asset('asset/js/alpine.min.js') }}" defer></script>
<script src="{{ asset('asset/js/alpine-ie11.min.js') }}" defer></script>
{{--<script src="{{ asset('asset/js/livewire.js') }}" data-turbolinks-eval="false"></script>--}}
<script src="{{ asset('asset/js/app.js') }}"></script>
<script src="{{ asset('asset/js/main.js') }}"></script>

@stack('js')
</body>
</html>
