<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                <div class="mt-6 text-gray-500">
                    <a href="{{route('admin.category.create')}}">
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                            Create category
                        </button>
                    </a>
                </div>
            </div>

            <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
                @foreach($categories as $category)
                    <div class="p-6 border-t border-gray-200 md:border-l md:border-t-0 md:border-l md:border-b">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                 stroke-width="2"
                                 viewBox="0 0 24 24" class="w-8 h-8 text-gray-400">
                                <path
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            <div
                                class="ml-4 text-lg text-gray-600 leading-7 font-semibold flex justify-between w-full">
                                <div>{{ $category->name }}</div>
                                <div>
                                    <a href="{{route('admin.category.edit', ['category' => $category->id])}}">
                                        <button type="submit"
                                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                            Edit category
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="ml-12">
                            <div class="my-4 mt-2">
                                <img src="{{ $category->banner }}"
                                     style="max-height: 130px;min-height: 130px;object-fit: cover;width: 100%;">
                            </div>
                            <div class="text-gray-500">
                                <span class="font-bold">Status: </span><span
                                    wire:click.debounce.250ms="updateStatus('{{$category->id}}')"
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full cursor-pointer uppercase">{{ $category->status }}</span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span class="cursor-pointer"
                                      wire:click.prevent="modalDelete('{{$category->name}}', '{{route('admin.category.destroy', ['category' => $category->id])}}')">
                                    <div class="mt-3 flex items-center text-sm font-semibold text-red-700">
                                        Delete category
                                    </div>
                                </span>
                                <a href="">
                                    <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                                        <div>List product</div>

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
                @endforeach
            </div>
        </div>
    </div>
</div>

<livewire:delete-modal/>
@push('js')
    <script>
        function copyToClipboard(id) {
            let text = document.getElementById(id).textContent;
            if (window.clipboardData && window.clipboardData.setData) {
                return clipboardData.setData("Text", text);
            } else if (document.queryCommandSupported && document.queryCommandSupported("copy")) {
                var textarea = document.createElement("textarea");
                textarea.textContent = text;
                textarea.style.position = "fixed";
                document.body.appendChild(textarea);
                textarea.select();
                try {
                    if (document.getElementById('_copied')) {
                        document.getElementById("_copied").outerHTML = "";
                    }
                    document.getElementById(id).insertAdjacentHTML('afterend', '<span id="_copied" class="transition-all"> Đã copy</span>');
                    return document.execCommand("copy");
                } catch (ex) {
                    console.warn("Copy to clipboard failed.", ex);
                    return false;
                } finally {
                    document.body.removeChild(textarea);
                }
            }
        }
    </script>
@endpush
