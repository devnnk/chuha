<div class="md:py-40 lg:py-64 xl:py-72 relative py-16 overflow-hidden">
    <div class="md:space-y-0 md:flex md:items-center relative max-w-screen-xl px-8 mx-auto space-y-16">
        <div class="md:max-w-auto md:w-1/2 max-w-lg">
            <img class="w-full shadow-lg" src="{{ \App\Handle\ImageHandle::imageFirst($item->images) }}" alt="">
            <div class="flex mt-2">
                @foreach(\App\Handle\ImageHandle::images($item->images) as $image)
                    <img src="{{$image}}" style="max-width: 70px; width: 70px;" class="p-2 cursor-pointer object-cover">
                @endforeach
            </div>
        </div>
        <div class="md:w-1/2 md:pl-8 lg:pl-24">
            <h1 class="sm:text-4xl lg:text-5xl lg:leading-tight xl:text-5xl text-3xl font-medium tracking-tight">{{$item->title}}</h1>
            <span class="bold">SKU: {{$item->product->sku . $item->sku}}</span>
            <div>
                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700" for="pick_number_set_price">
                        Type
                    </label>
                    <select name="pick_number_set_price"
                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
                        @foreach($item->prices as $price)
                            <option value="{{ $price->id }}">{{ $price->type }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <p class="sm:mt-5 md:max-w-2xl md:mt-8 md:text-lg max-w-xl mt-3 text-gray-600">{!! $item->content !!}</p>
            <a class="group relative h-12 inline-flex w-64 border border-red-600 sm:w-56 focus:outline-none sm:mt-8 md:mt-10 mt-6"
               href="https://forge.laravel.com" target="_blank">
    <span
        class="absolute inset-0 inline-flex items-center justify-center self-stretch px-6 text-white text-center font-medium bg-red-600 ring-1 ring-red-600 ring-offset-1 ring-offset-red-600 transform transition-transform group-hover:-translate-y-1 group-hover:-translate-x-1 group-focus:-translate-y-1 group-focus:-translate-x-1">
        Add to cart
    </span>
            </a>

        </div>
    </div>
</div>
