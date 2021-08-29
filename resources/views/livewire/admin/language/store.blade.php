<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

            <div class="mt-8 text-2xl">
                Create language
            </div>

            <div class="mt-6 text-gray-500">
                <a href="{{route('admin.language.index')}}">
                    <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                        Language
                    </button>
                </a>
            </div>
        </div>
        <div
            class="p-6 bg-gray-200 bg-opacity-25 flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <form method="POST" action="{{ route('admin.language.store') }}">
                    @csrf
                    @if($language && isset($language->id))
                        <input hidden name="id" value="{{$language->id}}">
                    @endif
                    <div>
                        <x-jet-label for="str_to" value="{{ __('Str to (Must English)') }}"/>
                        <textarea
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            id="str_to" required
                            name="str_to">{{$language && isset($language->str_to) ? $language->str_to : old('str_to')}}</textarea>
                    </div>
                    <div>
                        <x-jet-label for="str_from" value="{{ __('Str from') }}"/>
                        <textarea
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            id="str_from" required
                            name="str_from">{{$language && isset($language->str_from) ? $language->str_from : old('str_from')}}</textarea>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="type" value="{{ __('Language') }}"/>
                        <select name="type" id="type"
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
                            <option value="DE">DE</option>
                        </select>
                    </div>

                    <div class="flex items-center justify-center mt-4">
                        <x-jet-button class="ml-4">
                            {{ $language ? __('Update') : __('Create') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
