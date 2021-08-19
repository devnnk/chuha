<?php

namespace App\Http\Livewire\Admin\Item;

use App\Http\Livewire\TraitLivewire\Modal;
use App\Models\Item;
use App\Models\Product;
use Livewire\Component;

class ItemLivewire extends Component
{
    use Modal;

    public function render()
    {
        $items = Item::where('status', 'open')->paginate(10);
        return view('livewire.admin.item.index', [
            'items' => $items
        ]);
    }
}
