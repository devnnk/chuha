@push('css')
    <link rel="stylesheet" href="{{ asset('asset/css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/swiper-bundle.min.css') }}">
@endpush
<div class="overflow-hidden">
    <section class="md:py-20 xl:py-28 py-12">
        <div class="swiper-container w-100 relative">
            <!-- Additional required wrapper -->
            @if($banners->count())
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach($banners as $banner)
                        <div class="swiper-slide px-20 py-6 flex items-center justify-center">
                            <a class="flex justify-center py-4 w-full" href="{{$banner->url}}">
                                <img class="h-full object-contain" style="height: 300px; max-height: 300px"
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


@push('js')
    <script src="{{asset('asset/js/swiper-bundle.js')}}"></script>
    <script src="{{asset('asset/js/swiper-bundle.min.js')}}"></script>
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
