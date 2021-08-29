<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                <div class="mt-6 text-gray-500 flex justify-between">
                    <a href="{{route('admin.item.create')}}">
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                            Create item
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
                                            class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Title
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            SKU
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Prices
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                            Content
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                            Info
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                            recommendation
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                            images
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                            status
                                        </th>
                                        <th scope="col" class="relative px-6 py-3 text-right">
                                            ###
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($items as $item)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">
                                                {{ $item->id }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">
                                                {{ $item->title }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                {{ $item->product->name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-left">
                                                @foreach($item->prices as $key => $price)
                                                    <p>{{$key + 1}}. Price: <span
                                                            class="text-lg">{!! $price->price !!}</span> Type: <span
                                                            class="text-lg">{!! $price->type !!}</span> Amount: <span
                                                            class="text-lg">{!! $price->amount !!}</span></p>
                                                @endforeach
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center" style="max-width: 250px; word-break: break-all">
                                                {!! $item->content !!}
                                            </td>
                                            <td class="text-center" style="max-width: 250px; word-break: break-all">
                                                {!! $item->info !!}
                                            </td>
                                            <td class="text-center" style="max-width: 250px; word-break: break-all">
                                                {!! $item->recommendation !!}
                                            </td>
                                            <td class="text-center flex">
                                                @foreach(\App\Handle\ImageHandle::images($item->images) as $image)
                                                    <img src="{!! $image !!}" style="width: 30px">
                                                @endforeach
                                            </td>
                                            <td class="text-center">
                                                <span wire:click.debounce.250ms="updateStatus('{{$item->id}}')"
                                                      class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full cursor-pointer">
                                                    {{$item->status}}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('admin.item.edit', ['item' => $item->id]) }}"
                                                   class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                <span class="text-red-600 hover:text-red-900 cursor-pointer"
                                                      wire:click.prevent="modalDelete('{{$item->id}}', '{{route('admin.item.destroy', ['item' => $item->id])}}')">Delete</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <!-- More people... -->
                                    </tbody>
                                </table>
                            </div>
                            <div class="p-6 ">
                                {{ $items->links() }}
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
