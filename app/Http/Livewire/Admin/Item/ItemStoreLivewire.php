<?php

namespace App\Http\Livewire\Admin\Item;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class ItemStoreLivewire extends Component
{
    public $product = '';
    public $name = '';

    public function mount($id)
    {
        if (isset($id) && $id) {
            $this->product = Product::find($id);
            if (!$this->product) abort(404);

            $this->name = $this->product->name;
        }
    }

    public function render()
    {
        $products = Product::all();
        return view('livewire.admin.item.store', [
            'product' => $this->product,
            'categories' => $categories
        ]);
    }
}
