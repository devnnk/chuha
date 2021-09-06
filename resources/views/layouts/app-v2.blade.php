<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    @include('common.tag-title', ['title' =>     \App\Models\Other::wheretype('title')->first()])
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

<livewire:footer-v2/>

@livewireScripts

<script src="{{ asset('asset/js/alpine.min.js') }}" defer></script>
<script src="{{ asset('asset/js/alpine-ie11.min.js') }}" defer></script>
{{--<script src="{{ asset('asset/js/livewire.js') }}" data-turbolinks-eval="false"></script>--}}
<script src="{{ asset('asset/js/app.js') }}"></script>
<script src="{{ asset('asset/js/main.js') }}"></script>

@stack('js')
</body>
</html>
