<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                <div class="mt-6 text-gray-500 flex justify-between">
                    <a href="{{route('admin.language.create')}}">
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                            Create language
                        </button>
                    </a>
                    <div>
                        <input wire:model="search"
                               class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                               type="search" placeholder="search">
                    </div>
                </div>
            </div>

            <div class="bg-gray-200 bg-opacity-25">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg overflow-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            ID
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Str to
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Str from
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                            Type
                                        </th>
                                        <th scope="col" class="relative px-6 py-3 text-right">
                                            ###
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($languages as $language)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">
                                                {{ $language->id }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">
                                                {{ $language->str_to }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                {{ $language->str_from }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                {{ $language->type }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('admin.language.edit', ['language' => $language->id]) }}"
                                                   class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                <span class="text-red-600 hover:text-red-900 cursor-pointer"
                                                      wire:click.prevent="modalDelete('{{$language->id}}', '{{route('admin.language.destroy', ['language' => $language->id])}}')">Delete</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <!-- More people... -->
                                    </tbody>
                                </table>
                            </div>
                            <div class="p-6 ">
                                {{ $languages->links() }}
                            </div>
                        </div>
                    </div>
                </div>
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
