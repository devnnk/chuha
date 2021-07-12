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
                        <x-jet-label for="account_code" value="{{ __('Account CODE') }}"/>
                        <x-jet-input id="account_code" class="block mt-1 w-full" type="text" name="account_code"
                                     wire:model.debounce.250ms="account_code"
                                     :value="$category && isset($category->account_code) ? $category->account_code : old('account_code')"
                                     required autofocus/>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="symbol" value="{{ __('Cặp coin') }}"/>
                        <x-jet-input id="symbol" class="block mt-1 w-full" type="text" name="symbol" required
                                     wire:model.debounce.250ms="symbol"
                                     :value="$category ? $category->symbol : (old('symbol') ?? 'BTCUSDT')"/>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="type" value="{{ __('Loại mua,bán') }}"/>
                        <select name="type" id="type"
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
                            <option value="buy_sell">Đặt cả mua và bán</option>
                            <option
                                value="buy" {{ $category && $category->type === 'buy' ? 'selected' : '' }}>
                                Chỉ mua
                            </option>
                            <option
                                value="sell" {{ $category && $category->type === 'sell' ? 'selected' : '' }}>
                                Chỉ bán
                            </option>
                        </select>
                    </div>

                    <div class="mt-4 grid grid-cols-3 gap-4">
                        <div class="col-span-2">
                            <x-jet-label for="price" value="{{ __('Giá') }}"/>
                            <x-jet-input id="price" class="block mt-1 w-full" type="text" name="price"
                                         :value="$category ? $category->price : old('price')" required/>
                        </div>
                        <div>
                            <x-jet-label for="type_price" value="{{ __('Loại') }}"/>
                            <select name="type_price" id="type_price"
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
                                <option value="percent">Phần trăm theo giá tiền của coin</option>
                                <option
                                    value="normal" {{ $category && $category->type_price === 'normal' ? 'selected' : '' }}>
                                    Giá cố định
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="timestamp_run" value="{{ __('Thời gian chạy mỗi lần(s)') }}"/>
                        <x-jet-input id="timestamp_run" class="block mt-1 w-full" type="number" name="timestamp_run"
                                     :value="$category ? $category->timestamp_run : (old('timestamp_run') ?? 60)"
                                     min="5"
                                     max="600"
                                     required/>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="margin_asset" value="{{ __('Margin asset') }}"/>
                        <x-jet-input id="margin_asset" class="block mt-1 w-full" type="text" name="margin_asset"
                                     :value="$category ? $category->margin_asset : (old('margin_asset') ?? 'USDT')"
                                     required/>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="status" value="{{ __('Status') }}"/>
                        <select name="status" id="status"
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
                            <option value="open">Open</option>
                            <option
                                value="close" {{ $category && $category->status === 'close' ? 'selected' : '' }}>
                                Close
                            </option>
                        </select>
                    </div>

                    <div class="flex items-center justify-center mt-4">
                        <x-jet-button class="ml-4">
                            {{ $category ? __('Cập nhật') : __('Tạo') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
