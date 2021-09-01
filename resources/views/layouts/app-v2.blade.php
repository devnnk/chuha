<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Chu Ha</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">


    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
    <link rel="shortcut icon" href="/img/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#ff2d20">
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
                    <div class="mt-10 md:mt-0">
                        <p class="mt-6 text-xs text-gray-600 text-opacity-75 sm:text-sm">Copyright &copy; 2011-2021.
                        </p>
                    </div>
                </div>
            </div>
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
