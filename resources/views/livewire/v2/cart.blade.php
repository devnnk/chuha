<div>
    <div class="max-w-screen-xl p-4 sm:p-7 mx-auto mb-10">
        <div class="flex justify-between">
            <h2 class="text-xl mb-7 font-medium">Carts:</h2>
            @if(count($carts))
                <div wire:click.debounce.500ms="removeAll"
                     class="px-2 h-6 border border-red-600 cursor-pointer"
                >Remove all
                </div>
            @endif
        </div>
        @if(count($carts))
            @foreach($carts as $cart)
                @php
                    $item = $items->where('id', $cart->options['item_id'])->first();
                @endphp
                <div class="max-w-screen-xl p-4 sm:p-7 mx-auto">
                    <div class="md:flex justify-between items-center">
                        <div class="bg-gray-100 flex-1 mb-6 md:mb-0 md:mr-8 lg:mr-12 xl:mr-20">
                            <img
                                src="{{\App\Handle\ImageHandle::imageFirst($item->images)}}" style="width: 100%;">
                        </div>
                        <div class="flex-3">
                            <a href="{{ route('item', ['code' => $item->code]) }}"><h2
                                    class="text-2xl lg:text-4xl font-medium mb-5">{{ $item->title }}</h2></a>
                            <div class="md:flex justify-between items-center">
                                <div>
                                    <span class="text-gray-500">Quantity: {{ $cart->qty }}</span>
                                </div>
                                <div>
                                    <span class="text-gray-500">Type: {{ $cart->options['type'] ?? '' }}</span>
                                </div>
                                <div>
                                    <span class="text-gray-500">Price: ${{ number_format($cart->price) }}</span>
                                </div>
                            </div>
                            <div class="flex justify-between mt-2">
                                <div>
                                    <p><span class="text-gray-500">Total:</span> <span>${{$cart->subtotal()}}</span></p>
                                </div>
                                <div wire:click.debounce.500ms="removeItem('{{$cart->rowId}}')"
                                     class="px-2 h-6 border border-red-600 cursor-pointer"
                                >Remove item
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="max-w-screen-xl p-4 sm:p-7 mx-auto text-center">
                <div wire:click.debounce.500ms="orderNow"
                     class="group relative h-12 inline-flex w-64 border border-red-600 sm:w-56 focus:outline-none sm:mt-8 md:mt-10 mt-6 cursor-pointer"
                >
                    <span
                        class="absolute inset-0 inline-flex items-center justify-center self-stretch px-6 text-white text-center font-medium bg-red-600 ring-1 ring-red-600 ring-offset-1 ring-offset-red-600 transform transition-transform group-hover:-translate-y-1 group-hover:-translate-x-1 group-focus:-translate-y-1 group-focus:-translate-x-1">Order now</span>
                </div>
                <div>
                    {{$messageOrderNow}}
                </div>
            </div>
        @else
            <div class="text-center">
                <h2>You need add to cart.</h2>
            </div>
        @endif
    </div>
</div>
