@push('css')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
@endpush
<div class="overflow-hidden">
    <section class="md:py-20 xl:py-28 py-12">
        <div class="swiper-container w-100">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide px-20 py-6 flex items-center justify-center">
                    <div class="flex justify-center py-4 w-full">
                        <img class="w-full rounded-full object-cover" style="height: 300px; max-height: 300px"
                             src="https://source.unsplash.com/weekly?water">
                    </div>
                </div>
                <div class="swiper-slide px-20 flex items-center justify-center">
                    <div class="flex justify-center py-4 w-full">
                        <img class="w-full rounded-full object-cover" style="height: 300px; max-height: 300px"
                             src="https://source.unsplash.com/weekly?mountain">
                    </div>
                </div>

            </div>
            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev bg-white w-16 h-16 text-xs rounded-full text-green-500 mx-10"></div>
            <div class="swiper-button-next bg-white w-16 h-16 text-xs rounded-full text-green-500 mx-10"></div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </section>
</div>

<div class="max-w-screen-xl p-4 sm:p-7 mx-auto mb-10"><h2 class="text-xl mb-7 font-medium">Featured Products:</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-10">
        @foreach($items as $item)
            <a class="p-4 sm:p-6 md:p-3 md:pb-4 lg:p-6 bg-white shadow-sm hover:shadow-lg focus:shadow-lg transition group flex flex-col justify-start"
               big="true" href="{{ route('item', ['item'=> $item->code]) }}">
                <img class="w-full mt-auto mb-6 md:mb-4 lg:mb-6"
                     src="{{ \App\Handle\ImageHandle::imageFirst($item->images) }}" alt="">
                <div class="flex items-center mb-4 justify-start">
                    <div class="text-featured">
                        <h3 class="text-lg md:text-xl font-medium leading-none md:leading-none group-hover:text-red-600 group-focus:text-red-600 transition-colors">{{$item->title}}</h3>
                    </div>
                </div>
                <div class="flex justify-between">
                    <div class="flex justify-start items-center text-featured">
                        @php
                            $count_price = $item->prices->count();
                        @endphp
                        <span
                            class="leading-none block text-sm font-medium">{{ $count_price ? ($count_price > 1 ? $item->prices()->orderby('price', 'ASC')->first()->price . '$ - ' . $item->prices()->orderby('price', 'DESC')->first()->price . '$' : $item->prices()->first()->price . '$') : '' }}</span>
                    </div>
                    <span class="text-gray-600 text-sm transition-colors group-hover:text-gray-800 md:hidden lg:block">{{$count_price ? $item->prices->implode('type', ',') : ''}}</span>
                </div>
            </a>
        @endforeach
    </div>
    <div class="text-center"><a
            class="h-12 relative inline-flex items-stretch group border border-red-600 focus:outline-none"
            href="https://partners.laravel.com/partners"><span
                class="bg-white inline-flex items-center justify-center px-3 sm:px-5 text-red-600 leading-none font-medium w-full transform transition-transform group-hover:-translate-x-1 group-hover:-translate-y-1 group-focus:-translate-x-1 group-focus:-translate-y-1 shadow-red-button-border">Browse all partners</span></a>
    </div>
</div>

<div class="md:py-40 lg:py-64 xl:py-80 py-16 overflow-hidden">
    <div class="md:space-y-0 md:flex md:items-center relative max-w-screen-xl px-8 mx-auto space-y-12">
        @foreach($categories as $category)
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
        @endforeach
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
@push('js')
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var mySwiper = new Swiper('.swiper-container', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
            },
        })
    </script>
@endpush
