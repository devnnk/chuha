<?php

namespace App\Http\Livewire\V2;

use App\Models\Item;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Illuminate\Contracts\Events\Dispatcher;

class ItemLivewire extends Component
{
    use WithPagination;

    public $item;
    public $price_id;
    public $prices;
    public $qty = 1;

    public function mount($code)
    {
        if (!isset($code)) abort(404);
        $this->item = Item::where('status', 'open')->where('code', $code)->firstorfail();
        $this->prices = $this->item->prices()->orderby('price', 'ASC')->get();
        $this->price_id = $this->prices->first()->id;
    }

    public function render()
    {
        return view('livewire.v2.item', [
            'item' => $this->item,
            'prices' => $this->prices,
        ])->layout('layouts.app-v2');
    }

    public function addToCart($item)
    {
        $qty = (int)$this->qty;
        $qty = $qty >= 1 && $qty <= 99 ? $qty : 1;
        Cart::add($item['id'], $item['title'], $qty, $this->price_id);
        $this->emit('updateCart');
    }
}
