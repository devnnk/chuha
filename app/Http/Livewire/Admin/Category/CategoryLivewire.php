<?php

namespace App\Http\Livewire\Admin\Category;

use App\Http\Livewire\TraitLivewire\Modal;
use App\Models\Category;
use Livewire\Component;

class CategoryLivewire extends Component
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
