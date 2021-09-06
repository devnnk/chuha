<div class="max-w-screen-xl p-4 sm:p-7 mx-auto mb-10">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-10">
        @foreach($product1s as $product)
            <a class="p-1 bg-white shadow-sm hover:shadow-lg focus:shadow-lg transition group flex flex-col justify-start hover:text-red-500"
               big="true" href="{{ route('product', ['code'=> $product->code]) }}"
               title="{{\App\Handle\LanguageHandle::____($product->name)}}">
                <img class="h-full mt-auto mb-6 md:mb-4 lg:mb-6 object-contain" style="max-height: 240px"
                     src="{{ \App\Handle\ImageHandle::imageFirst($product->banner) }}" alt="{{ $product->name }}">
            </a>
        @endforeach
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-10">
        @foreach($product2s as $product)
            <a class="p-1 bg-white shadow-sm hover:shadow-lg focus:shadow-lg transition group flex flex-col justify-start hover:text-red-500"
               big="true" href="{{ route('product', ['code'=> $product->code]) }}"
               title="{{\App\Handle\LanguageHandle::____($product->name)}}">
                <img class="h-full mt-auto mb-6 md:mb-4 lg:mb-6 object-contain" style="max-height: 240px"
                     src="{{ \App\Handle\ImageHandle::imageFirst($product->banner) }}" alt="{{ $product->name }}">
            </a>
        @endforeach
    </div>
</div>
