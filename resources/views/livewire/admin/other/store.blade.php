<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div class="mt-6 text-gray-500">
                <a href="{{route('admin.other.index')}}">
                    <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                        Other
                    </button>
                </a>
            </div>
        </div>
        <div
            class="p-6 bg-gray-200 bg-opacity-25 flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div class="w-full mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <form method="POST" action="{{ route('admin.other.store') }}">
                    @csrf
                    @if($other && isset($other->id))
                        <input hidden name="id" value="{{$other->id}}">
                    @endif
                    <div>
                        <x-jet-label for="content" value="{{ __('Content') }}"/>
                        <textarea
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            id="content" required
                            name="content">{{$other && isset($other->content) ? $other->content : old('content')}}</textarea>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="type" value="{{ __('Type') }}"/>
                        <select name="type" id="type"
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
                            <option value="logo">Logo</option>
                            <option
                                value="title" {{$other && isset($other->type) && $other->type === 'title' ? 'selected' : ''}}>
                                Title
                            </option>
                            <option
                                value="footer" {{$other && isset($other->type) && $other->type === 'footer' ? 'selected' : ''}}>
                                Footer
                            </option>
                            <option
                                value="contact-us" {{$other && isset($other->type) && $other->type === 'contact-us' ? 'selected' : ''}}>
                                Contact us
                            </option>
                        </select>
                    </div>

                    <div class="flex items-center justify-center mt-4">
                        <x-jet-button class="ml-4">
                            {{ $other ? __('Update') : __('Create') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script src="{{asset('js/ckeditor_4.15.1/ckeditor/ckeditor.js')}}"></script>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace('content');
    </script>
@endpush
