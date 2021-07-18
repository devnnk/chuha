<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

            <div class="mt-8 text-2xl">
                Create category
            </div>

            <div class="mt-6 text-gray-500">
                <a href="{{route('admin.category.index')}}">
                    <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                        Category
                    </button>
                </a>
            </div>
        </div>
        <div
            class="p-6 bg-gray-200 bg-opacity-25 flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <form method="POST" action="{{ route('admin.category.store') }}">
                    @csrf
                    @if($category && isset($category->id))
                        <input hidden name="id" value="{{$category->id}}">
                    @endif
                    <div>
                        <x-jet-label for="account_code" value="{{ __('Name') }}"/>
                        <x-jet-input id="account_code" class="block mt-1 w-full" type="text" name="name"
                                     wire:model.debounce.250ms="name"
                                     :value="$category && isset($category->name) ? $category->name : old('name')"
                                     required autofocus/>
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="banner" value="{{ __('Banner (Upload image to imgur)') }}"/>
                        <x-jet-input id="banner" class="block mt-1 w-full" type="text" name="banner"
                                     wire:model.debounce.250ms="banner"
                                     :value="$category && isset($category->banner) ? $category->banner : old('banner')"
                                     required autofocus/>
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="position" value="{{ __('Position') }}"/>
                        <x-jet-input id="position" class="block mt-1 w-full" type="number" name="position"
                                     :value="$category && isset($category->position) ? $category->position : 1000"
                                     required/>
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
                            {{ $category ? __('Update') : __('Create') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
