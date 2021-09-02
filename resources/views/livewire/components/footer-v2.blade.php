<footer style="background: linear-gradient(0deg,#fff 90%,hsla(0,0%,100%,0))" class="relative z-30">
    <div class="relative z-20 overflow-x-hidden">
        <div class="max-w-screen-2xl mx-auto px-4 lg:px-12 xl:px-16">
            <div class="px-8 pb-12 bg-gray-100 xl:px-20">
                <div class="mt-6 sm:mt-12 md:flex">
                    <div class="mt-10 md:mt-0">
                        @foreach($others as $other)
                            {!! $other->content !!}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
