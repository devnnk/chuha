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
        <form method="POST" action="{{ route('admin.product.store') }}">
            <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="w-full mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                            @csrf
                            @if($item && isset($item->id))
                                <input hidden name="id" value="{{$item->id}}">
                            @endif
                            <div>
                                <x-jet-label for="account_code" value="{{ __('Name') }}"/>
                                <x-jet-input id="account_code" class="block mt-1 w-full" type="text" name="name"
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
                                <textarea class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" id="content"
                                          name="content">{{$item && isset($item->content) ? $item->content : ''}}</textarea>
                            </div>
                            <div class="mt-4">
                                <x-jet-label for="info" value="{{ __('Info') }}"/>
                                <textarea class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" id="content"
                                          name="info">{{$item && isset($item->info) ? $item->info : ''}}</textarea>
                            </div>
                            <div class="mt-4">
                                <x-jet-label for="recommendation" value="{{ __('Recommendation') }}"/>
                                <textarea class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" id="content"
                                          name="recommendation">{{$item && isset($item->recommendation) ? $item->recommendation : ''}}</textarea>
                            </div>
                            <div class="mt-4">
                                <x-jet-label for="images" value="{{ __('Images') }}"/>
                                <textarea class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" id="content"
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
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                             stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400">
                            <path
                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                            <path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="https://laracasts.com">Laracasts</a>
                        </div>
                    </div>

                    <div class="ml-12">
                        <div class="mt-2 text-sm text-gray-500">
                            Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development.
                            Check
                            them out, see for yourself, and massively level up your development skills in the process.
                        </div>

                        <a href="https://laracasts.com">
                            <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                                <div>Start watching Laracasts</div>

                                <div class="ml-1 text-indigo-500">
                                    <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                        <path fill-rule="evenodd"
                                              d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                        </a>
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
    </script>
@endpush
