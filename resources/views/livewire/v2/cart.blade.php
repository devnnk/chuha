<div>
    @if (\Illuminate\Support\Facades\Session::has('notify'))
        <div class="mt-5 mb-5">
            <x-jet-banner :stype="\Illuminate\Support\Facades\Session::get('notify')['type']"
                          :message="\Illuminate\Support\Facades\Session::get('notify')['message']"/>
        </div>
    @endif
    <div class="max-w-screen-xl p-4 sm:p-7 mx-auto mb-10">
        <div class="flex justify-between">
            <h2 class="text-xl mb-7 font-medium">{{\App\Handle\LanguageHandle::____('Carts')}}:</h2>
            <div class="flex">
                <div wire:click.debounce.500ms="reloadItem"
                     class="px-2 h-6 border border-red-600 cursor-pointer"
                >{{\App\Handle\LanguageHandle::____('Reload')}}
                </div>
                @if(count($carts))
                    <div wire:click.debounce.500ms="removeAll"
                         class="px-2 h-6 border border-red-600 cursor-pointer ml-2"
                    >{{\App\Handle\LanguageHandle::____('Remove all')}}
                    </div>
                @endif
            </div>
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
                                    <span
                                        class="text-gray-500">{{\App\Handle\LanguageHandle::____('Quantity')}}: {{ $cart->qty }}</span>
                                </div>
                                <div>
                                    <span
                                        class="text-gray-500">{{\App\Handle\LanguageHandle::____('Type')}}: {{ $cart->options['type'] ?? '' }}</span>
                                </div>
                                <div>
                                    <span
                                        class="text-gray-500">{{\App\Handle\LanguageHandle::____('Price')}}: ${{ number_format($cart->price) }}</span>
                                </div>
                            </div>
                            <div class="flex justify-between mt-2">
                                <div>
                                    <p><span class="text-gray-500">Total:</span> <span>${{$cart->subtotal()}}</span></p>
                                </div>
                                <div wire:click.debounce.500ms="removeItem('{{$cart->rowId}}')"
                                     class="px-2 h-6 border border-red-600 cursor-pointer"
                                >{{\App\Handle\LanguageHandle::____('Remove item')}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <h3>Order now</h3>
            <form method="post" action="{{route('cart.store')}}">
                @csrf
                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700">Name</label>
                    <input type="text" placeholder="name" required name="name"
                           class="p-2 border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
                </div>
                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700">Email</label>
                    <input type="email" placeholder="Email" required name="email"
                           class="p-2 border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
                </div>
                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700">Number phone</label>
                    <input type="text" placeholder="Example (+1)382345..." required name="number_phone"
                           class="p-2 border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
                </div>
                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700">Address</label>
                    <input type="text" placeholder="Address" required name="address"
                           class="p-2 border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
                </div>
                <div class="g-recaptcha mt-4" id="captcha"></div>
                <div class="w-full text-center">
                    <button
                        class="group relative h-12 inline-flex w-64 border border-red-600 sm:w-56 focus:outline-none sm:mt-8 md:mt-10 mt-6 cursor-pointer text-center"
                    >
                    <span
                        class="absolute inset-0 inline-flex items-center justify-center self-stretch px-6 text-white text-center font-medium bg-red-600 ring-1 ring-red-600 ring-offset-1 ring-offset-red-600 transform transition-transform group-hover:-translate-y-1 group-hover:-translate-x-1 group-focus:-translate-y-1 group-focus:-translate-x-1">{{ \App\Handle\LanguageHandle::____('Order now') }}</span>
                    </button>
                </div>
            </form>
        @else
            <div class="text-center">
                <h2>{{ \App\Handle\LanguageHandle::____('You need add to cart.') }}</h2>
            </div>
        @endif
    </div>
</div>
@push('js')
    <script type="text/javascript">
        var onloadCallback = function () {
            grecaptcha.render('captcha', {
                'sitekey': '{{env('GOOGLE_RECAPTCHA_KEY')}}'
            });
        };
        window.onload = function () {
            var $recaptcha = document.querySelector('#g-recaptcha-response');

            if ($recaptcha) {
                $recaptcha.setAttribute("required", "required");
            }
        };
    </script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
            async defer>
    </script>
@endpush
