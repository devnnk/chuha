<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <div class="mt-6 text-gray-500 flex justify-end">
                    <div>
                        <input wire:model="search"
                               class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                               type="search" placeholder="search">
                    </div>
                </div>

                <div class="mt-6 text-gray-500 flex justify-end">
                    <button wire:click="selectStatusFiller('')"
                            class="inline-flex items-center px-1 py-1 ml-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring disabled:opacity-25 transition border-red-600">
                        ALL
                    </button>
                    @foreach(\App\Models\Order::LIST_STATUS as $status)
                        {{--                        //border-red-600--}}
                        <button wire:click="selectStatusFiller('{{$status}}')"
                                class="{{\App\Models\Order::STATUS_CLASS[$status]}} inline-flex items-center px-1 py-1 ml-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring disabled:opacity-25 transition">{{$status}}</button>
                    @endforeach
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
                                            Order id
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Phone number
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                            Email
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                            Address
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                            Note
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
                                    @foreach($orders as $order)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900 text-sm">
                                                <small>{{ $order->order_id }}</small>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">
                                                {{ $order->name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                {{ $order->number_phone }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                {{ $order->email }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                {{ $order->address }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                {{ $order->note }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                <select name="status" id="status" onchange="test(this)"
                                                        wire:change="changeStatus('{{$order->id}}')"
                                                        style="margin: auto;padding: 0 28px;font-size: 12px;"
                                                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block w-full">
                                                    @foreach(\App\Models\Order::LIST_STATUS as $status)
                                                        <option
                                                            value="{{$status}}" {{$status === $order->status ? 'selected' : ''}}>{{$status}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <span class="text-red-600 hover:text-red-900 cursor-pointer"
                                                      wire:click.prevent="modalDelete('{{$order->id}}', '{{route('admin.language.destroy', ['language' => $order->id])}}')">Delete</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <!-- More people... -->
                                    </tbody>
                                </table>
                            </div>
                            <div class="p-6 ">
                                {{ $orders->links() }}
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
        function test(e) {
        @this.set('update_status', e.value);
        }
    </script>
@endpush
