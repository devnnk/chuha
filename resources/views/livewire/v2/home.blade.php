@push('css')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
@endpush
<div class="overflow-hidden">
    <section class="md:py-20 xl:py-28 py-12">
        <div class="swiper-container w-100">
            <!-- Additional required wrapper -->
            @if($banners->count())
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach($banners as $banner)
                        <div class="swiper-slide px-20 py-6 flex items-center justify-center">
                            <a class="flex justify-center py-4 w-full" href="{{$banner->url}}">
                                <img class="w-full rounded-full object-cover" style="height: 300px; max-height: 300px"
                                     src="{{$banner->image}}">
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
            @if($banners->count() > 1)
            <!-- If we need navigation buttons -->
                <div class="swiper-button-prev bg-white w-16 h-16 text-xs rounded-full text-green-500 mx-10"></div>
                <div class="swiper-button-next bg-white w-16 h-16 text-xs rounded-full text-green-500 mx-10"></div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
            @endif
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
                    <span
                        class="text-gray-600 text-sm transition-colors group-hover:text-gray-800 md:hidden lg:block">{{$count_price ? $item->prices->implode('type', ',') : ''}}</span>
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
