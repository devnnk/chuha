<?php

namespace App\Http\Livewire\V2;

use App\Models\Category;
use App\Models\Item;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Livewire\WithPagination;

class CartLivewire extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $code = "";
    public $messageOrderNow = "";

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $carts = Cart::content();
        $arr_cart_options = $carts->pluck('options')->toarray();
        $list_item_id = [];
        foreach ($arr_cart_options as $option) {
            if (!isset($option['item_id'])) continue;
            $list_item_id[] = $option['item_id'];
        }
//dd($carts);
        $items = Item::wherein('id', $list_item_id)->where('status', 'open')->get();
        return view('livewire.v2.cart', [
            'carts' => $carts,
            'items' => $items
        ])->layout('layouts.app-v2');
    }

    public function removeItem($row_id)
    {
        Cart::remove($row_id);
        $this->emit('updateCart');
    }

    public function removeAll()
    {
        Cart::destroy();
        $this->emit('updateCart');
    }

    public function orderNow()
    {
        $this->messageOrderNow = 'Function not found!';
    }
}
