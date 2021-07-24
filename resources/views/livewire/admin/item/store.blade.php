<div class="py-12">
    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

            <div class="mt-8 text-2xl">
                Create Item
            </div>

            <div class="mt-6 text-gray-500">
                <a href="{{route('admin.item.index')}}">
                    <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                        Item
                    </button>
                </a>
            </div>
        </div>
        <form method="POST" action="{{ route('admin.item.store') }}">
            @csrf
            @if($item && isset($item->id))
                <input hidden name="id" value="{{$item->id}}">
            @endif
            <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="w-full mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                            <div class="text-lg text-gray-600 leading-7 font-semibold">Info item</div>
                            <div class="mt-4">
                                <x-jet-label for="name" value="{{ __('Name') }}"/>
                                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name"
                                             :value="$item && isset($item->name) ? $item->name : old('name')"
                                             required/>
                            </div>
                            <div class="mt-4">
                                <x-jet-label for="sku" value="{{ __('SKU') }}"/>
                                <x-jet-input id="sku" class="block mt-1 w-full" type="text" name="sku"
                                             :value="$item && isset($item->sku) ? $item->sku : old('sku')"/>
                            </div>
                            <div class="mt-4">
                                <x-jet-label for="title" value="{{ __('Title') }}"/>
                                <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title"
                                             :value="$item && isset($item->title) ? $item->title : old('title')"/>
                            </div>
                            <div class="mt-4">
                                <x-jet-label for="content" value="{{ __('Content') }}"/>
                                <textarea
                                    class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                    id="content"
                                    name="content">{{$item && isset($item->content) ? $item->content : ''}}</textarea>
                            </div>
                            <div class="mt-4">
                                <x-jet-label for="info" value="{{ __('Info') }}"/>
                                <textarea
                                    class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                    id="content"
                                    name="info">{{$item && isset($item->info) ? $item->info : ''}}</textarea>
                            </div>
                            <div class="mt-4">
                                <x-jet-label for="recommendation" value="{{ __('Recommendation') }}"/>
                                <textarea
                                    class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                    id="content"
                                    name="recommendation">{{$item && isset($item->recommendation) ? $item->recommendation : ''}}</textarea>
                            </div>
                            <div class="mt-4">
                                <x-jet-label for="images" value="{{ __('Images') }}"/>
                                <textarea
                                    class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                    id="content"
                                    name="images">{{$item && isset($item->images) ? $item->images : ''}}</textarea>
                            </div>
                            <div class="mt-4">
                                <x-jet-label for="product_id" value="{{ __('Product') }}"/>
                                <select name="product_id" id="product_id"
                                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
                                    @foreach($products as $product)
                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="status" value="{{ __('Status') }}"/>
                                <select name="status" id="status"
                                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
                                    <option value="open">OPEN</option>
                                    <option value="close">CLOSE</option>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                    <div class="flex items-center">
                        <div class="w-full mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                            <div class="text-lg text-gray-600 leading-7 font-semibold">Price item</div>

                            <div class="mt-4">
                                <x-jet-label for="pick_number_set_price" value="{{ __('Pick number set price') }}"/>
                                <select name="pick_number_set_price" id="pick_number_set_price"
                                        onchange="numberOfPrice(this.value)"
                                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
                                    @for($i = 1; $i<=6;$i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                            @for($i = 1; $i<=6;$i++)
                                <div class="append_price" style="display:none;">
                                    <div class="mt-4 mb-4">
                                        <b>Setup price {{ $i }}</b>
                                    </div>
                                    <div class="pb-4 shadow-md overflow-hidden sm:rounded-lg">
                                        <div>
                                            <x-jet-label for="type" value="{{ __('Type') }}"/>
                                            <x-jet-input id="type" class="block mt-1 w-full" type="text" name="type[]"
                                                         :value="$item && isset($item->type) ? $item->price : old('type')"/>
                                        </div>
                                        <div class="mt-4">
                                            <x-jet-label for="price" value="{{ __('Price') }}"/>
                                            <x-jet-input id="price" class="block mt-1 w-full" type="text" name="price[]"
                                                         :value="$item && isset($item->price) ? $item->price : old('price')"/>
                                        </div>
                                        <div class="mt-4">
                                            <x-jet-label for="amount" value="{{ __('Amount') }}"/>
                                            <x-jet-input id="amount" class="block mt-1 w-full" type="text"
                                                         name="amount[]"
                                                         :value="$item && isset($item->amount) ? $item->amount : old('amount')"/>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-center mt-4">
                <x-jet-button class="ml-4">
                    {{ $item ? __('Update') : __('Create') }}
                </x-jet-button>
            </div>
        </form>
    </div>
</div>

@push('js')
    <script src="{{asset('js/ckeditor_4.15.1/ckeditor/ckeditor.js')}}"></script>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace('content');
        CKEDITOR.replace('info');
        CKEDITOR.replace('recommendation');

        numberOfPrice(document.getElementById("pick_number_set_price").value);

        function numberOfPrice(number = 0) {
            number = parseInt(number);
            for (let i = 0; i < 6; i++) {
                document.getElementsByClassName('append_price')[i].style.display = i < number ? 'block' : 'none';
            }
        }
    </script>
@endpush
