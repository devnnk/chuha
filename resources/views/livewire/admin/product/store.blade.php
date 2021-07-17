<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

            <div class="mt-8 text-2xl">
                Create product
            </div>

            <div class="mt-6 text-gray-500">
                <a href="{{route('admin.product.index')}}">
                    <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                        Product
                    </button>
                </a>
            </div>
        </div>
        <div
            class="p-6 bg-gray-200 bg-opacity-25 flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <form method="POST" action="{{ route('admin.product.store') }}">
                    @csrf
                    @if($product && isset($product->id))
                        <input hidden name="id" value="{{$product->id}}">
                    @endif
                    <div>
                        <x-jet-label for="account_code" value="{{ __('Name') }}"/>
                        <x-jet-input id="account_code" class="block mt-1 w-full" type="text" name="name"
                                     :value="$product && isset($product->name) ? $product->name : old('name')"
                                     required/>
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="banner" value="{{ __('Banner (Upload image to imgur)') }}"/>
                        <x-jet-input id="banner" class="block mt-1 w-full" type="text" name="banner"
                                     :value="$product && isset($product->banner) ? $product->banner : old('banner')"/>
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="position" value="{{ __('Position') }}"/>
                        <x-jet-input id="position" class="block mt-1 w-full" type="number" name="position"
                                     :value="$product && isset($product->position) ? $product->position : 1000"
                                     required/>
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="category_id" value="{{ __('Category') }}"/>
                        <select name="category_id" id="category_id"
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
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

                    <div class="flex items-center justify-center mt-4">
                        <x-jet-button class="ml-4">
                            {{ $product ? __('Update') : __('Create') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
