<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                <div class="mt-6 text-gray-500">
                    <a href="{{route('admin.banner.create')}}">
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                            Create banner
                        </button>
                    </a>
                </div>
            </div>

            <div class="bg-gray-200 bg-opacity-25">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200 text-center">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            URL
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Image
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Position
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                            Status
                                        </th>
                                        <th scope="col" class="relative px-6 py-3 text-right">
                                            ###
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($products as $product)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">
                                                {{ $product->name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $product->category->name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                                <img src="{{ $product->banner }}" style="width: 70px; height: 70px; object-fit: cover">
                                            </td>
                                            <td class="text-center">
                                                {{ $product->position }}
                                            </td>
                                            <td class="text-center">
                                                <span wire:click.debounce.250ms="updateStatus('{{$product->id}}')"
                                                      class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full cursor-pointer">
                                                    {{ $product->status }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('admin.product.show', ['product' => $product->id]) }}"
                                                   class="text-purple-700 hover:text-purple-900">Lịch sử</a>
                                                <a href="{{ route('admin.product.edit', ['product' => $product->id]) }}"
                                                   class="text-indigo-600 hover:text-indigo-900">Sửa</a>
                                                <span class="text-red-600 hover:text-red-900 cursor-pointer"
                                                      wire:click.prevent="modalDelete('{{$product->account_code .' - ' . $product->symbol}}', '{{route('admin.product.destroy', ['product' => $product->id])}}')">Xóa</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <!-- More people... -->
                                    </tbody>
                                </table>
{{--                                <div class="p-6 ">--}}
{{--                                    {{ $products->links() }}--}}
{{--                                </div>--}}
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
