<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;

class CategoryLivewire extends Component
{
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.category.index', [
            'categories' => $categories
        ]);
    }
}
