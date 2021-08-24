<div>
    <div class="max-w-screen-xl px-4 sm:px-7 py-1 sm:py-4 mx-auto lg:mb-10 flex">
        <a class="-ml-3 text-gray-500 text-sm inline-flex items-center p-3 group hover:text-gray-600 focus:text-gray-600 focus:outline-none focus:bg-gray-50"
           href="/">HOME </a>
        <span class="-ml-3 text-sm inline-flex items-center p-3 group">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                 class="mr-1">
                <path d="M15 19L8 12L15 5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="stroke-current"></path>
            </svg>
            {{ $category->name }}
        </span>
    </div>

    <div class="max-w-screen-xl p-4 sm:p-7 mx-auto mb-10"><h2 class="text-xl mb-7 font-medium">Featured Products:</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-10">
            @foreach($products as $product)
                <a class="p-4 sm:p-6 md:p-3 md:pb-4 lg:p-6 bg-white shadow-sm hover:shadow-lg focus:shadow-lg transition group flex flex-col justify-start"
                   big="true" href="{{ route('product', ['code'=> $product->code]) }}">
                    <img class="w-full mt-auto mb-6 md:mb-4 lg:mb-6"
                         src="{{ \App\Handle\ImageHandle::imageFirst($product->banner) }}" alt="">
                    <div class="flex items-center mb-4 justify-start">
                        <div class="text-featured">
                            <h3 class="text-lg md:text-xl font-medium leading-none md:leading-none group-hover:text-red-600 group-focus:text-red-600 transition-colors">{{$product->name}}</h3>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

    </div>

</div>
