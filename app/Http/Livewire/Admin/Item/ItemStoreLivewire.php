<?php

namespace App\Http\Livewire\Admin\Item;

use App\Models\Category;
use App\Models\Item;
use App\Models\Product;
use Livewire\Component;

class ItemStoreLivewire extends Component
{
    public $item = '';
    public $name = '';

    public function mount($id)
    {
        if (isset($id) && $id) {
            $this->item = Item::find($id);
            if (!$this->item) abort(404);

            $this->name = $this->item->name;
        }
    }

    public function render()
    {
        $products = Product::all();
        return view('livewire.admin.item.store', [
            'item' => $this->item,
            'products' => $products
        ]);
    }
}
