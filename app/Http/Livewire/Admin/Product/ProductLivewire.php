<?php

namespace App\Http\Livewire\Admin\Product;

use App\Http\Livewire\TraitLivewire\Modal;
use App\Models\Category;
use Livewire\Component;

class ProductLivewire extends Component
{
    use Modal;

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.category.index', [
            'categories' => $categories
        ]);
    }
}
