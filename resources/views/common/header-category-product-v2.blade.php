@foreach($categories as $category)
    @if($category->products->count())
        <li x-data="{ expanded: false }" class="{{ $class_li ?? 'relative' }}"
            @keydown.window.escape="expanded = false">
            <button class="{{ $class_button ?? 'flex items-center justify-center focus:outline-none' }} whitespace-nowrap"
                    @click="expanded = !expanded">
                {{$category->name}}<span class="ml-3 flex-shrink-0"><img
                        :class="{ 'rotate-180': expanded }"
                        class="w-2.5 h-2.5 transform transition-transform"
                        src="{{asset('asset/img/icons/nav_arrow.min.svg')}}"
                        alt="Expand"></span>
            </button>
            <div x-show="expanded" x-cloak
                 class="{{ $class_x_show_expanded ?? 'absolute left-0 z-20 transition transform'}}"
                 x-transition:enter="duration-250 ease-out"
                 x-transition:enter-start="opacity-0 -translate-y-8"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="duration-250 ease-in"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0 -translate-y-8"
            >
                @if(!isset($is_mobile))
                    <div
                        class="mt-4 ml-8 w-224 -translate-x-1/2 p-8 bg-white shadow-lg transform transition-transform origin-top"
                        @click.away="expanded = false">
                        @endif
                        <ul class="grid gap-3 relative">
                            @foreach($category->products as $product)
                                <li>
                                    <a href="{{ route('product', ['code' => $product->code]) }}"
                                       class="flex items-center p-4 shadow-lg">
{{--                                        <div class="w-14 h-14 flex items-center justify-center">--}}
{{--                                            <img src="{{ $product->banner }}" alt="Icon" style="object-fit: contain"--}}
{{--                                                 class="w-10 h-10">--}}
{{--                                        </div>--}}
                                        <div class="ml-4 leading-5">
                                            <div>{{ \App\Handle\LanguageHandle::____($product->name) }}</div>
                                            @if($product->desc)
                                                <span
                                                    class="text-gray-600 text-xs">{{ $product->desc }}</span>
                                            @endif
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        @if(!isset($is_mobile))
                    </div>
                @endif
            </div>
        </li>
    @endif
@endforeach
