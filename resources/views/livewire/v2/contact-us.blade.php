<div class="max-w-screen-xl p-4 sm:p-7 mx-auto mb-10">
    <div class="px-8 pb-12 bg-gray-100 xl:px-20">
        <h2 class="text-xl mb-7 font-medium">Contact us</h2>
        <div class="md:space-y-0 md:flex md:items-center relative max-w-screen-xl px-8 mx-auto space-y-16">
            @foreach($others as $other)
                {!! $other->content !!}
            @endforeach
        </div>
    </div>
</div>
