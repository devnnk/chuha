<?php

namespace App\Http\Livewire\Admin\Product;

use App\Http\Livewire\TraitLivewire\Modal;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class ProductLivewire extends Component
{
    use Modal;

    public function render()
    {
        $products = Product::all();
        return view('livewire.admin.product.index', [
            'products' => $products
        ]);
    }
}
