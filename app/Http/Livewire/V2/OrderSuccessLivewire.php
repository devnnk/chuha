<?php

namespace App\Http\Livewire\V2;

use App\Models\Category;
use App\Models\Item;
use App\Models\Product;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class OrderSuccessLivewire extends Component
{
    public $code = "";

    public function mount($order_id)
    {
        if (!isset($order_id)) abort(404);
    }


    public function render(Request $request)
    {
        return view('livewire.v2.order-success')->layout('layouts.app-v2');
    }
}
