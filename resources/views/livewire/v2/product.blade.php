<div>
    <div class="max-w-screen-xl px-4 sm:px-7 py-1 sm:py-4 mx-auto lg:mb-10 flex">
        <a class="-ml-3 text-gray-500 text-sm inline-flex items-center p-3 group hover:text-gray-600 focus:text-gray-600 focus:outline-none focus:bg-gray-50"
           href="/"> HOME </a>

        <a class="-ml-3 text-gray-500 text-sm inline-flex items-center p-3 group hover:text-gray-600 focus:text-gray-600 focus:outline-none focus:bg-gray-50"
           href="{{route('category', ['code' => $category->code])}}">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                 class="mr-1 text-gray-400">
                <path d="M15 19L8 12L15 5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="stroke-current"></path>
            </svg>
            {{$category->name}} </a>
        <span
            class="-ml-3 text-sm inline-flex items-center p-3 group focus:outline-none focus:bg-gray-50">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                 class="mr-1">
                <path d="M15 19L8 12L15 5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="stroke-current"></path>
            </svg>
            {{ $product->name }}
        </span>
    </div>

    @include('common.list-item')
</div>
