<div>
    <div class="max-w-screen-xl px-4 sm:px-7 py-1 sm:py-4 mx-auto lg:mb-10 flex">
        <a class="-ml-3 text-gray-500 text-sm inline-flex items-center p-3 group hover:text-gray-600 focus:text-gray-600 focus:outline-none focus:bg-gray-50"
           href="/">HOME </a>
        <a class="-ml-3 text-gray-500 text-sm inline-flex items-center p-3 group hover:text-gray-600 focus:text-gray-600 focus:outline-none focus:bg-gray-50"
           href="{{ route('category', ['code' => $item->product->category->code]) }}">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                 class="mr-1 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-500">
                <path d="M15 19L8 12L15 5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="stroke-current"></path>
            </svg>
            {{ $item->product->category->name }} </a>
        <a class="-ml-3 text-gray-500 text-sm inline-flex items-center p-3 group hover:text-gray-600 focus:text-gray-600 focus:outline-none focus:bg-gray-50"
           href="{{ route('product', ['code' => $item->product->code]) }}">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                 class="mr-1 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-500">
                <path d="M15 19L8 12L15 5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="stroke-current"></path>
            </svg>
            {{ $item->product->name }} </a>
        <span
            class="-ml-3 text-sm inline-flex items-center p-3 group focus:outline-none focus:bg-gray-50">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                 class="mr-1 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-500">
                <path d="M15 19L8 12L15 5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="stroke-current"></path>
            </svg>
            {{ $item->title }}
        </span>
    </div>

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
</div>
