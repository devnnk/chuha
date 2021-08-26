<?php

namespace App\Http\Livewire\V2;

use App\Models\Item;
use App\Models\Price;
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
    public $messsage = '';

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
        $this->messsage = "";
        $qty = (int)$this->qty;
        $qty = $qty >= 1 && $qty <= 99 ? $qty : 1;
        $price = Price::find($this->price_id);
        Cart::add($item['id'] . "_" . $this->price_id, $this->price_id, $qty, $price->price ?? 0, [
            'item_id' => $item['id'],
            'price_id' => $this->price_id,
            'type' => $price->type ?? 0
        ]);
        $this->emit('updateCart');
        $this->messsage = '<p>(<span class="text-red-600">*</span>)Add to cart success</p>';
    }
}
