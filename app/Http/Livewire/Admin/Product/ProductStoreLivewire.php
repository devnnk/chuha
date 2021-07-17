<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class ProductStoreLivewire extends Component
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
        $categories = Category::all();
        return view('livewire.admin.product.store', [
            'product' => $this->product,
            'categories' => $categories
        ]);
    }
}
