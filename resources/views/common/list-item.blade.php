<div class="max-w-screen-xl p-4 sm:p-7 mx-auto mb-10"><h2
        class="text-xl mb-7 font-medium">{{$title ?? 'Featured Products:'}}</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-5">
        @foreach($items as $item)
            <a class="p-4 sm:p-6 md:p-3 md:pb-4 lg:p-6 bg-white shadow-sm hover:shadow-lg focus:shadow-lg transition group flex flex-col justify-start hover:text-red-500"
               big="true" href="{{ route('item', ['code'=> $item->code]) }}" title="{{\App\Handle\LanguageHandle::____($item->title)}}">
                <img class="h-full mt-auto mb-6 md:mb-4 lg:mb-6 object-contain" style="max-height: 240px"
                     src="{{ \App\Handle\ImageHandle::imageFirst($item->images) }}" alt="{{\App\Handle\LanguageHandle::____($item->title)}}">
                <div class="flex items-center mb-4 justify-start">
                    <div class="text-featured">
                        <h3 class="text-lg md:text-xl font-medium leading-none md:leading-none group-hover:text-red-600 group-focus:text-red-600 transition-colors">{{\App\Handle\LanguageHandle::____($item->title)}}</h3>
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
    @if($items->count())
        {{ $items->appends(request()->input())->links() }}
    @endif

</div>
