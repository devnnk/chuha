<?php

namespace App\Http\Livewire\Components;

use App\Models\Account;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartV2 extends Component
{
    public $count = 0;

    protected $listeners = ['updateCart' => 'update'];

    public function mount() {
        $this->count = Cart::count();
    }

    public function render()
    {
        return view('livewire.components.cart-v2');
    }

    public function update()
    {
        $this->count = Cart::count();
    }
}
